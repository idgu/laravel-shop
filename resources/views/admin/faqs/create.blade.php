@extends('layouts.admin')

@section('title') Create FAQ @endsection

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.faqs.create'))


@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6 mt-4">

            <h1>Create question</h1>

            {!! Form::open(['method'=>'POST', 'action' => 'Admin\AdminFaqsController@store']) !!}



            <div class= "form-group" >
                {!! Form::label('question', 'Question *') !!}
                {!! Form::text('question', null, ['class' => $errors->has('question') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('question'))
                    <div class="invalid-feedback">{{ $errors->first('question') }}</div>
                @endif
            </div>

            <div class= "form-group" >
                {!! Form::label('answer', 'Answer *') !!}
                {!! Form::textarea('answer', null, ['rows'=>3, 'class' => $errors->has('answer') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('answer'))
                    <div class="invalid-feedback">{{ $errors->first('answer') }}</div>
                @endif
            </div>



            <div class="form-group">
                {!! Form::token() !!}
                {!! Form::submit('Create FAQ', ['class'=>'btn btn-primary btn-block']) !!}
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection

