@extends('layouts.app')

@section('content')
    <div class="card" style="margin: 0 10%;">
        <h1 style="text-align: center;">
            What did who ？ <br>
            <a href="{{ route('home') }}">
                <button class="btn btn-secondary">Back Home</button>
            </a>
        </h1>
        
            @foreach($activities as $activity)
                @if($activity->lesson()->where('completed', 1)->first() == true)
                    <div class="card-body" style="margin: 0 5%;">
                        <hr>
                        <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png" style="float: left; width: 40px;" alt="">
                        <p style="font-size: 20px">
                            @if($activity->user->id != Auth::user()->id)
                                <a href="{{ route('show', ['id' => $activity->lesson->user->id]) }}">
                                    <span style="color: red;">{{ $activity->lesson()->first()->user()->first()->name }}</span>
                                </a>
                            @else
                                <a href="{{ route('home') }}">
                                    <span style="color: red;">{{ $activity->lesson()->first()->user()->first()->name }}</span>
                                </a>
                            @endif
                            was tried
                            <a href="{{ route('lesson.result', ['id' => $activity->lesson->category->id, 'lesson' => $activity->lesson->id]) }}">
                                <span style="color: blue;">{{ $activity->lesson()->first()->category()->first()->title }}</span>
                            </a>
                            category. <br>
                            <span style="font-size: 14px">({{ $activity->lesson()->first()->category()->first()->updated_at }})</span>
                        </p>
                    </div>
                @elseif($activity->relationship_id == true)
                    <div class="card-body" style="margin: 0 5%;">
                        <hr>
                        <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png" style="float: left; width: 40px;" alt="">
                        <p style="font-size: 20px">
                            @if($activity->relationship->follower->id != Auth::user()->id)
                                <a href="{{ route('show', ['id' => $activity->relationship->follower->id]) }}">
                                    <span style="color: red;">{{ $activity->relationship->follower->name }}</span>
                                </a>
                            @else
                                <a href="{{ route('home') }}">
                                    <span style="color: red;">{{ $activity->relationship->follower->name }}</span>
                                </a>
                            @endif
                            followed
                            @if($activity->relationship->followed->id != Auth::user()->id)
                                <a href="{{ route('show', ['id' => $activity->relationship->followed->id]) }}">
                                    <span style="color: blue">{{ $activity->relationship->followed->name }}</span>. <br>
                                </a>
                            @else
                                <a href="{{ route('home') }}">
                                    <span style="color: blue">{{ $activity->relationship->followed->name }}</span>. <br>
                                </a>
                            @endif
                            <span style="font-size: 14px">({{ $activity->relationship()->first()->updated_at }})</span>
                        </p>
                    </div>
                @endif
            @endforeach
        
    </div>
@endsection