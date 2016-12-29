<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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

class SectorController extends Controller
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
        $sector_data=Sectors::all();
        $plane_options = DB::table('planes')->distinct()->orderBy('name', 'asc')->lists('name','id');

        return view("admin.pages.sectors.sectors",['plane_options'=>$plane_options,'sector_data'=>$sector_data]);
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
            'name' => 'required|unique:sectors',
            'plane_id' => 'required',
        ]);

        $name= Input::get('name');
        $plane_id= Input::get('plane_id');
        $status= Input::get('status');
        $sector_details=new Sectors();
        $sector_details->name=$name;
        $sector_details->status=$status;
        $sector_details->plane_id=$plane_id;
        $sector_details->save();

        Session::flash('success','Sector Added successfully');
        return Redirect::route('admin.sector.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $sector_details = Sectors::findOrFail($id);

        $sector_data=Sectors::all();
        $plane_options = DB::table('planes')->distinct()->orderBy('name', 'asc')->lists('name','id');

        return view("admin.pages.sectors.sectors_edit",['plane_options'=>$plane_options,'sector_data'=>$sector_data,'sector_details'=>$sector_details]);

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
            'plane_id' => 'required',
        ]);

        $name= Input::get('name');
        $status= Input::get('status');
        $plane_id= Input::get('plane_id');
        $sector_details = Sectors::findOrFail($id);
        $sector_details->name=$name;
        $sector_details->status=$status;
        $sector_details->plane_id=$plane_id;
        $sector_details->save();

        Session::flash('success','Sector Updated successfully');
        return Redirect::route('admin.sector.index');
    }


    public function remove(Request $request,$id)
    {
        $sector_details=Sectors::find($id); //it will be work with anchor tag only
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
