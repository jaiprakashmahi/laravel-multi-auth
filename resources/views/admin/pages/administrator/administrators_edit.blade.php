@extends('admin.layouts.master')
@section('title', 'Edit Administrator')

@section('content')

<section class="content-header">
    <h1>
        Edit Administrative Approval Officer
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.administrators.update',$administrator_details->id],
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
                            <label for="exampleInputEmail1">Administrative Approval Officer Name</label>

                            {!! Form::text('name', $administrator_details->name, ['class' => 'form-control','placeholder'=>'Enter Administrative Approval Officer' ]) !!}

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

                            {!! Form::text('post', $administrator_details->post, ['class' => 'form-control','placeholder'=>'Enter post' ]) !!}

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

                            {!! Form::textarea('office_address', $administrator_details->office_address, ['class' => 'form-control', 'size' => '30x3','placeholder'=>'Enter office address' ]) !!}

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

                            {!! Form::select('taluka_id', $talukas_options ,$administrator_details->talukas->id,['class' => 'form-control','id'=>'taluka_id']) !!}

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

                            {!! Form::select('district',$district_options,$administrator_details->district,['class' => 'form-control','id'=>'district']) !!}
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

                            {!! Form::text('pin', $administrator_details->pin, ['class' => 'form-control','placeholder'=>'Enter pin' ]) !!}

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $administrator_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    <a href="{{ URL::route('admin.administrators.index') }}" class="btn btn-default"> Back</a>

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->


            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection