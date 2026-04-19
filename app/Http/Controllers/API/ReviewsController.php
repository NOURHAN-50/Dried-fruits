<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{ public function index()
    {
        $reviews = Review::with('customer', 'product')->latest()->paginate(20);
        return response()->json(
            [
                'reviews'=>$reviews
            ]);
    }
    public function show($id)
{
    $review = Review::find($id);

    if (!$review) {
        return response()->json([
            'message' => 'Review not found'
        ], 404);
    }

    return response()->json($review);
}

    // حذف تقييم
    public function destroy(Review $review)
    {
        $review->delete();
                return response()->json([
            'message' =>'تم حذف التقييم بنجاح ',

        ], 201);

        }
    //
}
