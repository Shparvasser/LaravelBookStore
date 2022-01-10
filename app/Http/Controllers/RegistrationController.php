<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function __construct(private IUserRepository $userRepository)
    {
    }
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        return view('registration');
    }

    /**
     * submit
     *
     * @param  mixed $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function submit(RegistrationRequest $req): mixed
    {
        $user = $this->userRepository->registration($req);
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
