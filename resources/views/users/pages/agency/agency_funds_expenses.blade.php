@extends('users.layouts.master')
@section('title', 'Admin work')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Update Expenses
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::open(['route' => ['user.agency_expenses.update',$works_details->id],'method'=>'PUT','files'=>'true','enctype' => 'multipart/form-data','autocomplete'=>"off"]) !!}
                    {!! csrf_field() !!}

                    {!! Form::hidden('release_type', $works_details->release_type) !!}

                    <div class="row">

                        <div class="{{ $errors->has('bill') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Upload Bill</label>
                                    {!! Form::file('bill', Input::old('bill'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="{{ $errors->has('spent') ? ' has-error' : '' }}">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Spent Amount</label>
                                    {!! Form::text('spent', Input::old('spent'), ['class' => 'form-control']) !!}
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