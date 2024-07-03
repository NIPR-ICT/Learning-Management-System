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
                            <form action="{{ route('material.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="lesson_name" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                                    <input type="text" id="lesson_name" name="lesson_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$lesson->title, old('title') }}" readonly>
                                    <input type="hidden" id="lesson_id" name="lesson_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$lesson->id}}">
                                    <x-input-error :messages="$errors->get('lesson_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="course_name" class="block text-sm font-medium text-gray-700">Course Name</label>
                                    <input type="text" id="course_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$lesson->course->title, old('title') }}" readonly>
                                    <input type="hidden" id="course_id" name="course_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$lesson->course_id}}">
                                    <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Material Type</label>
                                    <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('type') }}">
                                        <option disabled selected>Select Material Type</option>
                                        <option value="Document">Document</option>
                                            <option value="Video">Video</option>
                                            <option value="Audio">Audio</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                </div>


                                <div class="mb-4">
                                    <label for="file_path" class="block text-sm font-medium text-gray-700">Upload File</label>
                                    <input type="file" id="file_path" name="file_path" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <x-input-error :messages="$errors->get('file_path')" class="mt-2 text-sm text-red-600" />
                                </div>
                                
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Material Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('title') }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Material Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">{{ old('description') }}</textarea>
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
