@extends('admin.layouts.master')
@section('title', 'Edit Work Type')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Work Type
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.work-type.update',$work_type_details->id],
                    'method' => 'PUT','files'=>true,
                    ]

                    ) !!}
                    {!! csrf_field() !!}

                    @if ($errors->has('name'))
                    <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('name')}} </strong>
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Work Type Name</label>

                            {!! Form::text('name', $work_type_details->name, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $work_type_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    <a href="{{ URL::route('admin.work-type.index') }}" class="btn btn-default"> Back</a>

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->
                <div style="margin: 10px 15px 10px 8px;">  @include('admin.pages.worktype.work_types_view')</div>

            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection