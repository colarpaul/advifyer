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
                    <h3 class="box-title advifyer-color">@lang('index.addEAN')</h3>
                </div>
                @if(count($errors)> 0)
                    <div class="error-code-container">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
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
                            <select @if($totalPossibleCodes == 0) disabled @endif class="form-control" required
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

        <div class="col-md-6 my-table-head-padding">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title advifyer-color">@lang('index.buttonsPreview')</h3>
                </div>

                <div class="box-body">
                    <div class="input-group">
                        <select id="buttonsOption" class="form-control" name="buttons">
                            <option value="1_button" selected>1 Button</option>
                            <option value="2_buttons">2 Buttons</option>
                            <option value="3_buttons">3 Buttons</option>
                            <option value="4_buttons">4 Buttons</option>
                        </select>
                    </div>

                    <div class="col-md-6 my-table-head-padding">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title advifyer-color">Mobile</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="1_button buttonsType">
                                <img src="{{ asset('images/buttons/1_button.png') }}">
                            </div>
                            <div class="2_buttons buttonsType hide-me">
                                <img src="{{ asset('images/buttons/2_buttons.png') }}">
                            </div>
                            <div class="3_buttons buttonsType hide-me">
                                <img src="{{ asset('images/buttons/3_buttons.png') }}">
                            </div>
                            <div class="4_buttons buttonsType hide-me">
                                <img src="{{ asset('images/buttons/4_buttons.png') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 my-table-head-padding">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title advifyer-color">WEB App</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="1_button slider buttonsType">
                                <div class="slide_viewer">
                                    <div class="slide_group">
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/1button_1.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/1button_2.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/1button_3.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/1button_4.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider 2_buttons buttonsType hide-me">
                                <div class="slide_viewer">
                                    <div class="slide_group">
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/2buttons_1.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/2buttons_2.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/2buttons_3.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/2buttons_4.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/2buttons_5.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/2buttons_6.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider 3_buttons buttonsType hide-me">
                                <div class="slide_viewer">
                                    <div class="slide_group">
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/3buttons_1.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/3buttons_2.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/3buttons_3.png') }}">
                                        </div>
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/3buttons_4.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider 4_buttons buttonsType hide-me">
                                <div class="slide_viewer">
                                    <div class="slide_group">
                                        <div class="slide">
                                            <img src="{{ asset('images/slider/4buttons_1.png') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            </div>
        </div>
    </div>
@endsection


