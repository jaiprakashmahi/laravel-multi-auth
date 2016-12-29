@extends('admin.layouts.master')
@section('title', 'Edit Officer')

@section('content')

<section class="content-header">
    <h1>
        Edit Technical Approval Officer
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.officers.update',$officer_details->id],
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
                            <label for="exampleInputEmail1">Name</label>

                            {!! Form::text('name', $officer_details->name, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

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
                            <label for="exampleInputEmail1">Post</label>

                            {!! Form::text('post', $officer_details->post, ['class' => 'form-control','placeholder'=>'Enter post' ]) !!}

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

                            {!! Form::textarea('office_address', $officer_details->office_address, ['class' => 'form-control', 'size' => '30x3','placeholder'=>'Enter office address' ]) !!}

                        </div>
                    </div>

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

                            {!! Form::select('taluka_id', $talukas_options ,$officer_details->talukas->id,['class' => 'form-control','id'=>'taluka_id']) !!}

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

                            {!! Form::select('district',$district_options,$officer_details->district,['class' => 'form-control','id'=>'district']) !!}
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

                            {!! Form::text('pin', $officer_details->pin, ['class' => 'form-control','placeholder'=>'Enter pin' ]) !!}

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $officer_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    <a href="{{ URL::route('admin.officers.index') }}" class="btn btn-default"> Back</a>

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->


            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection