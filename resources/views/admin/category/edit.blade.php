@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update.category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$category->status == "1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{$category->popular == "1" ? 'checked':''}} name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta title</label>
                        <input type="text" class="form-control"  value="{{$category->meta_title}}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    @if ($category->image)
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="category image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primry">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection