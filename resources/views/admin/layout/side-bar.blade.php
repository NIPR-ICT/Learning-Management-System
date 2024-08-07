<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        @if(Auth::user()->role === 'user')
        <div>
            <a href="{{ route('dashboard') }}">
                <img src="{{asset('backend-assets/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
            </a>
        </div>
    @elseif(Auth::user()->role === 'admin')
    <div>
        <a href="{{ route('admin.dashboard') }}">
            
            <img src="{{asset('backend-assets/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </a>
    </div>
    @elseif(Auth::user()->role === 'instructor')
    <div>
        <a href="{{ route('instructor.dashboard') }}">
            
            <img src="{{asset('backend-assets/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </a>
    </div>
    @endif
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
                <div class="parent-icon"><i class="bx bx-box"></i>
                </div>
                <div class="menu-title">Programme</div>
            </a>
            <ul>
                <li> <a href="{{route('program.all')}}"><i class='bx bx-plus'></i>List Programme</a>
                </li>
                <li> <a href="{{route('program.create')}}"><i class='bx bx-radio-circle'></i>Create Programme</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-book"></i>
                </div>
                <div class="menu-title">Manage Level</div>
            </a>
            <ul>
                <li> <a href="{{ route('part.form') }}"><i class='bx bx-plus'></i>Add Level</a>
                </li>
                <li> <a href="{{ route('all.part') }}"><i class='bx bx-radio-circle'></i>Manage all Level</a>
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
                <li> <a href="{{ route('course.form') }}"><i class='bx bx-plus'></i>Add Course</a>
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
                <li> <a href="{{ route('add.module') }}"><i class='bx bx-plus'></i>Add Module</a>
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
                <li> <a href="{{ route('add.center') }}"><i class='bx bx-plus'></i>Add Centre</a>
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
                <li> <a href="{{ route('add.coupon') }}"><i class='bx bx-plus'></i>Create Coupon</a>
                </li>
                <li> <a href="{{ route('all.coupons') }}"><i class='bx bx-radio-circle'></i>Manage Coupons</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-money"></i>
                </div>
                <div class="menu-title">Extra Charges</div>
            </a>
            <ul>
                <li> <a href="{{ route('charge.form') }}"><i class='bx bx-plus'></i>Add Charge</a>
                </li>
                <li> <a href="{{ route('all.charges') }}"><i class='bx bx-radio-circle'></i>Manage all Charges</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="{{ route('all.modules.lesson') }}">
                <div class="parent-icon"><i class="bx bx-plus"></i></div>
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

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-news"></i>
                </div>
                <div class="menu-title">Blog</div>
            </a>
            <ul>
                <li> <a href="{{ route('category.form') }}"><i class='bx bx-plus'></i>Add Category</a>
                </li>
                <li> <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>Manage Category</a>
                </li>

                <li> <a href="{{ route('post.form') }}"><i class='bx bx-plus'></i>Add Post</a>
                </li>
                <li> <a href="{{ route('all.post') }}"><i class='bx bx-radio-circle'></i>Manage Posts</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-news"></i>
                </div>
                <div class="menu-title">Assessment</div>
            </a>
            <ul>
                </li>
                <li> <a href="{{ route('all.assessement') }}"><i class='bx bx-radio-circle'></i>Manage Assessment</a>
                </li>

            </ul>
        </li>
 
    </ul>
    <!--end navigation-->
</div>
