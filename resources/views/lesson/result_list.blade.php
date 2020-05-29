@extends('layouts.app')

@section('content')
    <div class="card" style="margin: 0 10%;">
        <h1 style="text-align: center;">You tried these categories</h1>
        @foreach($tried_lesson as $lesson)
        <div class="card">
            <div class="card-body">
                <p style="font-size: 20px">
                    Do you check the result of
                    <a href="{{ route('lesson.result', ['id' => $lesson->category->id, 'lesson' => $lesson->id]) }}">
                        {{ $lesson->category()->first()->title }}
                    </a>
                    category ? <br>
                    <span style="font-size: 14px">({{ $lesson->updated_at }})</span>
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection