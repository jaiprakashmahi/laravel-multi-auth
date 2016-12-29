@extends('admin.layouts.master')
@section('title', 'View User')

@section('content')

<section class="content-header">
    <h1>
        View / Edit DPC / Agency
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    <div class="col-xs-12">&nbsp;</div>
                    @if(count($user_details)>0)
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Pin</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_details as $user_details_value)
                        <tr>
                            <td>{{$user_details_value->name}}</td>
                            <td>{{$user_details_value->email}}</td>
                            <td>{{$user_details_value->mobile}}</td>
                            <td>{{$user_details_value->pin}}</td>
                            <td>{{$user_details_value->usertype}}</td>
                            <td>
                                @if($user_details_value->status==1)
                                Active
                                @else
                                InActive
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{URL::route('admin.alluser.edit',$user_details_value->id)}}"><i class="fa fa-pencil"></i></a>
                                <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
                                <a class="btn btn-danger" href="{{URL::route('admin.alluser.remove',$user_details_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
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