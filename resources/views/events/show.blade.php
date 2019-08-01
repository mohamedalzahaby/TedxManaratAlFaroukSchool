@php
    $css = '85px';
        // dd($event);
@endphp
@extends('layouts.app')
@section('content')
<div class="container">


<a href="/events" class="btn btn-default" style="margin-left:10px;border-color:black">Go Back</a>
<h1 style="margin-left:20px;margin-bottom:10px">{{$event->name}}</h1>
<img src="/storage//cover_images/{{$event->coverImage}}" style="margin-left:20px;" alt="{{$event->coverImage}}">
<br><br>
<div style="margin-left:20px">
    {!! $event->description !!}
</div>
<hr>
<small style="margin-left:20px">written on {{$event->created_at}}</small>
<hr>
{{-- @if (!Auth::guest()) --}}
    {{-- @if (Auth::user()->id == $event->user_id) --}}
    <a href="/events/{{$event->id}}/edit" class="btn btn-primary"style="margin-left:15px;margin-bottom:20px;border-radius:10px;">Edit</a>
    <a href="{{$event->GPSURL}}" class="btn btn-default"style="color:white;background-color:black;margin-left:350px;margin-bottom:20px;border-radius:10px;">show on google maps</a>
    <form action="/events/{{$event->id}}" method="post" class = 'pull-right'>
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" class = 'btn btn-danger'style="color:white;border-radius:10px;background-color:#e62b1e">
    </form>
    {{-- @endif
@endif --}}
</div>
@endsection
<br><br><br><br><br><br><br>
