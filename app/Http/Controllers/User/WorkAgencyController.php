<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Models\Work;
use App\Models\User;
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

class WorkAgencyController extends Controller
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
        $agency_id=Auth::guard('users')->user()->id;
        $work_assign_details=Work::where('work_status_dpc','!=',1)->where('work_status_agency','!=',2)->where('work_status_agency','!=',1)->where('agency_id', '=', $agency_id)->get();
        return view('users.pages.agency.agency_work_assign_view',['work_assign_details'=>$work_assign_details]);

    }

    public function AgencyPartial($status)
    {

        $agency_id=Auth::guard('users')->user()->id;
//        $work_details= Work::groupBy('work_id')
//        ->join('work_progresses', 'works.id', '=', 'work_progresses.work_id')
//        ->join('planes', 'planes.id', '=', 'works.plane_id')
//        ->join('users', 'users.id', '=', 'works.created_by')
//        ->selectRaw('*, sum(work_progresses.release_fund) as total_spent')
//         ->select('works.released_total_amount as released_total_amount','works.release_type as release_type','works.estimated_cost as estimated_cost','planes.name as plane_name','users.name as dpc_name','works.id as work_id','works.name as work_name')
//         ->where('works.agency_id', $agency_id)
//        ->where('works.release_type', $status)
//        ->get();

       $work_details= Work::where('work_status_dpc','=',$status)->where('agency_id', '=', $agency_id)->get();
        return view('users.pages.agency.work_partial_display',['work_details'=>$work_details]);

    }
    public function AgencyFull($status)
    {
        $agency_id=Auth::guard('users')->user()->id;
        $work_details= Work::where('work_status_dpc','=',$status)->where('agency_id', '=', $agency_id)->get();
        return view('users.pages.agency.work_full_display',['work_details'=>$work_details]);

    }
    public function AgencyProgress($status)
    {
//        $agency_id=Auth::guard('users')->user()->id;
//        $work_details=Work::where('work_status_agency','=',$status)->where('agency_id', '=', $agency_id)->get();
//        return view('users.pages.agency.agency_work_progress_view',['work_details'=>$work_details]);

//        $sub = Message::orderBy('createdAt','DESC');
//
//        $chats = DB::table(DB::raw("({$sub->toSql()}) as sub"))
//            ->where('toId',$id)
//            ->groupBy('fromId')
//            ->get();

        $agency_id=Auth::guard('users')->user()->id;
        $work_details=WorkProgress::where('progress_status', $status)->where('progress_status','!=',2)
        ->orderBy('id', 'desc')
        ->where('created_by', '=', $agency_id)
        ->get()
        ->unique('work_id');
        return view('users.pages.agency.agency_work_progress_view',['work_details'=>$work_details]);

    }

    public function WorkComplete($status)
    {
        $agency_id=Auth::guard('users')->user()->id;
        $work_details=WorkProgress::where('progress_status', $status)
            ->orderBy('id', 'desc')
            ->where('created_by', '=', $agency_id)
            ->get()
            ->unique('work_id');
        return view('users.pages.agency.agency_work_complete_view',['work_details'=>$work_details]);

    }


    public function WorkClose($id)
    {
        $progress_status=2;
        $work_progress= WorkProgress::where('work_id','=',$id)->orderBy('id', 'desc')->get();//->firstOrFail();  //findOrfail($id);
        foreach($work_progress as $work_progress_value)
        {
            $work_progress_value->progress_status=$progress_status;
            $work_progress_value->save();
        }

        Session::flash('success','Work Close Successfully');
        return Redirect::back();

    }
    public function remove($id) // remove work progress start again from 0%
    {
        //dd($id);exit;
//        $work_status_agency=0;
//        $work= Work::where('id','=',$id)->get();
//
//        foreach($work as $work_value)
//        {
//            $work_value->work_status_agency=$work_status_agency;
//            $work_value->save();
//        }

        $progress_status=1;
        $upload_type=1;
        $work_progress= WorkProgress::where('work_id','=',$id)->where('upload_type','=',$upload_type)->where('progress_status','=',$progress_status)->orderBy('id', 'desc')->get();//->firstOrFail();  //findOrfail($id);
        foreach($work_progress as $work_progress_value)
        {
            $work_progress_value->delete();
        }
        Session::flash('success','progress deleted Successfully');
        return Redirect::back();

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
        //
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
        $agency_id=Auth::guard('users')->user()->id;
        $works_details=Work::findOrFail($id);
        $work_type_options = DB::table('worktypes')->where('id','=',$works_details->worktype->id)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $financial_options = DB::table('financial_years as f')
            ->selectRaw('CONCAT(f.years_from, " - ", f.years_to) as concatname, f.id')
            ->where('id','=',$works_details->financial->id)
            ->lists('concatname', 'f.id');
        $plane_options = DB::table('planes')->where('id','=',$works_details->plane->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sector_options = DB::table('sectors')->where('id','=',$works_details->sector->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $sub_sector_options = DB::table('subsectors')->where('id','=',$works_details->subsector->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $scheme_options = DB::table('schemes')->where('id','=',$works_details->scheme->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $district_options = DB::table('districts')->where('id','=',$works_details->district->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $taluka_options = DB::table('talukas')->where('id','=',$works_details->taluka->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $village_options = DB::table('villages')->where('id','=',$works_details->village->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $officer_options = DB::table('officers')->where('id','=',$works_details->officer->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $administrators_options = DB::table('administrators')->where('id','=',$works_details->administrator->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');
        $agency_options = DB::table('users')->where('id','=',$agency_id)->where('status', '=', 1)->where('usertype', '=','AGENCY')->distinct()->orderBy('name', 'asc')->lists('name','id');
        $final_officer_options = DB::table('final_officers')->where('id','=',$works_details->finalOfficer->id)->where('status', '=', 1)->distinct()->orderBy('name', 'asc')->lists('name','id');

        return view('users.pages.agency.agency_work_update',['final_officer_options'=>$final_officer_options,'agency_options'=>$agency_options,'works_details'=>$works_details,'administrators_options'=>$administrators_options,'officer_options'=>$officer_options,'village_options'=>$village_options,'taluka_options'=>$taluka_options,'district_options'=>$district_options,'scheme_options'=>$scheme_options,'sub_sector_options'=>$sub_sector_options,'sector_options'=>$sector_options,'plane_options'=>$plane_options,'work_type_options'=>$work_type_options,'financial_options'=>$financial_options]);

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

            'tender_call_date'=>'required',
            'tender_open_date'=>'required',
            'tender_selected_date'=>'required',
            'work_order_date'=>'required',
            'tender_start_date'=>'required|before:tender_end_date',
            'tender_end_date'=>'required',
            'agency_work_remarks'=>'required',
            'status'=>'required',
            'tender_value'=>array('required', 'regex:/^\d*(\.\d{2})?$/'),

        ]);

        $agency_id=Auth::guard('users')->user()->id;
        $tender_call_date=Input::get('tender_call_date');
        $tender_open_date=Input::get('tender_open_date');
        $tender_selected_date=Input::get('tender_selected_date');
        $work_order_date=Input::get('work_order_date');
        $tender_start_date=Input::get('tender_start_date');
        $agency_work_remarks=Input::get('agency_work_remarks');
        $tender_end_date=Input::get('tender_end_date');
        $tender_value=Input::get('tender_value');
        $status=Input::get('status');

        $works_details= Work::findOrfail($id);
        $works_details->tender_call_date=$tender_call_date;
        $works_details->tender_open_date=$tender_open_date;
        $works_details->tender_selected_date=$tender_selected_date;
        $works_details->work_order_date=$work_order_date;
        $works_details->tender_start_date=$tender_start_date;
        $works_details->tender_end_date=$tender_end_date;
        $works_details->tender_value=$tender_value;
        $works_details->work_status_agency=$status;
        $works_details->agency_work_remarks=$agency_work_remarks;

        $works_progress_details=new WorkProgress();
        $works_progress_details->progress_status=$status;
        $works_progress_details->created_by=$agency_id;
        $works_progress_details->work_id=$id;
        $works_progress_details->save();
        $works_details->save();
        Session::flash('success','Work Updated Successfully');
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
