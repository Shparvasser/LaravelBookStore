<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return View|Factory
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('login');
    }

    /**
     * login
     *
     * @param  LoginRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {

        $formLogin = $request->only(['email', 'password']);
        if (Auth::attempt($formLogin)) {
            return redirect(route('account'));
        }

        return redirect(route('login'))->withErrors([
            'email' => 'Dont correct email or password'
        ]);
    }
}
