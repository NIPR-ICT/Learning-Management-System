<div class="col-xl-3 col-lg-3 theiaStickySidebar">
    <div class="settings-widget dash-profile">
        <div class="settings-menu">
            <div class="profile-bg">
                <div class="profile-img">
                    <a href="student-profile.html"><img src="{{asset('assets/img/user/user16.jpg')}}" alt="Img"></a>
                </div>
            </div>
            <div class="profile-group">
                <div class="profile-name text-center">
                    <h4><a href="student-profile.html">{{auth()->user()->name}}</a></h4>
                    <p>Student</p>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-widget account-settings">
        <div class="settings-menu">
            <h3>Dashboard</h3>
            <ul>
                <li class="nav-item active">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="bx bxs-tachometer"></i>Dashboard
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('biodata.update') }}" class="nav-link">
                        <i class="bx bxs-user"></i>My Profile
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('student.all.program')}}" class="nav-link">
                        <i class="bx bxs-graduation"></i>Programmes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('viewBy.bought.programme')}}" class="nav-link">
                        <i class="bx bxs-graduation"></i>My Programme
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.course')}}" class="nav-link">
                        <i class="bx bxs-book"></i>Enrolled Course
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.wishlist')}}" class="nav-link">
                        <i class="bx bxs-heart"></i>Wishlist
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('student.review')}}" class="nav-link">
                        <i class="bx bxs-star"></i>Reviews
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="student-quiz.html" class="nav-link">
                        <i class="bx bxs-shapes"></i>My Quiz Attempts
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('user.payment.history')}}" class="nav-link">
                        <i class="bx bxs-cart"></i>Order History
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="student-qa.html" class="nav-link">
                        <i class="bx bxs-bookmark-alt"></i>Question & Answer
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('student.referral')}}" class="nav-link">
                        <i class="bx bxs-user-plus"></i>Referrals
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.message')}}" class="nav-link">
                        <i class="bx bxs-chat"></i>Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.support')}}" class="nav-link">
                        <i class="bx bxs-coupon"></i>Support Tickets
                    </a>
                </li>
            </ul>
            <h3>Account Settings</h3>
            <ul>
                <li class="nav-item">
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
