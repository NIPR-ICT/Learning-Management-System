@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>

    <!-- Student Settings -->
    <div class="col-xl-9 col-lg-9">

        <div class="settings-widget card-details">
            <div class="settings-menu p-0">
                <div class="profile-heading">
                    <h3>Settings</h3>
                    <p>You have full control to manage your own account settings</p>
                </div>
                <div class="settings-page-head">
                    <ul class="settings-pg-links">
                        <li><a href="{{route('student.setting')}}"><i class="bx bx-edit"></i>Edit Profile</a></li>
                        <li><a href="{{route('student.change-password')}}" ><i class="bx bx-lock"></i>Change Password</a></li>
                        <li><a href="#" class="active"><i class="bx bx-user-circle"></i>Social Profiles</a></li>
                        <li><a href="{{route('student.notification')}}"><i class="bx bx-bell"></i>Notifications</a></li>
                     </ul>
                </div>
                <form action="student-social-profile.html">
                    <div class="checkout-form settings-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-block">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-block">
                                    <label class="form-label">Github</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-block">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-block">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-block">
                                    <label class="form-label">Linkedin</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Student Settings -->

        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->

