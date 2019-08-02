@extends('layouts.app')
@section('content')

<!-- Section - Team Start -->
<section id="team" class="bg-white">
    <div class="container">
        <div class="row no-padding-rl no-padding-top padding-4">
            <div class="col-md-12">
                <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
                    Our Events
                </h2>
                <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl no-margin-bottom separator-line-extra-thick-long"></span>
            </div>
            <!-- //.col-md-10 -->
        </div>
        <!-- //.row -->
        <a href="/events/create" class="btn btn-primary" style="margin-left:10px;margin-bottom:10px;background-color:#e62b1e;border-radius:10px">Create Event</a><br>

        {{-- @foreach ($events as $event) --}}
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                {{-- <h3 class="font-family-alt font-weight-700 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
                    <a href="/events/{{ $event->id }}"> {{ $event->name }} </a>
                </h3> --}}

            </div>
            @foreach ($events as $event)
            <!-- Member Box Start -->
            <div class="member-box col-xs-6 col-sm-6 col-md-6 col-lg-6" style="height:500px"  >
                <div class="overflow-hidden position-relative width-100" >
                    <div class="position-relative" >
                        <div class="img-wrapper">
                            <img src="/storage//cover_images/{{$event->coverImage}}" alt="{{$event->coverImage}}"   />
                        </div>
                    </div>
                    <!-- //.position-relative -->
                    <div class="bg-gray-light no-padding-rl padding-6 position-relative text-center">
                        <span class="display-block font-family-alt font-weight-700 letter-spacing-2 text-gray-dark-2 text-small text-uppercase">
                            <br><h4><a href="/events/{{ $event->id }}"> {{ $event->name }} </a></h4><br>
                            <label>Date:  </label>{{$event->date}}<br>
                            {{'from: '.$event->eventStart. ' - to: '. $event->eventEnd }}
                            <label><a style="color: #3b5998"  href="{{$event->facebookURL}}">Facebook Link</a></label>
                        </span>
                    </div>
                    <!-- //.bg-gray-light -->
                </div>
                <!-- //.overflow-hidden -->
            </div>
            <!-- //Member Box End -->
            @endforeach
        </div>
        <!-- //.row -->




        {{-- @endforeach --}}

    </div>
    <!-- //.container -->
</section>
<!-- //Section - Team End -->


@endsection
