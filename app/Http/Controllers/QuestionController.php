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
        $questions = $category->question()->get();
        
        return view('only_admin.admin_questions', compact('category', 'questions'));
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

    public function add_edit($id)
    {
        $question = Question::find($id);

        return view('only_admin.add_edit', compact('question'));
    }

    public function add_update(Request $request, $id)
    {
        $question = Question::find($id);

        $question->update([
            'text' => $request->question_text
        ]);

        $choice1 = Choice::find($request->choice1_id);
        $choice1->update([
            'text' => $request->choice1_text,
            'is_correct' => $request->is_correct == "1" ? true : false
        ]);

        $choice2 = Choice::find($request->choice2_id);
        $choice2->update([
            'text' => $request->choice2_text,
            'is_correct' => $request->is_correct == "2" ? true : false
        ]);

        $choice3 = Choice::find($request->choice3_id);
        $choice3->update([
            'text' => $request->choice3_text,
            'is_correct' => $request->is_correct == "3" ? true : false
        ]);

        $choice4 = Choice::find($request->choice4_id);
        $choice4->update([
            'text' => $request->choice4_text,
            'is_correct' => $request->is_correct == "4" ? true : false
        ]);

        return redirect()->route('admin.questions', ['id' => $question->category->id]);
    }

    public function add_destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->back();
    }
}
