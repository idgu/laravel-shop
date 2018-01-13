@extends('layouts.app')

@section('content')






    <div class="row">
        <div class="span6">
            <div class="well">
                <h3 style="text-align: center;">LOGIN</h3><br/>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
                        <label class="control-label" for="email">Email adress</label>
                        <div class="controls">
                            <input class="span5"   type="text" id="email" placeholder="Name" name="email" value="{{ old('email') }}">
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
                        <label class="control-label" for="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>



                    <div class="controls">
                        <button type="submit" class="btn block">Sign in your account</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="span3" style="text-align: center;">
            <div class="well" style="margin-top: 20px;">
                <h5>NOT REGISTERED YET?</h5>
                <h2><a href="{{ route('register') }}">Register</a></h2>
            </div>
        </div>
    </div>

@endsection
