<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('account');
        }

        return view('contact');
    }
    public function submit(ContactRequest $req)
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
    public function getUser(Request $req)
    {
        $user = $req->user();

        return view('account', ['user' => $user]);
    }
}
