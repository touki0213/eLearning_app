@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="card">
        <div class="card-body"> -->
            @if($user->is_admin == '1')
                <h4 class="card-title" style="text-align: center;">
                    Make Questions <br><br>
                    <a href="{{ route('admin.category_create') }}">
                        <button type="button" class="btn btn-info">Create Questions</button>
                    </a>
                </h4>

                <div class="row">
                    @foreach($categories as $category)
                        <div class="card col-sm-4 col-md-4 col-lg-4">                
                            <div class="card-body">
                                <div style="float: right">
                                    <button type="button" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-danger">D</button>
                                </div>
                                <h5>{{ $category->title }}</h5>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <h1 style="color: red; text-align: center;">Only Admin Page!!!!!!!</h1>
            @endif
        <!-- </div>
    </div> -->
</div>
@endsection