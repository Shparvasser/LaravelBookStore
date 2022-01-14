<?php
namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Repositories\RatingRepository;

class RatingController extends Controller
{
    public function __construct(private RatingRepository $ratingRepository)
    {
    }

    /**
     * ratingOn
     *
     * @param  RatingRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function ratingOn(RatingRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $this->ratingRepository->createRating($data);

        return redirect()->route('home')->with('success', 'Your rating added');
    }
}
