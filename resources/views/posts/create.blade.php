@extends('layouts.app')
@section('content')

<br><br><br><br><br><br><br>
<h3>Create Post</h3>
<form action="../posts/submit" method="POST" enctype = 'multipart/form-data'>
    @method('POST')
    @csrf
{{-- <input type="hidden" name="POST"> --}}
    <div class="form-group">
        <label for="mytitle">title</label>
        <input type="text" name="title" id="" class= "form-control" placeholder = "Title">
    </div>
    <div class="form-group">
        <label for="mybody">body</label>
        <textarea name="body" id="article-ckeditor" cols="30" rows="10" class = "form-control"  placeholder ="Body Text"></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="cover_image" id="">
    </div>
    <input type="submit" value="Submit" class = 'btn btn-primary'>
</form>




@endsection
