@extends('layouts.admin')

@section('title') Edit FAQ @endsection


@section('content')


    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Edit FAQ</h1>

            {!! Form::model($faq, ['method'=>'PATCH', 'action'=>['Admin\AdminFaqsController@update', $faq->id]]) !!}

            <div class="form-group">
                {!! Form::label('question', 'FAQ Question *') !!}
                {!! Form::text('question', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('answer', 'FAQ Answer *') !!}
                {!! Form::text('answer', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary btn-block']) !!}
            </div>

            {!! Form::close() !!}




            {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminFaqsController@destroy', $faq->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>






@endsection