<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\FinancialYears;
use App\Models\WorkProgress;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class WorkController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth:users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $created_by=Auth::guard('users')->user()->id;
       $work_details=Work::where('work_status_dpc','=',1)->where('created_by','=',$created_by)->get();
       return view('users.pages.works.work_display',['work_details'=>$work_details]);

    }

    public function Partial($status)
    {

        $created_by=Auth::guard('users')->user()->id;
        $work_details= Work::where('work_status_dpc','=',$status)->where('created_by','=',$created_by)->get();

        return view('users.pages.works.work_partial_display',['work_details'=>$work_details]);

    }
    public function Full($status)
    {
        $created_by=Auth::guard('users')->user()->id;
        $work_details= Work::where('work_status_dpc','=',$status)->where('created_by','=',$created_by)->get();
        return view('users.pages.works.work_full_display',['work_details'=>$work_details]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $work_type_options = DB::table('worktypes')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $financial_options = DB::table('financial_years as f')
           ->selectRaw('CONCAT(f.years_from, " - ", f.years_to) as concatname, f.id')
            ->lists('concatname', 'f.id');

        $plane_options = DB::table('planes')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sector_options = DB::table('sectors')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sub_sector_options = DB::table('subsectors')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $scheme_options = DB::table('schemes')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $taluka_options = DB::table('talukas')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $village_options = DB::table('villages')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $officer_options = DB::table('officers')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $administrators_options = DB::table('administrators')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $agency_options = DB::table('users')->where('status', '=', 1)->where('usertype', '=','AGENCY')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $final_officer_options = DB::table('final_officers')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');

        return view('users.pages.works.work_create',['final_officer_options'=>$final_officer_options,'agency_options'=>$agency_options,'administrators_options'=>$administrators_options,'officer_options'=>$officer_options,'village_options'=>$village_options,'taluka_options'=>$taluka_options,'district_options'=>$district_options,'scheme_options'=>$scheme_options,'sub_sector_options'=>$sub_sector_options,'sector_options'=>$sector_options,'plane_options'=>$plane_options,'work_type_options'=>$work_type_options,'financial_options'=>$financial_options]);

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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:works',
            'work_type'=>'required',
            'financial'=>'required',
            'plane'=>'required',
            'sector'=>'required',
            'sub_sector'=>'required',
            'scheme'=>'required',
            'district'=>'required',
            'taluka'=>'required',
            'village'=>'required',
            'remarks'=>'required',
            'officer'=>'required',
            'technical_sanction_date'=>'required',
            'technical_sanction_approval_number' =>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'administrator'=>'required',
            'administrator_approval_date'=>'required',
            'administrator_approval_number'=>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'final_officer_id'=>'required',
            'final_officer_approval_date'=>'required',
            'final_officer_approval_number'=>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'agency'=>'required',
            'scheme_for'=>'required',
            'estimated_cost' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'status'=>'required',
        ]);

        $created_by=Auth::guard('users')->user()->id;
        $name=Input::get('name');
        $scheme_for=Input::get('scheme_for');
        $agency=Input::get('agency');
        $work_type=Input::get('work_type');
        $financial=Input::get('financial');
        $plane=Input::get('plane');
        $sector=Input::get('sector');
        $sub_sector=Input::get('sub_sector');
        $scheme=Input::get('scheme');
        $district=Input::get('district');
        $taluka=Input::get('taluka');
        $village=Input::get('village');
        $remarks=Input::get('remarks');
        $officer=Input::get('officer');
        $technical_sanction_date=Input::get('technical_sanction_date');
        $technical_sanction_approval_number=Input::get('technical_sanction_approval_number');
        $administrator=Input::get('administrator');
        $administrator_approval_date=Input::get('administrator_approval_date');
        $administrator_approval_number=Input::get('administrator_approval_number');
        $final_officer_id=Input::get('final_officer_id');
        $final_officer_approval_date=Input::get('final_officer_approval_date');
        $final_officer_approval_number=Input::get('final_officer_approval_number');
        $estimated_cost=Input::get('estimated_cost');
        $status=Input::get('status');

        $works_details= new Work();
        $works_details->name=$name;
        $works_details->work_type_id=$work_type;
        $works_details->financial_year_id=$financial;
        $works_details->plane_id=$plane;
        $works_details->sector_id=$sector;
        $works_details->sub_sector_id=$sub_sector;
        $works_details->scheme_id=$scheme;
        $works_details->district_id=$district;
        $works_details->taluka_id=$taluka;
        $works_details->village_id=$village;
        $works_details->dpc_work_remarks=$remarks;
        $works_details->officer_id=$officer;
        $works_details->technical_sanction_date=$technical_sanction_date;
        $works_details->technical_sanction_approval_number=$technical_sanction_approval_number;
        $works_details->administrator_id=$administrator;
        $works_details->administrator_approval_date=$administrator_approval_date;
        $works_details->administrator_approval_number=$administrator_approval_number;
        $works_details->final_officer_id=$final_officer_id;
        $works_details->final_officer_approval_date=$final_officer_approval_date;
        $works_details->final_officer_approval_number=$final_officer_approval_number;
        $works_details->estimated_cost=$estimated_cost;
        $works_details->agency_id=$agency;
        $works_details->scheme_for=$scheme_for;
        $works_details->created_by=$created_by;
        $works_details->work_status_dpc=$status;

        $works_details->save();

        Session::flash('success','Work created Successfully');
        return Redirect::route('user.work.index');

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
        $works_details=Work::findOrFail($id);

        $work_type_options = DB::table('worktypes')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $financial_options = DB::table('financial_years as f')
            ->selectRaw('CONCAT(f.years_from, " - ", f.years_to) as concatname, f.id')
            ->lists('concatname', 'f.id');

        $plane_options = DB::table('planes')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sector_options = DB::table('sectors')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sub_sector_options = DB::table('subsectors')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $scheme_options = DB::table('schemes')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $taluka_options = DB::table('talukas')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $village_options = DB::table('villages')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $officer_options = DB::table('officers')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $administrators_options = DB::table('administrators')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $agency_options = DB::table('users')->where('status', '=', 1)->where('usertype', '=','AGENCY')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $final_officer_options = DB::table('final_officers')->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');

        //dd($financial_options);exit;
        return view('users.pages.works.work_edit',['final_officer_options'=>$final_officer_options,'agency_options'=>$agency_options,'works_details'=>$works_details,'administrators_options'=>$administrators_options,'officer_options'=>$officer_options,'village_options'=>$village_options,'taluka_options'=>$taluka_options,'district_options'=>$district_options,'scheme_options'=>$scheme_options,'sub_sector_options'=>$sub_sector_options,'sector_options'=>$sector_options,'plane_options'=>$plane_options,'work_type_options'=>$work_type_options,'financial_options'=>$financial_options]);


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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'work_type'=>'required',
            'financial'=>'required',
            'plane'=>'required',
            'sector'=>'required',
            'sub_sector'=>'required',
            'scheme'=>'required',
            'district'=>'required',
            'taluka'=>'required',
            'village'=>'required',
            'remarks'=>'required',
            'officer'=>'required',
            'technical_sanction_date'=>'required',
            'technical_sanction_approval_number' =>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'administrator'=>'required',
            'administrator_approval_date'=>'required',
            'administrator_approval_number'=>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'final_officer_id'=>'required',
            'final_officer_approval_date'=>'required',
            'final_officer_approval_number'=>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'agency'=>'required',
            'scheme_for'=>'required',
            'estimated_cost' => array('required', 'regex:/^\d*(\.\d{2})?$/'),
//            'status'=>'required',
        ]);

        $created_by=Auth::guard('users')->user()->id;
        $name=Input::get('name');
        $scheme_for=Input::get('scheme_for');
        $agency=Input::get('agency');
        $work_type=Input::get('work_type');
        $financial=Input::get('financial');
        $plane=Input::get('plane');
        $sector=Input::get('sector');
        $sub_sector=Input::get('sub_sector');
        $scheme=Input::get('scheme');
        $district=Input::get('district');
        $taluka=Input::get('taluka');
        $village=Input::get('village');
        $remarks=Input::get('remarks');
        $officer=Input::get('officer');
        $technical_sanction_date=Input::get('technical_sanction_date');
        $technical_sanction_approval_number=Input::get('technical_sanction_approval_number');
        $administrator=Input::get('administrator');
        $administrator_approval_date=Input::get('administrator_approval_date');
        $administrator_approval_number=Input::get('administrator_approval_number');
        $final_officer_id=Input::get('final_officer_id');
        $final_officer_approval_date=Input::get('final_officer_approval_date');
        $final_officer_approval_number=Input::get('final_officer_approval_number');
        $estimated_cost=Input::get('estimated_cost');
//        $status=Input::get('status');

        $works_details= Work::findOrfail($id);
        $works_details->name=$name;
        $works_details->work_type_id=$work_type;
        $works_details->financial_year_id=$financial;
        $works_details->plane_id=$plane;
        $works_details->sector_id=$sector;
        $works_details->sub_sector_id=$sub_sector;
        $works_details->scheme_id=$scheme;
        $works_details->district_id=$district;
        $works_details->taluka_id=$taluka;
        $works_details->village_id=$village;
        $works_details->dpc_work_remarks=$remarks;
        $works_details->officer_id=$officer;
        $works_details->technical_sanction_date=$technical_sanction_date;
        $works_details->technical_sanction_approval_number=$technical_sanction_approval_number;
        $works_details->administrator_id=$administrator;
        $works_details->administrator_approval_date=$administrator_approval_date;
        $works_details->administrator_approval_number=$administrator_approval_number;
        $works_details->final_officer_id=$final_officer_id;
        $works_details->final_officer_approval_date=$final_officer_approval_date;
        $works_details->final_officer_approval_number=$final_officer_approval_number;
        $works_details->estimated_cost=$estimated_cost;
        $works_details->agency_id=$agency;
        $works_details->scheme_for=$scheme_for;
        $works_details->created_by=$created_by;
//        $works_details->work_status_dpc=$status;
        $works_details->save();
        Session::flash('success','Work Updated Successfully');
        return Redirect::route('user.work.index');
    }

    public function remove($id)
    {

        $works_details=Work::findOrFail($id);
        $works_details->destroy($id);
        Session::flash('success','Work deleted Successfully');
        return Redirect::back();
    }




}
