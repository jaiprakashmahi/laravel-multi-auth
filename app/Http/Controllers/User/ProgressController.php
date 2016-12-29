<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Work;
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

class ProgressController extends Controller
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
        $work_id=$id;
        return view('users.pages.works.work_release',['work_id'=>$work_id]);
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

            'release_type'=>'required',
            'release_fund' =>array('required', 'regex:/^\d*(\.\d{2})?$/'),
        ]);

        $release_fund=Input::get('release_fund');
        $work_id=Input::get('work_id');
        $release_type=Input::get('release_type');
        $created_by=Auth::guard('users')->user()->id;

        $released_total_amount = DB::table('work_progresses')
            ->where('work_id', '=', $work_id)
            ->sum('release_fund');

        $work=Work::findOrFail($id);
        $work->work_status_dpc=$release_type;
        $work->release_type=$release_type;
        $estimated_cost=$work->estimated_cost;

        $work_progress= new WorkProgress();
        $work_progress->release_fund=$release_fund;
        $work_progress->release_type=$release_type;
        $work_progress->work_id=$work_id;
        $work_progress->created_by=$created_by;
        $work_progress->entry_date=date('Y-m-d');


        //full release check
        if($release_type==3)
        {
            if($estimated_cost!=$release_fund)
            {
                Session::flash('warning','Full release fund should be adject estimated fund');
                return Redirect::back();
            }
        }
        //partial but full release check end
        if(($release_type==2) && ($estimated_cost==$release_fund))
        {
            Session::flash('warning','Please Select Release Type Full');
            return Redirect::back();
        }
        //partial release check
        if($release_type==2)
        {
            $check_record = DB::table('work_progresses')->where('work_id', $work_id)->first();

            if(count($check_record)==0){$work_progress->save();

                $released_total_amount = DB::table('work_progresses')
                    ->where('work_id', '=', $work_id)
                    ->sum('release_fund');
                $work->released_total_amount=$released_total_amount;
                $work->save();
            }
             else
             {
                if(($released_total_amount+$release_fund)<($estimated_cost))
                 {
                     $work_progress->save();

                     $released_total_amount = DB::table('work_progresses')
                         ->where('work_id', '=', $work_id)
                         ->sum('release_fund');
                     $work->released_total_amount=$released_total_amount;

                     $work->save();
                 }
                 elseif(($released_total_amount+$release_fund)==($estimated_cost))
                 {
                     $release_type=3;
                     $work->work_status_dpc=$release_type;
                     $work_progress->release_type=$release_type;
                     $work_progress->save();

                     $released_total_amount = DB::table('work_progresses')
                         ->where('work_id', '=', $work_id)
                         ->sum('release_fund');
                     $work->released_total_amount=$released_total_amount;
                     $work->save();
                 }
                 else
                 {
                     Session::flash('warning','Release fund not more then estimated fund');
                     return Redirect::back();
                 }
             }

        }
        //partial release check end

        $work_progress->save();

        $released_total_amount = DB::table('work_progresses')
            ->where('work_id', '=', $work_id)
            ->sum('release_fund');
        $work->released_total_amount=$released_total_amount;
        $work->save();

        Session::flash('success','Fund Release Successfully');
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
