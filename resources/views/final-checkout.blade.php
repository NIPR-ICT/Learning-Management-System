@extends('welcome')

@section('content')
<div class="breadcrumb-bar py-5"></div>
@include('components.sweetalert')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>
            <!-- /Sidebar -->

            <!-- Student Dashboard -->
            <div class="col-xl-8 col-lg-8">
                @if (session()->has('totalAmount2') && session()->has('part'))
                    <div class="col-md-12">
                        <div class="card shadow-sm rounded-lg">
                            <div class="card-body text-dark">
                                <!-- Receipt Header -->
                                <div class="receipt-header mb-4">
                                    <p class="text-center">Checkout Details!</p>
                                </div>

                                <!-- Receipt Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="2">Upaid Receipt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Course Title -->
                                            <tr>
                                                <td class="font-weight-bold">Course Title:</td>
                                                <td><?php $part = session('part'); ?>{{ $part->name }} of {{ $part->program->title }}</td>
                                            </tr>

                                            <tr>
                                                <td class="font-weight-bold">Courses Payable Amount:</td>
                                                <td>₦{{ session('totalAmount2') }}</td>
                                            </tr>

                                            <!-- Discounted Amount -->
                                            <tr>
                                                <td class="font-weight-bold">Discounted Amount:</td>
                                                <td>₦{{ session('discounted') }}</td>
                                            </tr>


                                            <!-- Extra Services -->
                                            @if (!empty(session('extra_services', [])))
                                                <tr>
                                                    <td class="font-weight-bold" colspan="2">Extra Services:</td>
                                                </tr>
                                                @foreach (session('extra_services', []) as $service)
                                                    <tr>
                                                        <td>{{ $service['item'] }}</td>
                                                        <td>₦{{ $service['amount'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            <!-- Extra Services Amount -->
                                            @if (session('extra_services_amount', 0) > 0)
                                                <tr>
                                                    <td class="font-weight-bold">Extra Services Amount:</td>
                                                    <td>₦{{ session('extra_services_amount') }}</td>
                                                </tr>
                                            @endif

                                            <!-- Total Payable Amount -->
                                            
                                            <tr class="font-weight-bold">
                                                <td>Total Payable Amount:</td>
                                                <td class="text-danger">₦{{ session('totalPayableAmount') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Payment Button -->
                                <div class="mb-4">
                                    <form action="{{ route('pay') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn  btn-danger w-100 w-sm-auto">Pay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <script type="text/javascript">
                        window.location = "{{ url()->previous() }}";
                    </script>
                @endif
            </div>
            <!-- /Student Dashboard -->
        </div>
    </div>
</div>
@endsection
