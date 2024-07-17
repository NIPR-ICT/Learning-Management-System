<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend-assets/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-box"></i>
                </div>
                <div class="menu-title">Programme</div>
            </a>
            <ul>
                <li> <a href="{{route('program.all')}}"><i class='bx bx-radio-circle'></i>List Programme</a>
                </li>
                <li> <a href="{{route('program.create')}}"><i class='bx bx-radio-circle'></i>Create Programme</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-book"></i>
                </div>
                <div class="menu-title">Manage Part</div>
            </a>
            <ul>
                <li> <a href="{{ route('part.form') }}"><i class='bx bx-radio-circle'></i>Add Part</a>
                </li>
                <li> <a href="{{ route('all.part') }}"><i class='bx bx-radio-circle'></i>Manage all Part</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Courses</div>
            </a>
            <ul>
                <li> <a href="{{ route('course.form') }}"><i class='bx bx-radio-circle'></i>Add Course</a>
                </li>
                <li> <a href="{{ route('all.courses') }}"><i class='bx bx-radio-circle'></i>Manage Courses</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Modules</div>
            </a>
            <ul>
                <li> <a href="{{ route('add.module') }}"><i class='bx bx-radio-circle'></i>Add Module</a>
                </li>
                <li> <a href="{{ route('all.modules') }}"><i class='bx bx-radio-circle'></i>Manage Module</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Manage Centres</div>
            </a>
            <ul>
                <li> <a href="{{ route('add.center') }}"><i class='bx bx-radio-circle'></i>Add Centre</a>
                </li>
                <li> <a href="{{ route('all.center') }}"><i class='bx bx-radio-circle'></i>Manage Centres</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Coupons</div>
            </a>
            <ul>
                <li> <a href="{{ route('add.coupon') }}"><i class='bx bx-radio-circle'></i>Create Coupon</a>
                </li>
                <li> <a href="{{ route('all.coupons') }}"><i class='bx bx-radio-circle'></i>Manage Coupons</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="{{ route('all.modules.lesson') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Add Lessons</div>
            </a>
        </li>

        
        <li>
            <a href="{{ route('all.materials') }}">
                <div class="parent-icon"><i class="bx bx-book"></i></div>
                <div class="menu-title"> All Materials</div>
            </a>
        </li>

        <li>
            <a href="{{ route('all.payment.history') }}">
                <div class="parent-icon"><i class="bx bx-money"></i></div>
                <div class="menu-title">All Payment History</div>
            </a>
        </li>
 
    </ul>
    <!--end navigation-->
</div>
