@extends('layouts.app')

@section('content')
    <div class="card" style="width: 70%; margin: auto;">
        <div class="card-body">
            <div class="container">
                <div class="row" style="text-align: center;">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2>Q, {{ $question->text }}</h2>
                        <h5>{{ $count+1 }} / {{ $question_count }}</h5><br>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        @foreach($question->choices()->get() as $choice)
                                <a href="{{ route('lesson.answer', ['id' => $category->id, 'lesson' => $lesson->id,
                                                                     'count' => $count, 'choice' => $choice->id]) }}">
                                    <h2>{{ $choice->text }}</h2>
                                </a>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
