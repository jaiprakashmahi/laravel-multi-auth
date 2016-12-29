@extends('admin.layouts.master')
@section('title', 'Admin Officers')

@section('content')

    <section class="content-header">
        <h1>
           Add New Technical Approval Officer
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        {!! Form::open(array('route' => 'admin.officers.store' , 'method'=>'POST','autocomplete'=>"off")) !!}
                        {!! csrf_field() !!}


                        @if ($errors->has('name'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Technical Approval Officer Name</label>

                                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter Technical Approval Officer' ]) !!}

                            </div>
                        </div>

                    @if ($errors->has('post'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('post') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation</label>

                                {!! Form::text('post', null, ['class' => 'form-control','placeholder'=>'Enter Designation' ]) !!}

                            </div>
                        </div>

                        @if ($errors->has('office_address'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('office_address') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Office Address</label>

                                {!! Form::textarea('office_address', null, ['class' => 'form-control', 'size' => '30x3','placeholder'=>'Enter office address' ]) !!}

                            </div>
                        </div>


                        @if ($errors->has('taluka_id'))
                        <div>
                     <span class="text-danger">
<!--                    <strong>{{$errors->first('taluka_id')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('taluka_id') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Taluka Name</label>

                                {!! Form::select('taluka_id', [" " =>"Select Taluka"]+$talukas_options , Input::old('taluka_id'),['class' => 'form-control','id'=>'taluka_id']) !!}
                            </div>
                        </div>


                        @if ($errors->has('district'))
                        <div>
                     <span class="text-danger">
<!--                    <strong>{{$errors->first('district')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('district') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select district Name</label>

                                {!! Form::select('district',$district_options , Input::old('district'),['class' => 'form-control','id'=>'district']) !!}
                            </div>
                        </div>

                        @if ($errors->has('pin'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('pin')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('pin') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pin</label>

                                {!! Form::text('pin', null, ['class' => 'form-control','placeholder'=>'Enter pin' ]) !!}

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleSelect1">Status</label>
                            {{ Form::select('status', [
                            '1' => 'Active',
                            '0' => 'InActive'], null, ['class' => 'form-control']) }}

                        </div>

<!--                        <div class="form-group">-->
<!---->
<!--                            <div class="form-group" class='form-control'>-->
<!--                                <label for="exampleSelect1">Status</label>-->
<!--                                <select class="form-control" name="item_id">-->
<!--                                    @for($x=date("Y"); $x>2006; $x--)-->
<!--                                    <option value="{{$x}}">{{$x}}</option>-->
<!--                                    @endfor-->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!---->
<!--                        </div>-->

                        {!! Form::submit('Submit', [
                        'class' => 'btn btn-primary'
                        ]) !!}

                        {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}

                        {!! Form::close() !!}

                    </div>
               <!--                   view all data-->


                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>

@endsection