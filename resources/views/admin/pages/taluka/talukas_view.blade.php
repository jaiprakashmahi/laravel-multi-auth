<div class="col-xs-12">&nbsp;</div>
@if(count($talukas_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Taluka</th>
<!--        <th>Created By</th>-->
        <th>District</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($talukas_data as $talukas_data_value)
    <tr>
        <td>{{$talukas_data_value->name}}</td>
        <td>@if($talukas_data_value->district==1)
               pune
             @else
               nagpur
            @endif
        </td>
<!--        <td>{{Auth::guard('admin')->user()->name}}</td>-->
        <td>
            @if($talukas_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.talukas.edit',$talukas_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
            <a href="{{URL::route('admin.talukas.remove',$talukas_data_value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif