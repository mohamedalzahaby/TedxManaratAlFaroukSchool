@extends('layouts.app')
@section('content')

@if (!Auth::guest())
        <h1 style="margin-left:650px;margin-top:130px">Add New Board</h1>
        <form id="form" action=" /boards" method="POST" enctype = 'multipart/form-data'>
            @csrf
            <div class="container" >
                <div class="col-md-12">
                    <div class="form-group" style="margin-top:20px">
                        <div class="col-md-4">
                            <label>name: </label>
                            <input type="text" name="name" style="height:55px" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Opening date: </label>
                            <input type="date" name="Opendate" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Closing date: </label>
                            <input type="date" name="closedate" >
                        </div>
                    </div>

                </div>
                <div class="col-md-12">


                <div class="form-group">
                    {{-- <div class="col-md-4">
                        <label>academicYear: </label>
                        <select name="academicYearId">

          </div> --}}
          <div class="col-md-12">


          <div class="form-group">
              <div class="col-md-4">
                  {{-- <label>academicYear: </label>
                  <select name="academicYearId"> --}}
                    {{-- @foreach ( $boards as $board )
                    <option value={{ $board->id }}> {{  $board->name  }}</option>     
                    @endforeach --}}
                    
                  {{-- </select> --}}
              </div>
          </div>

          </div>  
          <div class="col-md-12">
                  <label>Board description: </label>
                  
                  <textarea rows="5" cols="50" name="description">
          </textarea>
          </div>
          <div class="form-group">
            <input type="file" name="cover_image" id="">
            {{-- <img src="/storage//cover_images/{{  }}$board->image}}" style="width:100%" alt="{{$board->image}}"> --}}
          </div>
          <div class="form-group" style="margin-left:600px;">
                  <div class="col-md-4">
                    
                      <input type="submit" name="submit" style="border-radius:10px;width:300px;">
                  </div>
          </div>
        </div>
  </form>
  <br><br><br><br><br>
@endif
@endsection


