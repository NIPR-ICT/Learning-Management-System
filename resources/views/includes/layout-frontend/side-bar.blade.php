<div class="col-xl-12 col-lg-12 theiaStickySidebar">
    <div class="settings-widget dash-profile">
        <div class="settings-menu">
            <div class="profile-bg">
                <div class="profile-img">
                    <a href="student-profile.html"><img src="@if(empty(auth()->user()->image))
                                    {{asset('assets/img/user/user16.jpg')}}
                                    @else
                                    {{ url('storage/'.auth()->user()->image) }}
                                    @endif" alt="Img"></a>
                </div>
            </div>
            <div class="profile-group">
                <div class="profile-name text-center">
                    <h4><a href="#">{{auth()->user()->name}}</a></h4>
                    <p>Student</p>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-widget account-settings">
        <div class="settings-menu">
            <h3>Dashboard</h3>
            <ul>
                <li class="nav-item {{ (Route::is('dashboard'))? 'active':'' }}">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="bx bxs-tachometer"></i>Dashboard
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('biodata.update') }}" class="nav-link">
                        <i class="bx bxs-user"></i>My Profile
                    </a>
                </li> --}}
                <li class="nav-item {{ (Route::is('student.all.program'))? 'active':'' }}">
                    <a href="{{route('student.all.program')}}" class="nav-link">
                        <i class="bx bxs-graduation"></i>Programmes
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('viewBy.bought.programme'))? 'active':'' }}">
                    <a href="{{route('viewBy.bought.programme')}}" class="nav-link">
                        <i class="bx bxs-graduation"></i>Enrolled Programme
                    </a>
                </li>

                <li class="nav-item {{ (Route::is('user.payment.history'))? 'active':'' }}">
                    <a href="{{route('user.payment.history')}}" class="nav-link">
                        <i class="bx bxs-graduation"></i>View Payment History
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('wishlist')}}" class="nav-link">
                        <i class="bx bxs-heart"></i>Wishlist
                    </a>
                </li>

                <li class="nav-item {{ (Route::is('student.review'))? 'active':'' }}">
                    <a href="{{route('student.review')}}" class="nav-link">
                        <i class="bx bxs-star"></i>Reviews
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="student-quiz.html" class="nav-link">
                        <i class="bx bxs-shapes"></i>My Quiz Attempts
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="student-qa.html" class="nav-link">
                        <i class="bx bxs-bookmark-alt"></i>Question & Answer
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{route('student.referral')}}" class="nav-link">
                        <i class="bx bxs-user-plus"></i>Referrals
                    </a>
                </li> --}}
                <li class="nav-item 
                {{-- {{ (Route::is('student.review'))? 'active':'' }} --}}
                ">
                    <a href="{{route('student.message')}}" class="nav-link">
                        <i class="bx bxs-chat"></i>Messages
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('student.support'))? 'active':'' }}">
                    <a href="{{route('student.support')}}" class="nav-link">
                        <i class="bx bxs-coupon"></i>Support Tickets
                    </a>
                </li>
            </ul>
            <h3>Account Settings</h3>
            <ul> 
                <li class="nav-item {{ (Route::is('student.setting','student.change-password','student.social-profile','student.notification'))? 'active':'' }} ">
                    <a href="{{route('student.setting')}}" class="nav-link ">
                        <i class="bx bxs-cog"></i>Settings
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="route('logout')"
                        onclick="event.preventDefault();
                            this.closest('form').submit();"><i class="bx bxs-log-out"></i>Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
