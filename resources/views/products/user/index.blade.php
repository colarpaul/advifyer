@extends('dashboard.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Horizontal Form -->
        <div class="col-md-12 my-table-head-padding">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">@lang('index.company'): <b>{{ $company->name }}</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('index.name')</th>
                            <th>@lang('index.category')</th>
                            <th>@lang('index.price') (€)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>@lang('index.name')</th>
                            <th>@lang('index.category')</th>
                            <th>@lang('index.price') (€)</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection


<thead>
