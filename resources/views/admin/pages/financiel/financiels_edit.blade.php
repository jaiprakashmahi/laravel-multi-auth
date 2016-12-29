@extends('admin.layouts.master')
@section('title', 'Edit Financial')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Financial
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(['route' =>['admin.financial-years.update',$financial_details->id],'method'=>'PUT','autocomplete'=>"off"]) !!}


                    {!! csrf_field() !!}


                    <div class="col-xs-6">
                        @if ($errors->has('years_from'))
                        <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('years_from')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('years_from') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select From Year</label>
                                <select class="form-control" name="years_from">
                                    <option>--Select From Year--</option>
                                    @for($x=date('Y');$x>2000; $x--);
                                    <option value="{{$x}}" @if(($financial_details->years_from)==$x){{'selected'}}@endif>{{$x}}</option>
                                    @endfor
                                </select>


                            </div>
                        </div>

                    </div>

                    <div class="col-xs-6">
                        @if ($errors->has('years_to'))
                        <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('years_to')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('years_to') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select To Year</label>
                                <select class="form-control" name="years_to">
                                    <option>--Select To Year--</option>
                                    @for($xto=(date('Y'));$xto>2000; $xto--)
                                    <option value="{{$xto}}" @if(($financial_details->years_to)==$xto){{'selected'}}@endif>{{$xto}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-6">
                        @if ($errors->has('start_month'))
                        <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('start_month')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('start_month') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Start Month</label>

                                <select class="form-control" name="start_month">
                                    <option>--Select Start Month--</option>
                                    @for($ms=12;$ms>=1; $ms--);
                                    <option value="{{$ms}}" @if(($financial_details->start_month)==$ms){{'selected'}}@endif>{{$ms}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-6">
                        @if ($errors->has('end_month'))
                        <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('end_month')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('end_month') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select End Month</label>

                                <select class="form-control" name="end_month">
                                    <option>--Select End Month--</option>
                                    @for($me=12;$me>=1; $me--);
                                    <option value="{{$me}}" @if(($financial_details->end_month)==$me){{'selected'}}@endif>{{$me}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="exampleSelect1">Status</label>
                            {{ Form::select('status', [
                            '1' => 'Active',
                            '0' => 'InActive'], $financial_details->status, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-xs-12">
                        {!! Form::submit('Submit', [
                        'class' => 'btn btn-primary'
                        ]) !!}

                        <a href="{{ URL::route('admin.financial-years.index') }}" class="btn btn-default"> Back</a>

                        {!! Form::close() !!}
                    </div>
                </div>
                <!--                   view all data-->
                <!--                   view all data-->
                <div style="margin: 10px 15px 10px 8px;"> @include('admin.pages.financiel.financiels_view')</div>

            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection