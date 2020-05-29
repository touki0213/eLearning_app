@extends('layouts.app')

@section('content')
    <div class="card" style="margin: 0 10%;">
        <h1 style="text-align: center;">What did who ？</h1>
        
            @foreach($activities as $activity)
                @if($activity->lesson_id == true)
                    <div class="card-body" style="margin: 0 5%;">
                        <hr>
                        <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png" style="float: left; width: 40px;" alt="">
                        <p style="font-size: 20px">
                            <span style="color: red;">{{ $activity->lesson()->first()->user()->first()->name }}</span>
                            was tried
                            <span style="color: blue;">{{ $activity->lesson()->first()->category()->first()->title }}</span>
                            category. <br>
                            <span style="font-size: 14px">({{ $activity->lesson()->first()->category()->first()->updated_at }})</span>
                        </p>
                    </div>
                @elseif($activity->relationship_id == true)
                    <div class="card-body" style="margin: 0 5%;">
                        <hr>
                        <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png" style="float: left; width: 40px;" alt="">
                        <p>
                            <span style="color: red;">{{ $activity->relationship->follower->name }}</span>
                            followed
                            <span style="color: blue">{{ $activity->relationship->followed->name }}</span>. <br>
                            <span style="font-size: 14px">({{ $activity->relationship()->first()->updated_at }})</span>
                        </p>
                    </div>
                @endif
            @endforeach
        
    </div>
@endsection