@extends('admin.layouts.master')
@section('title', 'Admin Financial')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Add New Financial
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        {!! Form::open(array('route' => 'admin.financial-years.store' , 'method'=>'POST','autocomplete'=>"off")) !!}
                        {!! csrf_field() !!}


                        <div class="col-xs-6">
                        @if ($errors->has('years_from'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('years_from')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('years_from') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select From Year</label>

                                <?php $year=[" " =>"Select From year"];
                                for($i=date('Y');$i>=2005; $i--){
                                    $year[$i]=$i;
                                }
                                ?>
                                {!! Form::select('years_from',$year , Input::old('years_from'),['class' => 'form-control','id'=>'years_from']) !!}

                            </div>
                        </div>

                        </div>

                        <div class="col-xs-6">
                            @if ($errors->has('years_to'))
                            <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('years_to')}} </strong>-->
                    </span>
                            </div>
                            @endif
                            <div class="{{ $errors->has('years_to') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select To Year</label>
                                    <?php $year=[" " =>"Select To Year"];
                                    for($i=date('Y');$i>=2005; $i--){
                                        $year[$i]=$i;
                                    }
                                    ?>
                                    {!! Form::select('years_to',$year , Input::old('years_from'),['class' => 'form-control','id'=>'years_from']) !!}
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-6">
                            @if ($errors->has('start_month'))
                            <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('start_month')}} </strong>-->
                    </span>
                            </div>
                            @endif
                            <div class="{{ $errors->has('start_month') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Start Month</label>
                                    <?php $month=[" " =>"Select Start Month"];
                                        for($i=12;$i>=1; $i--){
                                            $month[$i]=$i<=9?"0".$i:$i;
                                        }
                                    ?>
                                    {!! Form::select('start_month',$month , Input::old('start_month'),['class' => 'form-control','id'=>'start_month']) !!}

                                </div>
                            </div>

                        </div>

                        <div class="col-xs-6">
                            @if ($errors->has('end_month'))
                            <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('end_month')}} </strong>-->
                    </span>
                            </div>
                            @endif
                            <div class="{{ $errors->has('end_month') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select End Month</label>
                                    <?php $month=[" " =>"Select End Month"];
                                    for($i=12;$i>=1; $i--){
                                        $month[$i]=$i<=9?"0".$i:$i;
                                    }
                                    ?>
                                    {!! Form::select('end_month',$month , Input::old('end_month'),['class' => 'form-control','id'=>'end_month']) !!}


                                </div>
                            </div>

                        </div>

                        <div class="col-xs-6">
                        <div class="form-group">
                            <label for="exampleSelect1">Status</label>
                            {{ Form::select('status', [
                            '1' => 'Active',
                            '0' => 'InActive'], null, ['class' => 'form-control']) }}
                        </div>
                         </div>
                        <div class="col-xs-12">
                        {!! Form::submit('Submit', [
                        'class' => 'btn btn-primary'
                        ]) !!}

                        {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}

                        {!! Form::close() !!}
                        </div>
                    </div>
               <!--                   view all data-->

                    <div style="margin: 10px 15px 10px 8px;">    @include('admin.pages.financiel.financiels_view')</div>

                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>

@endsection