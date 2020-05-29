<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Lesson;
use App\Choice;
use App\Answer;
use App\Activity;
use App\User;

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
        
        $auth = auth()->user();
        Activity::create([
            'user_id' => $auth->id,
            'lesson_id' => $lesson->id
        ]);

        return redirect()->route('lesson.questions', [$category, $lesson->id, $count]);
    }

    public function questions($id, $lesson, $count)
    {
        $category = Category::find($id);
        $question = $category->question()->get()[$count];
        $lesson = Lesson::find($lesson);

        return view('lesson.questions_view', compact('category', 'question', 'lesson', 'count'));
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

            return redirect()->route('lesson.result', [$category, $lesson]);
        }
        
        return redirect()->route('lesson.questions', [$category, $lesson, $count, $choice]);
    }

    public function result($id, $lesson)
    {
        $lessons = Lesson::find($lesson);
        $correct = 0;
        foreach($lessons->answers as $answer) {
            if ($answer->isCorrect()) {
                $correct++;
            }
        }
        
        return view('lesson.result', compact('lessons', 'correct'));
    }

    public function list($user)
    {
        $user = User::find($user);
        $tried_lesson = $user->lessons()->orderBy('id', 'desc')->get();

        return view('lesson.result_list', compact('tried_lesson'));
    }
}
