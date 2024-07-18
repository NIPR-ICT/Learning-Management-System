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
                            <form action="{{route('program.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="__('Title')">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none" :value="__('description')"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="short_code" class="block text-sm font-medium text-gray-700">Program Short Code</label>
                                    <input type="text" id="short_code" name="short_code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" :value="__('short_code')">
                                    <x-input-error :messages="$errors->get('short_code')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="cover_image" class="block text-sm font-medium text-gray-700">Upload programme Cover Image</label>
                                    <input type="file" id="cover_image" name="cover_image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <x-input-error :messages="$errors->get('cover_image')" class="mt-2 text-sm text-red-600" />
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

</x-app-layout> --}}


@extends('admin.index')
  @section('slot')
  @include('components.sweetalert')
  <div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Programme</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Programme</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Programme</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Create Programme</h6>
        <hr/>
        <div class="card">
            <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Programme</h6>
                    <hr/>
                    <form action="{{route('program.store')}}"  enctype="multipart/form-data" method="POST">
                        @csrf
                        @if (session('errors'))
                        <div class="mb-4 text-sm text-red-600">
                            {{ session('errors') }}
                        </div>
                        @endif
                            <label for="formFile" class="form-label">Title</label>
                            <input class="form-control w-75 form-control-lg mb-3"  name="title"  type="text" placeholder="" aria-label=".form-control-lg example">

                            <label for="formFile" class="form-label">Description</label>
                            <input class="form-control  w-75 form-control-lg mb-3" name="description" type="text" placeholder="" aria-label=".form-control-lg example">

                            <label for="formFile" class="form-label">Program Short Code</label>
                            <input class="form-control  w-75 form-control-lg mb-3" name="short_code" type="text" placeholder="" aria-label=".form-control-lg example">

                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control  w-75 form-control-lg mb-3" name="cover_image" type="file" placeholder="" aria-label=".form-control-lg example">
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
