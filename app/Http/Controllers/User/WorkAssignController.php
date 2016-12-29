<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Models\Work;
use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class WorkAssignController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth:users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $created_by=Auth::guard('users')->user()->id;
        $work_assign_details=Work::where('work_assign_status','=',1)->where('created_by', '=', $created_by)->get();
        return view('users.pages.assign.work_assign_display',['work_assign_details'=>$work_assign_details]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created_by=Auth::guard('users')->user()->id;
        $agency_options = DB::table('users')->where('status', '=', 1)->where('usertype', '=','AGENCY')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $work_options = DB::table('works')->where('created_by', '=', $created_by)->where('work_assign_status', '=', 0)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view('users.pages.assign.work_assign',['agency_options'=>$agency_options,'work_options'=>$work_options]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'work' => 'required',
            'agency'=>'required',

        ]);

        $work=Input::get('work');
        $agency=Input::get('agency');
        $work_assign_status=Input::get('work_assign_status');

        $work_details_update=Work::findOrFail($work);
        $work_details_update->work_assign_status=$work_assign_status;
        $work_details_update->agency_id=$agency;
        $work_details_update->save();

        Session::flash('success','Work Assign Successfully');
        return Redirect::route('user.work_assign.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $works_details=Work::findOrFail($id);

        $created_by=Auth::guard('users')->user()->id;
        $agency_options = DB::table('users')->where('status', '=', 1)->where('usertype', '=','AGENCY')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $work_options = DB::table('works')->where('created_by', '=', $created_by)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
       // dd($agency_options);exit;

        return view('users.pages.assign.work_assign_edit',['works_details'=>$works_details,'agency_options'=>$agency_options,'work_options'=>$work_options]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'work' => 'required',
            'agency'=>'required',
        ]);

        $work=Input::get('work');
        $agency=Input::get('agency');
        $work_assign_status=Input::get('work_assign_status');

        $work_details_update=Work::findOrFail($work);
        $work_details_update->work_assign_status=$work_assign_status;
        $work_details_update->agency_id=$agency;
        $work_details_update->save();

        Session::flash('success','Work Assign Updated Successfully');
        return Redirect::route('user.work_assign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
