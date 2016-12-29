<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Subsectors;
use App\Models\Sectors;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SubSectorController extends Controller
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
        $sub_sector_data=Subsectors::all();

        $sectors_options = DB::table('sectors')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $plane_options = DB::table('planes')->distinct()->orderBy('name', 'asc')->lists('name','id');

        return view("admin.pages.subsector.subsectors",['plane_options'=>$plane_options,'sub_sector_data'=>$sub_sector_data,'sectors_options'=>$sectors_options]);
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
            'name' => 'required|unique:subsectors',
            'sector_id' => 'required',

        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $sector_id= Input::get('sector_id');
        $sub_sector_details=new Subsectors();
        $sub_sector_details->name=$name;
        $sub_sector_details->status=$status;
        $sub_sector_details->sector_id=$sector_id;


        $sub_sector_details->save();

        Session::flash('success','Sub Sector Added successfully');
        return Redirect::route('admin.sub-sector.index');
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
        $sub_sector_details = Subsectors::findOrFail($id);
        $sub_sector_data=Subsectors::all();

        $plane_options = DB::table('planes')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sectors_options = DB::table('sectors')->where('plane_id','=',$sub_sector_details->sectors->plane->id)->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view("admin.pages.subsector.subsectors_edit",['plane_options'=>$plane_options,'sub_sector_data'=>$sub_sector_data,'sub_sector_details'=>$sub_sector_details,'sectors_options'=>$sectors_options]);

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
            'sector_id' => 'required',
        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $sector_id= Input::get('sector_id');
        $sub_sector_details = Subsectors::findOrFail($id);
        $sub_sector_details->name=$name;
        $sub_sector_details->status=$status;
        $sub_sector_details->sector_id=$sector_id;
        $sub_sector_details->save();
        Session::flash('success','Sub Sector Updated successfully');
        return Redirect::route('admin.sub-sector.index');
    }


    public function remove(Request $request,$id)
    {
        $sector_details=Subsectors::find($id); //it will be work with anchor tag only
        $sector_details->destroy($id);
        $request->session()->flash('success', 'Sector  successfully deleted ');
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
