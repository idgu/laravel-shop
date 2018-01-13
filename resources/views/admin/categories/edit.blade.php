@extends('layouts.admin')

@section('title') Edit Category @endsection


@section('content')


    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Edit Category</h1>

            {!! Form::model($category, ['method'=>'PATCH', 'action'=>['Admin\AdminCategoriesController@update', $category->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Category Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary btn-block']) !!}
            </div>

            {!! Form::close() !!}




            {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminCategoriesController@destroy', $category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>






@endsection