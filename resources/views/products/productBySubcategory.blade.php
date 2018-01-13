@extends('layouts.app')

@section('content')

    <div class="span9">
        {{--<ul class="breadcrumb">--}}
            {{--<li><a href="index.html">Home</a> <span class="divider">/</span></li>--}}
            {{--<li class="active">Category: {{$category_name}}</li>--}}
        {{--</ul>--}}
        <h3> Category: {{$category_name}} / {{$subcategory_name}} <small class="pull-right"> {{$products->count()}} products are available </small></h3>
        <hr class="soft"/>
        {{--<form class="form-horizontal span6">--}}
            {{--<div class="control-group">--}}
                {{--<label class="control-label alignL">Sort By </label>--}}
                {{--<select>--}}
                    {{--<option>Priduct name A - Z</option>--}}
                    {{--<option>Priduct name Z - A</option>--}}
                    {{--<option>Priduct Stoke</option>--}}
                    {{--<option>Price Lowest first</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</form>--}}

        <div id="myTab" class="pull-right">
            <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
            <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
        </div>
        <br class="clr"/>
        <div class="tab-content" style="margin-top: 20px;">
            <div class="tab-pane" id="listView">

                @if($products)

                    @foreach($products as $product)
                        <div class="row">
                            <div class="span2">
                                <img src="{{ url('/') . $product->icon->file }}" alt=""/>
                            </div>
                            <div class="span4">
                                <h3>{{ $product->brand . ' ' . $product->model }}</h3>
                                <hr class="soft"/>
                                <h5>Product Name </h5>
                                <p>
                                    {{ str_limit($product->description, 100) }}
                                </p>
                                <br class="clr"/>
                            </div>
                            <div class="span3 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> {{ $product->price }} zł</h3>

                                    <a href="{{ route('products.addProductsToCart', [$product->id, 1]) }}" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                    <a href="{{ route('products.details', $product->id) }}" class="btn btn-large"><i class="icon-zoom-in"></i></a>

                                </form>
                            </div>
                        </div>
                        <hr class="soft"/>

                    @endforeach

                @endif

            </div>

            <div class="tab-pane  active" id="blockView">
                <ul class="thumbnails">
                    @if($products)

                        @foreach($products as $product)
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="{{ route('products.details', $product->id) }}"><img src="{{ url('/') }}{{ $product->icon->file }}" alt=""/></a>
                                    <div class="caption">
                                        <h5>{{ $product->brand . ' ' . $product->model }}</h5>

                                        <h4 style="text-align:center"><a class="btn" href="{{ route('products.details', $product->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="{{ route('products.addProductsToCart', [$product->id, 1]) }}">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{ $product->price }} zł</a></h4>
                                    </div>
                                </div>
                            </li>
                        @endforeach


                    @endif


                </ul>
                <hr class="soft"/>
            </div>
        </div>

        <div class="pagination">
            <div class="span3" style="margin:0 auto; float:none;">
            {{$products->links()}}

            </div>
        </div>
        <br class="clr"/>
    </div>

@endsection