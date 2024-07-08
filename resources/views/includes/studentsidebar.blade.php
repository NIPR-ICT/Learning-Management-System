<div id="sidebar" class="show hidden sm:block col-span-1 sm:col-span-1 md:col-span-2 lg:col-span-1 h-[80vh] bg-red-500 text-white rounded-lg">
    <!-- Add rounded-lg for border radius -->
    <div class="overflow-hidden shadow-sm h-full">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4 flex items-center justify-between">
                <span>Navigation</span>
            </h3>
            <ul class="space-y-2">
                <!-- Dropdown for Manage Programs -->
                

                <li>
                    <a href="{{route('student.all.program')}}" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">
                        <i class="fas fa-book mr-2"></i>
                        View All Programmes
                    </a>
                </li>

                <li>
                    <a href="{{route('user.payment.history')}}" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">
                        <i class="fas fa-money-check-alt mr-2"></i>
                        View Payment History
                    </a>
                </li>

                <li>
                    <a href="{{route('viewBy.bought.programme')}}" class="flex items-center px-4 py-2 hover:bg-red-700 rounded-lg" data-has-submenu="false">
                        <i class="fas fa-book mr-2"></i>
                        Enrolled Courses
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
