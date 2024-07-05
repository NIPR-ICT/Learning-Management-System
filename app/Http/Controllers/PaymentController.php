<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Part;
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

    public function finalCheckout(){
        return view('final-checkout');
    }

    public function redirectToGateway(Request $request)
    {
        $part = session('part');
        $totalAmount = session('totalAmount2');
        $selectedCourses = session('selectedCourses');
        $paymentDetails = [
            'email' => Auth::user()->email,
            'amount' => $totalAmount * 100,
            'metadata' => [
                'selectedCourses' => $selectedCourses,
                'part' => $part,
                'user_id' => Auth::user()->id,
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
    $amount = $paymentDetails['data']['amount'] / 100;

    // Create transaction first and get its ID
    $transaction = Transaction::create([
        'amount' => $amount,
        'ref' => $reference_id,
        'user_id' => $user_id,
    ]);

    foreach ($selectedCourses as $course) {
        Enrollment::create([
            'user_id' => $user_id,
            'course_id' => $course['id'],
            'part_id' => $part_id,
            'program_id' => $program_id,
            'transaction_id' => $transaction->id, // Use the transaction ID here
        ]);
    }

    return redirect()->route('dashboard')->with('alert', [
        'title' => 'Payment Successful!',
        'text' => 'Payment successfully!',
        'icon' => 'success'
    ]);
}

    }
    
}
