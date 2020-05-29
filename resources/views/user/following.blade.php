@extends('layouts.app')

@section('content')
<div class="card" style="margin: 0 20%;">
  <div class="card-body">
        <h4>Following Members</h4><br>
        <div class="list">
            @foreach($following as $user)
                @if($user->id == Auth::user()->id)
                    <div class="card">
                        <div class="card-body">
                            <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png"
                                style="float: left; width: 40px;" alt="">
                            <a href="{{ route('show', $user) }}" style="float: left; font-size: 25px;">
                                {{ $user->name }}
                            </a>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png"
                                style="float: left; width: 40px;" alt="">
                            <a href="{{ route('show', $user) }}" style="float: left; font-size: 25px;">
                                {{ $user->name }}
                            </a>
                            @if (auth()->user()->is_following($user->id) == true)
                                <a href="{{ route('users.unfollow', ['id' => $user->id]) }}" type="button" class="btn btn-outline-primary" style="float: right;">
                                    Unfollow
                                </a>
                            @else
                                <a href="{{ route('users.follow', ['id' => $user->id]) }}" type="button" class="btn btn-primary" style="float: right;">
                                    Follow
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection