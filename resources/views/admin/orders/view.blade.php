@extends('layouts.admin')

@section('title', 'Orders')


@section('content')
    @php
    $total = 0;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white " style="font-weight: bold;vertical-align: middle;">Order View
                            <a href="{{ url('order-history') }}" class="btn btn-success float-right">Order History</a></h4>
                    </div>
                    <div class="card-body mb-3">
                        <div class="col-md-6 float-left">
                            <h4 style="color: black;font-weight: bold">Shipping Details</h4>
                            <hr>
                            <label for="" class="label">First Name</label>
                            <div class="border p-2 mb-1 ">{{ $orders->fname }}</div>
                            <label for="" class="label">Last Name</label>
                            <div class="border p-2 mb-1">{{ $orders->lname }}</div>
                            <label for="" class="label">Email</label>
                            <div class="border p-2 mb-1">{{ $orders->email }}</div>
                            <label for="" class="label">Contact no.</label>
                            <div class="border p-2 mb-1">{{ $orders->phone }}</div>
                            <label for="" class="label">Shipping Address</label>
                            <div class="border p-2 mb-1">
                                {{ $orders->address1 }},
                                {{ $orders->address2 }},
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }}
                            </div>
                            <label for="" class="label">Zip Code</label>
                            <div class="border p-2 mb-1 ">{{ $orders->pincode }}</div>


                        </div>
                        <div class="col-md-6 float-right">
                            <h4 style="color: black;font-weight: bold">Order Details</h4>
                            <hr>
                            <table class="table table-bordered border-top">
                                <thead>
                                    <tr style="height: 0">
                                        <th style="color: black;font-weight: bold">Name</th>
                                        <th style="color: black;font-weight: bold">Quantity</th>
                                        <th style="color: black;font-weight: bold">Price</th>
                                        <th style="color: black;font-weight: bold">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                        @php
                                            $total += $item->price * $item->qty;
                                        @endphp
                                        <tr style="height: 0;">
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }} EGP</td>
                                            <td><img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                                    class="img-fluid" alt="prod image"></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 style="color: black;font-weight: bold">Grand Total: <span
                                    class="float-right">{{ $total }} EGP</span></h4>
                            <div class="mt-5 px-2">
                                <label for="" style="color: black;font-weight: bold">Order Status</label>
                                <form action="{{url('update-order/'.$orders->id)}}" method="post">
                                    @csrf
                                    <select class="custom-select" name="order_status">
                                        <option selected>Open this select menu</option>
                                        <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                        <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3 float-right">Update</button>
                                </form>
                                
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<style>
    img {
        width: 50px;
        height: 50px;
    }

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
