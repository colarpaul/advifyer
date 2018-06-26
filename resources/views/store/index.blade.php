@extends('dashboard.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('index.packages')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content" id="store-content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

                <div class="container" id="store-container">
                    <div class="row">
                        @foreach($packages as $package)
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="panel price panel-contain">
                                    <div class="panel-heading  text-center">
                                        <h3>@lang('index.package') {{$package->name}}</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                        <p class="lead" style="font-size:40px">
                                            <strong>€{{number_format($package->price)}}
                                                <div class="month-pricing">@lang('index.month')</div>
                                            </strong></p>
                                    </div>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item"><i
                                                    class="icon-ok text-danger"></i>{{$package->max_codes}} Codes
                                        </li>
                                    </ul>
                                    <div class="panel-footer">
                                        <a class="btn btn-lg btn-block btn-danger"
                                           href="{{ route('buyPackage', $package->id) }}">@lang('index.choose')</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
        </section>
        <!-- /.content -->
    </div>
@endsection


