@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <img src="https://happysuzume.com/wp-content/uploads/2018/05/%E6%BF%83%E3%81%84%E3%82%B0%E3%83%AC%E3%83%BC%E4%BA%BA.png"
                        style="width: 80px; text-align:center;" alt="">
                    <h4>{{ $user->name }}</h4>
                    <br>
                    <div class="container">
                        <div class="row" style="text-align:center">
                            <div class="col-sm-5 col-md-5 col-lg-5" style="margin: auto;">
                                <h5>
                                    <a href="">?</a>
                                </h5>
                                <h4>Following</h4>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-5" style="margin: auto;">
                                <h5>
                                    <a href="">?</a>
                                </h5>
                                <h4>Followers</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4>What do you do?</h4> <hr>
                    <div class="row">
                        <div class="col-md-5" style="margin: 15px auto; text-align: center;">
                            <a href="" style="text-align: center;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTLiw9lVyqQdn4cY9Zeux7K0MbxzD2Upio_IOGawlr6OfT5y0BL&usqp=CAU"
                                style="width: 80px; text-align:center;" alt="">
                                <h5>Category</h5>
                            </a>
                        </div>

                        <div class="col-md-5" style="margin: 15px auto; text-align: center;">
                            <a href="" style="text-align: center;">
                                <img src="https://image.flaticon.com/icons/png/512/1344/1344380.png"
                                style="width: 80px; text-align:center;" alt="">
                                <h5>Lesson Result</h5>
                            </a>
                        </div>

                        <div class="col-md-5" style="margin: 15px auto; text-align: center;">
                            <a href="" style="text-align: center;">
                                <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/social-activity-6-841668.png"
                                style="width: 80px; text-align:center;" alt="">
                                <h5>Activity</h5>
                            </a>
                        </div>

                        <div class="col-md-5" style="margin: 15px auto; text-align: center;">
                            <a href="" style="text-align: center;">
                                <img src="https://cdn3.iconfinder.com/data/icons/online-marketing-vol-2/72/64-512.png"
                                style="width: 80px; text-align:center;" alt="">
                                <h5>Make Question (admin)</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
