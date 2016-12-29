@extends('users.layouts.master')
@section('title', 'View Work')

@section('content')

<section class="content-header">
    <h1>
        View / Edit Work Assign
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    <div class="col-xs-12">&nbsp;</div>
                    @if(count($work_assign_details)>0)
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
<!--                            <th>Work Type</th>-->
                            <th>Work Name</th>
                            <th>Assign By</th>
                            <th>Assign To Agency</th>
                            <th>Assign Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($work_assign_details as $work_assign_details_val)
                        <tr>
<!--                            <td>{{$work_assign_details_val->worktype->name}}</td>-->
                            <td>{{$work_assign_details_val->name}}</td>
                             <td>{{Auth::guard('users')->user()->name}}</td>
                             <td>{{$work_assign_details_val->agency->name}}</td>
                             <td>
                                @if($work_assign_details_val->work_assign_status==1)
                                Assign
                                @else
                                Not Assign
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{URL::route('user.work_assign.edit',$work_assign_details_val->id)}}"><i class="fa fa-pencil"></i></a>
                                <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->

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