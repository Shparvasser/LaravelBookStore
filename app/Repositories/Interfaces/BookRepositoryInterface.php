<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface BookRepositoryInterface
{
    public function all();
    public function getByUser(User $user);
}
