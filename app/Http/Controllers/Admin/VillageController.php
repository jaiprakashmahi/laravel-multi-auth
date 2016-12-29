<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Villages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class VillageController extends Controller
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
        $village_data=Villages::all();

        $talukas_options = DB::table('talukas')->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view("admin.pages.village.villages",['village_data'=>$village_data,'talukas_options'=>$talukas_options]);

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
            'name' => 'required|unique:villages',
            'taluka_id' => 'required',

        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $taluka_id= Input::get('taluka_id');
        $village_details=new Villages();
        $village_details->name=$name;
        $village_details->status=$status;
        $village_details->taluka_id=$taluka_id;

        $village_details->save();

        Session::flash('success','Village Added successfully');
        return Redirect::route('admin.village.index');
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
        $village_details = Villages::findOrFail($id);
        $village_data=Villages::all();
        $talukas_options = DB::table('talukas')->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view("admin.pages.village.villages_edit",['village_data'=>$village_data,'village_details'=>$village_details,'talukas_options'=>$talukas_options]);

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

        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $taluka_id= Input::get('taluka_id');
        $village_details= Villages::findOrFail($id);
        $village_details->name=$name;
        $village_details->status=$status;
        $village_details->taluka_id=$taluka_id;

        $village_details->save();

        Session::flash('success','Village Updated successfully');
        return Redirect::route('admin.village.index');
    }


    public function remove(Request $request,$id)
    {
        $sector_details=Villages::find($id); //it will be work with anchor tag only
        $sector_details->destroy($id);
        $request->session()->flash('success', 'Village  successfully deleted ');
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
