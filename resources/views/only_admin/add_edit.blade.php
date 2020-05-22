@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.add_update', ['id' => $question->id]) }}" method="post">
        @csrf
            <div class="row">  
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label for="Question">
                        <h3>Question:</h3>
                    </label>
                    <input type="text" class="form-control" name="question_text" id="Question" value="{{ $question->text }}">
                </div>
                
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label for="Choices">
                        <h3>Choices:</h3>
                    </label>
                    
                    @foreach($question->choices as $id => $choice)
                        <input type="text" class="form-control" name="choice{{ $id+1 }}_text" value="{{ $choice->text }}" id="Choices">
                        <input type="hidden" name="choice{{ $id+1 }}_id" value="{{ $choice->id }}">
                        <label for="1">Correct</label>
                        <input type="radio" name="is_correct" value="{{ $id+1 }}" style="margin-bottom: 20px;" {{ $choice->is_correct ? 'checked' : '' }}>
                    @endforeach
                    
                    <button type="submit" class="btn btn-info" style="width: 100%;">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection