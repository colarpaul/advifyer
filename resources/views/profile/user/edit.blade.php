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
                    <h3 class="box-title advifyer-color">Ansprechpartner</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('saveUserProfile') }}" class="form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="input-group">
                            <select class="form-control" name="salutation">
                                <option value="" @if ($user->salutation == "") selected @endif>Anrede</option>
                                <option value="herr" @if ($user->salutation == "herr") selected @endif>Herr</option>
                                <option value="frau" @if ($user->salutation == "frau") selected @endif>Frau</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <input type="text" name="firstName" class="form-control" placeholder="Vorname"
                                   value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <input type="text" name="lastName" class="form-control" placeholder="Nachname"
                                   value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope advifyer-color"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="EMail"
                                   value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone advifyer-color"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="Rufnummer"
                                   value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone advifyer-color"></i></span>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <button type="submit"
                                class="btn btn-info pull-right advifyer-background-color">@lang('index.save')
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection


