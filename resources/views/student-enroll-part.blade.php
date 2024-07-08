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
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar -->
                @include('includes.studentsidebar')

                <div class="col-span-1 sm:col-span-3 p-4 sm:p-6">
                    <div class="container mx-auto">
                        <!-- Note -->
                        <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                            <p>The list of parts for the program you are enrolled in.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($parts as $part)
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h2 class="text-xl font-bold mb-2">{{ $part->name }} of {{ $part->program->title }}</h2>
                                <div class="flex space-x-4 mb-4 text-xs">
                                    <p class="text-gray-600"><strong>Max Credit:</strong> {{ $part->max_credit }}</p>
                                    <p class="text-gray-600"><strong>Min Credit:</strong> {{ $part->min_credit }}</p>
                                    <p class="text-gray-600"><strong>Duration:</strong> {{ $part->program_duration }}</p>
                                </div>
                                <p class="text-sm text-gray-600 mb-4">
                                    @php
                                    $description = $part->description;
                                    $words = explode(' ', $description);
                                    $shortened = implode(' ', array_slice($words, 0, 10)); // Adjust the number of words shown
                                    if (count($words) > 10) {
                                        $shortened .= '...';
                                    }
                                    @endphp
                                    {{ $shortened }}
                                </p>
                                <form id="all-course-form-{{ $part->id }}" action="{{ route('list.courses') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="part_id" value="{{ $part->id }}">
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded inline-block">View Enroll Courses</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $parts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    @include('includes.script')
</x-app-layout>
