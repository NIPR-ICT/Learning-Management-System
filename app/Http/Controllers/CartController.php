<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $course = Course::find($id);
        // Check if the course is already in the cart
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Course is already in your cart']);
        }

        if ($course->discount_price == NULL) {

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->course_amount,
                'weight' => 1,
                'options' => [
                    'image' => $course->cover_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);

        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->course_amount,
                'weight' => 1,
                'options' => [
                    'image' => $course->cover_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor,
                ],
            ]);
        }

        return response()->json(['success' => 'Successfully Added on Your Cart']);

    }// End Method

    public function CartData(){

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));

    }// End Method

    public function AddMiniCart(){

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();

        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty,
        ));

    }// End Method 
}
