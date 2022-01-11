<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Repositories\Interfaces\IRatingRepository;

class RatingController extends Controller
{
    function __construct(private IRatingRepository $ratingRepository)
    {
    }
    /**
     * ratingOn
     *
     * @param  mixed $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function ratingOn(RatingRequest $request): mixed
    {
        $data = $request->all();
        $this->ratingRepository->createRating($data);

        return redirect()->route('home')->with('success', 'Your rating added');
    }
}
