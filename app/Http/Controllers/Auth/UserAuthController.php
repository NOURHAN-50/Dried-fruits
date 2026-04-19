<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserAuthController extends Controller
{
       public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::guard('web')->attempt($credentials)) {

            return redirect('/');
        }

        return back()->with('error','Email or password incorrect');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/login');
    }
}
