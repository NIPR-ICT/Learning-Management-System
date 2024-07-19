{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
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
                    <div class="container mx-auto">
                        <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                            <p>Select Part for the Program you want. Note: you must take part one before taking part 2.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($parts as $part)
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h2 class="text-xl font-bold mb-2">{{ $part->name }} of {{ $part->program->title }}</h2>
                                <div class="flex space-x-4 mb-4 text-xs">
                                    <p class="text-gray-600"><strong>Max Credit:</strong> {{ $part->max_credit }}</p>
                                    <p class="text-gray-600"><strong>Min Credit:</strong> {{ $part->min_credit }}</p>
                                    <p class="text-gray-600"><strong>Duration:</strong> {{ $part->program_duration }}</p>
                                </div>
                                <p class="text-sm text-gray-600 mb-4">
                                    @php
                                    $description = $part->description;
                                    $words = explode(' ', $description);
                                    $shortened = implode(' ', array_slice($words, 0, 10)); // Adjust the number of words shown
                                    if (count($words) > 10) {
                                        $shortened .= '...';
                                    }
                                    @endphp
                                    {{ $shortened }}
                                </p>
                                <a href="{{ route('course.register.student', $part->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">View List of Courses</a>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $parts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    @include('includes.script')
</x-app-layout> --}}


@extends('welcome')
@section('content')
<div class="breadcrumb-bar py-5"></div>

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
                @if ($parts->isEmpty())
                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>Parts</h3>
                        </div>
                        <div class="checkout-form">
                            <h6>No Parts added yet :( Please try again later)</h6>
                        </div>
                    </div>
                </div>
            @else
                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <p>Select Part for the Program you want. Note: you must take part one before taking part 2.</p>
                        </div>
                    </div>
                </div>
            
                @foreach ($parts as $part)
                    <div class="instructor-list flex-fill">
                        {{-- <div class="instructor-img">
                            <a href="instructor-profile.html">
                                <img class="img-fluid" alt="Img" src="assets/img/user/user11.jpg">
                            </a>
                        </div> --}}
                        <div class="instructor-content">
                            <h5>{{ $part->name }} of {{ $part->program->title }}</h5>
                            <div class="d-flex gap-3 mb-4 text-xs">
                                <p class="text-muted"><strong>Max Credit:</strong> {{ $part->max_credit }}</p>
                                <p class="text-muted"><strong>Min Credit:</strong> {{ $part->min_credit }}</p>
                                <p class="text-muted"><strong>Duration:</strong> {{ $part->program_duration }}</p>
                            </div>
                            
                            <p>{{ Str::words($part->description, 25, '...') }}</p>
                            <div class="instructor-info">
                                <div class="rating-img d-flex align-items-center">
                                    <p>12+ Lessons</p>
                                </div>
                                <div class="course-view d-flex align-items-center ms-0">
                                    <p>9hr 30min</p>
                                </div>
                                <div class="rating-img d-flex align-items-center">
                                    <p>50 Students</p>
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                </div>
                                <a href="#rate" class="rating-count"><i class="fa-regular fa-heart"></i></a>
                            </div>     
                            <a href="{{ route('course.register.student', $part->id) }}" class="btn btn-primary">Enroll</a>
                        </div>
                    </div>
                @endforeach
            @endif
            
                {{ $parts->links() }}
            </div>
            <!-- /Student Dashboard -->

        </div>
    </div>
</div>
@endsection
