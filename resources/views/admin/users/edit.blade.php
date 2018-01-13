@extends('layouts.admin')

@section('title') Edit User @endsection


@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.users.edit', $user))


@section('content')
    <h1>Edit user</h1>

    <div class="row justify-content-center">

        <div class="col-sm-9">
            {!! Form::model($user, ['method'=>'PATCH','action' => ['Admin\AdminUsersController@update', $user->id]]) !!}
            <div class="form-group">
                {!! Form::label('email', 'Email *') !!}
                {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role *') !!}
                {!! Form::select('role_id', array(''=>'Choose Option') + $roles, null,  ['class' => $errors->has('role_id') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('role_id'))
                    <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
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
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-12']) !!}
            </div>

            {!! Form::close() !!}






            {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminUsersController@destroy', $user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-12']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection