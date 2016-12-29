@extends('users.layouts.master')
@section('title', 'View Work')

@section('content')

<section class="content-header">
    <h1>
        View / Edit / Allocated  Fund
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
                            <th>Release</th>
                            <th>Agency</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($work_details as $work_details_value)
                        <tr>
                            <td>{{$work_details_value->id}}</td>
                            <td>{{$work_details_value->name}}</td>
                            <td>{{$work_details_value->plane->name}}</td>

                            <td>{{$work_details_value->estimated_cost}}</td>
                            <td>{{$work_details_value->released_total_amount}}</td>
                            <td> @if($work_details_value->work_status_dpc==2)
                                Partial
                                @elseif($work_details_value->work_status_dpc==1)
                                Assign
                                @else
                                full
                                @endif</td>

                            <td>
                                {{$work_details_value->agency->name}}

                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{URL::route('user.work.edit',$work_details_value->id)}}"><i class="fa fa-pencil"></i></a>
                                <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
                                @if(($work_details_value->estimated_cost)>($work_details_value->released_total_amount))
                                <a onclick="return confirm('Are you sure to release ?');" class="btn btn-adn" href="{{URL::route('user.progress.edit',$work_details_value->id)}}">Release</a>
                                @else
                                <a  onclick="return alert('It is Full released thanks!');" class="btn btn-adn">Released</a>
                                @endif
                                <a class="btn btn-danger" href="{{URL::route('user.work.remove',$work_details_value->id)}}">Delete</a>

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