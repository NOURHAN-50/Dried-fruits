<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('customer', 'product')->latest()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

      public function approve(Review $review)
    {
        $review->approved = true;
        $review->save();

        return redirect()->back()->with('success', 'تمت الموافقة على التقييم بنجاح!');
    }
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'تم حذف التقييم بنجاح');
    }
    //
}
