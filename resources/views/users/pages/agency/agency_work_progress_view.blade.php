@extends('users.layouts.master')
@section('title', 'View Work')

@section('content')

<section class="content-header">
    <h1>
        View Work In Progress Update
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
                            <th>Action</th>

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

                                <div class="progress" style="width: 100px; text-align: center;">
                                    <div class="progress-bar-info" role="progressbar" aria-valuenow="70"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{$work_details_value->progress_percent}}%">
                                        {{$work_details_value->progress_percent}}%
                                    </div>
                                </div>
                                    @else

                                Completed
                                @endif
                            </td>

                            <td>
                                @if($work_details_value->progress_percent!=100)
                                <a class="btn btn-primary" href="{{URL::route('user.work_image.edit',$work_details_value->work->id)}}"><i class="fa fa-pencil"></i></a>

                                @else
                                <a class="btn btn-primary" onclick="return alert('It is Completed thanks!');"><i class="fa fa-pencil"></i></a>
                                @endif
                            @if(($work_details_value->progress_percent)==(100))
                            <a onclick="return confirm('Are you sure to Close ?');" class="btn btn-adn
                              " href="{{URL::route('user.work_agency.work_close',$work_details_value->work->id)}}">Close</a>
                            @else
                            <a  onclick="return alert('It is InProgress thanks!');" class="btn btn-default">Close</a>
                            @endif
                            <a class="btn btn-danger" href="{{URL::route('user.work_agency.remove',$work_details_value->work->id)}}">Delete</a>

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