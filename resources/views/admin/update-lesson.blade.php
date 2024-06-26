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
                            <form action="{{ route('lesson.update', ['id' => $lesson->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{$lesson->title}}">
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
                                    <input type="text" id="module_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $lesson->title }}" readonly>
                                    <input type="hidden" id="module_id" name="module_id" value="{{ $lesson->module_id }}">
                                    <x-input-error :messages="$errors->get('module_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="order" class="block text-sm font-medium text-gray-700">Lesson Order</label>
                                    <input type="number" id="order" name="order" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $lesson->order }}">
                                    <x-input-error :messages="$errors->get('order')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="content" class="block text-sm font-medium text-gray-700">Enter Lesson Content</label>
                                    <textarea id="content" name="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm sm:text-sm">{!! $lesson->content !!}</textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
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

    <!-- Include TinyMCE from CDN -->
    <script src="https://cdn.tiny.cloud/1/dci5szikf4daw17kiq5crzw8azz6oi0bzgb896fs3po9skmj/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>

    @include('includes.script')
</x-app-layout>
