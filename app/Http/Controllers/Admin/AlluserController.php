<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
//use Illuminate\Foundation\Auth\ResetsPasswords;
//use Illuminate\Support\Facades\Hash;
class AlluserController extends Controller
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
       $user_details=User::all();

       return view('admin.pages.allusers.user_display',['user_details'=>$user_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.allusers.user_add');
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

           'name' => 'required|regex:/^[\pL\s\-]+$/u',
           'email'=>'required|email|unique:allusers',
           'password'=>'required|min:4',
           'mobile'=>'required|digits:10',
           'pin'=>'required|digits:6',
           'address'=>'required',
//           'city'=>'required',
//           'state'=>'required',
           'user_type'=>'required',
           'designation'=>'required|regex:/^[\pL\s\-]+$/u',
       ]);

        $designation=Input::get('designation');
        $name=Input::get('name');
        $email=Input::get('email');
        $password=Input::get('password');
        $mobile=Input::get('mobile');
        $pin=Input::get('pin');
        $address=Input::get('address');
//        $city=Input::get('city');
//        $state=Input::get('state');
        $user_type=Input::get('user_type');
        $status=Input::get('status');

        $all_user_details= new User();
        $all_user_details->name=$name;
        $all_user_details->designation=$designation;
        $all_user_details->email=$email;
        $all_user_details->password=$password;

        $all_user_details->mobile=$mobile;
        $all_user_details->pin=$pin;
        $all_user_details->address=$address;
//        $all_user_details->city=$city;
//        $all_user_details->state=$state;
        $all_user_details->usertype=$user_type;
        $all_user_details->status=$status;
        $all_user_details->save();
       Session::flash('success','User Added Successfully');
       return Redirect::route('admin.alluser.index');

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
        $all_user_details=User::findOrFail($id);

        return view('admin.pages.allusers.user_edit',['all_user_details'=>$all_user_details]);

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
            'email'=>'required|email|unique:allusers',
            'mobile'=>'required|digits:10',
            'pin'=>'required|digits:6',
            'address'=>'required',
//            'city'=>'required',
//            'state'=>'required',
            'user_type'=>'required',
            'designation'=>'required|regex:/^[\pL\s\-]+$/u',
        ]);

        $designation=Input::get('designation');
        $name=Input::get('name');
        $email=Input::get('email');
        $mobile=Input::get('mobile');
        $pin=Input::get('pin');
        $address=Input::get('address');
//        $city=Input::get('city');
//        $state=Input::get('state');
        $user_type=Input::get('user_type');
        $status=Input::get('status');

        $all_user_details= User::findOrFail($id);
        $all_user_details->name=$name;
        $all_user_details->email=$email;
        $all_user_details->designation=$designation;


        $all_user_details->mobile=$mobile;
        $all_user_details->pin=$pin;
        $all_user_details->address=$address;
//        $all_user_details->city=$city;
//        $all_user_details->state=$state;
        $all_user_details->usertype=$user_type;
        $all_user_details->status=$status;
        $all_user_details->save();
        Session::flash('success','User Updated Successfully');
        return Redirect::route('admin.alluser.index');
    }


    public function remove($id)
    {
        $all_user_details=User::find($id);

        $all_user_details->destroy($id);
        Session::flash('success','User deleted Successfully');
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
