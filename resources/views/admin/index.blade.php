@extends('layouts.admin')

@section('title') Dashboard @endsection

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard'))


@section('content')


    <!-- Icon Cards-->

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">{{ $users_count }} Users!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.users.index')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-television"></i>
                    </div>
                    <div class="mr-5">{{ $products_count }} Products!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.products.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{{ $categories_count }} Categories!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.categories.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">{{ $orders_count }} Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('admin.orders.index') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
    </div>

    <!-- END Icon Cards-->






    {{--<div class="card mb-3">--}}
                {{--<div class="card-header">--}}
                    {{--<i class="fa fa-area-chart"></i> Area Chart Example</div>--}}
                {{--<div class="card-body">--}}
                    {{--<canvas id="myAreaChart" width="100%" height="30"></canvas>--}}
                {{--</div>--}}
                {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
    {{--</div>--}}





    <div class="row">
        <div class="col-lg-8">

            <!-- Example Notifications Card-->
            {{--<div class="card mb-3">--}}
                {{--<div class="card-header">--}}
                    {{--<i class="fa fa-bell-o"></i> Feed Example</div>--}}
                {{--<div class="list-group list-group-flush small">--}}
                    {{--<a class="list-group-item list-group-item-action" href="#">--}}
                        {{--<div class="media">--}}
                            {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">--}}
                            {{--<div class="media-body">--}}
                                {{--<strong>David Miller</strong>posted a new article to--}}
                                {{--<strong>David Miller Website</strong>.--}}
                                {{--<div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="list-group-item list-group-item-action" href="#">--}}
                        {{--<div class="media">--}}
                            {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">--}}
                            {{--<div class="media-body">--}}
                                {{--<strong>Samantha King</strong>sent you a new message!--}}
                                {{--<div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="list-group-item list-group-item-action" href="#">--}}
                        {{--<div class="media">--}}
                            {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">--}}
                            {{--<div class="media-body">--}}
                                {{--<strong>Jeffery Wellings</strong>added a new photo to the album--}}
                                {{--<strong>Beach</strong>.--}}
                                {{--<div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="list-group-item list-group-item-action" href="#">--}}
                        {{--<div class="media">--}}
                            {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">--}}
                            {{--<div class="media-body">--}}
                                {{--<i class="fa fa-code-fork"></i>--}}
                                {{--<strong>Monica Dennis</strong>forked the--}}
                                {{--<strong>startbootstrap-sb-admin</strong>repository on--}}
                                {{--<strong>GitHub</strong>.--}}
                                {{--<div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    {{--<a class="list-group-item list-group-item-action" href="#">View all activity...</a>--}}
                {{--</div>--}}
                {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
            {{--</div>--}}
            {{--<!-- END Example Notifications Card-->--}}



        {{--</div>--}}




        {{--<div class="col-lg-4">--}}
            {{--<div class="card mb-3">--}}
                {{--<div class="card-header">--}}
                    {{--<i class="fa fa-pie-chart"></i> Pie Chart Example</div>--}}
                {{--<div class="card-body">--}}
                    {{--<canvas id="myPieChart" width="100%" height="100"></canvas>--}}
                {{--</div>--}}
                {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>

@endsection