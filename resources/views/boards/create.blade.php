@extends('layouts.app')
@section('content')


<h1 style="margin-left:650px;margin-top:130px">Add New Board</h1>
<form id="form" action="/ourTeam" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="container">
        <div class="col-md-12">
            <div class="form-group" style="margin-top:20px">
                <div class="col-md-4">
                    <label>name: </label>
                    <input type="text" name="name" style="height:55px">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>Opening date: </label>
                    <input type="date" name="Opendate">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>Closing date: </label>
                    <input type="date" name="closedate">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-group" style="margin:15px">
                    <label for="mybody">description</label>
                    <textarea name="description" id="article-ckeditor" cols="30" rows="10" class="form-control" placeholder="Body Text"></textarea>
                </div>
                <div class="form-group" style="margin:15px">
                    <input type="file" name="cover_image" id="">
                </div>
                <input type="submit" value="Submit" class='btn btn-primary' style="background-color:#e62b1e;margin-left:45%;margin-bottom:10px;border-radius:10px">
            </div>
        </div>
    </div>
</form>
@endsection
