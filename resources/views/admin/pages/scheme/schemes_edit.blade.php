@extends('admin.layouts.master')
@section('title', 'Edit Secttors')

@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Scheme
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.schemes.update',$schemes_details->id],
                    'method' => 'PUT','files'=>true,
                    ]

                    ) !!}
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

                            {!! Form::select('plane',$plane_options,$schemes_details->subsector->sectors->plane->id, ['class' => 'form-control','id'=>'plane_id']) !!}
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

                            {!! Form::select('sector_id',$sectors_options ,$schemes_details->subsector->sectors->id,['class' => 'form-control','id'=>'sector_id']) !!}
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

                            {!! Form::select('sub_sector_id',$subsectors_options,$schemes_details->subsector->id,['class' => 'form-control','id'=>'sub_sector_id']) !!}
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
                            <label for="exampleInputEmail1">Name</label>

                            {!! Form::text('name', $schemes_details->name, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

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

                            {!! Form::text('actual_cost', $schemes_details->actual_cost, ['class' => 'form-control','placeholder'=>'Enter Fund' ]) !!}

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $schemes_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    <a href="{{ URL::route('admin.schemes.index') }}" class="btn btn-default"> Back</a>

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->
                <div style="margin: 10px 15px 10px 8px;">   @include('admin.pages.scheme.schemes_view')</div>

            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection