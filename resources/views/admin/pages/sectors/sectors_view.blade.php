<div class="col-xs-12">&nbsp;</div>
@if(count($sector_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Plan</th>
        <th>Sector</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($sector_data as $sector_data_value)
    <tr>
        <td>{{$sector_data_value->plane->name}}</td>
        <td>{{$sector_data_value->name}}</td>
        <td>
            @if($sector_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.sector.edit',$sector_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
            <a class="btn btn-danger" href="{{URL::route('admin.sector.remove',$sector_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif