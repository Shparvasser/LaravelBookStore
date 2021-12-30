<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Repositories\Interfaces\IRatingRepository;

class RatingController extends Controller
{
    private $ratingRepository;

    function __construct(IRatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }
    /**
     * ratingOn
     *
     * @param  mixed $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function ratingOn(RatingRequest $req): mixed
    {
        $this->ratingRepository->createRating($req);

        return redirect()->route('home')->with('success', 'Your rating added');
    }
}
