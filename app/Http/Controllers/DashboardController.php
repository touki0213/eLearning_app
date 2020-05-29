<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\lesson;
use App\Activity;

class DashboardController extends Controller
{
    //

    public function activity()
    {
        $activities = Activity::all();

        return view('dashboard', compact('activities'));
    }
}
