<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function list()
    {
        $users = User::all();

        return view('user.user_list', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $following = $user->following()->get();
        $followers = $user->followers()->get();

        return view('user.show', compact('user', 'following', 'followers'));
    }

    public function following($id)
    {
        $user = User::find($id);
        $following = $user->following()->get(); //Array of users, user foreach in blade

        return view('user.following', compact('following', 'user'));
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->get(); //Array of users, user foreach in blade

        return view('user.followers', compact('followers', 'user'));
    }

    public function follow($id)
    {
        $followed_user = User::find($id);
        Auth::user()->following()->attach($followed_user);

        return redirect()->back();
    }

    public function unfollow($id)
    {
        $followed_user = User::find($id);
        Auth::user()->following()->detach($followed_user);

        return redirect()->back();
    }
}
