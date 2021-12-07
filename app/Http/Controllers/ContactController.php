<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\User;

class ContactController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $user = new User();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->save();
        return redirect()->route('home')->with('success', 'User is registered');
    }
}
