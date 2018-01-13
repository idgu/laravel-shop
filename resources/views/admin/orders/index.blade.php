@extends('layouts.admin')

@section('title') Users @endsection


@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.orders'))


@section('content')


    <h1>Orders</h1>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Orders list</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Buyer</th>
                        <th>Total amount</th>
                        <th>Status</th>
                        <th>Products</th>
                        <th>Updated at</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Buyer</th>
                        <th>Total amount</th>
                        <th>Status</th>
                        <th>Products</th>
                        <th>Updated at</th>
                        <th>Created at</th>
                    </tr>
                    </tfoot>



                    <tbody>
                    @if($orders)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->totalAmount/100 }} zł</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    @foreach($order->products as $product)

                                        {{$product['qty']}}x<img src="{{url('/')}}{{$product['product']->icon->file}}" alt="{{$product['product']->brand . ' ' .$product['product']->model}}" title="{{$product['product']->brand . ' ' .$product['product']->model}}" style="height: 40px; width: 40px;">

                                    @endforeach
                                </td>
                                <td>{{ $order->updated_at }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        @endforeach
                    @endif


                    </tbody>



                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


@stop
