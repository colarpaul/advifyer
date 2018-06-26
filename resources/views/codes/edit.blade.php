@extends('dashboard.header')

@section('title')
    Advifyer ®
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="col-md-8 my-table-head-padding">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title advifyer-color">@lang('index.editEAN')</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('updateCode', $code->id) }}" class="form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    <div class="col-md-6 box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <input type="text" name="code" class="form-control" placeholder="EAN Code" maxlength="13"
                                   value="{{ $code->code_id }}">
                        </div>
                    </div>
                    <div class="col-md-6 box-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil advifyer-color"></i></span>
                            <select class="form-control" required name="productId">
                                @foreach($products as $product)
                                    @if($product->id == $code->product_id)
                                        <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                                    @else
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="edit-codes-container">
                        <div class="col-md-8 my-table-head-padding">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title advifyer-color">@lang('index.interface')</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <div class="col-md-12 box-body">
                                    <div class="box box-info-navside-color">
                                        <div class="box-header with-border border-bottom-buttons">
                                            <div id="button-drop-container">
                                                <div id="button-drop-box-1"
                                                     @if($button1url != '') class="ui-state-highlight"
                                                        @endif>

                                                    @if($button1url != '')
                                                        <div class="input-group buttons-link ui-widget-content"
                                                             data-name="{{ $button1icon }}" id="drag-button-1">
                                                            <img class="button-icons"
                                                                 src="{{asset('images/button_icons/'.$button1icon.'.svg')}}">
                                                        </div>
                                                    @endif

                                                </div>
                                                <input id="firstButton" name="button[]"
                                                       @if($button1url != '') value="{{ $button1icon }}"
                                                       @endif type="hidden">
                                                <div id="button-drop-box-2"
                                                     @if($button2url != '') class="ui-state-highlight"
                                                        @endif>

                                                    @if($button2url != '')
                                                        <div class="input-group buttons-link ui-widget-content"
                                                             data-name="{{ $button2icon }}" id="drag-button-2">
                                                            <img class="button-icons"
                                                                 src="{{asset('images/button_icons/'.$button2icon.'.svg')}}">
                                                        </div>
                                                    @endif

                                                </div>
                                                <input id="secondButton" name="button[]"
                                                       @if($button2url != '') value="{{ $button2icon }}"
                                                       @endif type="hidden">
                                                <div id="button-drop-box-3"
                                                     @if($button3url != '') class="ui-state-highlight"
                                                        @endif>

                                                    @if($button3url != '')
                                                        <div class="input-group buttons-link ui-widget-content"
                                                             data-name="{{ $button3icon }}" id="drag-button-3">
                                                            <img class="button-icons"
                                                                 src="{{asset('images/button_icons/'.$button3icon.'.svg')}}">
                                                        </div>
                                                    @endif

                                                </div>
                                                <input id="thirdButton" name="button[]"
                                                       @if($button3url != '') value="{{ $button3icon }}"
                                                       @endif type="hidden">
                                                <div id="button-drop-box-4"
                                                     @if($button4url != '') class="ui-state-highlight"
                                                        @endif>

                                                    @if($button4url != '')
                                                        <div class="input-group buttons-link ui-widget-content"
                                                             data-name="{{ $button4icon }}" id="drag-button-4">
                                                            <img class="button-icons"
                                                                 src="{{asset('images/button_icons/'.$button4icon.'.svg')}}">
                                                        </div>
                                                    @endif

                                                </div>
                                                <input id="fourthButton" name="button[]"
                                                       @if($button4url != '') value="{{ $button4icon }}"
                                                       @endif type="hidden">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i id="firstURLInfo">@if($button1url != '') <img
                                                        src="{{asset('images/button_icons/'.$button1icon.'.png')}}"> @endif</i></span>
                                        <input type="text" required name="url[]" class="firstButtonURLInfo form-control"
                                               placeholder="URL"
                                               @if($button1url != '') value="{{ $button1url }}" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-left"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" name="urlInfo[]" class="firstButtonURLInfo form-control"
                                               placeholder="@lang('index.urlDescription')"
                                               @if($button1url != '') value="" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i id="secondURLInfo">@if($button2url != '')
                                                    <img
                                                            src="{{asset('images/button_icons/'.$button2icon.'.png')}}"> @endif</i></span>
                                        <input type="text" required name="url[]"
                                               class="secondButtonURLInfo form-control"
                                               placeholder="URL"
                                               @if($button2url != '') value="{{ $button2url }}" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-left"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" name="urlInfo[]" class="secondButtonURLInfo form-control"
                                               placeholder="@lang('index.urlDescription')"
                                               @if($button2url != '') value="" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i id="thirdURLInfo">@if($button3url != '') <img
                                                        src="{{asset('images/button_icons/'.$button3icon.'.png')}}"> @endif</i></span>
                                        <input type="text" required name="url[]" class="thirdButtonURLInfo form-control"
                                               placeholder="URL"
                                               @if($button3url != '') value="{{ $button3url }}" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-left"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" name="urlInfo[]" class="thirdButtonURLInfo form-control"
                                               placeholder="@lang('index.urlDescription')"
                                               @if($button3url != '') value="" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i id="fourthURLInfo">@if($button4url != '')
                                                    <img src="{{asset('images/button_icons/'.$button4icon.'.png')}}"> @endif</i></span>
                                        <input type="text" required name="url[]"
                                               class="fourthButtonURLInfo form-control"
                                               placeholder="URL"
                                               @if($button4url != '') value="{{ $button4url }}" @else disabled @endif>
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-arrow-left"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" name="urlInfo[]" class="fourthButtonURLInfo form-control"
                                               placeholder="@lang('index.urlDescription')"
                                               @if($button4url != '') value="" @else disabled @endif>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                    <button type="submit" class="btn btn-info pull-right advifyer-background-color">
                                        @lang('index.next')
                                    </button>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </div>
                        <div class="col-md-4 my-table-head-padding">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title advifyer-color">@lang('index.buttonsAvailable')</h3>
                                </div>
                                @if( Request::is('editCode') )
                                    asd
                                @endif
                                <div class="col-md-6 box-body">
                                    <div class="input-group buttons-link ui-widget-content" data-name="web"
                                         id="drag-button-1"><img
                                                class="button-icons"
                                                src="{{ asset('images/button_icons/web.svg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group buttons-link ui-widget-content" data-name="facebook"
                                         id="drag-button-2"><img
                                                class="button-icons"
                                                src="{{ asset('images/button_icons/facebook.svg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group buttons-link ui-widget-content" data-name="info"
                                         id="drag-button-3"><img
                                                class="button-icons"
                                                src="{{ asset('images/button_icons/info.svg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group buttons-link ui-widget-content" data-name="manual"
                                         id="drag-button-4"><img
                                                class="button-icons"
                                                src="{{ asset('images/button_icons/manual.svg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group buttons-link ui-widget-content" data-name="download"
                                         id="drag-button-5"><img
                                                class="button-icons"
                                                src="{{ asset('images/button_icons/download.svg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 box-body">
                                    <div class="input-group buttons-link ui-widget-content" data-name="youtube"
                                         id="drag-button-6"><img
                                                class="button-icons"
                                                src="{{ asset('images/button_icons/youtube.svg') }}"></div>
                                </div>
                                @for($i=0; $i<12; $i++)
                                    <div class="col-md-6 box-body">
                                        <div class="input-group buttons-link button-link-soon">?</div>
                                    </div>
                            @endfor
                            <!-- /.box-footer -->
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
