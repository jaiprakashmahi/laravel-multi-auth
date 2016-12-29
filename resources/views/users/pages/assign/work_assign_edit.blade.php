@extends('users.layouts.master')
@section('title', 'Admin Assign')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Edit  Assign  Work
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::open(['route' => ['user.work_assign.update' ,$works_details->id],'method'=>'PUT','autocomplete'=>"off"]) !!}
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="{{ $errors->has('financial') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="work_name">Select Work</label>
                                    {!! Form::select('work',[''=>'Select Work']+$work_options,$works_details->id, ['class' => 'form-control','id'=>'work_id']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="work_name">Select Agency</label>
                                    {!! Form::select('agency',[''=>'Select Agency']+$agency_options,$works_details->agency->id, ['class' => 'form-control','id'=>'agency_id']) !!}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="{{ $errors->has('estimated_cost') ? ' has-error' : '' }}">
                                <div class="form-group">
                                    <label for="estimated_cost">Work Assign Status</label>
                                    {!! Form::select('work_assign_status', ['1'=>'Assign','0'=>'NotAssign'], $works_details->work_assign_status, ['class' => 'form-control','id'=>'work_assign_status']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group" style="padding-top:2.5rem;">
                                {!! Form::submit('Submit', [
                                'class' => 'btn btn-primary'
                                ]) !!}

                                <a href="{{ URL::route('user.work_assign.index') }}" class="btn btn-default"> Back</a>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

@endsection
@section('script')



@endsection