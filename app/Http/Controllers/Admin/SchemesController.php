<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Scheme;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SchemesController extends Controller
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
        $scheme_data=Scheme::all();
        $sectors_options = DB::table('sectors')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $plane_options = DB::table('planes')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $subsectors_options = DB::table('subsectors')->distinct()->orderBy('name', 'asc')->lists('name','id');

        return view("admin.pages.scheme.schemes",['sectors_options'=>$sectors_options,'plane_options'=>$plane_options,'subsectors_options'=>$subsectors_options,'schemes_data'=>$scheme_data]);
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
            'name' => 'required|unique:schemes',
            'sub_sector_id' => 'required',
           'actual_cost' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
        ]);

        $id = Auth::guard('admin')->user()->id;
        $name= Input::get('name');
        $actual_cost=Input::get('actual_cost');
        $sub_sector_id= Input::get('sub_sector_id');
        $status= Input::get('status');
        $scheme_details=new Scheme();
        $scheme_details->name=$name;
        $scheme_details->actual_cost=$actual_cost;
        $scheme_details->status=$status;
        $scheme_details->sub_sector_id=$sub_sector_id;
        $scheme_details->created_by=$id;
        $scheme_details->save();

        Session::flash('success','Scheme Added successfully');
        return Redirect::route('admin.schemes.index');
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
        $scheme_details = Scheme::findOrFail($id);

        $scheme_data=Scheme::all();

        $plane_options = DB::table('planes')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sectors_options = DB::table('sectors')->where('plane_id','=',$scheme_details->subsector->sectors->plane->id)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $subsectors_options = DB::table('subsectors')->where('sector_id','=',$scheme_details->subsector->sectors->id)->distinct()->orderBy('name', 'asc')->lists('name','id');
        return view("admin.pages.scheme.schemes_edit",['plane_options'=>$plane_options,'sectors_options'=>$sectors_options,'subsectors_options'=>$subsectors_options,'schemes_data'=>$scheme_data,'schemes_details'=>$scheme_details]);

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
            'sub_sector_id' => 'required',
            'actual_cost' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
        ]);

        $sub_sector_id= Input::get('sub_sector_id');
        $name= Input::get('name');
        $actual_cost=Input::get('actual_cost');
        $status= Input::get('status');
        $scheme_details=Scheme::findOrFail($id);
        $scheme_details->name=$name;
        $scheme_details->actual_cost=$actual_cost;
        $scheme_details->sub_sector_id=$sub_sector_id;
        $scheme_details->status=$status;
        $scheme_details->save();

        Session::flash('success','Scheme Updated successfully');
        return Redirect::route('admin.schemes.index');
    }

    public function remove(Request $request,$id)
    {
        $sector_details=Scheme::find($id); //it will be work with anchor tag only
        $sector_details->destroy($id);
        $request->session()->flash('success', 'Scheme  successfully deleted ');
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
