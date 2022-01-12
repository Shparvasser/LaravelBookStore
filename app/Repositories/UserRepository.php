<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    public function __construct(private User $model)
    {
    }

    /**
     * create
     *
     * @param  mixed $request
     * @return \App\Models\User
     */
    public function create(array $request): \App\Models\User
    {
        $user = $this->model;
        $user->assignRole('user');

        return $user::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
    }
}
