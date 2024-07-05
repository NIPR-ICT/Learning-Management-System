<?php

namespace App\Http\Controllers;

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
            // Process the selected courses as needed
            dd($user_id);
    
            return redirect()->route('home')->with('status', 'Payment Successful!');
        }
    
        return redirect()->route('home')->with('status', 'Payment Failed!');
    }
    
}
