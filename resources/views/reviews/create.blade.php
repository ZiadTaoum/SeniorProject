@extends('layout')
<link rel="stylesheet" href="{{ asset('style.css') }}">
@section('title', 'Create Review')

@section('content')
    <div class="container">
        <h2>Create a New Review</h2>

        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf

            <!-- Remove the user input field -->

            <div class="form-group">
                <label for="review_content">Review Content</label>
                <textarea name="review_content" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <button onclick="window.location.href='{{ url('/reviews') }}'">Add a Review</button>
    </div>
@endsection