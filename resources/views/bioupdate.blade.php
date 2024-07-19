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
                @include('components.sweetalert')
                <!-- Main Content Area -->
                <div class="col-span-1 sm:col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="{{ route('store.biodata') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('date_of_birth') }}">
                                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select id="gender" name="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option value="">{{ __('Select a gender') }}</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="practice_no" class="block text-sm font-medium text-gray-700">Practice ID</label>
                                    <input type="text" id="practice_no" name="practice_no" placeholder="for New Members is Optional" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('practice_no') }}">
                                    <x-input-error :messages="$errors->get('practice_no')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                    <select id="marital_status" name="marital_status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option value="">{{ __('Select a marital status') }}</option>
                                        <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                        <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="text" id="phone_number" name="phone_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('phone_number') }}">
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                </div>


                                <div class="mb-4">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Nationality</label>
                                    <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" name="nationality" value="{{ old('nationality') }}" id="country"></select>
                                    <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                    <select id="state" name="state" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('state') }}">
                                    </select>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <textarea id="address" name="address" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none">{{ old('address') }}</textarea>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="highest_qualification" class="block text-sm font-medium text-gray-700">Highest Qualification</label>
                                    <select id="highest_qualification" name="highest_qualification" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option value="">{{ __('Select Highest Qualification') }}</option>
                                        <option value="National Diploma (ND)" {{ old('highest_qualification') == 'National Diploma (ND)' ? 'selected' : '' }}>National Diploma (ND)</option>
                                        <option value="Higher National Diploma (HND)" {{ old('highest_qualification') == 'Higher National Diploma (HND)' ? 'selected' : '' }}>Higher National Diploma (HND)</option>
                                        <option value="Bachelor's Degree" {{ old('highest_qualification') == 'Bachelor\'s Degree' ? 'selected' : '' }}>Bachelor's Degree</option>
                                        <option value="Postgraduate Diploma (PGD)" {{ old('highest_qualification') == 'Postgraduate Diploma (PGD)' ? 'selected' : '' }}>Postgraduate Diploma (PGD)</option>
                                        <option value="Master's Degree" {{ old('highest_qualification') == 'Master\'s Degree' ? 'selected' : '' }}>Master's Degree</option>
                                        <option value="Doctor of Philosophy (Ph.D.)" {{ old('highest_qualification') == 'Doctor of Philosophy (Ph.D.)' ? 'selected' : '' }}>Doctor of Philosophy (Ph.D.)</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('highest_qualification')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="major_field_of_study" class="block text-sm font-medium text-gray-700">Major Field of Study</label>
                                    <input type="text" id="major_field_of_study" name="major_field_of_study" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('major_field_of_study') }}">
                                    <x-input-error :messages="$errors->get('major_field_of_study')" class="mt-2" />
                                </div>

                                <div>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('countries.js') }}"></script>
    <!-- Script to initialize population of countries -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        populateCountries("country", "state"); // Populate first set of dropdowns
        populateCountries("country2"); // Populate second set of dropdowns
        // Repeat as needed for other dropdowns
    });
</script>
    @include('includes.script')
</x-app-layout> --}}


@extends('welcome')
<!-- Breadcrumb -->
<div class="breadcrumb-bar py-5">
</div>
<!-- /Breadcrumb -->
  @section('content')
<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>

            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">

                <div class="settings-widget card-details mb-0">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>My Profile</h3>
                        </div>
                        <div class="checkout-form personal-address">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="contact-info">
                                        <h6>First Name</h6>
                                        <p>Ronald</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contact-info">
                                        <h6>Last Name</h6>
                                        <p>Richard</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contact-info">
                                        <h6>User Name</h6>
                                        <p>studentdemo</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contact-info">
                                        <h6>Email</h6>
                                        <p>studentdemo@example.com</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="contact-info">
                                        <h6>Phone Number</h6>
                                        <p>90154-91036</p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="contact-info mb-0">
                                        <h6>Bio</h6>
                                        <p>Hello! I'm Ronald Richard. I'm passionate about developing innovative software solutions, analyzing classic literature. I aspire to become a software developer, work as an editor. In my free time, I enjoy coding, reading, hiking etc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student Dashboard -->

        </div>
    </div>
</div>
<!-- /Page Content -->
  @endsection
