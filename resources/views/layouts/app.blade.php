<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <style>
        @media only screen and (min-width: 1079px) {
            .my-pull-right{
                float: right !important;
            }
        }
    </style>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{ url('/') }}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('/') }}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('/') }}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('/') }}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ url('/') }}/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>


<body>
<div id="header">
    <div class="container">
                <div id="welcomeLine" class="row">
                        @guest
                        <div class="span6">Please <strong><a href="{{ route('login') }}">Login</a></strong> or  <strong> <a href="{{ route('register') }}">Register</a></strong></div>

                        @else

                        <div class="span6">Welcome!<strong> {{Auth::user()->name}}</strong></div>

                        @endguest

                    <div class="span6">
                        <div class="pull-right">
                            @if($cart)
                                <a href="{{ route('orders.show') }}"><span class="btn btn-mini"><span class="my-total-price">{{ $cart->totalPrice }}</span> zł</span></a>
                                <a href="{{ route('orders.show') }}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <span class="my-total-qty"> {{ $cart->totalQty }}</span> Itemes in your cart </span> </a>
                            @else
                                <a href="{{ route('orders.show') }}"><span class="btn btn-mini">0 zł</span></a>
                                <a href="{{ route('orders.show') }}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 0 ] Itemes in your cart </span> </a>
                            @endif
                        </div>
                    </div>
                </div>

        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="{{ route('mainpage') }}"><img src="{{ url('/') }}/images/logo.png" alt="Bootsshop"/></a>


                @if(isset($categories))

                    @if(count($categories))
                    {!! Form::open(['method'=>'GET', 'action' => 'ProductsController@search', 'class'=> 'form-inline navbar-search']) !!}

                            {!! Form::text('search', null, ['class' => 'srchTxt', 'id'=> 'srchFld', 'style'=>'padding-left:28px;']) !!}
                            {!! Form::select('category_id', array(''=>'ALL') + $categoriesPluck , null,  ['class' => 'srchTxt']) !!}

                                {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}

                    {!! Form::close() !!}
                    @endif
                @endif

                <ul id="topMenu" class="nav my-pull-right">
                    <li class=""><a href="{{ route('faq') }}">FAQ</a></li>

                    @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $auth->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @if($auth->isAdmin())
                                <li><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth

                    {{--<li class="">--}}
                        {{--<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>--}}
                        {{--<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >--}}
                            {{--<div class="modal-header">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                {{--<h3>Login Block</h3>--}}
                            {{--</div>--}}
                            {{--<div class="modal-body">--}}
                                {{--<form class="form-horizontal loginFrm">--}}
                                    {{--<div class="control-group">--}}
                                        {{--<input type="text" id="inputEmail" placeholder="Email">--}}
                                    {{--</div>--}}
                                    {{--<div class="control-group">--}}
                                        {{--<input type="password" id="inputPassword" placeholder="Password">--}}
                                    {{--</div>--}}
                                    {{--<div class="control-group">--}}
                                        {{--<label class="checkbox">--}}
                                            {{--<input type="checkbox"> Remember me--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                                {{--<button type="submit" class="btn btn-success">Sign in</button>--}}
                                {{--<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
        <!-- END Navbar ================================================== -->

    </div>
</div>
<!-- Header End====================================================================== -->


@yield('carousel')


<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                @if($cart)
                    <div class="well well-small"><a id="myCart" href="{{ route('orders.show') }}"><img src="{{ url('/') }}/images/ico-cart.png" alt="cart"><span class="my-total-qty">{{ $cart->totalQty }}</span> Items in your cart  <span class="badge badge-warning pull-right"><span class="my-total-price">{{ $cart->totalPrice }}</span> zł</span></a></div>
                @else
                    <div class="well well-small"><a id="myCart" href="{{ route('orders.show') }}"><img src="{{ url('/') }}/images/ico-cart.png" alt="cart">0 Items in your cart  <span class="badge badge-warning pull-right">0 zł</span></a></div>

                @endif
                <ul id="sideManu" class="nav nav-tabs nav-stacked">

                    @if(isset($categories))
                        @if(count($categories))

                            @foreach($categories as $category)
                                <li class="subMenu"><a> {{ strtoupper($category->name) }} [ {{$category->products->count()}} ]</a>
                                @if(count($category->subcategories))
                                        <ul style="display:none">
                                            @foreach($category->subcategories as $subcategory)
                                                <li><a href="{{ route('products.productsBySubcategory', $subcategory->id) }}"> <i class="icon-chevron-right"></i> {{$subcategory->name}} ( {{ $subcategory->products->count() }} )</a></li>
                                            @endforeach

                                        </ul>

                                @endif


                            @endforeach




                        @endif
                    @endif

                </ul>
                <br/>
                    @if($twoproducts)
                        @foreach($twoproducts as $oneproduct)
                            <div class="thumbnail">
                                <a href="{{ route('products.details', $oneproduct->id) }}"><img src="{{ url('/') }}{{ $oneproduct->icon->file }}" alt="{{$oneproduct->brand}} {{$oneproduct->model}}"/></a>
                                <div class="caption">
                                    <h5><a href="{{ route('products.details', $oneproduct->id) }}">{{$oneproduct->brand}} {{$oneproduct->model}}</a></h5>
                                    <h4 style="text-align:center"><a class="btn" href="{{ route('products.details', $oneproduct->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="{{ route('products.addProductsToCart',[$oneproduct->id, 1]) }}">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="">{{ $oneproduct->price }}zł</a></h4>
                                </div>
                            </div><br/>
                        @endforeach

                    @endif


            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9">

                @yield('content')


            </div>
        </div>
    </div>
</div>
<!-- Footer ================================================================== -->
<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="#">YOUR ACCOUNT</a>
                <a href="#">PERSONAL INFORMATION</a>
                <a href="#">ADDRESSES</a>
                <a href="#">DISCOUNT</a>
                <a href="#">ORDER HISTORY</a>
            </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="#">CONTACT</a>
                <a href="{{ route('register') }}">REGISTRATION</a>
                <a href="#">LEGAL NOTICE</a>
                <a href="{{ route('faq') }}">TERMS AND CONDITIONS</a>
                <a href="{{ route('faq') }}">FAQ</a>
            </div>
            <div class="span3">
                <h5>OUR OFFERS</h5>
                <a href="#">NEW PRODUCTS</a>
                <a href="#">TOP SELLERS</a>
                <a href="#">SPECIAL OFFERS</a>
                <a href="#">MANUFACTURERS</a>
                <a href="#">SUPPLIERS</a>
            </div>
            <div id="socialMedia" class="span3 pull-right">
                <h5>SOCIAL MEDIA </h5>
                <a href="#"><img width="60" height="60" src="{{ url('/') }}/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="#"><img width="60" height="60" src="{{ url('/') }}/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href="#"><img width="60" height="60" src="{{ url('/') }}/images/youtube.png" title="youtube" alt="youtube"/></a>
            </div>
        </div>
        <p class="pull-right">&copy; Bootshop</p>
    </div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->



<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')


</body>
</html>