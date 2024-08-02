@extends('welcome')

	<!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bar-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 pt-5">
                    <div class="breadcrumb-list pt-5">
                        <h2 class="breadcrumb-title">Cart </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
  @section('content')


<!-- Cart -->
<section class="course-content cart-widget">
    <div class="container">
        <div class="student-widget">
            <div class="student-widget-group">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-head">
                            <h4>Your cart (<strong id="cartQtyz"></strong> items)</h4>
                        </div>
                        <div class="cart-group">
                            <div class="row" id="cartPage">

                            </div>
                        </div>
                        <div class="cart-total">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="cart-subtotal">
                                        @if(Session::has('coupon'))

                                        @else
                                        <div class="input-group mb-3 " id="couponField">
                                            <input type="text" class="form-control" id="coupon_name" style="width: 100px" placeholder="Apply Coupon" aria-label="Apply Coupon" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                              <button class="btn btn-outline-secondary" onclick="applyCoupon()" type="button">Apply</button>
                                            </div>
                                          </div>
                                          @endif
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6">
                                    <div class="check-outs">
                                        <a href="{{ route('checkout.view') }}" class="btn btn-primary">Checkout</a>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6 col-md-6">
                                    <div class="condinue-shop">
                                        <a href="{{ route('course.view') }}" class="btn btn-primary">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 theiaStickySidebar">
                        <div class="student-widget select-plan-group">
                            <div class="student-widget-group">
                                <div class="plan-header">
                                    <h4>Cart Total </h4>
                                </div>
                                {{-- <div class="basic-plan"> --}}
                                    {{-- <h3>Basic</h3> --}}
                                <div class="bg-gray p-4 rounded-rounded mt-40px" id="couponCalField">
                                   <h3  id="cartTotal"><span> </span></h3>
                                </div>

                                <div class="plan-change">
                                    <a href="{{ route('checkout.view') }}" class="btn btn-primary">Change the Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Cart -->

  @endsection
