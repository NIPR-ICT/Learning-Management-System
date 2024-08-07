<header class="header">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
            <div class="container">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="/" class="navbar-brand logo">
                        <img src="{{asset('assets/img/logo.png')}}" style="width: 78px" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index.html" class="menu-logo">
                            <img src="{{asset('assets/img/logo.png')}}" class="img-fluid mb-2" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li class=" has-submenu
                        {{(Route::is('home'))?" active":''}}
                        " >
                            <a class="" href="\">Home  </a>
                        </li>
                        <li class=" has-submenu
                        {{(Route::is('about.view'))?" active":''}}
                        " >
                            <a class="" href="{{route('about.view')}}">About </a>
                        </li>

                        <li class=" has-submenu
                        {{(Route::is('course.view','course.details.view'))?" active":''}}
                        " >
                            <a href="{{route('course.view')}}">Course </a>
                        </li>

                        <li class=" has-submenu
                        {{(Route::is('blog.view','blog-detail.view'))?" active":''}}
                        " >
                            <a href="{{route('blog.view')}}">Blog</a>
                        </li>

                        <li class=" has-submenu
                        {{(Route::is('contact.view'))?" active":''}}
                        " >
                            <a href="{{route('contact.view')}}">Contact </i></a>
                        </li>

                    </ul>
                </div>

                <ul class="nav header-navbar-rht">

                    <li class="nav-item cart-nav" >
                        <a href="#" class="dropdown-toggle" title="Cart" data-bs-toggle="dropdown">
                            {{-- <img src="{{asset('assets/img/icon/cart.svg')}}" alt="img"> --}}
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <div class="wishes-list dropdown-menu dropdown-menu-right">
                            <div class="wish-header">
                                <a href="{{ route('mycart') }}">View Cart  <strong class="pl-3" id="cartQty"></strong>  </a>
                                <a href="javascript:void(0)" class="float-end">Checkout</a>
                            </div>
                            <div class="wish-content">
                                <ul id="miniCart">

                                </ul>
                                <div class="total-item">
                                    <h6>&#8358;  </h6>
                                    <h5>Total : &#8358; <span  id="cartSubTotal"></span></h5>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item wish-nav">
                        <a href="#" title="Wishlist" class="dropdown-toggle" data-bs-toggle="dropdown">
                            {{-- <img src="{{asset('assets/img/icon/wish.svg')}}" alt="img"> --}}
                            <i class="fa fa-heart"></i>
                        </a>
                        <div class="wishes-list dropdown-menu dropdown-menu-right">
                            <div class="wish-header">
                                <a class=" my-4"  href=" {{ route('wishlist') }}">View All</a>
                                <a class=" my-4" id="wishQty"  href="#"></a>

                            </div>
                            <div class="wish-content">
                                <ul id="wishlist">


                                </ul>
                            </div>
                        </div>
                    </li>

                    @if (Route::has('login'))
                    @auth
                    {{-- message --}}
                    <li class="nav-item">
                        <a href="{{route('student.message')}}"  title="Message">
                            <i class="fa fa-comments"></i>
                            {{-- <img src="{{asset('assets/img/icon/messages.svg')}}" alt="img"> --}}
                        </a>

                    </li>
                    {{-- notification --}}
                    <li class="nav-item noti-nav">
                        <a href="#" title="Notification" class="dropdown-toggle" data-bs-toggle="dropdown">
                            {{-- <img src="{{asset('assets/img/icon/notification.svg')}}" alt="img"> --}}
                            <i class="fa fa-bell"></i>
                        </a>
                        <div class="notifications dropdown-menu dropdown-menu-right">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications
                                <select>
                                    <option>All</option>
                                    <option>Unread</option>
                                </select>
                                </span>
                                <a href="javascript:void(0)" class="clear-noti">Mark all as read <i class="fa-solid fa-circle-check"></i></a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <div class="media d-flex">
                                            <div>
                                                <a href="{{route('student.setting')}}" class="avatar">
                                                    <img class="avatar-img" alt="Img" src="{{asset('assets/img/user/user1.jpg')}}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6><a href="notifications.html">Lex Murphy requested <span>access to</span> UNIX directory tree hierarchy </a></h6>
                                                <button class="btn btn-accept">Accept</button>
                                                <button class="btn btn-reject">Reject</button>
                                                <p>Today at 9:42 AM</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification-message">
                                        <div class="media d-flex">
                                            <div>
                                                <a href="notifications.html" class="avatar">
                                                    <img class="avatar-img" alt="Img" src="{{asset('assets/img/user/user2.jpg')}}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6><a href="notifications.html">Ray Arnold left 6 <span>comments on</span> Isla Nublar SOC2 compliance report</a></h6>
                                                <p>Yesterday at 11:42 PM</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification-message">
                                        <div class="media d-flex">
                                            <div>
                                                <a href="notifications.html" class="avatar">
                                                    <img class="avatar-img" alt="Img" src="{{asset('assets/img/user/user3.jpg')}}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6><a href="notifications.html">Dennis Nedry <span>commented on</span> Isla Nublar SOC2 compliance report</a></h6>
                                                <p class="noti-details">“Oh, I finished de-bugging the phones, but the system's compiling for eighteen minutes, or twenty.  So, some minor systems may go on and off for a while.”</p>
                                                <p>Yesterday at 5:42 PM</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification-message">
                                        <div class="media d-flex">
                                            <div>
                                                <a href="notifications.html" class="avatar">
                                                    <img class="avatar-img" alt="Img" src="{{asset('assets/img/user/user1.jpg')}}">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6><a href="notifications.html">John Hammond <span>created</span> Isla Nublar SOC2 compliance report </a></h6>
                                                <p>Last Wednesday at 11:15 AM</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    </li>
                    {{-- user --}}
                    <li class="nav-item user-nav">
                        <a href="{{ url('/dashboard') }}" title="Profile" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img src="@if(empty(auth()->user()->image))
                                    {{asset('assets/img/user/user11.jpg')}}
                                    @else
                                    {{ url('storage/'.auth()->user()->image) }}
                                    @endif" alt="Img">
                                <span class="status online"></span>
                            </span>
                        </a>
                        <div class="users dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end" >
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="
                                    @if(empty(auth()->user()->image))
                                    {{asset('assets/img/user/user11.jpg')}}
                                    @else
                                    {{ url('storage/'.auth()->user()->image) }}
                                    @endif"
                                    alt="User Image" class="avatar-img rounded-circle">

                                </div>
                                <div class="user-text">
                                    <h6>{{auth()->user()->name}}</h6>
                                    <p class="text-muted mb-0">{{ auth()->user()->role }}</p>
                                </div>
                            </div>

                            <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="feather-user me-1"></i> Profile</a>
                            {{-- <a class="dropdown-item" href="{{ route('biodata.update') }}"><i class="feather-user me-1"></i> Profile</a> --}}
                            {{-- <a class="dropdown-item" href="setting-student-subscription.html"><i class="feather-star me-1"></i> Subscription</a> --}}
                            <a class="dropdown-item" href="{{ route('student.setting') }}"><i class="feather-settings me-1"></i> Settings</a>
                            {{-- <div class="dropdown-item night-mode">
                                <span><i class="feather-moon me-1"></i> Night Mode </span>
                                <div class="form-check form-switch check-on m-0">
                                    <input class="form-check-input" type="checkbox" id="night-mode">
                                </div>
                            </div> --}}

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item " href="route('logout')"
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();"><i class="feather-log-out me-1"></i>Logout</a>
                                                    </form>

                        </div>
                    </li>
                    @else
                    {{-- if not Authenticated --}}

                        <li class="nav-item">
                        <a class="nav-link header-sign" href="{{ route('login') }}">Signin</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{ route('register') }}">Signup</a>
                    </li>
                    @endif
                    @endauth
                 @endif
                </ul>

            </div>
        </nav>
    </div>
</header>
