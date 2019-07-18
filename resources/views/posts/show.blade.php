@extends('layouts.app')
@section('content')
<br><br><br><br><br><br><br>
<a href="/posts" class="btn btn-default">Go Back</a>
<h1>{{$posts->title}}</h1>
<img src="/storage//cover_images/{{$posts->cover_Image}}" style="width:100%" alt="{{$posts->cover_Image}}">
<br><br>
<div>
    {!! $posts->body !!}
</div>
<hr>
<small>written on {{$posts->created_at}}</small>
<hr>
@if (!Auth::guest())
    @if (Auth::user()->id == $posts->user_id)
        <a href="/posts/{{$posts->id}}/edit" class="btn btn-default">Edit</a>
        <form action="../posts/{{$posts->id}}" method="post" class = 'pull-right'>
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete" class = 'btn btn-danger'>
        </form>
    @endif
@endif
@endsection
<br><br><br><br><br><br><br>
