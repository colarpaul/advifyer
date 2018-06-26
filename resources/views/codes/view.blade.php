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
                @if(count($errors)> 0)
                    <div class="error-code-container">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="box-header with-border">
                    <h3 class="box-title">Codes: <b>{{ $totalCodes }}</b></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('createCode') }}" class="form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <input type="input" @if($totalPossibleCodes == 0) disabled @endif id="viewCodes-codeIdField"
                                   required name="code" class="form-control" placeholder="EAN Code"
                                   minlength="13" maxlength="13">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <select class="form-control" @if($totalPossibleCodes == 0) disabled @endif required
                                    name="codeType" id="viewCodes-codeTypeField">
                                <option value="1" selected>EAN 13</option>
                                <option value="2">EAN 8</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <select class="form-control" @if($totalPossibleCodes == 0) disabled @endif required
                                    name="productId">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <button type="submit" @if($totalPossibleCodes == 0) disabled
                                @endif class="btn btn-info pull-right advifyer-background-color">@lang('index.next')
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
                            <th>@lang('index.code')</th>
                            <th>@lang('index.type')</th>
                            <th>@lang('index.assignedProduct')</th>
                            <th>@lang('index.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($codes as $code)
                            <tr>
                                <td>{{ $code->code_id }}</td>
                                <td>@if($code->type == 1) EAN 13 @else EAN 8 @endif</td>
                                @foreach ($products as $product)
                                    @if($product->id == $code->product_id)
                                        <td>{{ $product->name }}</td>
                                        @continue
                                    @endif
                                @endforeach
                                <td class="text-center">
                                    <a onClick="return confirm('Sind Sie sicher, dass Sie das Code: {{ $code->code_id }} löschen möchten')"
                                       href="{{ route('deleteCode', $code->id) }}"><i
                                                class="fa fa-trash red-color trash-delete-icon" aria-hidden="true"></i></a>

                                    <a href="{{ route('editCode', $code->id) }}"><i class="fa fa-pencil green-color pencil-edit-icon" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>@lang('index.code')</th>
                            <th>@lang('index.type')</th>
                            <th>@lang('index.assignedProduct')</th>
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
