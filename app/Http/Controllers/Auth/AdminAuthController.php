<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;


class AdminAuthController extends Controller
{
     public function showLogin()
    {
        return view('admin.login');
    }
    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('email','password');
         $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('error','Email or password incorrect');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
    //
}
