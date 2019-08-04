@php
    $lastEventData = DB::table('Event')->latest()->first();
    $ci = url("../images/$lastEventData->coverImage");
    $style = "background-image: url('../images/$lastEventData->coverImage'); background-position: center bottom !important;";
    // dd($ci);
    // die();
@endphp
@extends('layouts.app')
@section('content')



<!-- Section - Home Start -->
<section id="home-bg-slideshow" class="bg-gray-dark-2 height-100 no-padding overflow-hidden width-100">
    <!-- BG Slideshow -->
    <div class="bg-slideshow-wrapper flexslider height-100 no-border no-border-radius no-margin width-100">
        <div class="slides height-100 width-100">
            <div class="bg-cover bg-overlay-black-7 display-block height-100 width-100">
                <div class="display-table height-100 position-absolute position-top position-left width-100">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 text-center">
                                    <h3 class="font-weight-700 letter-spacing-2 text-white xs-title-large sm-title-extra-large title-extra-large-3 title-extra-large-4">
                                        <span class="text-base-color">TEDX</span> ManaratAlFarouk
                                    </h3>
                                    <p class="font-family-alt text-white sm-title-small title-medium font-weight-800">
                                        <span class="text-base-color">X = </span>independently organized ted event
                                    </p>
                                    <br>
                                    <a href="/registeration" class="btn btn-base-color sm-btn-medium btn-large">
                                        Register Now
                                    </a>
                                </div>
                                <!-- //.col-md-10 -->
                            </div>
                            <!-- //.row -->
                        </div>
                        <!-- //.container -->
                    </div>
                    <!-- //.display-table-cell -->
                </div>
                <!-- //.display-table -->
            </div>
            <!-- //.bg-cover -->


            <div class="bg-cover bg-overlay-black-7 display-block height-100 width-100">
                <div class="display-table height-100 position-absolute position-top position-left width-100">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 text-center">
                                    <h2 class="font-family-alt font-weight-900 letter-spacing-2 text-white xs-title-extra-large sm-title-extra-large-3 title-extra-large-5">
                                        <span class="text-base-color">{{$lastEventData->name}}
                                    </h2>
                                    <br>
                                    <h3 class="font-weight-700 letter-spacing-2 text-white xs-title-large sm-title-extra-large title-extra-large-3">
                                        {{$lastEventData->date}}
                                    </h3>
                                    <p class="font-family-alt text-white sm-title-small title-medium">
                                        at
                                    </p>
                                    <h4 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase text-white xs-title-small sm-title-medium title-extra-large">
                                        {{$lastEventData->address}}
                                    </h4>
                                    <!-- <br>
                    <a href="/register/" class="btn btn-base-color sm-btn-medium btn-large">
                      Register Now
                    </a> -->
                                </div>
                                <!-- //.col-md-10 -->
                            </div>
                            <!-- //.row -->
                        </div>
                        <!-- //.container -->
                    </div>
                    <!-- //.display-table-cell -->
                </div>
                <!-- //.display-table -->
            </div>
            <!-- //.bg-cover -->
        </div>
        <!-- //.slides -->
    </div>
    <!-- //.bg-slideshow-wrapper -->
</section>
<!-- //Section - Home End -->



<!-- Section - About Start -->
{{-- @if(!Auth::guest())
<form class="form-horizontal">
    <fieldset>
        <!-- Appended Input-->
        <div class="form-group">
            <div class="col-md-4">
                <div class="input-group">
                    <input id="appendedtext" name="appendedtext" class="form-control" placeholder="Enter URL" type="text" style="positiion:relative;top:-270px;left:600px">
                    <input type="submit" style="position:relative;top:-250px;left:700px;border-radius:10px;" value="Submit">
                </div>
            </div>
        </div>
    </fieldset>
</form>
@endif --}}
<section id="about" class="bg-white-3 pull-up">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-7">
                <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
                    About TEDxManaretAlFaroukSchool
                </h2>
                <span class="bg-base-color margin-4 no-margin-bottom no-margin-rl separator-line-extra-thick-long"></span>
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-family-alt margin-5-5 no-margin-bottom no-margin-rl sm-text-large text-extra-large text-gray-dark-2">
                            TEDxManaratAlFaroukSchool brings the spirit and passion surrounding TED and TEDx to link the school’s generations.
                        </p>
                        {{-- <div>
                            <input type="submit" name="submit" style="border-radius:10px;width:200px;margin-top:20px;margin-left:150px;" value="Edit">
                        </div> --}}
                    </div>
                    <!-- //.col-sm-6 -->
                </div>
                <!-- //.row -->
            </div>
            <!-- //.col-sm-6 -->

            <div class="col-sm-6 col-md-4 col-md-offset-1 xs-margin-8 xs-no-margin-rl xs-no-margin-bottom">
                <div class="testimonial">
                    <div class="bg-white border border-gray-light border-round padding-5 width-100">
                        <h4 class="font-weight-700 font-family-alt">
                            About TEDx
                        </h4>
                        <br>
                        <p class="no-margin text-gray-dark- text-large">
                            In the spirit of ideas worth spreading, TEDx is a program for local,
                            self-organized events that bring people together to share a TED-like
                            experience. At a TEDx event, TEDTalks video and live speakers combine
                            to spark deep discussion and connection. These local, self-organized
                            events are branded with TEDx, where x = an independently organized
                            TED event. The TED Conference provides general guidance for the
                            TEDx program, but individual TEDx events are self-organized.
                            {{-- <div>
                                <input type="submit" name="submit" style="border-radius:10px;width:200px;margin-top:20px;margin-left:60px;" value="Edit">
                            </div> --}}
                        </p>
                    </div>
                    <!-- //.bg-white -->
                </div>
                <!-- //.testimonial -->
            </div>
            <!-- //.col-sm-6 -->
        </div>
    </div>
    <!-- //.container -->
</section>
<!-- //Section - About End -->

{{-- "../images/dimensions.jpg" --}}


<section id="venue" class="bg-cover bg-overlay-black-4 display-table height-100 no-padding width-100" style='background-image: url("../images/$lastEventData->coverImage");
background-position: center bottom !important;'>
    <div class="display-table-cell vertical-align-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3 class="display-block font-family-alt font-weight-900 letter-spacing-2 text-uppercase text-white xs-title-extra-large-4 title-extra-large-4">
                        Venue
                    </h3>
                    <br>
                    <p class="font-family-alt letter-spacing-1 margin-3 no-margin-bottom no-margin-rl text-white xs-title-small title-large text-uppercase font-weight-700">
                        {{$lastEventData->address}}
                    </p>
                    <br>
                    <a href="{{$lastEventData->GPSURL}}">
                        View location on map
                    </a>
                </div>
                <!-- //.col-md-8 -->
            </div>
            <!-- //.row -->
        </div>
        <!-- //.container -->
    </div>
    <!-- //.display-table-cell -->
</section>
<!-- //Section - Venue End -->

  







@endsection
