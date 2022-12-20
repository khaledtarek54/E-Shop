@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update.product/' .$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row" class="col-md-12 mb-3">
                    <select class="btn btn-primary" name="cate_id" aria-label="Default select example">
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @foreach ($category as $item)
                            @if ($item->id != $cate->id)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
                <div class="col-md-6">
                    <label for="">slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                </div>
                <div class="col-md-6">
                    <label for="">Small Description</label>
                    <input type="text" class="form-control" name="small_description" value="{{ $product->small_description }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original price</label>
                    <input type="number" name="original_price" class="form-control" value="{{ $product->original_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling price</label>
                    <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" name="tax" class="form-control" value="{{ $product->tax }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked' : '' }}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{ $product->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $product->meta_description }}</textarea>
                </div>
                @if ($product->image)
                    <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="product image">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control ">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primry">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
