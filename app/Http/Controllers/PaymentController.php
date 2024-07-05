<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        return view('course-registration-checkout');
    }

    public function finalCheckout(){
        return view('final-checkout');
    }
}
