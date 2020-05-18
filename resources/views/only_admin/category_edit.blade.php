@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.category_update', ['id' => $category->id]) }}" method="post" style="margin: 0 20%">
        @csrf
            <label for="title">
                <h3>Title:</h3>
            </label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}" placeholder="Title">
            <br>

            <label for="description">
                <h3>Description:</h3>
            </label>
            <textarea name="description" id="description" cols="30" rows="5" style="width: 100%">{{ $category->description }}</textarea>
            <br>

            <button type="submit" class="btn btn-info" style="width: 100%;">Update</button>
        </form>
    </div>
@endsection