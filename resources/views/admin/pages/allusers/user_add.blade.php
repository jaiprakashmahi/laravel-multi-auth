@extends('admin.layouts.master')
@section('title', 'Admin User')

@section('content')

    <section class="content-header">
        <h1>
           Add New DPC / Agency
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        {!! Form::open(array('route' => 'admin.alluser.store' , 'method'=>'POST','autocomplete'=>"off")) !!}
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
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Officer Name</label>

                                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}

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

                                {!! Form::text('email', null, ['class' => 'form-control','placeholder'=>'Enter email' ]) !!}

                            </div>
                        </div>

                        @if ($errors->has('password'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('password')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>

                                {!! Form::password('password', ['class' => 'form-control','placeholder'=>'Enter password' ]) !!}

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

                                {!! Form::select('user_type',[''=>'Select User Type','DPC'=>'DPC','AGENCY'=>'AGENCY'],null,['class' => 'form-control']) !!}

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

                                {!! Form::text('mobile', null, ['class' => 'form-control','placeholder'=>'Enter mobile No.' ]) !!}

                            </div>
                        </div>

<!--                        @if ($errors->has('state'))-->
<!--                        <div>-->
<!--                   <span class="text-danger">-->
<!--<!--                    <strong>{{$errors->first('state')}} </strong>-->-->
<!--                    </span>-->
<!--                        </div>-->
<!--                        @endif-->
<!--                        <div class="{{ $errors->has('state') ? ' has-error' : '' }}">-->
<!--                            <div class="form-group">-->
<!--                                <label for="exampleInputEmail1">State</label>-->
<!---->
<!--                                {!! Form::text('state', null, ['class' => 'form-control','placeholder'=>'Enter state' ]) !!}-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        @if ($errors->has('city'))-->
<!--                        <div>-->
<!--                   <span class="text-danger">-->
<!--<!--                    <strong>{{$errors->first('email')}} </strong>-->-->
<!--                    </span>-->
<!--                        </div>-->
<!--                        @endif-->
<!--                        <div class="{{ $errors->has('city') ? ' has-error' : '' }}">-->
<!--                            <div class="form-group">-->
<!--                                <label for="exampleInputEmail1">City</label>-->
<!---->
<!--                                {!! Form::text('city', null, ['class' => 'form-control','placeholder'=>'Enter city' ]) !!}-->
<!---->
<!--                            </div>-->
<!--                        </div>-->

                        @if ($errors->has('address'))
                        <div>
                   <span class="text-danger">
<!--                    <strong>{{$errors->first('name')}} </strong>-->
                    </span>
                        </div>
                        @endif
                        <div class="{{ $errors->has('address') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>

                                {!! Form::textarea('address', null, ['class' => 'form-control', 'size' => '30x3','placeholder'=>'Enter  address' ]) !!}

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


                        {!! Form::submit('Submit', [
                        'class' => 'btn btn-primary'
                        ]) !!}

                        {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}

                        {!! Form::close() !!}

                    </div>
               <!--    view all data-->


                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>

@endsection