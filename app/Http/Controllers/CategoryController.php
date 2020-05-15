<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Choice;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function category_create()
    {
        return view('only_admin.category_create');
    }

    public function category_store(Request $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.add_create', [$category]);
    }

    public function category_edit()
    {

    }

    public function category_update()
    {

    }

    public function category_destroy()
    {

    }
}
