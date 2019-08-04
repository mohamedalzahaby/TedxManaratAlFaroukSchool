@extends('layouts.app')
@section('content')
  <!-- Section - Team Start -->
  <section id="team" class="bg-white">
    <div class="container">
      <div class="row no-padding-rl no-padding-top padding-4">
        <div class="col-md-12">
          <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            {{$board->name}}
          </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl no-margin-bottom separator-line-extra-thick-long"></span>
        </div>
        <!-- //.col-md-10 -->
      </div>
      <!-- //.row -->
      @if (!Auth::guest() && $isAccepted == true)
      <a href="/departments/create" class="btn btn-primary"style="margin-left:10px;margin-bottom:10px;background-color:#e62b1e;border-radius:10px">Create Department</a><br>
      @endif
      @foreach ($departments as $department)
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
                <a href="/ourTeam/{{ $department->id }}"> {{ $department->name }} </a>
                </h3>
                </div>
                <!-- Member Box Start -->
                <div class="member-box col-xs-6 col-sm-4 col-md-3">
                <div class="overflow-hidden position-relative width-100">
                    <div class="position-relative">
                    <div class="img-wrapper">
                        <img src="/storage//cover_images/{{$department->image}}" alt="{{$department->image}}"/>
                    </div>
                    </div>
                    <!-- //.position-relative -->
                    <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
                    <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
                            {!! $department->jobDescribtion !!}
                    </span>
                    </div>
                    <!-- //.bg-gray-light -->
                </div>
                <!-- //.overflow-hidden -->
                </div>
                <!-- //Member Box End -->
            </div>
            <!-- //.row -->
            <a href="/departments/{{$department->id}}/edit" class="btn btn-primary"style="margin-left:15px;margin-bottom:20px;border-radius:10px;">Edit</a>
                <form action="/departments/{{$department->id}}" method="post" class = 'pull-right'>
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class = 'btn btn-danger'style="color:white;border-radius:10px;background-color:#e62b1e">
                </form>
        @endforeach
    </div>
    <!-- //.container -->
  </section>
  <!-- //Section - Team End -->
@endsection
