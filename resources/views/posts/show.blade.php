@php
    $css = '85px';
@endphp
@extends('layouts.app')
@section('content')
<div class="container">


<a href="/posts" class="btn btn-default" style="margin-left:10px;border-color:black">Go Back</a>
<h1 style="margin-left:20px;margin-bottom:10px">{{$posts->title}}</h1>
<img src="/storage//cover_images/{{$posts->cover_Image}}" style="margin-left:20px;" alt="{{$posts->cover_Image}}">
<br><br>
<div style="margin-left:20px">
    {!! $posts->body !!}
</div>
<hr>
<small style="margin-left:20px">written on {{$posts->created_at}}</small>
<hr>
@if (!Auth::guest() && Auth::user()->id == $posts->user_id)
    <a href="/posts/{{$posts->id}}/edit" class="btn btn-default"style="margin-left:15px;margin-bottom:20px;border-radius:10px;">Edit</a>
    <form action="../posts/{{$posts->id}}" method="post" class = 'pull-right'>
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" class = 'btn btn-danger'style="color:white;border-radius:10px;background-color:#e62b1e">
    </form>
@endif
</div>
@endsection
<br><br><br><br><br><br><br>
