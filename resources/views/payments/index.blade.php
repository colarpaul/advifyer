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
                            <th>@lang('index.package')</th>
                            <th>@lang('index.price') (€)</th>
                            <th>@lang('index.transactionDate')</th>
                            <th>@lang('index.download')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{ $packages[$payment->package_id]->name }}</td>
                                <td>{{ number_format($packages[$payment->package_id]->price) }}</td>
                                <td>{{ $payment->created_at->format('d M Y') }}</td>
                                <td><a target="_blank" href="{{ route('downloadPDF', $payment->id) }}"><img class="pdf-image" src="{{ asset('images/pdf.png') }}"></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>@lang('index.package')</th>
                            <th>@lang('index.price') (€)</th>
                            <th>@lang('index.transactionDate')</th>
                            <th>@lang('index.download')</th>
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
