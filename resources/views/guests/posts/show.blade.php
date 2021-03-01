@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$post->title}}</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$post->title}}</h4>
                <p class="card-text">{{$post->body}}</p>
            </div>
        </div>
    </div>
    

@endsection