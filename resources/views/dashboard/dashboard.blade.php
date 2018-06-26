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
                Dashboard
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-advifyer">
                        <div class="inner">
                            <h3>{{ $package->name }} <i style="font-size: 18px;">@if($package->max_codes === null)
                                        Unlimited @else {{ $package->max_codes }} @endif @lang('index.codes')</i></h3>
                            <p>@lang('index.package')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-advifyer">
                        <div class="inner">
                            <h3>{{ $totalCodes }} <i style="font-size: 18px;">@if($totalCodes == 1)
                                        @lang('index.code') @else @lang('index.codes') @endif </i></h3>
                            <p>@lang('index.totalCodes')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-advifyer">
                        <div class="inner">
                            <h3>@if($totalPossibleCodes - $totalCodes <= 0)
                                    0 @else {{ $totalPossibleCodes - $totalCodes }} @endif <i
                                        style="font-size: 18px;">@if($totalPossibleCodes - $totalCodes == 1)
                                        @lang('index.code') @else @lang('index.codes') @endif </i></h3>
                            <p>@lang('index.codesLeft')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-advifyer">
                        <div class="inner">
                            <h3>{{ $totalProducts }} <i style="font-size: 18px;">@if($totalProducts == 1)
                                        @lang('index.product') @else @lang('index.products') @endif </i></h3>
                            <p>@lang('index.totalProducts')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
        </section>
        <!-- /.content -->
    </div>
@endsection


