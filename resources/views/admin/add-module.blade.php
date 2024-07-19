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
                            <form action="{{ route('module.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Module Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="old('title')">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_id" class="block text-sm font-medium text-gray-700">Select Course</label>
                                    <select id="course_id" name="course_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option disabled selected>Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"> {{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="order" class="block text-sm font-medium text-gray-700">Module Order</label>
                                    <input type="number" min="1" id="order" name="order" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="old('order')">
                                    <x-input-error :messages="$errors->get('order')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none">{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
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

    @include('includes.script')
</x-app-layout>
 --}}



@extends('admin.index')
  @section('slot')
  @include('components.sweetalert')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Course Module</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Course Module</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Course Module</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Create Course Module</h6>
        <hr/>
        <div class="card">
            <div class="card-body">

                    <h6 class="mb-0 text-uppercase">Course Module</h6>
                    <hr/>
                    <form action="{{ route('module.store') }}" method="POST">
                        @csrf
                        <label for="formFile" class="form-label"> Title </label>
                        <input   class="form-control w-100 form-control-lg mb-3"  name="title" type="text" placeholder="" aria-label=".form-control-lg example">

                        <label for="title" class="form-label"> Course</label>
                        <select class="form-select mb-3" name="course_id" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}"> {{ $course->title }}</option>
                            @endforeach
                        </select>

                            <label for="formFile" class="form-label">Module Order</label>
                            <input type="number" min="1" id="order" name="order" class="form-control  w-100 form-control-lg mb-3" name="description"  placeholder="" aria-label=".form-control-lg example">


                            <label for="description" class="block text-sm font-medium text-gray-700">Part Description</label>
                                    <textarea id="description" name="description" rows="4" class="form-control w-100 form-control-lg mb-3" style="resize: none" :value="__('Description')"></textarea>

                            <button class="btn btn-primary px-4" >
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
