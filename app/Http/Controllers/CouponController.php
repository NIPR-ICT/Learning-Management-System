<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\ExtraCharge;
use App\Models\Part;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index(Request $request)
    {
        $coupons = Coupon::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.all-coupons', compact('coupons'));
    }


    public function create()
    {
        $parts=Part::all();
        return view('admin.add-coupon', compact('parts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'part_id' => 'required',
            'percentage_discount' => 'required|integer',
            'code' => 'required|string|unique:coupons,code',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'end_date.after' => 'The end date must be after the start date.',
        ]);

        $coupon = new Coupon([
            'part_id' => $request->get('part_id'),
            'percentage_discount' => $request->get('percentage_discount'),
            'code' => $request->get('code'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);

        $coupon->save();
        return redirect()->route('add.coupon')->with('alert', [
            'title' => 'Success!',
            'text' => 'Coupon created successfully.',
            'icon' => 'success'
        ]);
    }

    public function destroy($id)
    {
        // Find the program by ID and delete it
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        // Redirect back with a success message
        return redirect()->route('all.coupons')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Coupon deleted successfully!',
            'icon' => 'success'
        ]);
    }


    public function completeCheckout(Request $request)
{
    $coupon = $request->get('coupon');
    $part = session('part');
    $totalAmount = session('totalAmount');
    $selectedCourses = session('selectedCourses');
    $coupon = $request->input('coupon');

       $extraServices = ExtraCharge::where('part_id', $part->id)
     ->get(['id', 'amount', 'item', 'program_id', 'part_id']);

    $extra_services_amount = $extraServices->sum('amount');

    if (empty($coupon)) {
        session([
            'totalAmount2' => $totalAmount,
            'part' => $part,
            'selectedCourses' => $selectedCourses,
            'discounted'=>0.00,
            'extra_services' => $extraServices,
            'extra_services_amount'=>$extra_services_amount,
            'totalPayableAmount'=>$totalAmount+$extra_services_amount,
        ]);
        return redirect()->route('checkout.preview.final');
    }

    $checkCoupon = Coupon::where('code', $coupon)->first();
    if ($checkCoupon && $checkCoupon->end_date && Carbon::now()->lte($checkCoupon->end_date)) {
        if($part->id == $checkCoupon->part_id){
            $percent=$checkCoupon->percentage_discount;
        $discount=$percent/100;
        $new_amount= $discount*$totalAmount;
        $final_amount=$totalAmount-$new_amount;
        session([
            'totalAmount2' => $final_amount,
            'part' => $part,
            'selectedCourses' => $selectedCourses,
            'discounted'=>$new_amount,
            'extra_services' => $extraServices,
            'extra_services_amount'=>$extra_services_amount,
            'totalPayableAmount'=>$final_amount+$extra_services_amount,

        ]);
        return redirect()->route('checkout.preview.final');
        }
        return redirect()->route('register.checkout.summary')->with('alert', [
            'title' => 'Error!',
            'text' => 'Coupon Not applicable for this part.',
            'icon' => 'error'
        ]);

    } elseif ($checkCoupon && $checkCoupon->end_date && Carbon::now()->gt($checkCoupon->end_date)) {
        return redirect()->route('register.checkout.summary')->with('alert', [
            'title' => 'Error!',
            'text' => 'Coupon has Expired.',
            'icon' => 'error'
        ]);
    }else {
        return redirect()->route('register.checkout.summary')->with('alert', [
            'title' => 'Error!',
            'text' => 'Invalid Coupon.',
            'icon' => 'error'
        ]);
    }

}

    public function onboardCompleteCheckout(Request $request)
    {
        $coupon = $request->get('coupon');
        $part = session('part');
        $totalAmount = session('totalAmount');
        $selectedCourses = session('selectedCourses');
        $coupon = $request->input('coupon');

        $extraServices = ExtraCharge::where('part_id', $part->id)
        ->get(['id', 'amount', 'item', 'program_id', 'part_id']);

        $extra_services_amount = $extraServices->sum('amount');
        $program = Program::where('id',$part->program_id)->first();
        if (empty($coupon)) {
            session([
                'totalAmount2' => $totalAmount,
                'part' => $part,
                'selectedCourses' => $selectedCourses,
                'discounted'=>0.00,
                'extra_services' => $extraServices,
                'extra_services_amount'=>$extra_services_amount,
                'totalPayableAmount'=>$totalAmount+$extra_services_amount,
            ]);
            return redirect()->route('onboard.checkout.preview.final', compact('program'));
        }

        $checkCoupon = Coupon::where('code', $coupon)->first();
        if ($checkCoupon && $checkCoupon->end_date && Carbon::now()->lte($checkCoupon->end_date)) {
            if($part->id == $checkCoupon->part_id){
                $percent=$checkCoupon->percentage_discount;
            $discount=$percent/100;
            $new_amount= $discount*$totalAmount;
            $final_amount=$totalAmount-$new_amount;
            session([
                'totalAmount2' => $final_amount,
                'part' => $part,
                'selectedCourses' => $selectedCourses,
                'discounted'=>$new_amount,
                'extra_services' => $extraServices,
                'extra_services_amount'=>$extra_services_amount,
                'totalPayableAmount'=>$final_amount+$extra_services_amount,

            ]);
            return redirect()->route('onboard.checkout.preview.final', compact('program'));
            }
            $notification = array(
                'message' => 'Coupon Not applicable for this part.',
                'alert-type' => 'error'
            );
            return redirect()->route('program.level.register.summary')->with($notification);

        } elseif ($checkCoupon && $checkCoupon->end_date && Carbon::now()->gt($checkCoupon->end_date)) {
            $notification = array(
                'message' => 'Coupon has Expired.',
                'alert-type' => 'error'
            );
            return redirect()->route('program.level.register.summary')->with($notification);
        }else {
            $notification = array(
                'message' => 'Invalid Coupon',
                'alert-type' => 'error'
            );
            return redirect()->route('program.level.register.summary')->with($notification);
        }

    }

}
