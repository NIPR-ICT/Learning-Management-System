<div id="sidebar" class="show hidden sm:block col-span-1 sm:col-span-1 md:col-span-2 lg:col-span-1 h-[80vh] bg-red-500 text-white rounded-lg">
    <!-- Add rounded-lg for border radius -->
    <div class="overflow-hidden shadow-sm h-full">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4 flex items-center justify-between">
                <span>Navigation</span>
            </h3>
            <ul class="space-y-2">
                <!-- Dropdown for Manage Programs -->
                <li class="relative">
                    <a href="#" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="true">
                        <i class="fas fa-book mr-2"></i>
                        Manage Programmes
                        <span class="ml-auto">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="absolute hidden bg-red-500 text-white shadow-lg rounded-lg mt-2 py-2 w-48 top-0 left-0 z-10 space-y-2">
                        <!-- Add rounded-lg for border radius -->
                        <li><a href="{{route('program.create')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Add Programme</a></li>
                        <li><a href="{{route('program.all')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Manage Programmes</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Enroll Students</a></li>
                    </ul>
                </li>

                <!-- Dropdown for Manage Programs Part -->
                <li class="relative">
                    <a href="#" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="true">
                        <i class="fas fa-users mr-2"></i>
                        Manage Programs Part
                        <span class="ml-auto">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="absolute hidden bg-red-500 text-white shadow-lg rounded-lg mt-2 py-2 w-48 top-0 left-0 z-10 space-y-2">
                        <!-- Add rounded-lg for border radius -->
                        <li><a href="{{route('part.form')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Add Part</a></li>
                        <li><a href="{{route('all.part')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Manage all Part</a></li>
                    </ul>
                </li>


                <li class="relative">
                    <a href="#" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="true">
                        <i class="fas fa-book mr-2"></i>
                        Manage Courses
                        <span class="ml-auto">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="absolute hidden bg-red-500 text-white shadow-lg rounded-lg mt-2 py-2 w-48 top-0 left-0 z-10 space-y-2">
                        <!-- Add rounded-lg for border radius -->
                        <li><a href="{{route('course.form')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Add Course</a></li>
                        <li><a href="{{route('all.courses')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Manage Courses</a></li>
                    </ul>
                </li>

                <li class="relative">
                    <a href="#" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="true">
                        <i class="fas fa-cubes mr-2"></i>
                        Manage Modules
                        <span class="ml-auto">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="absolute hidden bg-red-500 text-white shadow-lg rounded-lg mt-2 py-2 w-48 top-0 left-0 z-10 space-y-2">
                        <!-- Add rounded-lg for border radius -->
                        <li><a href="{{route('add.module')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Add Module</a></li>
                        <li><a href="{{route('all.modules')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Manage Module</a></li>
                    </ul>
                </li>


                <li class="relative">
                    <a href="#" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="true">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Manage Centres
                        <span class="ml-auto">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="absolute hidden bg-red-500 text-white shadow-lg rounded-lg mt-2 py-2 w-48 top-0 left-0 z-10 space-y-2">
                        <!-- Add rounded-lg for border radius -->
                        <li><a href="{{route('add.center')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Add Centre</a></li>
                        <li><a href="{{route('all.center')}}" class="block px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">Manage Centres</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('all.modules.lesson')}}" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">
                        <i class="fas fa-book mr-2"></i>
                        Add Lessons
                    </a>
                </li>
                <li>
                    <a href="{{route('all.materials')}}" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">
                        <i class="fas fa-book mr-2"></i>
                        All Materials
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">
                        <i class="fas fa-cog mr-2"></i>
                        View All Courses
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
