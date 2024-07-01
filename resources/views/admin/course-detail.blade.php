<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Detail Page') }}
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
                            <form action="{{ route('course.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$course->title}}" readonly >
                                </div>
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Program</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$course->program->title}}" readonly >
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Part</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$course->part->name}}" readonly >
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Category</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$course->course_category}}" readonly >
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Amount</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$course->course_amount}}" readonly >
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$course->course_code}}" readonly >
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Created By</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ optional($course->creator)->name }}" readonly >
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none" readonly>{{ $course->description }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                

                                <div>
                                    <button type="button" onclick="window.history.back()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Go Back
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