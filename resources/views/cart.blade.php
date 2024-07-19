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
                    <div class="col-lg-12">
                        <div class="cart-head">
                            <h4>Your cart (<strong id="cartQtyz"></strong> items)</h4>
                        </div>
                        <div class="cart-group">
                            <div class="row" id="cartPage">
                              
                            </div>
                        </div>
                        <div class="cart-total">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="cart-subtotal">
                                        <p id="cartTotal">Subtotal </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="check-outs">
                                        <a href="checkout.html" class="btn btn-primary">Checkout</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="condinue-shop">
                                        <a href="{{ route('course.view') }}" class="btn btn-primary">Continue Shopping</a>
                                    </div>
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
