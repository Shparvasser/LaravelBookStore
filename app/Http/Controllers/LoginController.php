<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return View|Factory|Redirector|RedirectResponse
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('account');
        }

        return view('login');
    }

    /**
     * login
     *
     * @param  mixed $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $req): mixed
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
