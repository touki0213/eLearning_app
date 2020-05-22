@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="card-title" style="text-align: center;">
        Categories Page <br><br>
    </h2>

    <div class="row">
        @foreach($categories as $category)
            <div class="card col-sm-4 col-md-4 col-lg-4">
                <a href="{{ route('lesson', ['id' => $category->id, 'count' => $count]) }}">
                    <img class="card-img" src="https://pics.prcm.jp/30277afff4339/76767236/png/76767236_220x220.png"
                    style="width: 300px;" alt="Card image">
                    
                    <div class="card-img-overlay">
                        <h3 class="card-text" style="margin: auto;">Here is "{{ $category->title }}" category</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection