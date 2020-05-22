@extends('layouts.app')

@section('content')
    <table class="table">
        <h2 style="text-align: center">{{ $category->title }} category</h2>
        <div style="text-align: center">
            <a href="{{ route('admin.add_create', ['id' => $category->id]) }}">
                <button type="button" class="btn btn-info">Add Question</button>
            </a>
            <a href="{{ route('admin.categories') }}">
                <button type="button" class="btn btn-secondary">Categories Page</button>
            </a>
        </div>
        <thead>
            <tr>
            <th>Question</th>
            <th>Choice 1</th>
            <th>Choice 2</th>
            <th>Choice 3</th>
            <th>Choice 4</th>
            <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <th scope="row">{{ $question->text }}</th>
                @foreach($question->choices()->get() as $choice)
                    <td class="choice">
                        {{ $choice->text }}
                        <span style="color: red;">
                            {{ $choice->is_correct }}
                        </span>
                    </td>
                @endforeach
                <td>
                    <a href="{{ route('admin.add_edit', ['id' => $question->id]) }}" style="float: left; margin-right: 3px;">
                        <button type="button" class="btn btn-success">E</button>
                    </a>
                    <form action="{{ route('admin.add_delete', ['id' => $question->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">D</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection