<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\WorkProgress;
use App\Models\Work;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AgencyExpenseController extends Controller
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
        //
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
        $works_details=Work::findOrFail($id);
        return view('users.pages.agency.agency_funds_expenses',['works_details'=>$works_details]);
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

            'bill'=>'required|mimes:txt,pdf,doc|max:10000',
            'spent' =>array('required', 'regex:/^\d*(\.\d{2})?$/'),
        ]);

        $agency_id=Auth::guard('users')->user()->id;
        $bill = $request->file('bill');
        $release_type=Input::get('release_type');
        $spent=Input::get('spent');

        $total_spent_amount = DB::table('work_progresses')
            ->where('work_id', '=', $id)
            ->sum('spent');

        $work_progress_update= new WorkProgress();

        $work= Work::findOrFail($id);
        $released_total_amount=$work->released_total_amount;

        if(($total_spent_amount+$spent)>$released_total_amount)
        {
            Session::flash('warning','You can not spent more then release fund');
            return Redirect::back();
        }

        if(count($bill)>0)
        {
            $destinationPath1 = 'bill/';
            $filename1 = $bill->getClientOriginalName();
            $picture1 = $destinationPath1.date('His').$filename1;
            $bill->move($destinationPath1, $picture1);
        }
        $work_progress_update->bill=$picture1;
        $work_progress_update->work_id=$id;
        $work_progress_update->spent=$spent;
        $work_progress_update->created_by=$agency_id;
        $work_progress_update->release_type=$release_type;
        $work_progress_update->upload_type=2;
        $work_progress_update->entry_date=date('Y-m-d');
        $work_progress_update->save();

        $total_spent_amount1 = DB::table('work_progresses')
            ->where('work_id', '=', $id)
            ->sum('spent');

        $work->total_spent_amount=$total_spent_amount1;
        $work->save();

        Session::flash('success','Your fund spent  Updated Successfully');
        return Redirect::back();
    }

    public function remove($id)
    {
        $work_progress=WorkProgress::where('work_id','=',$id)->where('upload_type','=',2)->get();
        $work=Work::findOrfail($id);
        $total_spent_amount1=0;
        foreach ($work_progress as $work_progress_value)
        {
        $work_progress_value->delete();
        }
        $work->total_spent_amount=$total_spent_amount1;
        $work->save();

        Session::flash('success','Your fund spent  deleted Successfully');
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
