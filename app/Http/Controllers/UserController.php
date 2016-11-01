<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get(User $user)
    {
        return view('profile', compact('user', $user));
    }

    public function follow(User $user)
    {
        Auth::user()->followedUsers()->attach($user->id);
        return back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->followedUsers()->detach($user->id);
        return back();
    }

    public function search(Request $request)
    {
        $user = User::where('email', $request->term)->first();
        $name = $request->term;
        if ($user == null)
            return view('noUser', compact('name', $name));
        return view('profile', compact('user', $user));
    }
}