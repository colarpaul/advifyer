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
                <form action="{{ route('updateCode2', $code->id) }}" class="form-horizontal" method="POST"
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
                        <div class="col-md-12 my-table-head-padding">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title advifyer-color">Additional Information</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <div class="col-md-12 box-body">
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-6">
                                            <div>
                                                <input type="checkbox" name="vegan"
                                                       @if($additionalInfo->vegan == 1) checked @endif>
                                                Vegan
                                            </div>
                                            <div>
                                                <input type="checkbox" name="lactose"
                                                       @if($additionalInfo->lactose == 1) checked @endif>
                                                Laktosefrei
                                            </div>
                                            <div>
                                                <input type="checkbox" name="gluten"
                                                       @if($additionalInfo->gluten == 1) checked @endif>
                                                Glutenfrei
                                            </div>
                                            <div>
                                                <input type="checkbox" name="pregnant_women"
                                                       @if($additionalInfo->pregnant_women == 1) checked @endif>
                                                geeignet fur Schwangere
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div>
                                                <input type="checkbox" name="bio"
                                                       @if($additionalInfo->bio == 1) checked @endif>
                                                BIO
                                            </div>
                                            <div>
                                                <input type="checkbox" name="prescription"
                                                       @if($additionalInfo->prescription == 1) checked @endif>
                                                Verschreibungspflichter
                                            </div>
                                            <div style="color: red">
                                                <input type="checkbox" name="adult"
                                                       @if($additionalInfo->adult == 1) checked @endif>
                                                FSK 18
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">PRODUKTIONSLAND / HERKUNFT</label>
                                            <input type="text" name="country" class="form-control"
                                                   value="{{ $additionalInfo->country }}"
                                                   placeholder="Produktionsland / Herkunft">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-6">
                                            <label>ERWEITERTE PRODUKTIONINFORMATIONEN</label>
                                            <textarea class="form-control" rows="5" name="description"
                                                      placeholder="Erweiterte Produktioninformationen">{{ $additionalInfo->description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>USP - MEHRWERT</label>
                                            <textarea class="form-control" name="usp"
                                                      rows="3"
                                                      placeholder="USP - Mehrwert">{{ $additionalInfo->usp }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">ERGANZENDE INHALTSSTOFFE</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control col-md-6"
                                                   name="supplementary_ingredients"
                                                   value="{{ $additionalInfo->supplementary_ingredients }}"
                                                   placeholder="Erganzende Inhaltsstoffe">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">NICOTIN</label>
                                            <input type="text" class="form-control" name="nicotin"
                                                   value="{{ $additionalInfo->nicotin }}"
                                                   placeholder="mg.">
                                        </div>
                                        <div class="form-group  col-md-3">
                                            <label for="exampleInputEmail1">ALKOHOL</label>
                                            <input type="text" class="form-control" name="alcohol"
                                                   value="{{ $additionalInfo->alcohol }}"
                                                   placeholder="%">
                                        </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                                    <button type="submit" class="btn btn-info pull-right advifyer-background-color">
                                        Back
                                    </button>
                                    <button type="submit" class="btn btn-info pull-right advifyer-background-color">
                                        @lang('index.save')
                                    </button>
                                </div>
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
