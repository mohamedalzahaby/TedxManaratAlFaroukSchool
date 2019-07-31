
@extends('layouts.app')
@section('content')
  <br><br><br><br><br><br>
  <h1 style="margin-left:600px;margin-top:10px">Edit Department</h1>
  <form id="form" action="/departments/{{$departments->id}}" method="POST"  enctype = 'multipart/form-data'>

    @csrf
    <div class="container">
      <div class="col-md-12">
        <div class="form-group" style="margin-top:20px">
          <div class="col-md-4">
            <label>name: </label>
            <input type="text" name="name" style="height:55px" value="{{$departments->name}}" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <label>Board: </label>
            <select name="board_id">
                <option value={{ $departments->board_id }} selected>{{ $boardObj::find($departments->board_id)->name }}</option>
              @foreach ($boards as $board )
                <option value={{ $board->id }}>{{ $board->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group" style="margin-top:20px">
            <div class="col-md-4">
                <label>Cover Image: </label>
                <input type="file" name="name" style="height:55px" value="{{$departments->image}}">
            </div>
        </div>
      </div>
      <div class="form-group" >
        <div class="col-md-12">
            <label>Department description: </label>
            <textarea rows="7" cols="50" id="article-ckeditor" name="jobDescribtion"> {{$departments->jobDescribtion}}</textarea>
        </div>
    </div>
    <div class="form-group" style="margin-left:400px;">
        <div class="col-md-4">
            <input type="submit" name="submit" style="border-radius:10px;width:200px;">
        </div>
    </div>

    </div>
  </form>
@endsection
