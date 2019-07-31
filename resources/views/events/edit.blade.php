@extends('layouts.app')
@section('content')
<h1 style="margin-left:650px;margin-top:130px">Add New Event</h1>
<div class = "container">
    <form id="form" action="/events/{{$event->id}}" method="POST" enctype = 'multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="col-md-12">
            <div class="form-group" style="margin-top:20px">
                <div class="col-md-4">
                    <label>name: </label>
                    <input type="text" name="name"  style="height:55px" value = "{{$event->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>date: </label>
                    <input type="date" name="date" value = "{{$event->date}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>Event start time: </label>
                    <input type="time" name="eventStart" value = "{{$event->eventStart}}">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group" style="margin-top:20px">
                <div class="col-md-4">
                    <label>Event end time: </label>
                    <input type="time" name="eventEnd" style="height:50px" value = "{{$event->eventEnd}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label id="newAddressLabel">address: </label>
                    <input type="text" name="address" value = "{{$event->address}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label id="newAddressLabel">GPS URl: </label>
                    <input type="url" name="GPSURl" value="{{ $event->GPSURL }}">
                </div>
            </div>
            <div class="col-md-12">
                <label>board: </label>
                <select name="boardId">
                    @foreach ($boards as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
                <label>Event description: </label>
                <textarea rows="7" name="description" id="article-ckeditor" cols="50">{{$event->description}}</textarea>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Event Cover Image: </label>
                        <input type="file" name="cover_image">
                    </div>
                </div>
        </div>
        <div class="form-group" style="margin-left:450px;">
                <div class="col-md-4">
                    <input type="submit" name="submit" style="border-radius:10px;width:300px;">
                </div>
        </div>
    </form>
</div>
@endsection
