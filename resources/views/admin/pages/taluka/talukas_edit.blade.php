@extends('admin.layouts.master')
@section('title', 'Edit Secttors')

@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Taluka
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.talukas.update',$taluka_details->id],
                    'method' => 'PUT','files'=>true,
                    ]

                    ) !!}
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
                            <label for="exampleInputEmail1"> Taluka Name</label>

                            {!! Form::text('name', $taluka_details->name, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Select District</label>
                        {{ Form::select('district', $district_option,$taluka_details->district, ['class' => 'form-control']) }}

                    </div>


                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $taluka_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    <a href="{{ URL::route('admin.talukas.index') }}" class="btn btn-default"> Back</a>

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->
                <div style="margin: 10px 15px 10px 8px;">  @include('admin.pages.taluka.talukas_view')</div>

            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection