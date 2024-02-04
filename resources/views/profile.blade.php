@extends('layouts.user')

@section('main')
<div class="title-group mb-3">
    <h1 class="h2 mb-0">Profile</h1>
</div>

<div class="row my-4">
    <div class="col-lg-7 col-12">
        <div class="custom-block custom-block-profile">
            <div class="row">
                <div class="col-lg-12 col-12 mb-3">
                    <h6>General</h6>
                </div>

                <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-profile-image-wrap">
                        <img src="images/medium-shot-happy-man-smiling.jpg" class="custom-block-profile-image img-fluid" alt="">

                        <a href="setting.html" class="bi-pencil-square custom-block-edit-icon"></a>
                    </div>
                </div>

                <div class="col-lg-9 col-12">
                    <p class="d-flex flex-wrap mb-2">
                        <strong>Name:</strong>

                        <span>{{auth()->user()->name}}</span>
                    </p>

                    <p class="d-flex flex-wrap mb-2">
                        <strong>Email:</strong>

                        <span>
                            {{auth()->user()->email}}
                        </span>
                    </p>
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

