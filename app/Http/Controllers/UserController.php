<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function list()
    {
        $users = User::all();
        return view('user.user_list', compact('users'));
    }

    public function show()
    {
        return view('user.show');
    }

    public function following()
    {
        return view('user.following');
    }

    public function followers()
    {
        return view('user.followers');
    }

    public function follow()
    {

    }

    public function unfollow()
    {

    }
}
