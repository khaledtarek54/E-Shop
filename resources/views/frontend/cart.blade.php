@extends('layouts.front')

@section('title', 'My Cart')


@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / Cart </h6>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartitems as $prod)
                    <div class="row product_data border-bottom">
                        <div class="col-md-2 ">
                            <img src="{{ asset('assets/uploads/product/' . $prod->products->image) }}" alt="."
                                class="w-100">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $prod->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $prod->products->selling_price }} EGP</h6>
                        </div>
                        <div class="col-md-3 mt-5">
                            <input type="hidden" value="{{ $prod->products->id }}" class="prod_id">
                            @if ($prod->products->qty >= $prod->prod_qty)
                                <label for="Quantity" class="text-dark">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button
                                        class="input-group-text changequanity decrement-btn btn btn-outline-danger">-</button>
                                    <input type="text" name="quantity" value="{{ $prod->prod_qty }}"
                                        class="form-control qty-input text-center mb-1" />
                                    <button
                                        class="input-group-text changequanity increment-btn btn btn-outline-success">+</button>
                                </div>
                                @php
                                $total += $prod->products->selling_price * $prod->prod_qty; @endphp
                            @else
                                <h6>Out of stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 mt-5">
                            <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                @endforeach
                @if ($cartitems->count()<1)
                    <div class="my-auto text-center" >
                        <h2 style="font-size: 30px ;font-weight: bold">Your Cart Is Empty</h2>
                    </div>

                    <div class="my-auto float-right">
                        <a href="{{ url('category') }}" class="btn btn-success float-end">Go Shopping</a>
                    </div>
                @else
                    <div class="card-footer">
                        <h6>Total Price: {{ $total }} EGP</h6>
                        <a href="{{ url('checkout') }}" class="btn btn-success float-end "> Proceed to checkout</a>
                    </div>
                @endif
            </div>
        </div>
    </div>



@endsection
