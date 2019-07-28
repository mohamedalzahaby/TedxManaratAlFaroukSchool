@php
    $css = '85px';
@endphp
@extends('layouts.app')
@section('content')

<a href="/ourTeam" class="btn btn-default" style="margin-left:10px;border-color:black">Go Back</a>
<h1 style="margin-left:250px;margin-bottom:10px">{{$boards->name}}</h1>
<img src="/storage//cover_images/{{$boards->cover_Image}}" style="margin-left:250px;" alt="{{$boards->cover_Image}}">
<br><br>
<div style="margin-left:20px">
    {!! $boards->description !!}
</div>
{{-- <hr> --}}
{{-- <small style="margin-left:20px">written on {{$posts->created_at}}</small> --}}
{{-- <hr> --}}
{{-- @if (!Auth::guest()) --}}
    {{-- @if (Auth::user()->id == $posts->user_id) --}}
        <a href="/ourTeam/{{$boards->id}}/edit" class="btn btn-default"style="margin-left:15px;margin-bottom:20px;border-radius:10px;">Edit</a>
        <form action="/ourTeam/{{$boards->id}}" method="POST" class = 'pull-right'>
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete" class = 'btn btn-danger'style="color:white;border-radius:10px;background-color:#e62b1e">
        </form>
    {{-- @endif --}}
{{-- @endif --}}
@endsection
<br><br><br><br><br><br><br>
