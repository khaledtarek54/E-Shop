@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product Page</h4>
            <hr>
        </div>
        <div class="card-body table-bordered table-striped">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Selling price</th>
                        <th>Image</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>
                                <img style="width: 50px;length:50px" src="{{ asset('assets/uploads/product/' . $item->image) }}" alt="Image here">
                            </td>
                            <td>
                                <a href="{{url('edit.product/'.$item->id)}}" class="btn btn-primary" >Edit</a>
                                <a href="{{url('delete.product/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection