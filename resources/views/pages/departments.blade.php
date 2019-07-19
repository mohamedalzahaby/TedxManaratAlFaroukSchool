@extends('layouts.app')
@section('content')
@php
  //  dd($departments);                           
@endphp
<br><br><br><br><br><br><br><br><br><br><br><br><br>
@if (!Auth::guest())


        <h1 style="margin-left:600px;margin-top:10px">Add New Department</h1>
        <form id="form" action="../departments/submit" method="POST">
          @method('POST')
          @csrf
            <div class="container" >
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
                            @foreach ($departments as $department )
                            <option value={{ $department->id }}>{{ $department->name }}</option>       
                            @endforeach
                         
                          </select>
                         
                      </div>
                  </div>
                   
                    

                </div>
                <div class="col-md-12">


                
                </div>  
                <div class="col-md-12">
                        <label>Department description: </label>
                       
                        <textarea rows="7" cols="50" name="jobDescribtion">
                </textarea>
                </div>
                <div class="form-group">
                  <input type="file" name="image">
              </div>
          
                <div class="form-group" style="margin-left:600px;">
                        <div class="col-md-4">
                            <input type="submit" name="submit" style="border-radius:10px;width:300px;">
                        </div>
                </div>
             </div>
        </form>
@endif



  <!-- Section - Team Start -->
  <section id="team" class="bg-white">
    <div class="container">
      <div class="row no-padding-rl no-padding-top padding-4">
        <div class="col-md-12">
          <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            Our Team
          </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl no-margin-bottom separator-line-extra-thick-long"></span>
        </div>
        <!-- //.col-md-10 -->
      </div>
      <!-- //.row -->
@foreach ($departments as $department)
      
  <div class="row">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
      {{  $department->name  }}
      </h3>
      <p class="margin-5 no-margin-rl text-gray-dark-2">
        {{ $department->jobDescribtion }}
      </p>
    </div>

    <!-- Member Box Start -->
    <div class="member-box col-xs-6 col-sm-4 col-md-3">
      <div class="overflow-hidden position-relative width-100">
        <div class="position-relative">
          <div class="img-wrapper">
            <img src="res/images/team/zahaby.jpg" alt=""/>
          </div>
        </div>
        <!-- //.position-relative -->
        <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
          <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
            
          </span>
        </div>
        <!-- //.bg-gray-light -->
      </div>
      <!-- //.overflow-hidden -->
    </div>
    <!-- //Member Box End -->
  </div>
  <!-- //.row -->
@endforeach

    
    </div>
    <!-- //.container -->
  </section>
  <!-- //Section - Team End -->



@endsection
