@extends('admin.layouts.master')
@section('title', 'Edit Village')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Village
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.village.update',$village_details->id],
                    'method' => 'PUT','files'=>true,
                    ]

                    ) !!}
                    {!! csrf_field() !!}


                    @if ($errors->has('taluka_id'))
                    <div>
                     <span class="text-danger">
                    <strong>{{$errors->first('taluka_id')}} </strong>
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('taluka_id') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Talukas</label>

                            {!! Form::select('taluka_id', $talukas_options ,$village_details->talukas->id,['class' => 'form-control','id'=>'sector_id']) !!}

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
                            <label for="exampleInputEmail1">Village Name</label>

                            {!! Form::text('name', $village_details->name, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $village_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->
                <div style="margin: 10px 15px 10px 8px;">  @include('admin.pages.village.villages_view')</div>

            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection