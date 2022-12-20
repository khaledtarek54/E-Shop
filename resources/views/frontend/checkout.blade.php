@extends('layouts.front')

@section('title', 'Checkout')


@section('content')

    <div class="py-3 mb-4  bg-warning">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / <a href="{{ url('cart') }}">Cart</a> / Checkout </h6>
        </div>
    </div>

    @php
        $total=0;
    @endphp
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 style="color: black;font-weight: bold">Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="" style="color: black;font-weight: bold">First Name</label>
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}"
                                        name="fname" placeholder="Enter First Name">
                                        <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="" style="color: black;font-weight: bold">Last Name</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}"
                                        name="lname" placeholder="Enter Last Name">
                                        <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">Email</label>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}"
                                        name="email" placeholder="Enter Email">
                                        <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}"
                                        name="phone" placeholder="Enter Phone Number">
                                        <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}"
                                        name="address1" placeholder="Enter Address 1">
                                        <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}"
                                        name="address2" placeholder="Enter Address 2">
                                        <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">City</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}"
                                        name="city" placeholder="Enter City">
                                        <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">State</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}"
                                        name="state" placeholder="Enter State">
                                        <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">Country</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}"
                                        name="country" placeholder="Enter Country">
                                        <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" style="color: black;font-weight: bold">Pin Code</label>
                                    <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}"
                                        name="pincode" placeholder="Enter Pin Code">
                                        <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">

                            <h6 style="color: black;font-weight: bold">Order Details</h6>
                            <hr>

                            @if ($cartitems->count() < 1)
                                <div class="text-center">
                                    <h3 style="color: black;font-weight: bold">No products in cart</h3>
                                </div>
                            @else
                                <table class="table table-striped table-bordered border-top">
                                    <thead>
                                        <tr>
                                            <th style="color: black;font-weight: bold">Name</th>
                                            <th style="color: black;font-weight: bold">Quantity</th>
                                            <th style="color: black;font-weight: bold">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartitems as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->products->name }}
                                                </td>
                                                <td>
                                                    {{ $item->prod_qty }}
                                                </td>
                                                <td>
                                                    {{ $item->products->selling_price }} EGP
                                                </td>
                                            </tr>
                                            @php
                                                $total+=$item->products->selling_price * $item->prod_qty;
                                            @endphp
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                               
                                    <label for="" class="badge bg-success text-white" style="margin-top: 5px;font-size: 15px">Total Price: {{ $total}} EGP</label>
                                
                                <hr>
                                <button class="btn btn-success float-right w-100">Place Order | COD</button>
                                {{-- <button class="btn btn-primary float-right w-100 razorpay-btn">Pay with Razorpay</button> --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
