@extends('layouts.admin')

@section('title', 'Orders')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 style="color: black;font-weight: bold">New Orders
                            <a href="{{ url('order-history') }}" class="btn btn-success float-right">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body mb-3">
                        <table class="table table-bordered border-top">
                            <thead>
                                <tr>
                                    <th style="color: black;font-weight: bold">Order Date</th>
                                    <th style="color: black;font-weight: bold">Tracking Number</th>
                                    <th style="color: black;font-weight: bold">Total Price</th>
                                    <th style="color: black;font-weight: bold">Status</th>
                                    <th style="color: black;font-weight: bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }} EGP</td>
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                        <td><a href="{{ url('admin/view-order/' . $item->id) }}"
                                                class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
