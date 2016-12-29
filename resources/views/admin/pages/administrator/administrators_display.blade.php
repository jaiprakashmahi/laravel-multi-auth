@extends('admin.layouts.master')
@section('title', 'View Administrator')

@section('content')

<section class="content-header">
    <h1>
        View / Edit Administrative Approval Officer
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    <div class="col-xs-12">&nbsp;</div>
                    @if(count($administrators_data)>0)
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Pin</th>
                            <th>Address</th>
                            <th>Taluka</th>
                            <th>District</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($administrators_data as $administrators_data_value)
                        <tr>
                            <td>{{$administrators_data_value->name}}</td>
                            <td>{{$administrators_data_value->post}}</td>
                            <td>{{$administrators_data_value->pin}}</td>
                            <td>{{$administrators_data_value->office_address}}</td>
                            <td>{{$administrators_data_value->talukas->name}}</td>
                            <td>@if($administrators_data_value->district==1)

                                Pune
                                @else
                                nagpur
                                @endif
                            </td>

                            <td>
                                @if($administrators_data_value->status==1)
                                Active
                                @else
                                InActive
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{URL::route('admin.administrators.edit',$administrators_data_value->id)}}"><i class="fa fa-pencil"></i></a>
                                <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
                                <a class="btn btn-danger" href="{{URL::route('admin.administrators.remove',$administrators_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
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