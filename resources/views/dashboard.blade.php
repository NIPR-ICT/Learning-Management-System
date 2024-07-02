<x-app-layout>
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
</x-app-layout>
