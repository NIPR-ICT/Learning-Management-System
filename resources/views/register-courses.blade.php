<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <!-- Sidebar Toggle Button (Visible on small screens) -->
                <div class="sm:hidden mb-4">
                    <button id="sidebarToggle" class="focus:outline-none">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar -->
                @include('includes.studentsidebar')

                <div class="col-span-1 sm:col-span-3 p-4 sm:p-6">
                    <!-- Note -->
                    <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                        <p>The Maximum credit unit is <strong>{{$part->max_credit}}</strong> and the minimum is <strong>{{$part->min_credit}}</strong></p>
                    </div>

                    <!-- List of Courses with Checkboxes -->
                    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-1 gap-4">
                        <div class="bg-white p-3">
                            @if ($courses->isEmpty())
                                <p class="text-center text-gray-600">No courses available.</p>
                            @else
                                <form action="#" method="POST" id="courseForm">
                                    @csrf
                                    <div id="courseList">
                                        <!-- Automatically checked courses first -->
                                        @foreach ($courses->filter(fn($course) => $course->course_category === 'Core' || $course->course_category === 'General') as $course)
                                            <div class="flex items-center border-b border-gray-200 py-3">
                                                <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" checked disabled>
                                                <div class="ml-4">
                                                    <p class="text-gray-900 text-sm font-medium">{{ $course->title }} (₦{{ $course->course_amount }})</p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <p class="text-gray-500 text-sm credit-unit" data-credit="{{ $course->credit_unit }}">{{ $course->credit_unit }} Credits</p>
                                                    <p class="text-gray-500 text-sm course-amount" data-amount="{{ $course->course_amount }}"></p>
                                                    <p class="text-gray-500 text-sm">{{ $course->course_category }}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- Other courses -->
                                        @foreach ($courses->filter(fn($course) => $course->course_category !== 'Core' && $course->course_category !== 'General') as $course)
                                            <div class="flex items-center border-b border-gray-200 py-3">
                                                <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                <div class="ml-4">
                                                    <p class="text-gray-900 text-sm font-medium">{{ $course->title }} (₦{{ $course->course_amount }})</p>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <p class="text-gray-500 text-sm credit-unit" data-credit="{{ $course->credit_unit }}">{{ $course->credit_unit }} Credits</p>
                                                    <p class="text-gray-500 text-sm course-amount" data-amount="{{ $course->course_amount }}"></p>
                                                    <p class="text-gray-500 text-sm">{{ $course->course_category }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="flex justify-between mt-4">
                                        <p class="text-gray-700 font-medium">Total Credits: <span id="totalCredits">0</span></p>
                                        <p class="text-gray-700 font-medium">Total Amount: ₦<span id="totalAmount">0</span></p>
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">
                                            Register Selected Courses
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    @include('includes.script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const totalCreditsElement = document.getElementById('totalCredits');
            const totalAmountElement = document.getElementById('totalAmount');
            let totalCredits = 0;
            let totalAmount = 0;

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    totalCredits = calculateTotalCredits();
                    totalAmount = calculateTotalAmount();
                    totalCreditsElement.innerText = totalCredits;
                    totalAmountElement.innerText = totalAmount;
                });

                if (checkbox.checked) {
                    totalCredits += parseInt(checkbox.closest('.flex').querySelector('.credit-unit').dataset.credit);
                    totalAmount += parseInt(checkbox.closest('.flex').querySelector('.course-amount').dataset.amount);
                }
            });

            function calculateTotalCredits() {
                let total = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseInt(checkbox.closest('.flex').querySelector('.credit-unit').dataset.credit);
                    }
                });
                return total;
            }

            function calculateTotalAmount() {
                let total = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseInt(checkbox.closest('.flex').querySelector('.course-amount').dataset.amount);
                    }
                });
                return total;
            }

            totalCreditsElement.innerText = totalCredits;
            totalAmountElement.innerText = totalAmount;
        });
    </script>
</x-app-layout>
