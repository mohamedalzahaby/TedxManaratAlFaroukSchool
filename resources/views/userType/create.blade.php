@extends('layouts.app')
@section('content')


<h3 style="margin-top:130px;margin-left:50%">Create Post</h3>
<form action="../posts/submit" method="POST" enctype = 'multipart/form-data'>
    @method('POST')
    @csrf
{{-- <input type="hidden" name="POST"> --}}
    <div class="form-group"style="margin:15px">
        <label for="mytitle" >Title</label>
        <input type="text" name="title" id="" class= "form-control" placeholder = "Title">
    </div>
    <div class="form-group"style="margin:15px">
        <label for="mybody">Body</label>
        <textarea name="body" id="article-ckeditor" cols="30" rows="10" class = "form-control"  placeholder ="Body Text"></textarea>
    </div>
    <div class="form-group"style="margin:15px">
        <input type="file" name="cover_image" id="">
    </div>
    <input type="submit" value="Submit" class = 'btn btn-primary'style="background-color:#e62b1e;margin-left:50%;margin-bottom:10px;border-radius:10px">
</form>




@endsection
