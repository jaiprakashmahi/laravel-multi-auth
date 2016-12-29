@extends('admin.layouts.master')
@section('title', 'Edit User')

@section('content')

<section class="content-header">
    <h1>
         Edit DPC / Agency
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {!! Form::open(

                    ['route' => ['admin.alluser.update',$all_user_details->id],
                    'method' => 'PUT','files'=>true,
                    ]

                    ) !!}
                    {!! csrf_field() !!}




                    @if ($errors->has('designation'))
                    <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('designation') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>

                            {!! Form::text('designation', null, ['class' => 'form-control','placeholder'=>'Enter designation' ]) !!}

                        </div>
                    </div>

                    @if ($errors->has('name'))
                    <div>
                   <span class="text-danger">

                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Officer Name</label>

                            {!! Form::text('name', $all_user_details->name, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

                        </div>
                    </div>

                    @if ($errors->has('email'))
                    <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('email')}} </strong>-->
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Id</label>

                            {!! Form::text('email', $all_user_details->email, ['class' => 'form-control','placeholder'=>'Enter email' ]) !!}

                        </div>
                    </div>


                    @if ($errors->has('user_type'))
                    <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('user_type')}} </strong>-->
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('user_type') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User Type</label>

                            {!! Form::select('user_type',[''=>'Select User Type','DPC'=>'DPC','AGENCY'=>'AGENCY'],$all_user_details->usertype,['class' => 'form-control']) !!}

                        </div>
                    </div>

                    @if ($errors->has('mobile'))
                    <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('email')}} </strong>-->
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile</label>

                            {!! Form::text('mobile', $all_user_details->mobile, ['class' => 'form-control','placeholder'=>'Enter mobile No.' ]) !!}

                        </div>
                    </div>

<!--                    @if ($errors->has('state'))-->
<!--                    <div>-->
<!--                   <span class="text-danger">-->
<!--<!--                    <strong>{{$errors->first('state')}} </strong>-->-->
<!--                    </span>-->
<!--                    </div>-->
<!--                    @endif-->
<!--                    <div class="{{ $errors->has('state') ? ' has-error' : '' }}">-->
<!--                        <div class="form-group">-->
<!--                            <label for="exampleInputEmail1">State</label>-->
<!---->
<!--                            {!! Form::text('state', $all_user_details->state, ['class' => 'form-control','placeholder'=>'Enter state' ]) !!}-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    @if ($errors->has('city'))-->
<!--                    <div>-->
<!--                   <span class="text-danger">-->
<!--<!--                    <strong>{{$errors->first('email')}} </strong>-->
<!--                    </span>-->
<!--                    </div>-->
<!--                    @endif-->
<!--                    <div class="{{ $errors->has('city') ? ' has-error' : '' }}">-->
<!--                        <div class="form-group">-->
<!--                            <label for="exampleInputEmail1">City</label>-->
<!---->
<!--                            {!! Form::text('city', $all_user_details->city, ['class' => 'form-control','placeholder'=>'Enter city' ]) !!}-->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    @if ($errors->has('address'))
                    <div>
                   <span class="text-danger">

                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('address') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>

                            {!! Form::textarea('address', $all_user_details->address, ['class' => 'form-control', 'size' => '30x3','placeholder'=>'Enter  address' ]) !!}

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

                            {!! Form::text('pin', $all_user_details->pin, ['class' => 'form-control','placeholder'=>'Enter pin' ]) !!}

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        {{ Form::select('status', [
                        '1' => 'Active',
                        '0' => 'InActive'], $all_user_details->status, ['class' => 'form-control']) }}

                    </div>

                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    <a href="{{ URL::route('admin.alluser.index') }}" class="btn btn-default">Back</a>

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->


            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection