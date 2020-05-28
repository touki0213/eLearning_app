<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\Relationship;

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
        $auth = auth()->user();
        $relationship = Relationship::create([
            'follower_id' => $auth->id,
            'followed_id' => $id
        ]);

        Activity::create([
            'user_id' => $auth->id,
            'relationship_id' => $relationship->id,
        ]);

        return redirect()->back();
    }

    public function unfollow($id)
    {
        $followed_user = User::find($id);
        Auth::user()->following()->detach($followed_user);

        return redirect()->back();
    }
}
