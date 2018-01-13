@extends('layouts.admin')

@section('title') Edit Product @endsection

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.products.edit', $product))

@section('content')

    <h1>Edit product</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="row">



                <div class="col-lg-4">
                    <h4>Icon</h4>
                    <div class="row">
                        @if($product->photo)
                            <img src="{{url('/')}}{{$product->icon->file}}" alt="" class="border rounded" style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                    <h4>Photo</h4>
                    <div class="row">
                        @if($product->photo)
                            <img src="{{url('/')}}{{$product->photo->file}}" alt="" class="border rounded" style="max-width: 200px; max-height: 200px;">
                        @endif
                    </div>
                </div>


                <div class="col-lg-8">
                    {!! Form::model($product, ['method'=>'PATCH','action' => ['Admin\AdminProductsController@update', $product->id], 'files' => true]) !!}
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
                        {!! Form::label('icon_id', 'Icon') !!}
                        {!! Form::file('icon_id', ['class' => $errors->has('icon_id') ? 'form-control is-invalid' : 'form-control']) !!}
                        @if ($errors->has('icon_id'))
                            <div class="invalid-feedback">{{ $errors->first('icon_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo_id', 'Photo') !!}
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
                        {!! Form::submit('Update Product', ['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminProductsController@destroy', $product->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Product', ['class'=>'btn btn-danger btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>


            </div>
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

                        if(window.first) {
                            let subcategoriesSelect = document.querySelector('#my-subcategory');
                            let options  = subcategoriesSelect.options;

                            for(var i=0, len = options.length; i < len; i++) {
                                if(options[i].value == {{ $product->subcategory_id }}) {
                                    options[i].selected = 'selected';
                                }
                            }

                            window.first = false;
                        }
                    }


                }
                xhr.send();
            } else {
                subcategoriesSelect.innerHTML = '<option value="" selected="selected">Choose Option</option>';
            }
        }



        document.addEventListener('DOMContentLoaded', function () {
            const category = document.querySelector('#my-category');
            window.first = true;
            getSubcategories(category.value);



            category.addEventListener('change', function () {
                getSubcategories(category.value);
            })
        });
    </script>



@endsection