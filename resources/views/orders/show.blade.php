@extends('layouts.app')

@section('content')


    <div class="span9">
        {{--<ul class="breadcrumb">--}}
            {{--<li><a href="index.html">Home</a> <span class="divider">/</span></li>--}}
            {{--<li class="active"> SHOPPING CART</li>--}}
        {{--</ul>--}}
        <h3>  SHOPPING CART [ <small> <span class="my-total-qty">@if($cart) {{$cart->totalQty}} @else 0 @endif </span> Item(s) </small>]<a href="{{route('mainpage')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
        <hr class="soft"/>


        @if(!$auth)

            <table class="table table-bordered">
                <tr><th> I AM ALREADY REGISTERED  </th></tr>
                <tr>
                    <td>
                        <form method="POST" class="form-horizontal" action="{{ route('login') }}?redirect=orders.show">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input type="email" id="inputEmail" placeholder="Email Adress" name="email">
                                    @if ($errors->has('email'))

                                        <span class="help-block">
                                                <strong class="text-error">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" id="inputPassword" placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="inputCheckbox">Remember me</label>
                                <div class="controls">
                                    <input type="checkbox" name="remember" id="inputCheckbox">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">Sign in</button> OR <a href="{{route('register')}}" class="btn">Register Now!</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <a href="#" style="text-decoration:underline">Forgot password ?</a>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>

        @endif


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Quantity/Update</th>
                <th>Price One</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @if($cart)

                @foreach($cart->items as $item)

                    <tr class="my-tr" id="item_{{ $item['item']->id }}">
                        <td><a href="{{route('products.details',$item['item']->id)}}" title="{{ $item['item']->brand . ' ' . $item['item']->model }}"><img width="60" src="{{ url('/') }}{{ $item['item']->icon->file }}" alt=""/></a></td>
                        <td>{{ $item['item'] -> brand}} {{ $item['item'] -> model}}</td>
                        <td>
                            <div class="input-append">
                                <input data-id="{{ $item['item']->id }}" class="span1 my-qty-input" style="max-width:34px" value="{{ $item['qty'] }}" size="16" type="text" disabled>
                                <button class="btn my-take-button" type="button" title="Delete product"><i class="icon-minus"></i></button><button class="btn my-add-button" type="button" title="Add product"><i class="icon-plus"></i></button>
                                <button class="btn btn-danger my-del-button" type="button" title="Delete all products"><i class="icon-remove icon-white"></i></button>
                            </div>
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
        <a href="{{ route('orders.summary') }}" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
        @endif
    </div>



@endsection



@section('scripts')
    <script>

        Element.prototype.remove = function() {
            this.parentElement.removeChild(this);
        }
        NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
            for(var i = this.length - 1; i >= 0; i--) {
                if(this[i] && this[i].parentElement) {
                    this[i].parentElement.removeChild(this[i]);
                }
            }
        }


        document.addEventListener('DOMContentLoaded', function () {




            function Cart() {

                this.totalQty = @if($cart) {{$cart->totalQty }} @endif ;
                this.totalPrice = @if($cart) {{$cart->totalPrice }} @endif ;


                this.totalQtyInputs = document.querySelectorAll('.my-total-qty');
                this.totalPriceInputs = document.querySelectorAll('.my-total-price');

                this.addButtons = document.querySelectorAll('.my-add-button');
                this.qtyInputs = document.querySelectorAll('.my-qty-input');
                this.takeButtons = document.querySelectorAll('.my-take-button');
                this.delButtons = document.querySelectorAll('.my-del-button');




                this.updateFields = function(items) {
                    this.totalItemsPriceInputs = document.querySelectorAll('.my-total-items-price');


                    for(let i=0, len = this.totalQtyInputs.length; i<len; i++) {
                        this.totalQtyInputs[i].innerHTML = this.totalQty;

                    }

                    for(let i=0, len = this.totalPriceInputs.length; i<len; i++) {
                        this.totalPriceInputs[i].innerHTML = this.totalPrice;
                    }


                    console.log(this.totalItemsPriceInputs);


                    for(let i=0; i<this.totalItemsPriceInputs.length; i++) {


                        if(this.totalItemsPriceInputs[i].dataset.id in items ) {
                            this.totalItemsPriceInputs[i].innerHTML = items[this.totalItemsPriceInputs[i].dataset.id].price;
                        }

                        if (this.totalItemsPriceInputs[i]){
                            if (!items[this.totalItemsPriceInputs[i].dataset.id]) {
                                console.log('dzialam' + 'item_' + this.totalItemsPriceInputs[i].dataset.id);
                                document.getElementById('item_' + this.totalItemsPriceInputs[i].dataset.id).remove();

                                this.totalItemsPriceInputs[i] = 'jasiu';
                            }
                        }

                    }
                }







                this.updateCart = function(cart, qtyInput, qtyInputValue, items) {
                    this.totalQty = cart.totalQty;
                    this.totalPrice = cart.totalPrice;


                    qtyInput.value = (qtyInputValue > 0 )? qtyInputValue : 0;


                    this.updateFields(items);


                }





                this.addProductsToCart = function (id, qty, qtyInput) {
                    var xhr = new XMLHttpRequest();

                    xhr.open('GET', `{{ route('products.xhrAddProductsToCart',[null,null]) }}/${id}/${qty}`, true);


                    const self = this;
                    const qtyInputValue =  Number(qtyInput.value) + qty;

                    xhr.onload = function () {
                        if (this.status == 200) {
                            let cart = JSON.parse(this.responseText);
                            self.updateCart(cart, qtyInput, qtyInputValue, cart.items);

                        }
                    }

                    xhr.send();
                }





                this.deleteProductsFromCart = function (id, qty, qtyInput) {
                    var xhr = new XMLHttpRequest();

                    xhr.open('GET', `{{ route('products.xhrDeleteProductsFromCart',[null,null]) }}/${id}/${qty}`, true);


                    const self = this;
                    const qtyInputValue =  Number(qtyInput.value) - qty;


                    xhr.onload = function () {
                        if (this.status == 200) {
                            let cart = JSON.parse(this.responseText);

                            self.updateCart(cart, qtyInput, qtyInputValue,  cart.items);

                        }
                    }

                    xhr.send();
                }








                this.setButtons = function () {

                    for (let i = 0, len = this.addButtons.length; i < len; i++) {

                        this.addButtons[i].addEventListener('click', function () {
                            let id = this.qtyInputs[i].dataset.id;
                            this.addProductsToCart(id, 1, this.qtyInputs[i]);


                            this.addButtons[i].disabled = true;
                            setTimeout(function() {
                                this.addButtons[i].disabled = false;
                            }.bind(this), 1500);

                        }.bind(this));

                    }


                    for (let i = 0, len = this.takeButtons.length; i < len; i++) {

                        this.takeButtons[i].addEventListener('click', function () {
                            let id = this.qtyInputs[i].dataset.id;
                            this.deleteProductsFromCart(id, 1, this.qtyInputs[i]);


                            this.takeButtons[i].disabled = true;
                            setTimeout(function() {
                                this.takeButtons[i].disabled = false;
                            }.bind(this), 1500);

                        }.bind(this));

                    }





                    for (let i = 0, len = this.delButtons.length; i < len; i++) {

                        this.delButtons[i].addEventListener('click', function () {
                            let id = this.qtyInputs[i].dataset.id;
                            this.deleteProductsFromCart(id, this.qtyInputs[i].value, this.qtyInputs[i]);


                            this.delButtons[i].disabled = true;
                            setTimeout(function() {
                                this.delButtons[i].disabled = false;
                            }.bind(this), 1500);

                        }.bind(this));

                    }



                }


            }


            const cart = new Cart();
            cart.setButtons();


        });

    </script>

@endsection