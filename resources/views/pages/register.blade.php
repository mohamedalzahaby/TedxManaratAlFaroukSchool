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
                                <label class="col-md-4 control-label" for="RegisterAs">isForEvent</label>
                                <input name="isForEvent" class="form-control" placeholder="isForEvent" type="checkbox">
                                <button type="submit" name='submit' id="registrationTypeNameButton" ><span class="input-group-addon">ADD</span></button>
                            </div><p class="help-block">enter new registration Type</p></div>
                    </div>
                </fieldset>
            </form>


            <form method="POST" action="{{ 'RegisterationTypesDestroy'}}" class="form-horizontal">
                @method("POST")
                @csrf
                <fieldset>
                    <!-- Form Name -->
                    <legend>Add Registeration Form</legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="RegisterationType">Registeration Type</label>
                        <div class="col-md-4">
                            @php $data['controller']->selectTag('RegisterationType', 'registerationFormType', $RegistrationFormTypes,'id' , 'name' ,'class="form-control"'); @endphp
                        </div>
                    </div>
                </fieldset>
                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                <div class="col-md-4">
                    <input type="submit" id="singlebutton" value="Delete" name="singlebutton" class="btn btn-primary">
                </div>
                </div>
            </form>


            <form method="POST" action="<?php echo $GLOBALS['ASSET'].$GLOBALS['register'].$GLOBALS['addForm'];?>" class="form-horizontal">
                <fieldset>
                <!-- Form Name -->
                <legend>Add Registeration Form</legend>
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="RegisterationType">Registeration Type</label>
                    <div class="col-md-4">
                    <?php $data['controller']->selectTag('RegisterationType', 'registerationFormType', $RegistrationFormTypes,'id' , 'name' ,'class="form-control"'); ?>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="RegisterAs">Applicant Register as</label>
                    <div class="col-md-4">
                    <?php $data['controller']->selectTag('RegisterAs', 'RegisterAs', $data['userTypes'],'id' , 'name', 'class="form-control"'); ?>
                    </div>
                </div>
                </fieldset>
                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                <div class="col-md-4">
                    <input type="submit" id="singlebutton" value="submit" name="singlebutton" class="btn btn-primary">
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
                                {{$form['name']}}
                            </h3>
                        </div>
                        <div class="margin-8 no-margin-bottom no-margin-rl text-center">
                            <form action="ted/test" method="post">
                            <input type="hidden" name="{{$form['id']}}">
                                <!-- <span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">
                                Register
                                </span> -->
                                <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['userForm'].'?id='.$form['id'];?>">
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
                                    {{$form['name']}}
                                </h3>
                            </div>
                            <div class="margin-8 no-margin-bottom no-margin-rl text-center">
                                <!-- <form action="ted/test" method="post">
                                <input type="hidden" name="<?php //echo $form['id'];?>">
                                <input  value="Register" type="submit" name="submit">
                            </form>   -->
                            <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['userForm'].'?id='.$form['id'];?>"><span  class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl">Register</span></a>
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
