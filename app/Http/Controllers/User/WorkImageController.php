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


class WorkImageController extends Controller
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
        return view('users.pages.agency.agency_work_image_update',['works_details'=>$works_details]);

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
            'work_photo.*' => 'required|mimes:jpg,jpeg,png,bmp|max:10000', //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            'progress_percent'=>array('required', 'regex:/^\d*(\.\d{2})?$/'),
            'measurement_book'=>'required|mimes:txt,pdf,doc|max:10000',

        ],
        [
        'work_photo.*.required' => 'Please upload an image',
        'work_photo.*.mimes' => 'Only jpeg,png and bmp images are allowed',
        'work_photo.*.max' => 'Sorry! Maximum allowed size for an image is 10MB',
         ]

        );
        $agency_id=Auth::guard('users')->user()->id;
        $work_photo = $request->file('work_photo');
        $progress_percent = $request->get('progress_percent');
        $measurement_book = $request->file('measurement_book');


        if($progress_percent>(100))
        {
            Session::flash('warning','Work Progress % not more then 100');
            return Redirect::back();

        }


        $work_progress_update= new WorkProgress();


        if($measurement_book>0)
        {
                $destinationPath1 = 'measurement_book/';
                $filename1 = $measurement_book->getClientOriginalName();
                $extension = $measurement_book->getClientOriginalExtension();
                $picture1 = $destinationPath1.date('His').$filename1;
                // $destinationPath = base_path() . '\public\measurement_book';
                $measurement_book->move($destinationPath1, $picture1);

        }
        $work_progress_update->measurement_book=$picture1;
        $work_progress_update->work_id=$id;
        $work_progress_update->created_by=$agency_id;
        $work_progress_update->progress_status=1;
        $work_progress_update->upload_type=1;
        $work_progress_update->entry_date=date('Y-m-d');
        $work_progress_update->save();

        if(count($work_photo)>0)
        {
            foreach($work_photo as $file){
                $destinationPath = 'work_photo/';
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = $destinationPath.date('His').$filename;
                //$destinationPath = base_path() . '\public\work_photo';
                $file->move($destinationPath, $picture);
                $work_progress_update1= new WorkProgress();
                $work_progress_update1->work_photo=$picture;
                $work_progress_update1->work_id=$id;
                $work_progress_update1->progress_status=1;
                $work_progress_update1->upload_type=1;
                $work_progress_update1->created_by=$agency_id;
                $work_progress_update1->entry_date=date('Y-m-d');
                $work_progress_update1->progress_percent=$progress_percent;
                $work_progress_update1->save();

            }

        }
      Session::flash('success','Work Progress Updated Successfully');
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
