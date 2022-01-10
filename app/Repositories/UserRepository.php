<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    public function __construct(private User $model)
    {
    }

    public function registration($req)
    {
        $user = $this->model;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password = $req->input('password');
        $user->assignRole('user');
        $user->save();
        return $user;
    }

    public function login($req)
    {
        $user = $this->model;
        $user->email = $req->input('email');
        $user->password = $req->input('password');
    }
}
