<div class="col-xs-12">&nbsp;</div>
@if(count($village_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Taluka</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($village_data as $village_data_value)
    <tr>
        <td>{{$village_data_value->talukas->name}}</td>
        <td>{{$village_data_value->name}}</td>
        <td>
            @if($village_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.village.edit',$village_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
            <a class="btn btn-danger" href="{{URL::route('admin.village.remove',$village_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif