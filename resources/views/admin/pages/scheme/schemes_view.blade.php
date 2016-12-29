<div class="col-xs-12">&nbsp;</div>
@if(count($schemes_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th> Plan</th>
        <th> Sector</th>
        <th>Sub Sector</th>
        <th>Scheme</th>
        <th>Fund</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($schemes_data as $schemes_data_value)
    <tr>
        <td>{{$schemes_data_value->subsector->sectors->plane->name}}</td>
        <td>{{$schemes_data_value->subsector->sectors->name}}</td>
        <td>{{$schemes_data_value->subsector->name}}</td>
        <td>{{$schemes_data_value->name}}</td>
        <td>{{$schemes_data_value->actual_cost}}</td>

        <td>
            @if($schemes_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.schemes.edit',$schemes_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
            <a class="btn btn-danger" href="{{URL::route('admin.schemes.remove',$schemes_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif