@extends('layouts.app')

@section('content')


    <div class="span9">
        {{--<ul class="breadcrumb">--}}
            {{--<li><a href="index.html">Home</a> <span class="divider">/</span></li>--}}
            {{--<li class="active"> SHOPPING CART SUMMARY</li>--}}
        {{--</ul>--}}
        <h3>  ORDER SUMMARY </h3>
        <hr class="soft"/>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price One</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @if($cart)

                @foreach($cart->items as $item)

                    <tr class="my-tr" id="item_{{ $item['item']->id }}">
                        <td><a href="{{route('products.details',$item['item']->id)}}"><img width="60" src="{{ url('/') }}{{ $item['item']->icon->file }}" alt=""/></a></td>
                        <td>{{ $item['item'] -> brand}} {{ $item['item'] -> model}}</td>
                        <td>
                            <div class="span">{{ $item['qty'] }}</div>
                        </td>
                        <td>{{$item['item']->price }}</td>
                        <td><span class="my-total-items-price" data-id="{{ $item['item']->id }}">{{ $item['price'] }}</span></td>
                    </tr>

                @endforeach

                <tr>
                    <td colspan="4" style="text-align:right"><strong>TOTAL Price</strong></td>
                    <td class="label label-important" style="display:block"><strong class="my-total-price">{{$cart->totalPrice}}</strong> zł </td>
                </tr>

            @endif
            </tbody>
        </table>


        {{--<table class="table table-bordered">--}}
        {{--<tr><th>ESTIMATE YOUR SHIPPING </th></tr>--}}
        {{--<tr>--}}
        {{--<td>--}}
        {{--<form class="form-horizontal">--}}
        {{--<div class="control-group">--}}
        {{--<label class="control-label" for="inputCountry">Country </label>--}}
        {{--<div class="controls">--}}
        {{--<input type="text" id="inputCountry" placeholder="Country">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="control-group">--}}
        {{--<label class="control-label" for="inputPost">Post Code/ Zipcode </label>--}}
        {{--<div class="controls">--}}
        {{--<input type="text" id="inputPost" placeholder="Postcode">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="control-group">--}}
        {{--<div class="controls">--}}
        {{--<button type="submit" class="btn">ESTIMATE </button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--</table>--}}
        <a href="{{ route('mainpage') }}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>

        @if($auth)
            <a href="{{ route('orders.buy') }}" class="btn btn-large pull-right">BUY <i class="icon-arrow-right"></i></a>
        @endif
    </div>




@endsection


