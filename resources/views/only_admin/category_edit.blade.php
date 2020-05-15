@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.category_store') }}" method="post" style="margin: 0 20%">
        @csrf
            <label for="title">
                <h3>Title:</h3>
            </label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
            <br>

            <label for="description">
                <h3>Description:</h3>
            </label>
            <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"
             style="width: 100%"></textarea>
            <br>

            <button type="submit" class="btn btn-info" style="width: 100%;">Next</button>
        </form>
    </div>
@endsection