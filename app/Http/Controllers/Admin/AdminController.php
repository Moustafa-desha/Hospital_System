<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'    => 'required|email|exists:admins',
            'password' => 'required|min:5|max:30',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = $request->only('email','password');
        if (Auth::guard('admin')->attempt($admin)){
            return redirect('admin/dashboard');
        }else{
            return redirect('login');
        }
    } /* END METHOD */

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
