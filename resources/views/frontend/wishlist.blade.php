@extends('layouts.front')

@section('title')
    Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / Wishlist </h6>
        </div>
    </div>


    <div class="container">

        @if ($wishlist->count() > 0)
            <h4 style="color: black;font-weight: bold">Wishlist Items</h4>
            <hr>
            <div class="row product_data">
                @foreach ($wishlist as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img style="width: 100%;height: 20vw; object-fit: cover;"
                                src="{{ asset('assets/uploads/product/' . $item->products->image) }}" alt="Product image">
                            <div class="card-body">
                                <input type="hidden" value="{{ $item->products->id }}" class="prod_id">
                                <h5>{{ $item->products->name }} @if ($item->products->qty > 0)
                                        <span class="float-right"><label class="badge bg-success text-white">In
                                                stock</label>
                                            <label class="badge bg-danger text-white"
                                                style="color: black;font-weight: bold">
                                                {{ $item->products->qty }} Only Left</label>
                                        </span>
                                    @else
                                        <span class="float-right"><label class="badge bg-danger text-white">out of
                                                stock</label></span>
                                    @endif
                                </h5>

                                <button class="btn btn-danger btn-sm float-right removefromwishlist ml-2">Remove</button>
                                <span class="float-start">Price: {{ $item->products->selling_price }} EGP</span>
                                @if ($item->products->qty > 0)
                                    <button class="btn btn-success btn-sm float-right addtocartt">Add To Cart</button>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h4>There are no products in your Wishlist</h4>
        @endif

    </div>
@endsection
<style>
    tr td:last-child {
        width: 1%;
        height: 1%;
        white-space: nowrap;
    }



    .label {
        color: black;
        font-weight: bold;
        padding-top: 5px;
    }
</style>
