<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = auth()->user()->timeLine();
        return view('tweets.index', compact('tweets'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate([
            'content' => 'required|max:255',
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'content' => $attributes['content'],
        ]);

        return redirect()->route('home');
    }
}
