<div class="col-xs-12">&nbsp;</div>
@if(count($sub_sector_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Plane</th>
        <th>Sector</th>
        <th>Sub Sector</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($sub_sector_data as $sub_sector_data_value)
    <tr>
        <td>{{$sub_sector_data_value->sectors->plane->name}}</td>
        <td>{{$sub_sector_data_value->sectors->name}}</td>
        <td>{{$sub_sector_data_value->name}}</td>
        <td>
            @if($sub_sector_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.sub-sector.edit',$sub_sector_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-danger" href="{{URL::route('admin.sub-sector.remove',$sub_sector_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif