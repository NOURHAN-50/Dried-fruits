<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserAuthController extends Controller
{


public function register(RegisterUserRequest $request)
{

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

return redirect('/')->with('success', 'Account created successfully!');
}
    public function login(LoginUserRequest $request)

{
    $credentials = $request->only('email','password');

    if (Auth::attempt($credentials)) {

return redirect('/')->with('success', 'Logged in successfully!');    }

    return back()->with('error','Invalid credentials');
}


    public function logout()
    {
        Auth::logout();
return redirect('/')->with('success', 'Logged out successfully!');    }

}
