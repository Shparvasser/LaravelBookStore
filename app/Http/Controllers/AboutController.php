<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * index
     *
     * @return Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('about');
    }
}
