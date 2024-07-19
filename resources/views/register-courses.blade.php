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
            <div class="col-xl-9 col-lg-9">
                <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                    <p>The Maximum credit unit is <strong>{{$part->max_credit}}</strong> and the minimum is <strong>{{$part->min_credit}}</strong></p>
                </div>
                <div class="container mx-auto">
                    <div class="bg-white p-3">
                        @if ($courses->isEmpty())
                            <p class="text-center text-muted">No courses available.</p>
                        @else
                            <form action="{{ route('courses.register') }}" method="POST" id="courseForm">
                                @csrf
                                <input type="hidden" name="part_id" value="{{ $part->id }}">
                                <div id="courseList">
                                    <!-- Automatically checked courses first -->
                                    @foreach ($courses->filter(fn($course) => $course->course_category === 'Core' || $course->course_category === 'General') as $course)
                                        <div class="d-flex align-items-center border-bottom py-3">
                                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-check-input me-2" checked disabled>
                                            <input type="hidden" name="courses[]" value="{{ $course->id }}">
                                            <div class="me-4">
                                                <p class="text-dark fw-medium">{{ $course->title }} (₦{{ $course->course_amount }})</p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <p class="text-muted credit-unit" data-credit="{{ $course->credit_unit }}">{{ $course->credit_unit }} Credits</p>
                                                <p class="text-muted course-amount" data-amount="{{ $course->course_amount }}"></p>
                                                <p class="text-muted">{{ $course->course_category }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                
                                    <!-- Other courses -->
                                    @foreach ($courses->filter(fn($course) => $course->course_category !== 'Core' && $course->course_category !== 'General') as $course)
                                        <div class="d-flex align-items-center border-bottom py-3">
                                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-check-input me-2">
                                            <div class="me-4">
                                                <p class="text-dark fw-medium">{{ $course->title }} (₦{{ $course->course_amount }})</p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <p class="text-muted credit-unit" data-credit="{{ $course->credit_unit }}">{{ $course->credit_unit }} Credits</p>
                                                <p class="text-muted course-amount" data-amount="{{ $course->course_amount }}"></p>
                                                <p class="text-muted">{{ $course->course_category }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="text-dark fw-medium">Total Credits: <span id="totalCredits">0</span></p>
                                    <p class="text-dark fw-medium">Total Amount: ₦<span id="totalAmount">0</span></p>
                                    <button type="submit" class="btn btn-danger w-50 w-sm-auto">
                                        Register Selected Courses
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                
            
                
            </div>
            <!-- /Student Dashboard -->

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const totalCreditsElement = document.getElementById('totalCredits');
        const totalAmountElement = document.getElementById('totalAmount');
        let totalCredits = 0;
        let totalAmount = 0;

        // Initial calculation of total credits and amount
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                totalCredits += parseInt(checkbox.closest('.d-flex').querySelector('.credit-unit').dataset.credit);
                totalAmount += parseInt(checkbox.closest('.d-flex').querySelector('.course-amount').dataset.amount);
            }
        });

        totalCreditsElement.innerText = totalCredits;
        totalAmountElement.innerText = totalAmount;

        // Event listener for checkbox changes
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                totalCredits = calculateTotalCredits();
                totalAmount = calculateTotalAmount();
                totalCreditsElement.innerText = totalCredits;
                totalAmountElement.innerText = totalAmount;
            });
        });

        function calculateTotalCredits() {
            let total = 0;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    total += parseInt(checkbox.closest('.d-flex').querySelector('.credit-unit').dataset.credit);
                }
            });
            return total;
        }

        function calculateTotalAmount() {
            let total = 0;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    total += parseInt(checkbox.closest('.d-flex').querySelector('.course-amount').dataset.amount);
                }
            });
            return total;
        }
    });
</script>
@endsection
