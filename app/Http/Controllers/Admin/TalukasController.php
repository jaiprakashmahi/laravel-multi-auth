<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Talukas;
use App\Models\District;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
class TalukasController extends Controller
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
        $taluka_data=Talukas::all();
        $district_option=DB::table('districts')->distinct()->orderBy('id')->lists('name','id');
        return view("admin.pages.taluka.talukas",['talukas_data'=>$taluka_data,'district_option'=>$district_option]);
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
            'name' => 'required|unique:talukas',
            'district' => 'required',

        ]);

        $id = Auth::guard('admin')->user()->id;
        $name= Input::get('name');
        $status= Input::get('status');
        $district= Input::get('district');
        $taluka_details=new Talukas();
        $taluka_details->name=$name;
        $taluka_details->status=$status;
        $taluka_details->created_by=$id;
        $taluka_details->district=$district;

        $taluka_details->save();
        Session::flash('success','Taluka Added successfully');
        return Redirect::route('admin.talukas.index');
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
        $taluka_details = Talukas::findOrFail($id);
        $talukas_data=Talukas::all();
        $district_option=DB::table('districts')->distinct()->orderBy('id')->lists('name','id');
        return view("admin.pages.taluka.talukas_edit",['district_option'=>$district_option,'talukas_data'=>$talukas_data,'taluka_details'=>$taluka_details]);

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
            'district' => 'required',
        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $district= Input::get('district');
        $taluka_details=Talukas::findOrFail($id);
        $taluka_details->name=$name;
        $taluka_details->status=$status;
        $taluka_details->district=$district;

        $taluka_details->save();
        Session::flash('success','Taluka Updated successfully');
        return Redirect::route('admin.talukas.index');

    }


    public function remove(Request $request,$id)
    {
        $sector_details=Talukas::find($id); //it will be work with anchor tag only
        $sector_details->destroy($id);
        $request->session()->flash('success', 'Taluka  successfully deleted ');
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
