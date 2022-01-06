<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * getAuthUserId
     *
     * @return int
     */
    public function getAuthUserId(): int
    {
        if (Auth::check()) {
            $user = Auth::user()->id;
            return $user;
        }
    }

    /**
     * checkAuth
     *
     * @return Illuminate\Routing\Redirector
     */
    public function checkAuth(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|false
    {
        if (Auth::check()) {
            return redirect(route('account'));
        }
        return false;
    }

    /**
     * attemptAuth
     *
     * @param  mixed $formFailds
     * @return bool
     */
    public function attemptAuth(array $formFailds): bool|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        if (Auth::attempt($formFailds)) {
            return redirect(route('account'));
        }
        return false;
    }
}
