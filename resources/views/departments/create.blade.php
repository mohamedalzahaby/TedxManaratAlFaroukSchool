@extends('layouts.app')
@section('content')
  <br><br><br><br><br><br>
  <h1 style="margin-left:600px;margin-top:10px">Add New Department</h1>
  <form id="form" action="/departments" method="POST"  enctype = 'multipart/form-data'>

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
            <label>Board: </label>
            <select name="board_id">
              @foreach ($boards as $board )
                <option value={{ $board->id }}>{{ $board->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group"style="margin-top:50px">
            <div class="col-md-4">
                <input type="file" name="image">
            </div>
        </div>
      </div>
        <div class="col-md-12">
            <label>Department description: </label>
            <textarea rows="7" cols="50" name="jobDescribtion" id="article-ckeditor">
            </textarea>
        </div>
        <div class="form-group" style="margin-left:450px;">
            <div class="col-md-4">
                <input type="submit" name="submit" style="border-radius:10px;width:200px;">
            </div>
        </div>
    </div>
  </form>
@endsection
