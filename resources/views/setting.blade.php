@extends('layouts.user')

@section('main')
<div class="title-group mb-3">
    <h1 class="h2 mb-0">Settings</h1>
</div>

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

<div class="row my-4">
    <div class="col-lg-7 col-12">
        <div class="custom-block bg-white">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">Password</button>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <h6 class="mb-4">User Profile</h6>

                    <form class="custom-form profile-form" action="{{Route('setting.user')}}" method="post" role="form">
                        @csrf
                        @method('put')
                        <input class="form-control" type="text" name="name" id="profile-name" value="{{auth()->user()->name}}">
                        @error('name')
                           <p class="text-danger"> {{$message}}</p>
                        @enderror

                        <input class="form-control" type="email" name="email" id="profile-email" value="{{auth()->user()->email}}">
                        @error('email')
                           <p class="text-danger"> {{$message}}</p>
                        @enderror
                        <div class="input-group mb-1">
                            <img src="images/profile/senior-man-white-sweater-eyeglasses.jpg" class="profile-image img-fluid" alt="">

                            <input type="file" class="form-control" id="inputGroupFile02">
                        </div>

                        <div class="d-flex">

                            <button type="submit" class="form-control ms-2">
                                Update
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                    <h6 class="mb-4">Password</h6>

                    <form class="custom-form password-form" action="{{Route('setting.pass')}}" method="post" role="form">
                        @csrf
                        @method('put')
                        <input type="password" name="current_password" id="password" class="form-control" placeholder="Current Password" required="">
                        @error('current_password')
                           <p class="text-danger"> {{$message}}</p>
                        @enderror

                        <input type="password" name="password" id="confirm_password" class="form-control" placeholder="New Password" required="">
                        @error('password')
                           <p class="text-danger"> {{$message}}</p>
                        @enderror

                        <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm Password" required="">

                        <div class="d-flex">

                            <button type="submit" class="form-control ms-2">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-5 col-12">
        <div class="custom-block custom-block-contact">
            <h6 class="mb-4">Need Help?</h6>

            <p>
                <strong>Call us:</strong>
                <a href="tel: 2348102317220" class="ms-2">
                    (234)
                    8102317220
                </a>
            </p>

            <a href="#" class="btn custom-btn custom-btn-bg-white mt-3">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection

