<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Lesson;
use App\Choice;
use App\Answer;

class LessonController extends Controller
{
    //

    public function categories()
    {
        $categories = Category::all();
        $count = 0;

        return view('lesson.categories_view', compact('categories', 'count'));
    }

    public function lesson($id, $count)
    {
        $category = Category::find($id);
        $user = Auth::user();
        $lesson = Lesson::create([
            'category_id' => $category->id,
            'user_id' => $user->id
        ]);

        return redirect()->route('lesson.questions', [$category, $lesson->id, $count]);
    }

    public function questions($id, $lesson, $count)
    {
        $category = Category::find($id);
        $question = $category->question()->get()[$count];
        $lesson = Lesson::find($lesson);
        $question_count = $question->count();

        return view('lesson.questions_view', compact('category', 'question', 'lesson', 'count', 'question_count'));
    }

    public function answer($id, $lesson, $count, $choice)
    {
        $category = Category::find($id);
        $choice = Choice::find($choice);
        $lesson = Lesson::find($lesson);
        Answer::create([
            'choice_id' => $choice->id,
            'lesson_id' => $lesson->id
        ]);

        $question = $category->question()->get();
        $question_count = $question->count();
        $count = $count + 1;
        if($count == $question_count){
            $lesson->completed = 1;
            $lesson->save();

            return redirect()->route('lesson.result', [$category]);
        }
        
        return redirect()->route('lesson.questions', [$category, $lesson, $count, $choice]);
    }

    public function result()
    {
        return view('lesson.result');
    }
}
