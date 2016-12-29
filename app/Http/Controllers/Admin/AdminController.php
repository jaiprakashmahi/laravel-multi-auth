<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View;
use Illuminate\Support\Facades\Input;
use App\Models\Admin;
use Hash;
use Validator;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    public function getchangepassword()
    {

        return view('admin.pages.setting.changepassword');

    }

    public function postchangepassword(Request $request)
    {

        $this->validate($request, [

            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',

        ], [ //set custom message override default msg
            'current_password.required' => 'The current password field is required.',
            'current_password.min' => ' The current password must be at least 6 characters.',

        ]);

        $current_password = Input::get('current_password');


        $super_admin_id = Input::get('super_admin_id');



        $new_password = Input::get('password');

        $user = Admin::where('id', '=', $super_admin_id)->first();

        if(Hash::check($new_password, $user->password)==true)
        {
            Session::flash('danger', 'Invalid change should be different to current password !');
            return redirect:: Route('changepassword');
            exit();

        }
        if(Hash::check($current_password, $user->password)==true)
        {

            $user->password = bcrypt($new_password);
            $user->save();

            Session::flash('success', 'Password changed!');

            //return redirect:: Route('/home');
            return redirect:: Route('changepassword');

        }

        else
        {
            Session::flash('danger', 'Invalid current password!');
            return redirect:: Route('changepassword');

        }

    }


}
