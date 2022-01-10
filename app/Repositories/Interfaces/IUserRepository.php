<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function registration($req);
    public function login($req);
}
