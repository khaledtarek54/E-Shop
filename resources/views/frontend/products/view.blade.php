@extends('layouts.front')

@section('title', $product->name)


@section('content')




    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ url('/') }}">Home</a> / <a
                    href="{{ url('view.category/' . $product->category->slug) }}">{{ $product->category->name }}</a> /
                {{ $product->name }}</h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="card shadow product_data">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="Product image"
                            class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if ($product->trending == '1')
                                <label class="float-right badge bg-danger trending_tag mr-3 mt-3 text-white"
                                    style="font-size: 16px">Trending</label>
                            @endif

                        </h2>
                        <hr>
                        <label class="font-weight-bold me-3 text-dark">Selling Price: EGP
                            {{ $product->selling_price }}</label>
                        <label class="float-right mr-3">Original Price: <s>EGP {{ $product->original_price }}</s></label>

                        <p class="mt-3">
                            {{ $product->small_description }}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success text-white">In stock</label>
                            <label class="badge bg-danger text-white" style="color: black;font-weight: bold"> {{$product->qty}} Only Left</label>
                        @else
                            <label class="badge bg-danger text-white">out of stock</label>
                        @endif
                        <div class="row ml-1">


                            <div class="input-group text-center " style="width: 200px">

                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <label for="Quantity" class="mt-2 text-dark">Quantity</label>

                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1"
                                    class="form-control qty-input text-center" />
                                <button class="input-group-text increment-btn">+</button>

                            </div>
                            <div class="col-md-10 mt-3">
                                @if ($product->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 float-left addtocart mr-3">Add to
                                        cart <i class="fa fa-shopping-cart"></i></button>
                                @else
                                    
                                @endif

                                <button type="button" class="btn btn-success me-3 float-left addtowishlist">Add to wishlist <i
                                        class="fa fa-heart"></i></button>

                            </div>

                        </div>
                        <hr>


                    </div>

                </div>

            </div>
            <h2>Description</h2>
            {{ $product->description }}
        </div>
    </div>
@endsection
