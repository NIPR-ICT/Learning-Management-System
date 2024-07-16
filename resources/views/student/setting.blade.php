@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

            <!-- sidebar -->
            @include('includes.layout-frontend.side-bar')
            <!-- /Sidebar -->
            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">

                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>Settings</h3>
                            <p>You have full control to manage your own account settings</p>
                        </div>
                        <div class="settings-page-head">
                            <ul class="settings-pg-links">
                                <li><a href="#" class="active"><i class="bx bx-edit"></i>Edit Profile</a></li>
                                <li><a href="{{route('student.change-password')}}" ><i class="bx bx-lock"></i>Change Password</a></li>
                                <li><a href="{{route('student.social-profile')}}"><i class="bx bx-user-circle"></i>Social Profiles</a></li>
                                <li><a href="{{route('student.notification')}}"><i class="bx bx-bell"></i>Notifications</a></li>
                            </ul>
                        </div>
                        <form action="student-settings.html">
                            <div class="course-group profile-upload-group mb-0 d-flex">
                                <div class="course-group-img profile-edit-field d-flex align-items-center">
                                    <a href="student-profile.html" class="profile-pic"><img src="{{asset('assets/img/user/user16.jpg')}}" alt="Img" class="img-fluid"></a>
                                    <div class="profile-upload-head">
                                        <h4><a href="student-profile.html">Your avatar</a></h4>
                                        <p>PNG or JPG no bigger than 800px width and height</p>
                                        <div class="new-employee-field">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="image-upload mb-0">
                                                    <input type="file">
                                                    <div class="image-uploads">
                                                        <i class="bx bx-cloud-upload"></i>
                                                    </div>
                                                </div>
                                                <div class="img-delete">
                                                    <a href="#" class="delete-icon"><i class="bx bx-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-form settings-wrap">
                                <div class="edit-profile-info">
                                    <h5>Personal Details</h5>
                                    <p>Edit your personal information</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="Ronald">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" value="Richard">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">User Name</label>
                                            <input type="text" class="form-control" value="studentdemo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" value="90154-91036">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" value="User Interface Design">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Bio</label>
                                            <textarea rows="4" class="form-control">Hello! I'm Ronald Richard. I'm passionate about developing innovative software solutions, analyzing classic literature. I aspire to become a software developer, work as an editor. In my free time, I enjoy coding, reading, hiking etc.</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Student Dashboard -->
        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->
