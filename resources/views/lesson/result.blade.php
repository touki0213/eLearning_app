@extends('layouts.app')

@section('content')
<div class="card">
    <table class="table">
        <h3 style="text-align: center">
            {{ $correct }} / {{ $lessons->answers->count() }} <br>
            <a href="{{ route('lesson.categories') }}">
                <button class="btn btn-secondary">Categories Page</button>
            </a>
            <a href="{{ route('home') }}">
                <button class="btn btn-secondary">Back Home</button>
            </a>
        </h3>
        <div class="card-body" style="width: 70%">
            <thead>
                <tr>
                    <th></th>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons->answers as $answer)
                    <tr class="table">
                        <td>
                            @if($answer->isCorrect())
                                <img src="https://www.plazastyle.com/images/sp/charapla-simpsons/main_img01.png" style="width: 70px;" alt="">
                                <h5>correct</h5>
                            @else
                                <img src="https://cdn140.picsart.com/235915385048212.png?type=webp&to=min&r=640" style="width: 60px; height: 53px;" alt="">
                                <h5>wrong</h5>
                            @endif
                        </td>
                        <td>
                            <h4 style="margin: auto;">{{ $answer->choice->question->text }}</h4>
                        </td>
                        <td>
                            <h4 style="margin: auto;">{{ $answer->correctAnswer()->text }}</h4>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div>
    </table>
</div>
@endsection