@extends('layouts.app')

@section('carousel')
    @include('includes.carousel')
@endsection


@section('content')


    <h4>Random products <small class="pull-right"></small></h4>
    <div class="well well-small">
        <div class="row-fluid">
            <div id="featured" class="carousel slide">
                <div class="carousel-inner">
                            @if($random_products)
                                <?php $active = true; ?>
                                @foreach($random_products as $random_productsArray)
                                    <div class="item <?php if($active){ echo 'active';} ?>">
                                        <ul class="thumbnails">
                                    @foreach($random_productsArray as $random_product)
                                    <li class="span3">
                                        <div class="thumbnail">
                                            <a href="{{ route('products.details', $random_product->id) }}"><img src="{{ url('/') . $random_product->icon->file}}" alt=""></a>
                                            <div class="caption">
                                                <h5>{{ $random_product->brand . ' ' . $random_product->model }}</h5>
                                                <h4><a class="btn" href="{{ route('products.details', $random_product->id) }}">VIEW</a> <span class="pull-right">{{ $random_product->price }} zł</span></h4>
                                            </div>
                                        </div>
                                    </li>

                                    @endforeach
                                        <?php $active = false; ?>
                                        </ul>
                                    </div>
                                @endforeach


                            @endif


                </div>
                <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#featured" data-slide="next">›</a>
            </div>
        </div>
    </div>
    <h4>Latest Products </h4>

    @if($products)
        <ul class="thumbnails">

        @foreach($products as $product)
                <li class="span3">
                    <div class="thumbnail">
                        <a  href="{{ route('products.details', $product->id)  }}"><img src="{{ url('/') }}{{$product->icon->file}}" alt="{{$product->brand}} {{$product->model}}"/></a>
                        <div class="caption">
                            <h5><a href="{{ route('products.details', $product->id)  }}">{{$product->brand}} {{$product->model}}</a></h5>
                            <p>

                            </p>

                            <h4 style="text-align:center"><a class="btn" href="{{ route('products.details', $product->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="{{ route('products.addProductsToCart', [$product->id, 1]) }}">Add to <i class="icon-shopping-cart"></i></a> <span class="btn-block btn-primary">{{ $product->price }} zł</span></h4>
                        </div>
                    </div>
                </li>



        @endforeach
        </ul>

    @endif





@endsection