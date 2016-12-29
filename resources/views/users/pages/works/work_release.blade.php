@extends('users.layouts.master')
@section('title', 'Admin work')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Release Fund
    </h1>

</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
    {!! Form::open(['route' => ['user.progress.update',$work_id],'method'=>'PUT','autocomplete'=>"off"]) !!}
    {!! csrf_field() !!}

    {!! Form::hidden('work_id', $work_id) !!}

<div class="row">

    <div class="{{ $errors->has('release_fund') ? ' has-error' : '' }}">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label>Release Fund</label>
                {!! Form::text('release_fund', Input::old('release_fund'), ['class' => 'form-control','placeholder'=>'Enter release fund' ]) !!}
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="{{ $errors->has('release_type') ? ' has-error' : '' }}">
            <div class="form-group">
                <label for="estimated_cost">Release Type</label>
                {!! Form::select('release_type', [''=>'Select Release Type','2'=>'partial','3'=>'full'], Input::old('release_type'), ['class' => 'form-control','id'=>'release_type']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group" style="padding-top:2.5rem;">
            {!! Form::submit('Submit', [
            'class' => 'btn btn-primary'
            ]) !!}

            {{ Form::reset('Cancel', ['class' => 'btn btn-warning']) }}
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
