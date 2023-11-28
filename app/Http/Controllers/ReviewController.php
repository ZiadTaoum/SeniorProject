<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function DeleteReview(Review $review){
        if(auth()->user()->id === $review['user_id']){
            $review ->delete();
        }
        return redirect('/');

        
    }
    public function UpdatedReview(Review $review, Request $request){
        if(auth()->user()->id !== $review['userID']){
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'ReviewContent' => 'required',
        ]);

        $incomingFields['ReviewContent'] = strip_tags($incomingFields['ReviewContent']);
        $review->update($incomingFields);
        return redirect('/');

    }
    public function ShowEditScreen(Review $review){
        return view('edit-review',['review' => $review]);
    }
    public function createReview(Request $request){
        $incomingFields = $request->validate([
            'ReviewContent' => 'required'
        ]);

        $incomingFields['ReviewContent'] = strip_tags($incomingFields['ReviewContent']);
        $incomingFields['userID'] = auth()->id();
        Review::create($incomingFields);
        return redirect('/');
    }
}
