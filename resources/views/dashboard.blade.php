@extends('layouts.app')

@section('content')
    <div class="card" style="margin: 0 10%;">
    <h1 style="text-align: center;">What did who ?</h1>
        @foreach($activities as $activity)
            <div class="card">
                <div class="card-body" style="margin: 0 5%;">
                </div>
            </div>
        @endforeach
    </div>
@endsection