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
                            <form action="{{ route('course.update', $course->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('title', $course->title) }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="part_id" class="block text-sm font-medium text-gray-700">Part Name with Program</label>
                                    <select id="part_id" name="part_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" onchange="updateProgramOptions()">
                                        <option disabled>Select Program with Part</option>
                                        @foreach ($parts as $part)
                                            <option value="{{ $part->id }}" data-program="{{ $part->program->title }}" data-program-id="{{ $part->program->id }}" {{ $course->part_id == $part->id ? 'selected' : '' }}>
                                                {{ $part->name }} of {{ $part->program->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('part_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="program_id" class="block text-sm font-medium text-gray-700">Confirm Program</label>
                                    <select id="program_id" name="program_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option disabled>Select Program</option>
                                        @if($course->part)
                                            <option value="{{ $course->part->program->id }}" selected>{{ $course->part->program->title }}</option>
                                        @endif
                                    </select>
                                    <x-input-error :messages="$errors->get('program_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="course_category" class="block text-sm font-medium text-gray-700">Course Category</label>
                                    <select id="course_category" name="course_category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                        <option disabled>Select Course Category</option>
                                        <option value="Core" {{ $course->course_category == 'Core' ? 'selected' : '' }}>Core Course</option>
                                        <option value="Elective" {{ $course->course_category == 'Elective' ? 'selected' : '' }}>Elective Course</option>
                                        <option value="General" {{ $course->course_category == 'General' ? 'selected' : '' }}>General Course</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('course_category')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="course_amount" class="block text-sm font-medium text-gray-700">Course Amount</label>
                                    <input type="number" id="course_amount" name="course_amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('course_amount', $course->course_amount) }}">
                                    <x-input-error :messages="$errors->get('course_amount')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_code" class="block text-sm font-medium text-gray-700">Enter Course Code</label>
                                    <input type="text" id="course_code" name="course_code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('course_code', $course->course_code) }}">
                                    <x-input-error :messages="$errors->get('course_code')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" style="resize: none">{{ old('description', $course->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                
                                <div class="mb-4">
                                    <label for="credit_unit" class="block text-sm font-medium text-gray-700">Course Credit Unit</label>
                                    <input type="number" min="0" id="credit_unit" name="credit_unit" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ old('credit_unit', $course->credit_unit) }}">
                                    <x-input-error :messages="$errors->get('credit_unit')" class="mt-2" />
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
            defaultOption.text = 'Choose Program';
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
</x-app-layout>
