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
     * @param  RegistrationRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function submit(RegistrationRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $user = $this->userRepository->create($request->all());
        Auth::login($user);

        return redirect()->route('account')->with('success', 'Welcom to our office');
    }

    /**
     * getUser
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getUser(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $user = $request->user();

        return view('account', ['user' => $user]);
    }
}
