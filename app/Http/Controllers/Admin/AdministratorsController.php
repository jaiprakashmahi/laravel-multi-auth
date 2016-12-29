<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Administrators;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AdministratorsController extends Controller
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
        $administrators_data=Administrators::all();

        return view("admin.pages.administrator.administrators_display",['administrators_data'=>$administrators_data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $talukas_options = DB::table('talukas')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view("admin.pages.administrator.administrators",['district_options'=>$district_options,'talukas_options'=>$talukas_options]);

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
            'name' => 'required|unique:administrators',
            'taluka_id' => 'required',
            'district' => 'required',
            'post' => 'required',
            'pin' => 'required|regex:/\b\d{6}\b/',
            'office_address' => 'required',

        ]);

        $name= Input::get('name');
        $district= Input::get('district');
        $post= Input::get('post');
        $pin= Input::get('pin');
        $office_address= Input::get('office_address');
        $status= Input::get('status');
        $taluka_id= Input::get('taluka_id');
        $administrators_details=new Administrators();
        $administrators_details->name=$name;
        $administrators_details->status=$status;
        $administrators_details->district=$district;
        $administrators_details->post=$post;
        $administrators_details->pin=$pin;
        $administrators_details->office_address=$office_address;
        $administrators_details->taluka_id=$taluka_id;
        $administrators_details->save();

        Session::flash('success','Administrators Added successfully');
        return Redirect::route('admin.administrators.index');
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
        $administrator_details = Administrators::findOrFail($id);
        $talukas_options = DB::table('talukas')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $administrators_data=Administrators::all();
        return view("admin.pages.administrator.administrators_edit",['district_options'=>$district_options,'talukas_options'=>$talukas_options,'administrators_data'=>$administrators_data,'administrator_details'=>$administrator_details]);

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
            'taluka_id' => 'required',
            'district' => 'required',
            'post' => 'required',
            'pin' => 'required|regex:/\b\d{6}\b/',
            'office_address' => 'required',

        ]);

        $name= Input::get('name');
        $district= Input::get('district');
        $post= Input::get('post');
        $pin= Input::get('pin');
        $office_address= Input::get('office_address');
        $status= Input::get('status');
        $taluka_id= Input::get('taluka_id');
        $administrators_details=Administrators::findOrFail($id);
        $administrators_details->name=$name;
        $administrators_details->status=$status;
        $administrators_details->district=$district;
        $administrators_details->post=$post;
        $administrators_details->pin=$pin;
        $administrators_details->office_address=$office_address;
        $administrators_details->taluka_id=$taluka_id;
        $administrators_details->save();
        Session::flash('success','Administrators Updated successfully');
        return Redirect::route('admin.administrators.index');
    }

    public function remove($id)
    {

        $administrators_details=Administrators::find($id);
        $administrators_details->delete($id);
        Session::flash('success','Administrator deleted successfully');
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
