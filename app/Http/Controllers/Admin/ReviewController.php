<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function AllReviews(){

        $review = ProductReview::latest()->get();
        return view('backend.review.review_all', compact('review'));

    }
}
