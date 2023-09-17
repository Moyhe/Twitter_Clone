<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        auth()->user()->toggleFollow($user);

        return back();
    }
}
