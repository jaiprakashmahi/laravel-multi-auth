@extends('admin.layouts.master')
@section('title', 'Admin Secttors')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Add New Scheme
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        {!! Form::open(array('route' => 'admin.schemes.store' , 'method'=>'POST','autocomplete'=>"off")) !!}
                        {!! csrf_field() !!}



                        @if ($errors->has('plane'))
                        <div>
                     <span class="text-danger">
                    <strong>{{$errors->first('plane')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('plane') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Plan Name</label>

                                {!! Form::select('plane',[''=>'Select Plan']+$plane_options,Input::old('plane'), ['class' => 'form-control','id'=>'plane_id']) !!}
                            </div>
                        </div>

                        @if ($errors->has('sector_id'))
                        <div>
                     <span class="text-danger">
                    <strong>{{$errors->first('sector_id')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('sector_id') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Sector Name</label>

                                {!! Form::select('sector_id', [" " =>"Select Sector"]+$sectors_options , Input::old('sector_id'),['class' => 'form-control','id'=>'sector_id']) !!}
                            </div>
                        </div>

                        @if ($errors->has('sub_sector_id'))
                        <div>
                     <span class="text-danger">
                    <strong>{{$errors->first('sub_sector_id')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('sub_sector_id') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Sub Sector Name</label>

                                {!! Form::select('sub_sector_id', [" " =>"Select Sub Sector"]+$subsectors_options , Input::old('sub_sector_id'),['class' => 'form-control','id'=>'sub_sector_id']) !!}
                            </div>
                        </div>


                        @if ($errors->has('name'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Scheme Name</label>

                                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

                            </div>
                        </div>

                        @if ($errors->has('actual_cost'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('actual_cost') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fund</label>

                                {!! Form::text('actual_cost', null, ['class' => 'form-control','placeholder'=>'Enter Actual Cost' ]) !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Status</label>
                            {{ Form::select('status', [
                            '1' => 'Active',
                            '0' => 'InActive'], null, ['class' => 'form-control']) }}
                        </div>

                        {!! Form::submit('Submit', [
                        'class' => 'btn btn-primary'
                        ]) !!}

                        {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}

                        {!! Form::close() !!}

                    </div>
               <!--                   view all data-->

                    <div style="margin: 10px 15px 10px 8px;">  @include('admin.pages.scheme.schemes_view')</div>

                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>

@endsection