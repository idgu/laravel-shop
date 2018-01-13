@extends('layouts.app')


@section('content')

    <div class="row">

    <div id="gallery" class="span3">
        <a href="{{ url('/') }}/images/products/large/f1.jpg" title="{{ $product->brand}} {{ $product->model }}">
            <img src="{{ url('/') }}{{ $product->photo->file}}" style="width:100%" alt="{{ $product->model }}"/>
        </a>
        {{--<div id="differentview" class="moreOptopm carousel slide">--}}
            {{--<div class="carousel-inner">--}}
                {{--<div class="item active">--}}
                    {{--<a href="{{ url('/') }}/images/products/large/f1.jpg"> <img style="width:29%" src="{{ url('/') }}/images/products/large/f1.jpg" alt=""/></a>--}}
                    {{--<a href="{{ url('/') }}/images/products/large/f2.jpg"> <img style="width:29%" src="{{ url('/') }}/images/products/large/f2.jpg" alt=""/></a>--}}
                    {{--<a href="{{ url('/') }}/images/products/large/f3.jpg" > <img style="width:29%" src="{{ url('/') }}/images/products/large/f3.jpg" alt=""/></a>--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                    {{--<a href="{{ url('/') }}/images/products/large/f3.jpg" > <img style="width:29%" src="{{ url('/') }}/images/products/large/f3.jpg" alt=""/></a>--}}
                    {{--<a href="{{ url('/') }}/images/products/large/f1.jpg"> <img style="width:29%" src="{{ url('/') }}/images/products/large/f1.jpg" alt=""/></a>--}}
                    {{--<a href="{{ url('/') }}/images/products/large/f2.jpg"> <img style="width:29%" src="{{ url('/') }}/images/products/large/f2.jpg" alt=""/></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!----}}
            {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>--}}
            {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>--}}
            {{---->--}}
        {{--</div>--}}

        {{--<div class="btn-toolbar">--}}
            {{--<div class="btn-group">--}}
                {{--<span class="btn"><i class="icon-envelope"></i></span>--}}
                {{--<span class="btn" ><i class="icon-print"></i></span>--}}
                {{--<span class="btn" ><i class="icon-zoom-in"></i></span>--}}
                {{--<span class="btn" ><i class="icon-star"></i></span>--}}
                {{--<span class="btn" ><i class=" icon-thumbs-up"></i></span>--}}
                {{--<span class="btn" ><i class="icon-thumbs-down"></i></span>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="span6">
        <h3>{{ $product->brand}} {{ $product->model }}</h3>
        <hr class="soft"/>
        <form class="form-horizontal qtyFrm">
            <div class="control-group">
                <div class="controls">
                    <a href="{{route('products.addProductsToCart', [$product->id, 1])}}" class="btn btn-block btn-large btn-primary"> Add to cart <i class=" icon-shopping-cart"></i></a>
                </div>
            </div>
        </form>



        <br class="clr"/>
    </div>

    <div class="span9">
        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <h4>Product Information</h4>
                <table class="table table-bordered">
                    <tbody>
                    <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2"> {{ $product->brand }}</td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2"> {{ $product->model }}</td></tr>
                    <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> {{ $product->released_on }}</td></tr>
                    </tbody>
                </table>

                <h5>Description</h5>
                <p>
                    {{ $product->description }}
                </p>

            </div>
            <div class="tab-pane fade" id="profile">
                <div id="myTab" class="pull-right">
                    <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                    <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                </div>
                <br class="clr"/>
                <hr class="soft"/>

                <br class="clr">
            </div>
        </div>
    </div>
    </div>


@endsection