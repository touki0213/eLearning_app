@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5 col-md-5 col-lg-5" style="margin-bottom: 20px;">
            <div class="card">
                <div class="card-body" style="text-align:center;">
                    <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png"
                    style="width: 80px; text-align:center;" alt="">
                    <h4 style="text-align:center;">{{ $user->name }}</h4>
                    <br>
                    @if (auth()->user()->is_following($user->id) == true)
                        <a href="{{ route('users.unfollow', ['id' => $user->id]) }}" type="button" class="btn btn-outline-primary">
                            Unfollow
                        </a>
                    @else
                        <a href="{{ route('users.follow', ['id' => $user->id]) }}" type="button" class="btn btn-primary">
                            Follow
                        </a>
                    @endif
                    <hr>
                    <div class="container">
                        <div class="row" style="text-align:center">
                            <div class="col-sm-5 col-md-5 col-lg-5" style="margin: auto;">
                                <h5>
                                    <a href="{{ route('users.following', ['id' => $user->id]) }}">{{ $following->count() }}</a>
                                </h5>
                                <h4>Following</h4>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-5" style="margin: auto;">
                                <h5>
                                    <a href="{{ route('users.followers', ['id' => $user->id]) }}">{{ $followers->count() }}</a>
                                </h5>
                                <h4>Followers</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="card">
                <div class="card-body">
                        @if (auth()->user()->is_following($user->id) == true)
                        <h1>Activity</h1>
                            @foreach($user->activities()->get() as $activity)
                                <div class="card">
                                    @if($activity->lesson_id == true)
                                        <h3>
                                            {{ $user->name }} tried <span style="color: blue;">{{ $activity->lesson()->where('completed', 1)->first()->category->title }}</span> category.
                                        </h3>
                                    @elseif($activity->relationship_id == true)
                                        <h3>
                                            {{ $user->name }} followd <span style="color: red;">{{ $activity->relationship->followed->name }}.</span>
                                        </h3>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p style="font-size:20px;color: red;text-align: center;">You are not following this user!</p>
                        @endif
                </div>
            </div>
            <br>
            
        </div>
        
    </div>
</div>
@endsection