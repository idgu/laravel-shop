@extends('layouts.admin')

@section('title') Categories @endsection

@section('head')


    <style>

        .tree, .tree ul {
            margin:0;
            padding:0;
            list-style:none
        }
        .tree ul {
            margin-left:1em;
            position:relative
        }
        .tree ul ul {
            margin-left:.5em
        }
        .tree ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            border-left:1px solid
        }
        .tree li {
            margin:0;
            padding:0 1em;
            line-height:2em;
            color:#369;
            font-weight:700;
            position:relative
        }
        .tree ul li:before {
            content:"";
            display:block;
            width:10px;
            height:0;
            border-top:1px solid;
            margin-top:-1px;
            position:absolute;
            top:1em;
            left:0
        }
        .tree ul li:last-child:before {
            background:#fff;
            height:auto;
            top:1em;
            bottom:0
        }
        .indicator {
            margin-right:5px;
        }
        .tree li a {
            text-decoration: none;
            color:#369;
        }
        .tree li button, .tree li button:active, .tree li button:focus {
            text-decoration: none;
            color:#369;
            border:none;
            background:transparent;
            margin:0px 0px 0px 0px;
            padding:0px 0px 0px 0px;
            outline: 0;
        }


    </style>

@endsection




@section('breadcrumbs', Breadcrumbs::render('admin.dashboard.categories'))



@section('content')






<div class="row justify-content-center">
    @include('includes.flash_display')

    <div class="col-md-3">
                <h1 class="text-center">Create category</h1>
                {!! Form::open(['method'=>'POST', 'action'=>'Admin\AdminCategoriesController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create Category', ['class'=>'btn btn-block btn-primary']) !!}
                </div>

                {!! Form::close() !!}
    </div>

    <div class="col-md-3 offset-md-1">
        <h1 class="text-center">Create subcategory</h1>
        {!! Form::open(['method'=>'POST', 'action'=>'Admin\AdminSubcategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category *') !!}
            {!! Form::select('category_id', array(''=>'Choose Option') + $categoriesPluck , null,  ['id'=>'my-category','class' => 'form-control']) !!}
            @if ($errors->has('category_id'))
                <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Create Subcategory', ['class'=>'btn btn-block btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>



    <div class="col-md-3 offset-md-1">


        <div class="tree">
            <h1>Categories Tree</h1>
            @if($categories)
            <ul id="tree1">
                @foreach($categories as $category)
                    <li><a href="#">{{ $category->name }}</a>
                        @if(count($category->subcategories))
                            <ul>
                            @foreach($category->subcategories as $subcategory)
                            <li>
                                <a class="ml-1" href="{{ route('admin.subcategories.edit', $subcategory->id) }}" title="Edit subcategory"><button class="text-dark btn right d-inline-block"><i class="fa fa-edit fa-lg"></i></button></a>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminSubcategoriesController@destroy', $subcategory->id], 'class'=>'delete-form d-inline']) !!}
                                <button type="submit" title="Delete subcategory" class="ml-1 my-delete-button btn-small d-inline-block"><i class="fa fa-lg fa-trash-o"></i></button>
                                {!! Form::close() !!}
                                <span class="ml-2">{{ $subcategory->name }}</span>
                            </li>
                            @endforeach
                            </ul>
                        @endif
                    </li>

                @endforeach
            </ul>
            @endif
        </div>

    </div>

</div>

    <div class="row">
        <div class="col-lg-12">










            <div class="card mb-3 mt-5">
                <div class="card-header">
                    <i class="fa fa-table"></i> Categories list</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Updated at</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Updated at</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>



                            <tbody>
                            @if($categories)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>
                                            <a class="ml-1 " href="{{ route('admin.categories.edit', $category->id) }}" title="Edit category"><button class="btn btn-warning right d-inline-block"><i class="fa fa-edit fa-lg"></i></button></a>
                                            {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminCategoriesController@destroy', $category->id], 'class'=>'delete-form d-inline']) !!}
                                            <button type="submit" title="Delete category" class="ml-1 my-delete-button btn btn-danger btn-small d-inline-block"><i class="fa fa-lg fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>



                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>




        </div>
    </div>

@endsection


@section('modal')
    <!-- Delete User Modal-->
    <!-- Delete User Modal-->
    <a class="nav-link" data-toggle="modal" data-target="#deleteModal" style="display: none" id="my-modal-button">
        <i class="fa fa-fw fa-power-off"></i>Logout
    </a>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Ready to do this?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "OK" below if you are ready to do chosen action.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="my-modal-button-delete" class="btn btn-danger">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete User Modal-->


    <!-- END Delete User Confirmation Modal-->



    <script>

        document.addEventListener('DOMContentLoaded', function(){

            const buttons = document.querySelectorAll('.my-delete-button');
            const modal = document.querySelector('#deleteModal')

            const modalButton = document.querySelector('#my-modal-button');
            const modalButtonDelete = document.querySelector('#my-modal-button-delete');

            const count = buttons.length;

            let form;

            for(let i=0; i<count; i++) {


                buttons[i].addEventListener('click', function(e) {
                    e.preventDefault();
                    form = buttons[i].parentElement;
                    console.log(form);
                    modalButton.click();
                });

            }


            modalButtonDelete.addEventListener('click', function(){
                form.submit();
            })




        });

    </script>




    <script>
        $.fn.extend({
            treed: function (o) {

                var openedClass = 'fa fa-minus';
                var closedClass = 'fa fa-plus';

                if (typeof o != 'undefined'){
                    if (typeof o.openedClass != 'undefined'){
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined'){
                        closedClass = o.closedClass;
                    }
                };

                //initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });
                //fire event from the dynamically added icon
                tree.find('.branch .indicator').each(function(){
                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
                //fire event to open branch if the li contains an anchor instead of text
                tree.find('.branch>a').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                //fire event to open branch if the li contains a button instead of text
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            },
            generateItem: function(){
                var li = $('<li>');
            },
            generateTree: function(){
                var tree = $(this);

            }
        });

        //Initialization of treeviews

        $('#tree1').treed();
    </script>
@endsection