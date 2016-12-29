@extends('users.layouts.master')
@section('title', 'Admin work')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add New Work / Assign
    </h1>

</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
{!! Form::open(array('route' => 'user.work.store' , 'method'=>'POST','autocomplete'=>"off")) !!}
{!! csrf_field() !!}

<div class="row">

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Work Name</label>
                {!! Form::text('name', Input::old('name'), ['class' => 'form-control','placeholder'=>'Enter Name' ]) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="{{ $errors->has('financial') ? ' has-error' : '' }}">
        <div class="form-group">
            <label for="work_name">Work Type</label>
            {!! Form::select('work_type',[''=>'Select Work Type']+$work_type_options,Input::old('work_type'), ['class' => 'form-control','id'=>'work_type_id']) !!}
        </div>
         </div>
    </div>


</div>
<div class="row">

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="{{ $errors->has('agency') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Select Agency</label>
            {!! Form::select('agency',[''=>'Select Agency']+$agency_options,Input::old('agency'), ['class' => 'form-control','id'=>'agency']) !!}
        </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="{{ $errors->has('financial') ? ' has-error' : '' }}">
            <div class="form-group">
                <label>Financial Year</label>
                {!! Form::select('financial',[''=>'Select Financial Year']+$financial_options,Input::old('financial'), ['class' => 'form-control','id'=>'financial_id']) !!}
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('plane') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Plan</label>
            {!! Form::select('plane',[''=>'Select Plan']+$plane_options,Input::old('plane'), ['class' => 'form-control','id'=>'plane_id']) !!}
        </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('sector') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Sector</label>
            {!! Form::select('sector',[''=>'Select Sector']+$sector_options, Input::old('sector'), ['class' => 'form-control','id'=>'sector_id']) !!}
        </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('sector') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Sub sector</label>
            {!! Form::select('sub_sector',[''=>'Select Sub Sector']+$sub_sector_options, Input::old('sub_sector'), ['class' => 'form-control','id'=>'sub_sector_id']) !!}
        </div>
         </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="{{ $errors->has('scheme') ? ' has-error' : '' }}">
            <div class="form-group">
                <label>Scheme / Yojana</label>
                {!! Form::select('scheme',[''=>'Select Scheme']+$scheme_options, Input::old('scheme'), ['class' => 'form-control','id'=>'scheme_id']) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="{{ $errors->has('scheme') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Scheme For</label>
            {!! Form::select('scheme_for',[''=>'Select Scheme for','1'=>'Beneficiary','2'=>'Works'], Input::old('scheme_for'), ['class' => 'form-control','id'=>'scheme_for']) !!}
        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('district') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>District</label>
            {!! Form::select('district',$district_options, Input::old('district'), ['class' => 'form-control','id'=>'district_id']) !!}
        </div>
            </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('taluka') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Taluka</label>
            {!! Form::select('taluka',[''=>'Select Taluka']+$taluka_options, Input::old('taluka'), ['class' => 'form-control','id'=>'taluka_id']) !!}
        </div>
         </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('village') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Village</label>
            {!! Form::select('village',[''=>'Select Village']+$village_options, Input::old('village'), ['class' => 'form-control','id'=>'village_id']) !!}
        </div>
            </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="{{ $errors->has('remarks') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Work Remarks</label>

            {!! Form::textarea('remarks',Input::old('remarks'),['size'=>'30x3','class' => 'form-control','placeholder'=>'Enter remarks here']) !!}

        </div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('officer') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Technical Sanction By</label>
            {!! Form::select('officer',[''=>'Select Officer']+$officer_options, Input::old('officer'), ['class' => 'form-control','id'=>'officer_id']) !!}

        </div>
            </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('village') ? ' has-error' : '' }}">
        <div class="form-group">
            <label for="work_technical_sanction_date">Sanction Approval Date:</label>
            {!! Form::text('technical_sanction_date', Input::old('technical_sanction_date'), ['class' => 'form-control','id'=>'datepicker']) !!}
        </div>

        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('village') ? ' has-error' : '' }}">
            <div class="form-group">
                <label for="work_technical_sanction_date">Sanction Approval Number:</label>
                {!! Form::text('technical_sanction_approval_number', Input::old('technical_sanction_approval_number'), ['class' => 'form-control','id'=>'technical_sanction_approval_number']) !!}
            </div>

        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('administrator') ? ' has-error' : '' }}">
        <div class="form-group">
            <label>Administrative Approval By</label>
            {!! Form::select('administrator',[''=>'Select Administrator']+$administrators_options, Input::old('administrator'), ['class' => 'form-control','id'=>'administrator_id']) !!}
        </div>
            </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('approval_date') ? ' has-error' : '' }}">
        <div class="form-group">
            <label for="work_admin_approval_date">Administrative Approval Date:</label>
            {!! Form::text('administrator_approval_date', Input::old('administrator_approval_date'), ['class' => 'form-control','id'=>'datepicker1']) !!}
        </div>
            </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('approval_date') ? ' has-error' : '' }}">
            <div class="form-group">
                <label for="work_admin_approval_date">Administrative Approval Number:</label>
                {!! Form::text('administrator_approval_number', Input::old('administrator_approval_number'), ['class' => 'form-control','id'=>'administrator_approval_number']) !!}
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('final_officer_id') ? ' has-error' : '' }}">
            <div class="form-group">
                <label>Final Technical Sanction By</label>
                {!! Form::select('final_officer_id',[''=>'Select Final Technical Sanction']+$final_officer_options, Input::old('final_officer_id'), ['class' => 'form-control','id'=>'final_officer_id']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('approval_date') ? ' has-error' : '' }}">
            <div class="form-group">
                <label for="work_admin_approval_date">Final Technical Approval Date:</label>
                {!! Form::text('final_officer_approval_date', Input::old('final_officer_approval_date'), ['class' => 'form-control','id'=>'datepicker2']) !!}
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="{{ $errors->has('approval_date') ? ' has-error' : '' }}">
            <div class="form-group">
                <label for="work_admin_approval_date">Final Technical Approval Number:</label>
                {!! Form::text('final_officer_approval_number', Input::old('final_officer_approval_number'), ['class' => 'form-control','id'=>'final_technical_approval_number']) !!}
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="{{ $errors->has('estimated_cost') ? ' has-error' : '' }}">
        <div class="form-group">
            <label for="estimated_cost">Estimated Fund:</label>
            {!! Form::text('estimated_cost', Input::old('estimated_cost'), ['class' => 'form-control','id'=>'estimated_cost']) !!}
        </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="{{ $errors->has('estimated_cost') ? ' has-error' : '' }}">
            <div class="form-group">
                <label for="estimated_cost">Work Status</label>
                {!! Form::select('status', ['1'=>'Assign'], Input::old('status'), ['class' => 'form-control','id'=>'status']) !!}
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
@section('script')

<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            //appendText:"(yy-mm-dd)"
            dateFormat:"yy-mm-dd"
        });

        $( "#datepicker1" ).datepicker({
            //appendText:"(yy-mm-dd)"
            dateFormat:"yy-mm-dd"
        });

        $( "#datepicker2" ).datepicker({
            //appendText:"(yy-mm-dd)"
            dateFormat:"yy-mm-dd"
        });
    });
</script>
@endsection