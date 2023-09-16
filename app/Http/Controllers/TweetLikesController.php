<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetLikesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Tweet $tweet)
    {
        $tweet->like(auth()->user());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->disLike(auth()->user());

        return back();
    }
}
