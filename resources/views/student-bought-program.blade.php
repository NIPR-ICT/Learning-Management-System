{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Programs') }}
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
                            <p>Below are the programs for which you have enrolled in courses:</p>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            @foreach ($programs as $program)
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <h2 class="text-lg font-semibold mb-2">{{ $program->title }}</h2>
                                <p class="text-sm text-gray-600 mb-4">
                                    @php
                                    $description = $program->description;
                                    $words = explode(' ', $description);
                                    $shortened = implode(' ', array_slice($words, 0, 10)); // Adjust the number of words shown
                                    if (count($words) > 10) {
                                        $shortened .= '...';
                                    }
                                    @endphp
                                    {{ $shortened }}
                                </p>
                                <form id="start-program-form-{{ $program->id }}" action="{{ route('program.start') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded inline-block">Start Program</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $programs->links() }}
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
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

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
                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>My Programmes</h3>
                        </div>
                    </div>
                </div>

                @if (count($programs) > 0)
                    @foreach ($programs as $program)
                        <div class="instructor-list flex-fill">
                            <div class="instructor-img">
                                
                            </div>
                            <div class="instructor-content">
                                <h5><a href="#">{{ $program->title }}</a></h5>
                                <h6>{{ Str::words($program->description, 25, '...') }}</h6>
                                <div class="instructor-info">
                                    <div class="rating-img d-flex align-items-center">
                                        {{-- <img src="assets/img/icon/icon-01.svg" class="me-1" alt="Img"> --}}
                                        <p>12+ Lesson</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center ms-0">
                                        {{-- <img src="assets/img/icon/icon-02.svg" class="me-1" alt="Img"> --}}
                                        <p>9hr 30min</p>
                                    </div>
                                    <div class="rating-img d-flex align-items-center">
                                        {{-- <img src="assets/img/icon/user-icon.svg" class="me-1" alt="Img"> --}}
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
                                @php
                                    $started = \App\Models\Enrollment::where([['user_id', auth()->user()->id], ['program_id',  $program->id]])->first();
                                @endphp
                                @if (!empty($started))
                                    <form id="start-program-form-{{ $program->id }}" action="{{ route('program.start') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                                        <button type="submit" class="btn btn-primary">Start Program</button>
                                    </form>
                                @endif
                                <a href="#" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $programs->links() }}
                @else
                    <div class="settings-widget card-details">
                        <div class="settings-menu p-0">
                            <div class="profile-heading">
                                <h3>My Programmes</h3>
                            </div>
                            <div class="checkout-form">
                                <h6>You have not purchased any Programme yet :( </h6>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- /Student Dashboard -->
        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->
