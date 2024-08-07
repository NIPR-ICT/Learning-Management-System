<?php

namespace App\Http\Controllers;

use App\Models\ChargesPayment;
use App\Models\Enrollment;
use App\Models\EnrollmentTrack;
use App\Models\Part;
use App\Models\User;
use App\Mail\CoursePaid;
use Illuminate\Support\Facades\Mail;
use App\Models\Program;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        return view('course-registration-checkout');
    }
    public function onboardCheckout(Request $request)
    {
        return view('onboard-checkout');
    }

    public function finalCheckout(){
        return view('final-checkout');
    }
    public function onboardFinalCheckout(){
        return view('onboard-payment');
    }

    public function redirectToGateway(Request $request)
    {
        $part = session('part');
        $totalAmount = session('totalAmount');
        $totalPayableAmount=session('totalPayableAmount');
        $selectedCourses = session('selectedCourses');
        $disountedAmount=session('discounted');
        $extra_services=session('extra_services');
        $paymentDetails = [
            'email' => Auth::user()->email,
            'amount' => $totalPayableAmount * 100,
            'metadata' => [
                'selectedCourses' => $selectedCourses,
                'part' => $part,
                'user_id' => Auth::user()->id,
                'discountedAmount'=>$disountedAmount,
                'extra_services'=>$extra_services,
            ],
            'callback_url' => route('payment.callback')
        ];

        try {
            return Paystack::getAuthorizationUrl($paymentDetails)->redirectNow();
        } catch (\Exception $e) {
            return back()->withError('Error: ' . $e->getMessage());
        }
    }

    public function handleGatewayCallback()
    {
$paymentDetails = Paystack::getPaymentData();

if ($paymentDetails['status'] && $paymentDetails['data']['status'] == 'success') {
    $selectedCourses = $paymentDetails['data']['metadata']['selectedCourses'];
    $user_id = $paymentDetails['data']['metadata']['user_id'];
    $partData = $paymentDetails['data']['metadata']['part'];
    $reference_id = $paymentDetails['data']['reference'];
    $program_id = $partData['program_id'];
    $part_id = $partData['id'];
    $part_name = $partData['name'];
    $amount = $paymentDetails['data']['amount'] / 100;
    $discountedAmount=$paymentDetails['data']['metadata']['discountedAmount'];
    $transaction = Transaction::create([
        'amount' => $amount,
        'ref' => $reference_id,
        'user_id' => $user_id,
        'discountAmount' => $discountedAmount,
    ]);

    foreach ($selectedCourses as $course) {
        Enrollment::create([
            'user_id' => $user_id,
            'course_id' => $course['id'],
            'part_id' => $part_id,
            'program_id' => $program_id,
            'transaction_id' => $transaction->id,
        ]);
    }
    $charges = [];
    if (isset($paymentDetails['data']['metadata']['extra_services']) &&
    is_array($paymentDetails['data']['metadata']['extra_services']) &&
    count($paymentDetails['data']['metadata']['extra_services']) > 0) {
        $extra_services = $paymentDetails['data']['metadata']['extra_services'];
        foreach ($extra_services as $charge) {
            ChargesPayment::create([
                'charge_id' => $charge['id'],
                'amount' => $charge['amount'],
                'program_id' => $charge['program_id'],
                'part_id' => $charge['part_id'],
                'user_id' => $user_id,
                'transaction_id' => $transaction->id,
            ]);
            $charges[] = [
                'item' => $charge['item'],
                'amount' => $charge['amount'],
            ];
        }
    }


        EnrollmentTrack::create([
            'user_id' => $user_id,
            'status' => 'paid',
            'part_id' => $part_id,
            'program_id' => $program_id,
        ]);

        $user = User::find($user_id);
    $program = Program::find($program_id);

    Mail::to($user->email)->send(new CoursePaid($user, $selectedCourses, $part_name, $reference_id, $amount, $program, $charges, $discountedAmount));

    return redirect()->route('viewBy.bought.programme')->with('alert', [
        'title' => 'Payment Successful!',
        'text' => 'Payment successfully!',
        'icon' => 'success'
    ]);
}
return redirect()->route('dashboard')->with('alert', [
    'title' => 'Payment Failed!',
    'text' => 'Payment not successfully!',
    'icon' => 'error'
]);

    }

    public function getUserPaymentHistory(){
        $userID = Auth::user()->id;
        $loginUserTransactions= Transaction::where('user_id', $userID)->orderBy('created_at', 'desc')->paginate(10);
        return view('payment-history', compact('loginUserTransactions'));
    }

    public function AdminGetPaymentHistory(){
        $allTransactions= Transaction::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.all-payment-history', compact('allTransactions'));
    }

}
