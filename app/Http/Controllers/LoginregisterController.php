<?php

/* namespace App\Http\Controllers; */
namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\LoginRegister;

class LoginregisterController extends Controller
{
    public function register ()
    {
         return view('login.register');
    }

    public function registerprocess (Request $request)
    {
        $this->validate($request, [
          'first_name' =>'required|max:10|min:3|regex:/^[a-z A-Z]+$/u',
          'last_name' => 'required|max:10|min:3',
          'gender' => 'required',
          'email' => 'required',
          'password' => 'required',
        ], [
          'first_name.required' => 'First name must be required !',
          'first_name.max' => 'Must be Maximum 20 charcters !',
          'first_name.min' => 'Must be Maximum 3 charcters !',
          'first_name.regex' => 'Must be letter !',
        ]);

          $model = new LoginRegister;
          $model->first_name = $request->first_name;
          $model->last_name = $request->last_name;
          $model->gender = $request->gender;
          $model->email = $request->email;
          $model->password = $request->password;
          $model->save();
          return redirect()->route('login')->with('status', 'You Successfully Registration!');
    }

    public function login ()
    {
        return view('login.login');
    }

    public function loginprocess ()
    {


    }
}
