@extends('admin.layouts.master')
@section('title', 'Admin Secttors')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Change Password
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {{ Form::open(array('route' => 'changepassword-save' , 'method'=>'POST', 'id'=>'signupForm')) }}
                    {!! csrf_field() !!}
                    {{ Form::hidden('super_admin_id', Auth::guard('admin')->user()->id) }}

                    @if ($errors->has('name'))
                    <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('name')}} </strong>
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Id</label>

                            <input id="email" class="form-control" placeholder=" User ID"  readonly="readonly" type="text" name="email" value="{{Auth::guard('admin')->user()->email}}">
                        </div>
                    </div>


                    @if ($errors->has('current_password'))
                    <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('current_password')}} </strong>
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Current Password</label>

                            {{ Form::password('current_password', array('class'=>'form-control','placeholder'=>'Current Password', 'id'=>'npassword')) }}
                        </div>
                    </div>


                    @if ($errors->has('password'))
                    <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('password')}} </strong>
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>

                            {{ Form::password('password', array('class'=>'form-control','placeholder'=>' New Password', 'id'=>'npassword')) }}
                        </div>
                    </div>

                    @if ($errors->has('password_confirmation'))
                    <div>
                   <span class="text-danger">
                    <strong>{{$errors->first('password_confirmation')}} </strong>
                    </span>
                    </div>
                    @endif
                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>

                            {{ Form::password('password_confirmation', array('class'=>'form-control','placeholder'=>'Confirmation Password', 'id'=>'password_confirmation')) }}
                        </div>
                    </div>


                    {!! Form::submit('Submit', [
                    'class' => 'btn btn-primary'
                    ]) !!}

                    {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}

                    {!! Form::close() !!}

                </div>
                <!--                   view all data-->



            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection