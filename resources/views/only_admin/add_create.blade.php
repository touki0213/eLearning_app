@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.add_store', ['id' => $category->id]) }}" method="post">
        @csrf
            <div class="row">
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label for="Question">
                        <h3>Question:</h3>
                    </label>
                    <input type="text" class="form-control" name="question_text" id="Question" placeholder="Question">
                </div>
                
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label for="Choices">
                        <h3>Choices:</h3>
                    </label>

                    <input type="text" class="form-control" name="choice_text_1" id="Choices" placeholder="Choice" >
                    <label for="1">Correct</label>
                    <input type="radio" id="1" name="is_correct" value="1" style="margin-bottom: 20px;">

                    <input type="text" class="form-control" name="choice_text_2" id="Choices" placeholder="Choice" >
                    <label for="2">Correct</label>
                    <input type="radio" id="2" name="is_correct" value="2" style="margin-bottom: 20px;">

                    <input type="text" class="form-control" name="choice_text_3" id="Choices" placeholder="Choice" >
                    <label for="3">Correct</label>
                    <input type="radio" id="3" name="is_correct" value="3" style="margin-bottom: 20px;">

                    <input type="text" class="form-control" name="choice_text_4" id="Choices" placeholder="Choice" >
                    <label for="4">Correct</label>
                    <input type="radio" id="4" name="is_correct" value="4" style="margin-bottom: 20px;">

                    <button type="submit" class="btn btn-info" style="width: 100%;">Create Question</button>
                </div>
            </div>

            <input type="hidden" class="form-control" name="category_id" value="{{ $category->id }}">
        </form>
    </div>
@endsection