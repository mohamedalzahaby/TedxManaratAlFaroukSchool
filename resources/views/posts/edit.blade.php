@extends('layouts.app')
@section('content')
<br><br><br><br><br><br><br>
<h3>Edit Post</h3>
<form action="../../posts/{{$posts->id}}" method="post"  enctype = 'multipart/form-data'>
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="mytitle">title</label>
        <input type="text" name="title" value = "{{$posts->title}}" class = "form-control" placeholder = "Title">
    </div>
    <div class="form-group">
            <label for="mybody">body</label>
            <textarea name="body" id="article-ckeditor"  class="form-control" >{{$posts->body}}</textarea>
    </div>
    <div class="form-group">
        <input type="file" name="cover_image">
    </div>

    <input type="submit" value="Submit" class="btn btn-primary">
</form>




@endsection
