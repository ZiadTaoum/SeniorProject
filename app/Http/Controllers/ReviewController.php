<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with('user')->get();

        return view('reviews.index', compact('reviews'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Fetch the list of users

        return view('reviews.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'review_content' => 'required|string',
            'user_id' => 'required|exists:users,id', // Assuming reviews table has user_id as a foreign key
        ]);

        // Create a new Review record
        // $review = new Review([
        //     'review_content' => $request->input('review_content'),
        // ]);

        // Associate the review with the specified user
        $user = Auth::user();

        Review::create([
            'user_id' => $user->id,
            'review_content' => $request->input('review_content'),
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'review_content' => 'required|string',
        ]);

        $review->update([
            'review_content' => $request->input('review_content'),
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }

    /**
     * Update the specified resource in storage.
     */

}
