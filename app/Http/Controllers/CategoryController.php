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

    public function category_edit($id)
    {
        $category = Category::find($id);

        return view('only_admin.category_edit', compact('category'));
    }

    public function category_update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories');
    }

    public function category_destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.categories');
    }
}
