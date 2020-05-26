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

    public function activity_store($id, $lesson)
    {
        $auth_user = auth()->user();
        $users = User::find($id);
        $lessons = Lesson::find($lesson);
        Activity::create([
            'user_id' => $auth_user->id,
            'user_id' => $users->id,
            'lesson_id' => $lessons->id
        ]);

        return redirect()->back();
    }
}
