@extends('users.layouts.master')
@section('title', 'Admin work')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit  Work Progress
    </h1>

</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
{!! Form::open(['route' => ['user.work_image.update',$works_details->id],'method'=>'PUT','files'=>'true','enctype' => 'multipart/form-data','autocomplete'=>"off"]) !!}
{!! csrf_field() !!}
    <div class="row">

        <div class="{{ $errors->has('work_photo') ? ' has-error' : '' }}">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Select Work Photo Multiple</label>
                    {!! Form::file('work_photo[]',array('multiple'=>true), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="{{ $errors->has('progress_percent') ? ' has-error' : '' }}">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Work Progress (%)</label>
                    {!! Form::text('progress_percent', Input::old('progress_percent'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>


    </div>


    <div class="row">

        <div class="{{ $errors->has('measurement_book') ? ' has-error' : '' }}">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Select Measurement Book</label>
                    {!! Form::file('measurement_book', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

    </div>


<!--   Agency Section end      -->
    <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="form-group" style="padding-top:2.5rem;">
        {!! Form::submit('Submit', [
        'class' => 'btn btn-primary'
        ]) !!}



    </div>
</div>
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