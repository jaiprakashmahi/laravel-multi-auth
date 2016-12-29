<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Auth\AuthController as Controller;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    protected $guard = 'users';
    protected $redirectTo = 'user';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

//    protected function authenticated($request, $user)
//    {
//        //$val=$user->name;
//
//        if($user->status === 'DPC') {
//
//            return redirect('/user');
//        }
//        if($user->usertype === 'AGENCY') {
//
//           return redirect('/user');
//        }
//
//    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function index()
    {
        return view('users.auth.auth');
    }

    public function getRegister()
    {
        return view('users.auth.register');
    }

   // validate status at the time of login
    
    protected function getCredentials(Request $request)
    {
        $crendentials=$request->only($this->loginUsername(), 'password');
        $crendentials['status']=1;
        return $crendentials;
    }


}
