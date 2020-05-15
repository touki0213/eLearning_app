<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Choice;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function admin($id)
    {
        $category = Category::find($id);
        // $questions = Question::where('category_id', $id)->get();
        // $choices = Choice::where('question_id', $questions->id)->get();
        $questions = $category->question()->get();
        // $choices = $questions->choices()->get();
        // foreach($questions as $question){
        //     $choices = $question->choices()->get();
        // }
        // foreach(Category::find($id)->question() as $question){
        //     $choices = $question->choices()->get();
        // }
        // $choices = Choice::where('question_id', $id)->get();
        // $choices = Choice::find('question_id')->get();
        // $choices = Choice::first();
        // $choices = Question::all();
        // $choices->choices()->get();
        // $choices = Choice::with('question_id')->get();
        // $choices = $questions->choices->first();
        // $choices = DB::tabel('choices')->where('question_id', $id)->get();
        // $choices = DB::tabel('questions')->where('id', $id)->get();
        // $choices = $questions->choices()->where('question_id', $id)->first();
        // $choices = Question::with('id')->get();
        
        
        return view('only_admin.admin_questions', compact('category', 'questions', 'choices'));
    }

    public function add_create($id)
    {
        $category = Category::find($id);
        $question = Question::find($id);
        
        return view('only_admin.add_create', compact('category', 'question'));
    }

    public function add_store(Request $request, $id)
    {
        $question = Question::create([
            'text' => $request->question_text,
            'category_id' => $request->category_id,
        ]);
        
        $choice_A = Choice::create([
            'text' => $request->choice_text_1,
            'question_id' => $question->id,
        ]);
    
        $choice_B = Choice::create([
            'text' => $request->choice_text_2,
            'question_id' => $question->id,
        ]);
    
        $choice_C = Choice::create([
            'text' => $request->choice_text_3,
            'question_id' => $question->id,
        ]);
    
        $choice_D = Choice::create([
            'text' => $request->choice_text_4,
            'question_id' => $question->id,
        ]);

        if($request->is_correct == 1){
            $choice_A->is_correct = 1;
            $choice_A->save();
        } elseif($request->is_correct == 2) {
            $choice_B->is_correct = 1;
            $choice_B->save();
        } elseif($request->is_correct == 3) {
            $choice_C->is_correct = 1;
            $choice_C->save();
        } elseif($request->is_correct == 4) {
            $choice_D->is_correct = 1;
            $choice_D->save();
        }

        $category = Category::find($id);

        return redirect()->route('admin.questions', [$category]);
    }

    public function add_edit()
    {

    }

    public function add_update()
    {

    }

    public function add_destroy()
    {

    }
}
