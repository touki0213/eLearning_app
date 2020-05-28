<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\User;

class ActivityController extends Controller
{
    //

    public function activity()
    {
        $activities = Activity::all();
        $user = User::all()->first();

        return view('activity', compact('activities', 'user'));
    }
}
