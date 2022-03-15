<?php

namespace App\Http\Controllers;

use App\LoginSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        $login_settings = LoginSetting::first();

        return view('login', compact(
            'login_settings'
        ));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['errors' => ['email' => ['Wrong email and password combination']]], 422);
            return ValidationException::withMessages(['Wrong email and password combination']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
