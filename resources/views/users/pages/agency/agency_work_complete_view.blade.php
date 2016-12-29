@extends('users.layouts.master')
@section('title', 'View Work')

@section('content')

<section class="content-header">
    <h1>
        View Completed Work
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    <div class="col-xs-12">&nbsp;</div>
                    @if(count($work_details)>0)
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th>Sr.No</th>
                            <th>Work Name</th>
                            <th>Plan</th>
                            <th>Est Fund</th>
                            <th>Rel Fund</th>
                            <th>AssignBy</th>
                            <th>Status</th>
<!--                            <th>Action</th>-->

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($work_details as $work_details_value)
                        <tr>
                            <td>{{$work_details_value->work->id}}</td>
                            <td>{{$work_details_value->work->name}}</td>
                            <td>{{$work_details_value->work->plane->name}}</td>

                            <td>{{$work_details_value->work->estimated_cost}}</td>
                            <td>{{$work_details_value->work->released_total_amount}}</td>
                            <td>{{$work_details_value->work->AssignBy->name}}</td>
                            <td> @if($work_details_value->progress_status==1)
                                InProgress with {{$work_details_value->progress_percent}}%


                                @else

                                <div class="progress" style="width: 100px; text-align: center;">
                                    <div class="progress-bar-success" role="progressbar" aria-valuenow="70"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{$work_details_value->progress_percent}}%">
                                        {{$work_details_value->progress_percent}}%
                                    </div>
                                </div>
                                @endif
                            </td>


                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @else
                    <div class="col-xs-12"><h3>0 record found</h3></div>
                    @endif

                </div>


            </div><!-- /.box-body -->


        </div>
    </div>
</section>

@endsection