@extends('dashboard.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="col-md-5 my-table-head-padding">
            <div class="well well-sm">
                <form action="{{ route('sendMessage') }}" class="form-horizontal" method="POST">
                    <fieldset>
                        <legend class="text-center contact-header">@lang('index.contact')</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" required name="firstName" type="text" placeholder="@lang('index.firstName')"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" required name="lastName" type="text" placeholder="@lang('index.lastName')"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" required name="email" type="email" placeholder="@lang('index.email')"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" required name="phone" type="text" placeholder="@lang('index.phone')"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                        <textarea required class="form-control" id="message" name="message"
                                                  placeholder="@lang('index.contactMessage')."
                                                  rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="hidden" value="{{ Session::token() }}" name="_token">
                                <button type="submit" id="contact-button" class="advifyer-background-color btn btn-info btn-lg">@lang('index.submit')</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-7 my-table-head-padding">
            <div>
                <div class="panel panel-default">
                    <div class="text-center contact-header">Advifyer @lang('index.office')</div>
                    <div class="panel-body text-center">
                        <div>
                            666 Wow Street<br/>
                            Stuttgart, Germany<br/>
                            +(49) 15252602794<br/>
                            <i class="advifyer-color">hello@advifyer.com</i><br/>
                        </div>
                        <hr/>
                        <div id="map1" class="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection