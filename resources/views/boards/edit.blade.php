@extends('layouts.app')
@section('content')
<br><br><br><br><br><br><br>
<h3>Edit Post</h3>
<form action="/ourTeam/{{$boards->id}}" method="post"  enctype = 'multipart/form-data'>
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="mytitle">board name</label>
        <input type="text" name="name"  class = "form-control" placeholder = "Title">
    </div>
    <div class="form-group">
            <label for="mybody">board Description</label>
            <textarea name="description" id="article-ckeditor"  class="form-control" >{{$boards->description}}</textarea>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <label>Opening date: </label>
            <input type="date" name="Opendate" class="form-control" >
        </div>
        <div class="form-group">    
            <div class="col-md-4">
                <label>Closing date: </label>
                <input type="date" name="closedate" >
            </div>
    <div class="form-group">
        <input type="file" name="cover_image">
    </div>

    <input type="submit" value="Submit" class="btn btn-primary">
</form>




@endsection
