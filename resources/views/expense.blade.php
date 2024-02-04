@extends('layouts.user')

@section('main')
<div class="title-group mb-3">
    <h1 class="h2 mb-0">My Expenses</h1>
</div>

 {{-- <pre>
        <?php print_r($expenses) ?>
    </pre> --}}


<div class="row my-4">
    <div class="col-lg-12 col-12">
        <div class="custom-block bg-white">
            <h5 class="mb-4">Activities</h5>

            <div class="table-responsive">
                <table class="account-table table">
                    <thead>
                        <tr>
                            <th scope="col">Date/TIme</th>

                            <th scope="col">Category</th>

                            <th scope="col">Amount</th>

                            <th scope="col">Description</th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach (Auth::user()->expenses as $expense)

                        <tr>
                            <td scope="row">{{$expense['created_at']}}</td>

                            <td scope="row">{{$expense->category['cat']}}</td>


                            <td class="text-danger" scope="row">
                                <span class="me-1">-</span>
                                &#8358 {{$expense['amount']}}
                            </td>

                            <td scope="row">{{$expense['description']}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
