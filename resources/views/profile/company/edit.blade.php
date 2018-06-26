@extends('dashboard.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Horizontal Form -->
        <form action="{{ route('saveCompanyProfile') }}" class="form-horizontal" method="POST"
              enctype="multipart/form-data">
            <div class="col-md-6 my-table-head-padding">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title advifyer-color">@lang('index.companyInfo')</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <input type="text" name="companyName" class="form-control" placeholder="@lang('index.companyName')"
                                   value="{{ $company->name }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <select class="form-control" name="legalForm">
                                <option value="" @if ($company->legal_form == "") selected @endif>@lang('index.legalForm')</option>
                                <option value="gmbh" @if ($company->legal_form == "gmbh") selected @endif>GmbH</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow advifyer-color"></i></span>
                            <input type="text" name="street" class="form-control" placeholder="@lang('index.street')"
                                   value="{{ $company->street }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow advifyer-color"></i></span>
                            <input type="text" name="streetNumber" class="form-control" placeholder="@lang('index.number')"
                                   value="{{ $company->street_number }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow advifyer-color"></i></span>
                            <input type="text" name="zip" class="form-control" placeholder="@lang('index.zip')"
                                   value="{{ $company->zip }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow advifyer-color"></i></span>
                            <input type="text" name="city" class="form-control" placeholder="@lang('index.city')"
                                   value="{{ $company->city }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <select class="form-control" name="country">
                                <option value="" @if ($company->country == "") selected @endif>@lang('index.country')</option>
                                <option value="germany" @if ($company->country == "germany") selected @endif>Germany
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-camera advifyer-color"></i></span>
                            <input type="file" name="companyAvatar" class="form-control">
                        </div>
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-header with-border">
                        <h3 class="box-title advifyer-color">@lang('index.companyContact')</h3>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope advifyer-color"></i></span>
                            <input type="text" name="companyEmail" class="form-control" placeholder="@lang('index.email')"
                                   value="{{ $company->email }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone advifyer-color"></i></span>
                            <input type="text" name="companyPhone" class="form-control" placeholder="@lang('index.phone')"
                                   value="{{ $company->phone }}">
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title advifyer-color">@lang('index.taxIdentification')</h3>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-text advifyer-color"></i></span>
                            <input disabled type="text" name="taxId" class="form-control"
                                   value="{{ $company->tax_id }}">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <button type="submit" class="btn btn-info pull-right advifyer-background-color">@lang('index.save')
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-table-head-padding">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title advifyer-color">@lang('index.personContact')</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('saveUserProfile') }}" class="form-horizontal" method="POST"
                          enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="input-group">
                                <select class="form-control" name="salutation">
                                    <option value="" @if ($user->salutation == "") selected @endif>@lang('index.salutation')</option>
                                    <option value="herr" @if ($user->salutation == "herr") selected @endif>Herr</option>
                                    <option value="frau" @if ($user->salutation == "frau") selected @endif>Frau</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                                <input type="text" name="firstName" class="form-control" placeholder="@lang('index.firstName')"
                                       value="{{ $user->first_name }}">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                                <input type="text" name="lastName" class="form-control" placeholder="@lang('index.lastName')"
                                       value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope advifyer-color"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="@lang('index.email')"
                                       value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone advifyer-color"></i></span>
                                <input type="text" name="phone" class="form-control" placeholder="@lang('index.phone')"
                                       value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-camera advifyer-color"></i></span>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        </div>
                        <!-- /.box-footer -->
                </div>
            </div>
        </form>
    </div>
@endsection


