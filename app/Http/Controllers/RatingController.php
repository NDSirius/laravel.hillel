<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

class RatingController extends Controller
{
    /**
     * @var Rating
     */
    protected $ratingModel;

    /**
     * RatingController constructor.
     * @param Rating $rating
     */
    public function __construct(Rating $rating)
    {
        $this->ratingModel = $rating;
    }

    /**
     * @param Request $request
     * @param Product $product
     */
    public function add(Request $request, Product $product)
    {
        $this->ratingModel->rating = $request->star;
        $this->ratingModel->user_id = Auth()->id();

        $product->ratings()->save($this->ratingModel);

        return redirect()->back();

    }
}
