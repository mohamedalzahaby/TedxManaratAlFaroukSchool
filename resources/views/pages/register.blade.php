@extends('layouts.app')
@section('content')
<!-- Section - ADD Registration start -->
@if (!Auth::guest())
    <section id="registration" class="bg-white-2">
        <div class="container">

            <div class="row no-padding-rl">
                <div class="col-md-12">
                    <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
                        Add Registeration Form
                    </h2>
                    <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
                </div>
                <!-- //.col-md-12 -->
            </div>
            <!-- //.row -->

            <form method="POST" action="RegisterationTypes" class="form-horizontal">
                @method('POST')
                {{ csrf_field() }}
                <fieldset>
                    <legend>Add Form Type</legend>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="appendedtext">Add registration Type</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="registrationTypeName" name="name" class="form-control" placeholder="registration Type" type="text">
                                <label style="position:relative;left:-170px;margin-top:30px" for="RegisterAs">isForEvent</label>
                                <input name="isForEvent" style="position:relative;bottom:40px;height:30px;margin-right:10px"  type="checkbox">

                            </div><p class="help-block">enter new registration Type</p>

                            <button class="btn btn-primary" type="submit" name='submit' id="registrationTypeNameButton"style="height:45px;width:100px;background-color:#e62b1e;border-radius:10px" >ADD</button>
                        </div>

                    </div>

                </fieldset>
            </form>
            <form method="POST" action="{{ 'RegisterationTypesDestroy'}}" class="form-horizontal">
                @method("POST")
                @csrf
                <fieldset>
                    <!-- Form Name -->
                    <legend>Delete Form Type</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="RegisterationType">Registeration Type</label>
                        <div class="col-md-4">
                            <select name="registerationFormType" id="RegisterationType" class="form-control">
                                @foreach ($RegistrationFormTypes as $type)
                                    <option value=" {{$type->id}} ">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <input type="submit" id="singlebutton" value="Delete" name="singlebutton" class="btn btn-primary"style="background-color:#e62b1e;border-radius:10px">
                </div>
                </div>
            </form>
            <form method="POST" action="{{ 'RegisterationTypesUpdate'}}" class="form-horizontal">
                @method("POST")
                @csrf
                <fieldset>
                    <!-- Form Name -->
                    <legend>Update Form Type</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="RegisterationType">Registeration Type</label>
                        <div class="col-md-4">
                            <select name="registerationFormType" id="RegisterationType" class="form-control">
                            @foreach ($RegistrationFormTypes as $type)
                                <option value=" {{$type->id}} ">{{$type->name}}</option>
                            @endforeach
                            </select>
                            <input type="text" name="updatedName" class="form-control" placeholder="Update Name" >
                        </div>
                    </div>

                </fieldset>
                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <input type="submit" id="singlebutton" value="Update" name="singlebutton" class="btn btn-primary"style="background-color:#e62b1e;border-radius:10px">
                </div>
                </div>
            </form>
            <form method="POST" action="/registeration/create" class="form-horizontal" enctype="multipart/form-data">
                 @method('GET')
                <fieldset>
                    <!-- Form Name -->
                    <legend>Add Registeration Form</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="RegisterationType">Registeration Type</label>
                        <div class="col-md-4">
                            <select name="registerationFormType" id="RegisterationType" class="form-control">
                            @foreach ($RegistrationFormTypes as $type)
                                <option value=" {{$type->id}} ">{{$type->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="RegisterationType">Register As</label>
                        <div class="col-md-4">
                            <select name="RegisterAs" id="RegisterAs" class="form-control">
                                @foreach ($data['userTypes'] as $type)
                                    @if ($type->parentId != 0)
                                        <option value=" {{$type->id}} ">{{$type->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <input type="submit" id="singlebutton" value="submit" name="singlebutton" class="btn btn-primary"style="background-color:#e62b1e;border-radius:10px">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endif
<!-- //Section - ADD Registration end -->

<!-- Section - Registration start -->
  <section id="registration" class="bg-white-2">
        <div class="container">
          <div class="row no-padding-rl">
            <div class="col-md-12">
              <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
                Applications
              </h2>
              <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
            </div>
            <!-- //.col-md-12 -->
          </div>
          <!-- //.row -->



          <span class="bg-gray-light-2 separator-line-full"></span>
          <div class="row margin-5 no-margin-rl no-margin-bottom">
            @if (!$data['forms']->count())
                <h3>No current registration forms available right now </h3>
                <br>
                <h1>Stay Tuned!!</h3>
            @else
                @foreach ($data['forms'] as $key => $form)
                    @if ($key % 2)
                        <div class="col-md-5 no-padding-rl">
                        <div class="row text-center">
                            <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
                                {{$form->name}}
                            </h3>
                        </div>
                        <div class="margin-8 no-margin-bottom no-margin-rl text-center">
                            <form action="ted/test" method="post">
                            <input type="hidden" name="{{$form->id}}">
                                <!-- <span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">
                                Register
                                </span> -->
                                <a href='{{"registeration/{$form->id}"}}'>
                                <span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">Register</span></a>
                            </form>
                        </div>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br>
                    @else
                        <!-- //.col-md-5 -->
                        <div class="contact-address col-md-6 col-md-offset-1">
                            <div class="row text-center">
                                <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
                                    {{$form->name}}
                                </h3>
                            </div>
                            <div class="margin-8 no-margin-bottom no-margin-rl text-center">
                                <!-- <form action="ted/test" method="post">
                                <input type="hidden" name="<?php //echo $form['id'];?>">
                                <input  value="Register" type="submit" name="submit">
                            </form>   -->
                            <a href='{{"registeration/{$form->id}"}}'><span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">Register</span></a>
                            </div>
                        </div>
                        <!-- //.col-md-6 -->
                    @endif
                @endforeach
            @endif
          </div>
          <!-- //.row -->
        </div>
        <!-- //.container -->
      </section>

<!-- //Section - Registration end -->

<!-- Section - Registration start -->
  <?php // include('views\memberRegister.php'); ?>
<!-- //Section - Registration end -->




@endsection
