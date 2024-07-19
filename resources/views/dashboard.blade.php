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
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar -->
                @include('includes.studentsidebar')

                <!-- Main Content Area -->
                <div class="col-span-1 sm:col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            @if (!Auth::user()->biodata)
                                <p>Please <a href="{{ route('biodata.update') }}" class="text-red-500 hover:text-red-700">update your biodata</a> to access all features.</p>
                            @else
                                <p>Welcome, {{ Auth::user()->name }}!</p>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                    <!-- Total Students Card -->
                                    <a href="#" class="block">
                                        <div class="bg-blue-500 rounded-lg shadow-md p-4 h-32">
                                            <div class="flex justify-between items-center h-full">
                                                <div class="flex flex-col justify-between w-full">
                                                    <h2 class="text-left text-lg font-bold text-white">Enrolled Courses</h2>
                                                    <h1 class="text-right text-2xl text-white">4</h1>
                                                    <div class="mt-2">
                                                        <div class="w-full bg-blue-300 h-1 rounded">
                                                            <div class="bg-white h-1 rounded" style="width: 25%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- Total Inactive Students Card -->
                                    <a href="#" class="block">
                                        <div class="bg-indigo-600 text-white rounded-lg shadow-md p-4 h-32">
                                            <div class="flex justify-between items-center h-full">
                                                <div class="flex flex-col justify-between w-full">
                                                    <h2 class="text-left text-lg font-bold">Total Inactive Students</h2>
                                                    <h1 class="text-right text-2xl">3</h1>
                                                    <div class="mt-2">
                                                        <div class="w-full bg-indigo-400 h-1 rounded">
                                                            <div class="bg-white h-1 rounded" style="width: 25%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- Total Courses Card -->
                                    <a href="#" class="block">
                                        <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 h-32">
                                            <div class="flex justify-between items-center h-full">
                                                <div class="flex flex-col justify-between w-full">
                                                    <h2 class="text-left text-lg font-bold">Total Courses</h2>
                                                    <h1 class="text-right text-2xl">2</h1>
                                                    <div class="mt-2">
                                                        <div class="w-full bg-yellow-300 h-1 rounded">
                                                            <div class="bg-white h-1 rounded" style="width: 25%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.script');
</x-app-layout> --}}

@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

            <!-- sidebar -->
          <div class="col-xl-3 col-lg-3">
            @include('includes.layout-frontend.side-bar')
          </div>
            <!-- /Sidebar -->
            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">

                <!-- Dashboard Grid -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="card dash-info flex-fill">
                            <div class="card-body">
                                <h5>Enrolled Courses</h5>
                                <h2>12</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="card dash-info flex-fill">
                            <div class="card-body">
                                <h5>Active Courses</h5>
                                <h2>03</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="card dash-info flex-fill">
                            <div class="card-body">
                                <h5>Completed Courses</h5>
                                <h2>13</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Dashboard Grid -->

                <div class="dashboard-title">
                    <h4>Recently Enrolled Courses</h4>
                </div>
                <div class="row">

                    <!-- Course Grid -->
                    <div class="col-xxl-4 col-md-6 d-flex">
                        <div class="course-box flex-fill">
                            <div class="product">
                                <div class="product-img">
                                    <a href="course-details.html">
                                        <img class="img-fluid" alt="Img" src="assets/img/course/course-02.jpg">
                                    </a>
                                    <div class="price">
                                        <h3>$80 <span>$99.00</span></h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="instructor-profile.html"><img src="assets/img/user/user2.jpg" alt="Img" class="img-fluid"></a>
                                            <div class="course-name">
                                                <h4><a href="instructor-profile.html">Cooper</a></h4>
                                                <p>Instructor</p>
                                            </div>
                                        </div>
                                        <div class="course-share d-flex align-items-center justify-content-center">
                                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="title instructor-text"><a href="course-details.html">Wordpress for Beginners - Master Wordpress Quickly</a></h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>12+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>70hr 30min</p>
                                        </div>
                                    </div>
                                    <div class="rating mb-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span class="d-inline-block average-rating"><span>5.0</span> (20)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Course Grid -->

                    <!-- Course Grid -->
                    <div class="col-xxl-4 col-md-6 d-flex">
                        <div class="course-box flex-fill">
                            <div class="product">
                                <div class="product-img">
                                    <a href="course-details.html">
                                        <img class="img-fluid" alt="Img" src="assets/img/course/course-03.jpg">
                                    </a>
                                    <div class="price combo">
                                        <h3>FREE</h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="instructor-profile.html"><img src="assets/img/user/user5.jpg" alt="Img" class="img-fluid"></a>
                                            <div class="course-name">
                                                <h4><a href="instructor-profile.html">Jenny</a></h4>
                                                <p>Instructor</p>
                                            </div>
                                        </div>
                                        <div class="course-share d-flex align-items-center justify-content-center">
                                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="title instructor-text"><a href="course-details.html">Sketch from A to Z (2022): Become an app designer</a></h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>10+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>40hr 10min</p>
                                        </div>
                                    </div>
                                    <div class="rating mb-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>3.0</span> (18)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Course Grid -->

                    <!-- Course Grid -->
                    <div class="col-xxl-4 col-md-6 d-flex">
                        <div class="course-box flex-fill">
                            <div class="product">
                                <div class="product-img">
                                    <a href="course-details.html">
                                        <img class="img-fluid" alt="Img" src="assets/img/course/course-04.jpg">
                                    </a>
                                    <div class="price">
                                        <h3>$65 <span>$70.00</span></h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="instructor-profile.html"><img src="assets/img/user/user4.jpg" alt="Img" class="img-fluid"></a>
                                            <div class="course-name">
                                                <h4><a href="instructor-profile.html">Nicole Brown</a></h4>
                                                <p>Instructor</p>
                                            </div>
                                        </div>
                                        <div class="course-share d-flex align-items-center justify-content-center">
                                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="title instructor-text"><a href="course-details.html">Learn Angular Fundamentals From beginning to advance lavel</a></h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>15+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>80hr 40min</p>
                                        </div>
                                    </div>
                                    <div class="rating mb-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>4.0</span> (10)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Course Grid -->

                    <!-- Course Grid -->
                    <div class="col-xxl-4 col-md-6 d-flex">
                        <div class="course-box flex-fill">
                            <div class="product">
                                <div class="product-img">
                                    <a href="course-details.html">
                                        <img class="img-fluid" alt="Img" src="assets/img/course/course-05.jpg">
                                    </a>
                                    <div class="price combo">
                                        <h3>FREE</h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="instructor-profile.html"><img src="assets/img/user/user3.jpg" alt="Img" class="img-fluid"></a>
                                            <div class="course-name">
                                                <h4><a href="instructor-profile.html">John Smith</a></h4>
                                                <p>Instructor</p>
                                            </div>
                                        </div>
                                        <div class="course-share d-flex align-items-center justify-content-center">
                                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="title instructor-text"><a href="course-details.html">Build Responsive Real World Websites with Crash Course</a></h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>12+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>70hr 30min</p>
                                        </div>
                                    </div>
                                    <div class="rating mb-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Course Grid -->

                    <!-- Course Grid -->
                    <div class="col-xxl-4 col-md-6 d-flex">
                        <div class="course-box flex-fill">
                            <div class="product">
                                <div class="product-img">
                                    <a href="course-details.html">
                                        <img class="img-fluid" alt="Img" src="assets/img/course/course-07.jpg">
                                    </a>
                                    <div class="price">
                                        <h3>$70 <span>$80.00</span></h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="instructor-profile.html"><img src="assets/img/user/user6.jpg" alt="Img" class="img-fluid"></a>
                                            <div class="course-name">
                                                <h4><a href="instructor-profile.html">Stella Johnson</a></h4>
                                                <p>Instructor</p>
                                            </div>
                                        </div>
                                        <div class="course-share d-flex align-items-center justify-content-center">
                                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="title instructor-text"><a href="course-details.html">Learn JavaScript and Express to become a Expert</a></h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>15+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>70hr 30min</p>
                                        </div>
                                    </div>
                                    <div class="rating mb-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>4.6</span> (15)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Course Grid -->

                    <!-- Course Grid -->
                    <div class="col-xxl-4 col-md-6 d-flex">
                        <div class="course-box flex-fill">
                            <div class="product">
                                <div class="product-img">
                                    <a href="course-details.html">
                                        <img class="img-fluid" alt="Img" src="assets/img/course/course-08.jpg">
                                    </a>
                                    <div class="price combo">
                                        <h3>FREE</h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt="Img" class="img-fluid"></a>
                                            <div class="course-name">
                                                <h4><a href="instructor-profile.html">Nicole Brown</a></h4>
                                                <p>Instructor</p>
                                            </div>
                                        </div>
                                        <div class="course-share d-flex align-items-center justify-content-center">
                                            <a href="#"><i class="fa-regular fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="title instructor-text"><a href="course-details.html">Introduction to Programming- Python & Java</a></h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>10+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>70hr 30min</p>
                                        </div>
                                    </div>
                                    <div class="rating mb-0">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span class="d-inline-block average-rating"><span>5.0</span> (13)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Course Grid -->

                </div>
                <div class="dash-pagination">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <p>Page 1 of 2</p>
                        </div>
                        <div class="col-6">
                            <ul class="pagination">
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#"><i class="bx bx-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student Dashboard -->
        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->




