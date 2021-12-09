<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('account');
        }
        return view('login');
    }
    public function login(LoginRequest $req)
    {
        if (Auth::check()) {
            return redirect(route('account'));
        }
        $formFailds = $req->only(['email', 'password']);

        if (Auth::attempt($formFailds)) {
            return redirect(route('account'));
        }
        return redirect(route('login'))->withErrors([
            'email' => 'Dont correct email or password'
        ]);
    }
}
