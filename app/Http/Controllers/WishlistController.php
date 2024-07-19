<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $course_id){

        if (Auth::check()) {
           $exists = Wishlist::where('user_id',Auth::id())->where('course_id',$course_id)->first();

           if (!$exists) {
            Wishlist::insert([
                'user_id' => Auth::id(),
                'course_id' => $course_id,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['success' => 'Successfully Added on your Wishlist']);
           }else {
            return response()->json(['error' => 'This Product Has Already on your withlist']);
           }

        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }

    } // End Method

    public function AllWishlist(){

        return view('wishlist');

    }// End Method

    public function studentWishList(){

        $wishlist = Wishlist::with('course')->where('user_id',Auth::id())->latest()->get();
        $wishQty = count($wishlist);
        // return view('student.wishlist', compact('wishlist','wishQty'));

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);

    }// End Method

    public function getWishlist(){
        $wishlist = Wishlist::with('course', 'modules')->where('user_id',Auth::id())->latest()->get();
        $wishQty = count($wishlist);
        return view('wishlist', compact('wishlist','wishQty'));
    }

    public function RemoveWishlist($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Course Remove']);

    }// End Method
}
