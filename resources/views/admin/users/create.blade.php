@extends('layouts.admin')

@section('title') Create User @endsection

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.users.create'))


@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6 mt-4">

            <h1>Create user</h1>

            {!! Form::open(['action' => 'Admin\AdminUsersController@store']) !!}


            <div class="form-group">
                {!! Form::label('email', 'Email *') !!}
                {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role *') !!}
                {!! Form::select('role_id', array(''=>'Choose Option') + $roles, 1,  ['class' => $errors->has('role_id') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('role_id'))
                    <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password *') !!}
                {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class= "form-group" >
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('surname', 'Surname') !!}
                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', 'Phone') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('date_of_birth', 'Date of birth') !!}
                {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::token() !!}
                {!! Form::submit('Create User', ['class'=>'btn brn-primary btn-block']) !!}
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection

