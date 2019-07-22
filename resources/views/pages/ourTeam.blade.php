@extends('layouts.app')
@section('content')

<br><br><br><br><br><br><br><br><br><br>
@if (!Auth::guest())
        <h1 style="margin-left:650px;margin-top:130px">Add New Board</h1>
        <form id="form" action=" /Board/submit" method="POST">
            <div class="container" >
                <div class="col-md-12">
                    <div class="form-group" style="margin-top:20px">
                        <div class="col-md-4">
                            <label>name: </label>
                            <input type="text" name=":name" style="height:55px">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Opening date: </label>
                            <input type="date" name=":Opendate">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Closing date: </label>
                            <input type="date" name=":closedate">
                        </div>
                    </div>

                </div>
                <div class="col-md-12">


                <div class="form-group">
                    <div class="col-md-4">
                        <label>academicYear: </label>
                        <select name=":academicYearId">

          </div>
          <div class="col-md-12">


          <div class="form-group">
              <div class="col-md-4">
                  <label>academicYear: </label>
                  <select name="academicYearId">
                    @foreach ( $boards as $board )
                    <option value={{ $board->id }}> {{  $board->name  }}</option>     
                    @endforeach
                    
                  </select>
              </div>
          </div>

          </div>  
          <div class="col-md-12">
                  <label>Board description: </label>
                  
                  <textarea rows="7" cols="50" name="description">
          </textarea>
          </div>
          <div class="form-group">
            <input type="file" name="image" id="">
            {{-- <img src="/storage//cover_images/{{$board->image}}" style="width:100%" alt="{{$board->image}}"> --}}
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
@foreach ($boards as $board)    
  <div class="row">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
      {{  $board->name  }}
      </h3>
      <p class="margin-5 no-margi`n-rl text-gray-dark-2">
        {{ $board->description }}
      </p>
    </div>

      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
            Speaker Committee
          </h3>
          <p class="margin-5 no-margin-rl text-gray-dark-2">
            Responsible for finding voices that have ideas which can ignite the
            people. Works in close association with the speakers to help construct
            a talk which will not only inspire and motivate people but also spark
            conversations and open doors for new perspectives.
          </p>
        </div>

        <!-- Member Box Start -->
        <div class="member-box col-xs-6 col-sm-4 col-md-3">
          <div class="overflow-hidden position-relative width-100">
            <div class="position-relative">
              <div class="img-wrapper">
                <img src="../images/team/zahaby.jpg" alt=""/>
              </div>
            </div>
            <!-- //.position-relative -->
            <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
              <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
                Mohamed<br>Alzahaby
              </span>
            </div>
            <!-- //.bg-gray-light -->
          </div>
          <!-- //.overflow-hidden -->
        </div>
        <!-- //Member Box End -->
      </div>
      <!-- //.row -->

      <div class="row padding-8 no-padding-rl no-padding-bottom">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
            Fundrasing Team
          </h3>
          <p class="margin-5 no-margin-rl text-gray-dark-2">
            The Fundrasing Team is the driver and in-house champion of our event.
            Its job is to monitor and document technical and business requirements
            and ensure availability of resources within the specified time frame.
            The Fundrasing Team makes sure that event is given sufficient resources,
            while managing relationships with sponsors and contributors.
          </p>
        </div>

        <!-- Member Box Start -->
        <div class="member-box col-xs-6 col-sm-4 col-md-3">
          <div class="overflow-hidden position-relative width-100">
            <div class="position-relative">
              <div class="img-wrapper">
                <img src="res/images/team/yasir_umar.jpg" alt=""/>
              </div>
            </div>
            <!-- //.position-relative -->
            <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
              <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
                Mohd. Yasir<br>Umar
              </span>
            </div>
            <!-- //.bg-gray-light -->
          </div>
          <!-- //.overflow-hidden -->
        </div>
        <!-- //Member Box End -->
      </div>
      <!-- //.row -->

      <div class="row padding-8 no-padding-rl no-padding-bottom">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
            Human Resources
          </h3>
          <p class="margin-5 no-margin-rl text-gray-dark-2">
            Our Human Resources are experts who are brainy about buzz. Their role
            is to conceptually design and present a themed TEDx event. Each of the
            team members contribute a very specific knowledge to the overall concept
            and design process. This allows the team to visualize or image the
            destination, find overlaps or gaps in its design, finely focus on the
            theming needs and ultimately delight the public, resulting in the greatest
            of compliments.
          </p>
        </div>

        <!-- Member Box Start -->
        <div class="member-box col-xs-6 col-sm-4 col-md-3">
          <div class="overflow-hidden position-relative width-100">
            <div class="position-relative">
              <div class="img-wrapper">
                <img src="res/images/team/aaliya.jpg" alt=""/>
              </div>
            </div>
            <!-- //.position-relative -->
            <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
              <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
                Aaliya<br>Waseem
              </span>
            </div>
            <!-- //.bg-gray-light -->
          </div>
        </div>
        <!-- //.position-relative -->
        <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
          <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
            <a href="/departments">departments</a><br><a href="/board/update">Update Board</a>
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
