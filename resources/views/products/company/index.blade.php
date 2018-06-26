@extends('dashboard.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Horizontal Form -->
        <div class="col-md-6 my-table-head-padding">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('index.products'): <b>{{ $totalProducts }}</b></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('addProduct') }}" class="form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-plus advifyer-color"></i></span>
                            <input type="text" required name="productName" class="form-control" placeholder="@lang('index.productName')">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money advifyer-color"></i></span>
                            <input type="number" step="any" required name="productPrice" class="form-control" placeholder="@lang('index.productPrice')">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <select class="form-control" name="categoryName">
                                <option value="">@lang('index.category')</option>
                                <option value="Schokolade">Schokolade</option>
                                <option value="Obst">Obst</option>
                                <option value="Kleider">Kleider</option>
                                <option value="Traenke">Tränke</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <button type="submit" class="btn btn-info pull-right advifyer-background-color">@lang('index.save')
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <div class="col-md-12 my-table-head-padding">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Unternehmen: <b>{{ $company->name }}</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('index.name')</th>
                            <th>@lang('index.category')</th>
                            <th>@lang('index.price') (€)</th>
                            <th>@lang('index.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><input data-product="{{ $product->id }}" value="{{ $product->name }}" disabled class="product-input-field"></td>
                                <td><input data-category="{{ $product->id }}" value="@if(!($product->category === null)){{ $product->category }} @else - @endif" disabled class="product-input-field"></td>
                                <td><input data-price="{{ $product->id }}" value="{{ $product->price }}" disabled class="product-input-field"></td>
                                <td class="text-center">
                                    <a onClick="return confirm('Sind Sie sicher, dass Sie das Produkt {{ $product->name }} löschen möchten')" href="{{ route('deleteProduct', $product->id) }}"><i class="fa fa-trash red-color trash-delete-icon" aria-hidden="true"></i></a>
                                    <i class="fa fa-pencil green-color pencil-edit-icon" data-product="{{ $product->id }}" aria-hidden="true"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>@lang('index.name')</th>
                            <th>@lang('index.category')</th>
                            <th>@lang('index.price') (€)</th>
                            <th>@lang('index.action')</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <input type="hidden" id="editProductToken" name="_token" value="{{ Session::token() }}">
        </div>
    </div>
@endsection


<thead>
