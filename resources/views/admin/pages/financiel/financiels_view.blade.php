<div class="col-xs-12">&nbsp;</div>
@if(count($financial_data)>0)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>From Year</th>
        <th>To Year</th>
        <th>Start Month</th>
        <th>End Month</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($financial_data as $financial_data_value)
    <tr>
        <td>{{$financial_data_value->years_from}}</td>
        <td>{{$financial_data_value->years_to}}</td>
        <td>{{$financial_data_value->start_month}}</td>
        <td>{{$financial_data_value->end_month}}</td>
        <td>
            @if($financial_data_value->status==1)
            Active
            @else
            InActive
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{URL::route('admin.financial-years.edit',$financial_data_value->id)}}"><i class="fa fa-pencil"></i></a>
            <!--                                    <button class="btn btn-primary" data-ui-sref="home.works.update">Update Status</button>-->
            <a class="btn btn-danger" href="{{URL::route('admin.financial-years.remove',$financial_data_value->id)}}" onclick="return confirm('Are you sure to delete')">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endif