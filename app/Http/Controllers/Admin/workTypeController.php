<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Worktype;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class workTypeController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_type_data=Worktype::all();
        return view("admin.pages.worktype.work_types",['work_type_data'=>$work_type_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:worktypes',
        ]);

        $id = Auth::guard('admin')->user()->id;
        $name= Input::get('name');
        $status= Input::get('status');
        $work_types_details=new Worktype();
        $work_types_details->name=$name;
        $work_types_details->status=$status;
        $work_types_details->created_by=$id;
        $work_types_details->save();

        Session::flash('success','Work Type Added successfully');
        return Redirect::route('admin.work-type.index');
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
        $work_type_details = Worktype::findOrFail($id);
        $work_type_data=Worktype::all();
        return view("admin.pages.worktype.work_types_edit",['work_type_data'=>$work_type_data,'work_type_details'=>$work_type_details]);

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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $work_type_details=Worktype::findOrFail($id);
        $work_type_details->name=$name;
        $work_type_details->status=$status;
        $work_type_details->save();

        Session::flash('success','Work Type Updated successfully');
        return Redirect::route('admin.work-type.index');
    }

    public function remove(Request $request,$id)
    {
        $work_type_details=Worktype::find($id); //it will be work with anchor tag only
        $work_type_details->destroy($id);
        $request->session()->flash('success', 'Work Type  successfully deleted ');
        return Redirect::back();
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
