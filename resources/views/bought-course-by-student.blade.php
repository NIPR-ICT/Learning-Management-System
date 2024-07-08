<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Programs') }}
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

                <div class="col-span-1 sm:col-span-3">
                    <div class="container mx-auto">
                        <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                            <p>Below are the programs for which you have enrolled in courses:</p>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                            @foreach ($enrollments as $enrollment)
                            <div class="bg-white rounded-lg shadow-md mb-4">
                                <div class="p-4">
                                    <h2 class="text-lg font-semibold mb-2">Course: {{ $enrollment->course->title }}</h2>
                                    @foreach ($enrollment->course->modules as $module)
                                    <div class="mb-4">
                                        <div class="bg-gray-100 rounded-lg shadow-md p-4">
                                            <h3 class="text-md font-semibold mb-2">Module: {{ $module->title }}</h3>
                                            @foreach ($module->lessons as $lesson)
                                            <div class="mb-4">
                                                <h4 class="text-sm font-semibold mb-2">Lesson: {{ $lesson->title }}</h4>
                                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none" onclick="toggleLesson(this)">Open Lesson</button>
                                                <div class="lesson-content mt-2 hidden">
                                                    <div class="lesson-description mb-4">
                                                        <p>{!! $lesson->content !!}</p>
                                                    </div>
                                                    <div class="lesson-materials">
                                                        <h5 class="text-sm font-semibold mb-2">Materials:</h5>
                                                        <ul class="list-disc pl-5">
                                                            @foreach ($lesson->materials as $material)
                                                            <li class="lesson-material flex items-center mb-2">
                                                                @if ($material->file_path)
                                                                <a href="{{ route('materials.download', $material->id) }}" class="material-download inline-block bg-blue-500 hover:bg-blue-700 text-white font-light py-1 px-3 rounded-md text-sm mr-2">Download</a>
                                                                @endif
                                                                <span class="material-title">{{ $material->title }}</span>
                                                                [<span class="material-type text-gray-500">{{ $material->type }}</span>]
                                                            </li>
                                                            {{-- Display other material details as needed --}}
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $enrollments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    @include('includes.script')
    <script>
        function toggleLesson(button) {
            const lessonContent = button.nextElementSibling;
            const allLessonContents = document.querySelectorAll('.lesson-content');

            // Close all other lesson contents
            allLessonContents.forEach(content => {
                if (content !== lessonContent && !content.classList.contains('hidden')) {
                    content.classList.add('hidden');
                    const toggleButton = content.previousElementSibling.querySelector('button');
                    if (toggleButton) {
                        toggleButton.textContent = 'Open Lesson';
                    }
                }
            });

            // Toggle the clicked lesson content
            lessonContent.classList.toggle('hidden');
            button.textContent = lessonContent.classList.contains('hidden') ? 'Open Lesson' : 'Close Lesson';
        }
    </script>
</x-app-layout>
