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
                            <form action="{{route('lesson.update', $lesson->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('title', $lesson->title) }}" readonly>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
                                    <input type="text" id="course_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $lesson->course->title }}" readonly>
                                    <input type="hidden" id="course_id" name="course_id" value="{{ $lesson->course_id }}">
                                    <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="module_name" class="block text-sm font-medium text-gray-700">Module Name</label>
                                    <input type="text" id="module_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $lesson->module->title }}" readonly>
                                    <input type="hidden" id="module_id" name="module_id" value="{{ $lesson->module_id }}">
                                    <x-input-error :messages="$errors->get('module_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="order" class="block text-sm font-medium text-gray-700">Lesson Order</label>
                                    <input type="number" id="order" name="order" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('order', $lesson->order) }}">
                                    <x-input-error :messages="$errors->get('order')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="content" class="block text-sm font-medium text-gray-700">Enter Lesson Content</label>
                                    <textarea id="content" name="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">{{ old('content', $lesson->content) }}</textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>

                                <div>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Include TinyMCE from CDN -->
    <script src="https://cdn.tiny.cloud/1/dci5szikf4daw17kiq5crzw8azz6oi0bzgb896fs3po9skmj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
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
            <div class="breadcrumb-title pe-3">Lessons</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page">Lesson</li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">List of Lessons</button>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Update Lesson</h6>
        <hr/>
        <div class="card">
            <div class="card-body">



                    <h6 class="mb-0 text-uppercase">Lesson</h6>
                    <hr/>
                    <form action="{{route('lesson.update', $lesson->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                            <label for="title" class="form-label">Lesson Title</label>
                            <input class="form-control w-100 form-control-lg mb-3"  name="title"  type="text" placeholder="" value="{{ old('title', $lesson->title) }}" readonly aria-label=".form-control-lg example">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                
                                <label for="course_name" class="form-label">Course Name</label>
                                <input class="form-control w-100 form-control-lg mb-3"  name="course_name"  type="text" placeholder="" value="{{ $lesson->course->title }}" readonly aria-label=".form-control-lg example">
                                <input type="hidden" id="course_id" name="course_id" value="{{ $lesson->course_id }}">
                                <x-input-error :messages="$errors->get('course_id')" class="mt-2" />

                            <label for="module_name" class="form-label">Module Name</label>
                            <input class="form-control  w-100 form-control-lg mb-3" name="module_name" type="text" placeholder="" aria-label=".form-control-lg example" value="{{ $lesson->module->title }}" readonly>
                            <input type="hidden" id="module_id" name="module_id" value="{{ $lesson->module_id }}">
                            <x-input-error :messages="$errors->get('module_id')" class="mt-2" />

                            <label for="order" class="form-label">Lesson Order</label>
                            <input class="form-control  w-100 form-control-lg mb-3" name="order" type="number" placeholder="" aria-label=".form-control-lg example" value="{{ old('order', $lesson->order) }}">
                            <x-input-error :messages="$errors->get('order')" class="mt-2" />


                                <label for="content" class="form-label">Enter Lesson Content</label>
                                <textarea class="form-control w-100 form-control-lg mb-3" id="content" name="content" rows="4"  style="resize: none" aria-label=".form-control-lg example">{{ old('content', $lesson->content) }}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />

                        <button class="btn btn-primary px-4" >
                            Update
                            <i class="bx bx-right-arrow-alt ms-2"></i>
                        </button>
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>
  @endsection
  <script src="https://cdn.tiny.cloud/1/dci5szikf4daw17kiq5crzw8azz6oi0bzgb896fs3po9skmj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>


