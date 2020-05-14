<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Choice;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function admin()
    {
        $user = auth()->user();
        $categories = Category::all();

        return view('only_admin.admin_categories', compact('user', 'categories'));
    }

}
