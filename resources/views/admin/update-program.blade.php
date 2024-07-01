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
                            <form action="{{route('program.update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$program->id}}">

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('title', $program->title) }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none">{{ old('description', $program->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                
                                <div class="mb-4">
                                    <label for="max_credit" class="block text-sm font-medium text-gray-700">Max Credit</label>
                                    <input type="number" id="max_credit" name="max_credit" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('max_credit', $program->max_credit) }}">
                                    <x-input-error :messages="$errors->get('max_credit')" class="mt-2" />
                                </div>
                                
                                <div class="mb-4">
                                    <label for="min_credit" class="block text-sm font-medium text-gray-700">Min Credit</label>
                                    <input type="number" id="min_credit" name="min_credit" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('min_credit', $program->min_credit) }}">
                                    <x-input-error :messages="$errors->get('min_credit')" class="mt-2" />
                                </div>
                                
                                <div class="mb-4">
                                    <label for="program_duration" class="block text-sm font-medium text-gray-700">Program Duration</label>
                                    <input type="text" id="program_duration" name="program_duration" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('program_duration', $program->program_duration) }}">
                                    <x-input-error :messages="$errors->get('program_duration')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="short_code" class="block text-sm font-medium text-gray-700">Program Short Code</label>
                                    <input type="text" id="short_code" name="short_code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('short_code', $program->short_code) }}">
                                    <x-input-error :messages="$errors->get('short_code')" class="mt-2" />
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

    @include('includes.script')
    
</x-app-layout>