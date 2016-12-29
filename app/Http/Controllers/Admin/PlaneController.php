<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Plane;
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

class PlaneController extends Controller
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
        $plane_data=Plane::all();
        return view("admin.pages.plane.planes",['plane_data'=>$plane_data]);
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
            'name' => 'required|unique:planes',
        ]);

        $id = Auth::guard('admin')->user()->id;
        $name= Input::get('name');
        $status= Input::get('status');
        $plane_details=new Plane();
        $plane_details->name=$name;
        $plane_details->status=$status;
        $plane_details->created_by=$id;
        $plane_details->save();

        Session::flash('success','Plan Added successfully');
        return Redirect::route('admin.plane.index');

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
        $plane_details = Plane::findOrFail($id);

        $plane_data=Plane::all();
        return view("admin.pages.plane.planes_edit",['plane_data'=>$plane_data,'plane_details'=>$plane_details]);

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
        $plane_details=Plane::findOrFail($id);
        $plane_details->name=$name;
        $plane_details->status=$status;
        $plane_details->save();

        Session::flash('success','Plan Updated successfully');
        return Redirect::route('admin.plane.index');
    }

    public function remove(Request $request,$id)
    {
        $sector_details=Plane::find($id); //it will be work with anchor tag only
        $sector_details->destroy($id);
        $request->session()->flash('success', 'Plan  successfully deleted ');
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
