@extends('layouts.admin')

@section('title') Create Product @endsection

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.products.create'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6 mt-4">

            <h1>Create product</h1>

            {!! Form::open(['method'=>'POST', 'action' => 'Admin\AdminProductsController@store','files'=>true]) !!}



            <div class= "form-group" >
                {!! Form::label('brand', 'Brand *') !!}
                {!! Form::text('brand', null, ['class' => $errors->has('brand') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('brand'))
                    {{--{{ dd($errors->all()) }}--}}
                    <div class="invalid-feedback">{{ $errors->first('brand') }}</div>
                @endif
            </div>

            <div class= "form-group" >
                {!! Form::label('model', 'Model *') !!}
                {!! Form::text('model', null, ['class' => $errors->has('model') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('model'))
                    <div class="invalid-feedback">{{ $errors->first('model') }}</div>
                @endif
            </div>


            <div class= "form-group" >
                {!! Form::label('price', 'Price *') !!}
                {!! Form::number('price', null, ['class' => $errors->has('price') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('price'))
                    <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                @endif
            </div>

            <div class= "form-group" >
                {!! Form::label('description', 'Description *') !!}
                {!! Form::textarea('description', null, ['rows'=>3, 'class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('description'))
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category *') !!}
                {!! Form::select('category_id', array(''=>'Choose Option') + $categories , null,  ['id'=>'my-category','class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('category_id'))
                    <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('subcategory_id', 'Subcategory *') !!}
                {!! Form::select('subcategory_id', array(''=>'Choose Option'), null,  ['id'=>'my-subcategory','class' => $errors->has('subcategory_id') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('subcategory_id'))
                    <div class="invalid-feedback">{{ $errors->first('subcategory_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('icon_id', 'Icon *') !!}
                {!! Form::file('icon_id', ['class' => $errors->has('photo_id') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('photo_id'))
                    <div class="invalid-feedback">{{ $errors->first('photo_id') }}</div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo *') !!}
                {!! Form::file('photo_id', ['class' => $errors->has('photo_id') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('photo_id'))
                    <div class="invalid-feedback">{{ $errors->first('photo_id') }}</div>
                @endif
            </div>


            <div class="form-group">
                {!! Form::label('released_on', 'Date of released *') !!}
                {!! Form::date('released_on', null, ['class' => $errors->has('released_on') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('released_on'))
                    <div class="invalid-feedback">{{ $errors->first('released_on') }}</div>
                @endif
            </div>


            <div class="form-group">
                {!! Form::token() !!}
                {!! Form::submit('Create Product', ['class'=>'btn btn-primary btn-block']) !!}
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection


@section('modal')


    <script>
        /**
         * Created by idgu on 10.12.2017.
         */

        function getSubcategories(categoryValue) {
            const subcategoriesSelect = document.querySelector('#my-subcategory');
            var xhr = new XMLHttpRequest();

            if (categoryValue !== '') {

                xhr.open('GET',  '{{ route('getSubcategories', null) }}' +'/' + categoryValue, true);

                xhr.onload = function() {
                    if (this.status == 200) {
                        subcategories = JSON.parse(this.responseText);
                        display = '<option value="" selected="selected">Choose Option</option>';
                        subcategories.forEach(function(subcategory) {
                            display += '<option value="'+ subcategory.id +'">' + subcategory.name +'</option>';
                        });

                        subcategoriesSelect.innerHTML = display;
                    }


                }
                xhr.send();
            } else {
                subcategoriesSelect.innerHTML = '<option value="" selected="selected">Choose Option</option>';
            }
        }



        document.addEventListener('DOMContentLoaded', function () {
            const category = document.querySelector('#my-category');

            getSubcategories(category.value);
            category.addEventListener('change', function () {
                getSubcategories(category.value);
            })
        });
    </script>



@endsection
