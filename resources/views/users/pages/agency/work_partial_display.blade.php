@extends('users.layouts.master')
@section('title', 'View Work')

@section('content')

<section class="content-header">
    <h1>
        View /  Partial Release  Partial
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
                            <th>Spent</th>
                            <th>AssignBy</th>
                            <th>Rel Status</th>
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
                            <td>{{$work_details_value->total_spent_amount}}</td>
                            <td>{{$work_details_value->AssignBy->name}}</td>
                            <td> @if($work_details_value->work_status_dpc==2)
                                Partial
                                @endif
                            </td>

                            <td>
                                @if(($work_details_value->total_spent_amount)<($work_details_value->released_total_amount))
                                <a class="btn btn-primary" href="{{URL::route('user.agency_expenses.edit',$work_details_value->id)}}"><i class="fa fa-pencil"></i></a>
                                @else
                                <a class="btn btn-primary" onclick="return alert('You have no more fund to spent')"><i class="fa fa-pencil"></i></a>
                                @endif

                                <a class="btn btn-danger" onclick="return confirm('Are you sure to reset spent amount?')" href="{{URL::route('user.agency_expenses.remove',$work_details_value->id)}}">Delete</a>

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