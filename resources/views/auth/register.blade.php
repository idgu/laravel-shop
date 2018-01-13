@extends('layouts.app')

@section('content')


        <div class="row">
                <div class="span6">
                    <div class="well">
                        <h3 style="text-align: center;">CREATE YOUR ACCOUNT</h3><br/>
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}


                            <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
                                <label class="control-label" for="email">Email</label>
                                <div class="controls">
                                    <input class="span5"  type="text" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))

                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
                                <label class="control-label" for="password">Password</label>
                                <div class="controls">
                                    <input class="span5"  type="password" id="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="password-confirm">Confirm password</label>
                                <div class="controls">
                                    <input class="span5"  type="password" id="password-confirm" name="password_confirmation">
                                </div>
                            </div>


                            <div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
                                <label class="control-label" for="name">Name</label>
                                <div class="controls">
                                    <input class="span5"   type="text" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="control-group {{ $errors->has('surname') ? 'error' : '' }}">
                                <label class="control-label" for="name">Surname</label>
                                <div class="controls">
                                    <input class="span5"   type="text" id="surname" placeholder="Surname" name="surname" value="{{ old('surname') }}">
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="control-group {{ $errors->has('phone') ? 'error' : '' }}">
                                <label class="control-label" for="name">Phone</label>
                                <div class="controls">
                                    <input class="span5"   type="text" id="phone" placeholder="Phone number" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="control-group {{ $errors->has('adress') ? 'error' : '' }}">
                                <label class="control-label" for="name">Adress</label>
                                <div class="controls">
                                    <input class="span5"   type="text" id="adress" placeholder="Adress" name="adress" value="{{ old('adress') }}">
                                    @if ($errors->has('adress'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('adress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="controls" style="text-align: center;">
                                <button type="submit" class="btn block">Create Your Account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="span3" style="text-align: center;">
                    <div class="well" style="margin-top: 20px;">
                        <h5>ALREADY REGISTERED ?</h5>
                        <h2><a href="{{ route('login') }}">Login</a></h2>
                    </div>
                </div>
        </div>






{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

                {{--<div class="panel-body">--}}


                    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
                        {{--{{ csrf_field() }}--}}



                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}






                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}






                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
