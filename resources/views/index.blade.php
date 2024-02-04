@extends('layouts.user')

@section('main')
<div class="title-group mb-3">
    <h1 class="h2 mb-0">Overview</h1>
    {{-- <pre>
        <?php print_r($expense) ?>
    </pre> --}}

    <small class="text-muted">Hello {{auth()->user()->name}}, welcome back!</small>
</div>

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

<div class="row my-4">
    <div class="col-lg-7 col-12">
        <div class="custom-block custom-block-balance">
            <small>Your Last spending</small>

            @isset($expense[0]['amount'])
                <h2 class="mt-2 mb-3">&#8358 {{$expense[0]['amount']}}</h2>
            @endisset



        </div>


        <div class="custom-block custom-block-exchange">
            <h5 class="mb-4">Exchange Rate</h5>

            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center">
                    <img src="images/flag/united-states.png" class="exchange-image img-fluid" alt="">

                    <div>
                        <p>USD</p>
                        <h6>1 US Dollar</h6>
                    </div>
                </div>

                <div class="ms-auto me-4">
                    <small>Sell</small>
                    <h6>1.0931</h6>
                </div>

                <div>
                    <small>Buy</small>
                    <h6>1.0821</h6>
                </div>
            </div>

            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center">
                    <img src="images/flag/singapore.png" class="exchange-image img-fluid" alt="">

                    <div>
                        <p>SGD</p>
                        <h6>1 Singapore Dollar</h6>
                    </div>
                </div>

                <div class="ms-auto me-4">
                    <small>Sell</small>
                    <h6>0.6901</h6>
                </div>

                <div>
                    <small>Buy</small>
                    <h6>0.6201</h6>
                </div>
            </div>

            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center">
                    <img src="images/flag/united-kingdom.png" class="exchange-image img-fluid" alt="">

                    <div>
                        <p>GPD</p>
                        <h6>1 British Pound</h6>
                    </div>
                </div>

                <div class="ms-auto me-4">
                    <small>Sell</small>
                    <h6>1.1520</h6>
                </div>

                <div>
                    <small>Buy</small>
                    <h6>1.1412</h6>
                </div>
            </div>

            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center">
                    <img src="images/flag/australia.png" class="exchange-image img-fluid" alt="">

                    <div>
                        <p>AUD</p>
                        <h6>1 Australian Dollar</h6>
                    </div>
                </div>

                <div class="ms-auto me-4">
                    <small>Sell</small>
                    <h6>0.6110</h6>
                </div>

                <div>
                    <small>Buy</small>
                    <h6>0.5110</h6>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <img src="images/flag/european-union.png" class="exchange-image img-fluid" alt="">

                    <div>
                        <p>EUR</p>
                        <h6>1 Euro</h6>
                    </div>
                </div>

                <div class="ms-auto me-4">
                    <small>Sell</small>
                    <h6>1.1020</h6>
                </div>

                <div>
                    <small>Buy</small>
                    <h6>1.1010</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 col-12">
        <div class="custom-block custom-block-profile-front custom-block-profile text-center bg-white">
            <div class="custom-block-profile-image-wrap mb-4">
                <img src="images/medium-shot-happy-man-smiling.jpg" class="custom-block-profile-image img-fluid" alt="">

                <a href="setting.html" class="bi-pencil-square custom-block-edit-icon"></a>
            </div>

            <p class="d-flex flex-wrap mb-2">
                <strong>Name:</strong>

                <span>{{auth()->user()->name}}</span>
            </p>

            <p class="d-flex flex-wrap mb-2">
                <strong>Email:</strong>

                <a href="#">
                    {{auth()->user()->email}}
                </a>
            </p>
        </div>

        <div class="custom-block custom-block-bottom d-flex flex-wrap">
            <div class="custom-block-bottom-item">
                <h3>Add Expense</h3>
                <form action="{{Route('expense.update')}}" method="post">
                    @csrf
                    <div>
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="&#8358" value="{{old('amount')}}">
                        @error('amount')
                           <p class="text-danger"> {{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Please select</option>
                            @foreach ($cat as $c)
                                <option value="{{$c['id']}}">{{$c['cat']}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-danger"> {{$message}}</p>
                     @enderror
                    </div>
                    <div>
                        <label for="desc">Description</label>
                        <textarea name="description" id="description" cols="30" rows="8" class="form-control" placeholder="A brief description here">{{old('description')}}</textarea>
                        @error('description')
                        <p class="text-danger"> {{$message}}</p>
                     @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 col-6">Add Expense</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
