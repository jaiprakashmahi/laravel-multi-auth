@extends('admin.layouts.master')
@section('title', 'Admin Secttors')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Add New Sector
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        {!! Form::open(array('route' => 'admin.sector.store' , 'method'=>'POST','autocomplete'=>"off")) !!}
                        {!! csrf_field() !!}


                        @if ($errors->has('plane_id'))
                        <div>
                     <span class="text-danger">
                    <strong>{{$errors->first('plane_id')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('plane_id') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Plan Name</label>

                                {!! Form::select('plane_id', [" " =>"Select Plan"]+$plane_options , Input::old('plane_id'),['class' => 'form-control','id'=>'plane']) !!}
                            </div>
                        </div>


                        @if ($errors->has('name'))
                        <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('name')}} </strong>
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sector Name</label>

                                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

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


                    <div style="margin: 10px 15px 10px 8px;">  @include('admin.pages.sectors.sectors_view')</div>

                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>

@endsection