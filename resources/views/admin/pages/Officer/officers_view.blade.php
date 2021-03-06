<div class="col-xs-12">&nbsp;</div>
@if(count($officer_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>


        <th>Name</th>
        <th>Post</th>
        <th>Pin</th>
        <th>Address</th>
        <th>Taluka</th>
        <th>District</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($officer_data as $officer_data_value)
    <tr>
        <td>{{$officer_data_value->name}}</td>
        <td>{{$officer_data_value->post}}</td>
        <td>{{$officer_data_value->pin}}</td>
        <td>{{$officer_data_value->office_address}}</td>
        <td>{{$officer_data_value->talukas->name}}</td>
        <td>{{$officer_data_value->district}}</td>

        <td>
            @if($officer_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.officers.edit',$officer_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
            <a class="btn btn-danger" href="{{URL::route('admin.officers.remove',$officer_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif