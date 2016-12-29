<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FinancialYears;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;


class FinancialYearsController extends Controller
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
        $financial_data=FinancialYears::all();
        return view("admin.pages.financiel.financiels",['financial_data'=>$financial_data]);
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
        $this->validate($request,[
         'years_from'=>'required',
         'years_to'   =>'required',
          'start_month'=>'required',
           'end_month'   =>'required',
        ]);

        $years_from=Input::get('years_from');
        $years_to=Input::get('years_to');
        $start_month=Input::get('start_month');
        $end_month=Input::get('end_month');
        $status=Input::get('status');

        if($years_from>=$years_to)
        {
            Session::flash('warning','From Year should be less than To Year');
            return redirect::route('admin.financial-years.index');
        }
        if($start_month>=$end_month)
        {
            Session::flash('warning','Start Month should be less than End Month');
            return redirect::route('admin.financial-years.index');
        }


        $financial_details= new FinancialYears();
        $financial_details->years_from=$years_from;
        $financial_details->years_to=$years_to;
        $financial_details->start_month=$start_month;
        $financial_details->end_month=$end_month;
        $financial_details->status=$status;

        $financial_details->save();
        Session::flash('success','Financial Added Successfully');
        return redirect::route('admin.financial-years.index');

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

        $financial_data= FinancialYears::all();
        $financial_details=FinancialYears::findOrFail($id);
        return view('admin.pages.financiel.financiels_edit',['financial_data'=>$financial_data,'financial_details'=>$financial_details]);


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
            'years_from'=>'required',
            'years_to'   =>'required',
            'start_month'=>'required',
            'end_month'   =>'required',
        ]);

        $years_from=Input::get('years_from');
        $years_to=Input::get('years_to');
        $start_month=Input::get('start_month');
        $end_month=Input::get('end_month');
        $status=Input::get('status');


        if($years_from>=$years_to)
        {
            Session::flash('warning','From Year should be less than To Year');
            return redirect::route('admin.financial-years.index');
        }
//        if($start_month>=$end_month)
//        {
//            Session::flash('warning','Start Month should be less than End Month');
//            return redirect::route('admin.financial-years.index');
//        }

        $financial_details=FinancialYears::findOrFail($id);
        $financial_details->years_from=$years_from;
        $financial_details->years_to=$years_to;
        $financial_details->start_month=$start_month;
        $financial_details->end_month=$end_month;
        $financial_details->status=$status;

        $financial_details->save();
        Session::flash('success','Financial Updated Successfully');
        return redirect::route('admin.financial-years.index');
    }


    public function remove(Request $request,$id)
    {
        $financial_details=FinancialYears::find($id);
        $financial_details->destroy($id);
        Session::flash('success','Financial deleted Successfully');
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
