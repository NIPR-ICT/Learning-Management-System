<div id="sidebar" class="show hidden sm:block col-span-1 sm:col-span-1 md:col-span-2 lg:col-span-1 h-[80vh] bg-red-500 text-white rounded-lg">
    <!-- Add rounded-lg for border radius -->
    <div class="overflow-hidden shadow-sm h-full">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4 flex items-center justify-between">
                <span>Navigation</span>
            </h3>
            <ul class="space-y-2">
                <!-- Dropdown for Courses -->
                <li class="relative">
                    <a href="#" class="flex items-center hover:underline" data-has-submenu="true">
                        Courses
                        <span class="ml-auto">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </a>
                    <ul class="absolute hidden bg-red-500 text-white shadow-lg rounded-lg mt-2 py-2 w-48 top-0 left-0 z-10">
                        <!-- Add rounded-lg for border radius -->
                        <li><a href="#" class="block px-4 py-2 hover:bg-red-700" data-has-submenu="false">All Courses</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-red-700" data-has-submenu="false">Add Course</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-red-700" data-has-submenu="false">Update Biodata</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="hover:underline" data-has-submenu="false">Take Single Course</a>
                </li>
            </ul>
        </div>
    </div>
</div>