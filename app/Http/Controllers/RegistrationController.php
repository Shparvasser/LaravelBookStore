<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('account');
        }

        return view('contact');
    }

    /**
     * submit
     *
     * @param  mixed $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function submit(RegistrationRequest $req): mixed
    {
        if (Auth::check()) {
            return redirect()->route('account');
        }
        $user = new User();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->assignRole('user');
        $user->save();
        Auth::login($user);

        return redirect()->route('account')->with('success', 'Welcom to our office');
    }

    /**
     * getUser
     *
     * @param  mixed $req
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getUser(Request $req): mixed
    {
        $user = $req->user();

        return view('account', ['user' => $user]);
    }
}
