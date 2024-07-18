{{-- <x-app-layout>
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
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar -->
                @include('includes.adminsidebar')
                @include('components.sweetalert')

                <!-- Main Content Area -->
                <div class="col-span-1 sm:col-span-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="old('title')">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="part_id" class="block text-sm font-medium text-gray-700">Part Name with Program</label>
                                    <select id="part_id" name="part_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" onchange="updateProgramOptions()">
                                        <option disabled selected>Select Program with Part</option>
                                        @foreach ($parts as $part)
                                            <option value="{{ $part->id }}" data-program="{{ $part->program->title }}" data-program-id="{{ $part->program->id }}">
                                                {{ $part->name }} of {{ $part->program->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('part_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="program_id" class="block text-sm font-medium text-gray-700">Confirm Program</label>
                                    <select id="program_id" name="program_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option disabled selected>Select Program</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('program_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="course_category" class="block text-sm font-medium text-gray-700">Course Category</label>
                                    <select id="course_category" name="course_category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option disabled selected>Select Course Category</option>
                                        <option value="Core">Core Course</option>
                                        <option value="Elective">Elective Course</option>
                                        <option value="General">General Course</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('course_category')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="course_amount" class="block text-sm font-medium text-gray-700">Course Amount</label>
                                    <input type="number" id="course_amount" name="course_amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                    <x-input-error :messages="$errors->get('course_amount')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_code" class="block text-sm font-medium text-gray-700">Enter Course Code</label>
                                    <input type="text" id="course_code" name="course_code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="old('course_code')">
                                    <x-input-error :messages="$errors->get('course_code')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none">{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="credit_unit" class="block text-sm font-medium text-gray-700">Course Credit Unit</label>
                                    <input type="number" min="0" id="credit_unit" name="credit_unit" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('credit_unit') }}">
                                    <x-input-error :messages="$errors->get('credit_unit')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="cover_image" class="block text-sm font-medium text-gray-700">Upload Cover Image for Course</label>
                                    <input type="file" id="cover_image" name="cover_image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <x-input-error :messages="$errors->get('cover_image')" class="mt-2 text-sm text-red-600" />
                                </div>

                                <div class="mb-4">
                                    <label for="featured" class="block text-sm font-medium text-gray-700">Featured</label>
                                    <input type="checkbox" id="featured" name="featured" class="mt-1" value="1" {{ old('featured') ? 'checked' : '' }}>
                                    <x-input-error :messages="$errors->get('featured')" class="mt-2" />
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

    <script>
        function updateProgramOptions() {
            var partSelect = document.getElementById('part_id');
            var programSelect = document.getElementById('program_id');

            // Get the selected part's program ID and title
            var selectedOption = partSelect.options[partSelect.selectedIndex];
            var programId = selectedOption.getAttribute('data-program-id');
            var programTitle = selectedOption.getAttribute('data-program');

            // Clear existing options and set the selected program
            programSelect.innerHTML = '';

            // Add a default option
            var defaultOption = document.createElement('option');
            defaultOption.text = 'Select Program';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            programSelect.appendChild(defaultOption);

            // Add the program options based on the selected part
            if (programId && programTitle) {
                var option = document.createElement('option');
                option.value = programId;
                option.text = programTitle; // Display program title as text
                programSelect.appendChild(option);
            }
        }
    </script>

    @include('includes.script')
</x-app-layout> --}}



@extends('admin.index')
@section('slot')
    @include('components.sweetalert')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Courses</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item " aria-current="page">Course</li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">List of Courses</button>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Add Course</h6>
            <hr />
            <div class="card">
                <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Course</h6>
                    <hr />
                    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="title" class="form-label">Course Title</label>
                        <input class="form-control w-100 form-control-lg mb-3" id="title" name="title"
                            type="text" placeholder="" value="{{ old('title') }}"
                            aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />


                        <label for="part_id" class="form-label">Part Name with Program</label>
                        <select class="form-control w-100 form-control-lg mb-3" id="part_id" name="part_id"
                            aria-label=".form-control-lg example" onchange="updateProgramOptions()">
                            <option disabled selected>Select Program with Part</option>
                                        @foreach ($parts as $part)
                                            <option value="{{ $part->id }}" data-program="{{ $part->program->title }}" data-program-id="{{ $part->program->id }}">
                                                {{ $part->name }} of {{ $part->program->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('part_id')" class="mt-2" />


                        <label for="program_id" class="form-label">Confirm Program</label>
                        <select class="form-control w-100 form-control-lg mb-3" id="program_id" name="program_id"
                            aria-label=".form-control-lg example">
                            <option disabled selected>Select Program</option>
                                    </select>
                            <x-input-error :messages="$errors->get('program_id')" class="mt-2" />


                            <label for="course_category" class="form-label">Course Category</label>
                            <select class="form-control w-100 form-control-lg mb-3" id="course_category" name="course_category"
                                aria-label=".form-control-lg example">
                                <option disabled selected>Select Course Category</option>
                                <option value="Core">Core Course</option>
                                <option value="Elective">Elective Course</option>
                                <option value="General">General Course</option>
                            </select>
                            <x-input-error :messages="$errors->get('course_category')" class="mt-2" />


                        <label for="course_amount" class="form-label">Course Amount</label>
                        <input class="form-control w-100 form-control-lg mb-3" type="number" id="course_amount" name="course_amount"
                           value="{{ old('course_amount') }}" 
                            aria-label=".form-control-lg example">
                        <x-input-error :messages="$errors->get('course_amount')" class="mt-2" />

                        <label for="course_code" class="form-label">Enter Course Code</label>
                        <input class="form-control  w-100 form-control-lg mb-3" type="text" id="course_code" name="course_code" aria-label=".form-control-lg example" value="{{ old('course_code') }}">
                        <x-input-error :messages="$errors->get('course_code')" class="mt-2" />

                            <label for="description" class="form-label">Description</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="description" name="description" rows="4"  style="resize: none" aria-label=".form-control-lg example">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />


                        <label for="credit_unit" class="form-label">Course Credit Unit</label>
                        <input class="form-control  w-100 form-control-lg mb-3" min="0" id="credit_unit" name="credit_unit" type="number"
                            placeholder="" aria-label=".form-control-lg example"
                            value="{{ old('credit_unit') }}">
                        <x-input-error :messages="$errors->get('credit_unit')" class="mt-2" />


                            <label for="cover_image" class="form-label">Upload Cover Image for Course</label>
                            <input class="form-control  w-100 form-control-lg mb-3" id="cover_image" name="cover_image" type="file"
                                placeholder="" aria-label=".form-control-lg example">
                            <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />


                            <label for="featured" class="form-label">Featured</label>
                            <div class="form-check w-100 mb-3">
                                <input class="form-check-input form-control-lg" type="checkbox" id="featured" name="featured"
                                       aria-label=".form-control-lg example" value="1" {{ old('featured') ? 'checked' : '' }}>
                            </div>
                            <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                            
<br/>
                        

                        <button class="btn btn-primary px-4">
                            Save
                            <i class="bx bx-right-arrow-alt ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
<script>
    function updateProgramOptions() {
        var partSelect = document.getElementById('part_id');
        var programSelect = document.getElementById('program_id');

        // Get the selected part's program ID and title
        var selectedOption = partSelect.options[partSelect.selectedIndex];
        var programId = selectedOption.getAttribute('data-program-id');
        var programTitle = selectedOption.getAttribute('data-program');

        // Clear existing options and set the selected program
        programSelect.innerHTML = '';

        // Add a default option
        var defaultOption = document.createElement('option');
        defaultOption.text = 'Select Program';
        defaultOption.disabled = true;
        defaultOption.selected = true;
        programSelect.appendChild(defaultOption);

        // Add the program options based on the selected part
        if (programId && programTitle) {
            var option = document.createElement('option');
            option.value = programId;
            option.text = programTitle; // Display program title as text
            programSelect.appendChild(option);
        }
    }
</script>
