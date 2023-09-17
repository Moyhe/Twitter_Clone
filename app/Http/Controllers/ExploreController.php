<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __invoke()
    {
        $users = User::query()->paginate(50);

        return view('explore.index', compact('users'));
    }
}
