<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Officers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class OfficersController extends Controller
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
        $officer_data=Officers::all();

             return view("admin.pages.Officer.officers_display",['officer_data'=>$officer_data]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officer_data=Officers::all();

        $talukas_options = DB::table('talukas')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view("admin.pages.Officer.officers",['district_options'=>$district_options,'officer_data'=>$officer_data,'talukas_options'=>$talukas_options]);

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
            'name' => 'required|unique:officers',
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
        $officer_details=new Officers();
        $officer_details->name=$name;
        $officer_details->status=$status;
        $officer_details->district=$district;
        $officer_details->post=$post;
        $officer_details->pin=$pin;
        $officer_details->office_address=$office_address;
        $officer_details->taluka_id=$taluka_id;

        $officer_details->save();

        Session::flash('success','Officer Added successfully');
        return Redirect::route('admin.officers.index');
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
        $officer_details = Officers::findOrFail($id);
        $talukas_options = DB::table('talukas')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $officer_data=Officers::all();
        return view("admin.pages.Officer.officers_edit",['district_options'=>$district_options,'talukas_options'=>$talukas_options,'officer_data'=>$officer_data,'officer_details'=>$officer_details]);

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
        $officer_details=Officers::findOrFail($id);
        $officer_details->name=$name;
        $officer_details->status=$status;
        $officer_details->district=$district;
        $officer_details->post=$post;
        $officer_details->pin=$pin;
        $officer_details->office_address=$office_address;
        $officer_details->taluka_id=$taluka_id;

        $officer_details->save();

        Session::flash('success','Officer Updated successfully');
        return Redirect::route('admin.officers.index');
    }

    public function remove(Request $request,$id)
    {
        $officer_details=Officers::find($id); //it will be work with anchor tag only
        $officer_details->destroy($id);
        $request->session()->flash('success', 'Officer  successfully deleted ');
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
