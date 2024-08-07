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
                        {{-- <form action="student-settings.html"> --}}
                            <div class="course-group profile-upload-group mb-0 d-flex">
                                <div class="course-group-img profile-edit-field d-flex align-items-center">
                                    <a href="#" class="profile-pic"><img src="@if(empty(auth()->user()->image))
                                    {{asset('assets/img/user/user16.jpg')}}
                                    @else
                                    {{ url('storage/'.auth()->user()->image) }}
                                    @endif" alt="Img" class="img-fluid"></a>
                                    <div class="profile-upload-head">
                                        <h4><a href="#">Your avatar</a></h4>
                                        <p>PNG or JPG no bigger than 800px width and height</p>
                                        <div class="new-employee-field">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class=" mb-0">
                                                    <form method="POST" action="{{ route('student.profile.picture') }}" enctype="multipart/form-data">
                                                        @csrf
                                                    <input class="form-control" type="file" id="file" name="picture" required
                                                    {{-- onchange="uploadProfilePicture(this.value)" --}}
                                                    >
                                                    {{-- <div class="image-uploads">
                                                        <i class="bx bx-cloud-upload"></i>
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="img-delete"> --}}
                                                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Submit</button>
                                                {{-- </div> --}}
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form
                                action="{{ route('store.biodata') }}"

                            method="POST">
                                @csrf
                                @if (session('errors'))
                                <div class="mb-4 text-sm text-red-600">
                                    {{ session('errors') }}
                                </div>
                                @endif
                            <div class="checkout-form settings-wrap">
                                <div class="edit-profile-info">
                                    <h5>Personal Details</h5>
                                    <p>Edit your personal information</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Practice ID</label>
                                            <input type="text" name="practice_no" class="form-control" value="{{( $setting && $setting->practice_no)? $setting->practice_no : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control" value="{{( $setting && $setting->date_of_birth)? $setting->date_of_birth : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Gender</label>
                                            <select name="gender"class="form-control" id="">
                                                <option value="" disabled>Select One</option>
                                                <option value="male" {{( $setting && $setting->gender)? 'selected' : '' }} >Male</option>
                                                <option value="female" {{( $setting  && $setting->gender)? 'selected' : '' }} >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Marital Status</label>
                                            <select name="marital_status"class="form-control" id="">
                                                <option value="" disabled>Select One</option>
                                                <option value="single"  {{( $setting  && $setting->marital_status)? 'selected' : '' }}  >Single</option>
                                                <option value="married"   {{( $setting  && $setting->marital_status)? 'selected' : '' }} >Married</option>
                                                <option value="widowed"  {{( $setting  && $setting->marital_status)? 'selected' : '' }} >Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" value="{{( $setting && $setting->phone_number)? $setting->phone_number : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Nationality</label>
                                            <input type="text" class="form-control" name="nationality" value="{{( $setting && $setting->nationality)? $setting->nationality : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" class="form-control"  value="{{( $setting && $setting->state)? $setting->state : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Highest Qualification</label>
                                            <input type="text" name="highest_qualification" class="form-control"   value="{{( $setting && $setting->highest_qualification)? $setting->highest_qualification : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <label class="form-label">Designation</label>
                                            <input type="text" name="major_field_of_study" class="form-control" value="{{( $setting && $setting->major_field_of_study)? $setting->major_field_of_study : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{( $setting && $setting->address)? $setting->address : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block">
                                            <label class="form-label">Bio</label>
                                            <textarea rows="4" name="bio" class="form-control">{{( $setting && $setting->bio)? $setting->bio : '' }}</textarea>
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
