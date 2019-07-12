@extends('layouts.app')
@section('content')

<!-- Section - ADD Registration start -->
<?php if (isset($_SESSION['IsSignedUpIn']) && $_SESSION['userTypeId'] == 2 ) {?>
  <?php Controller::view('addRegisterationForm' , $data['Types']); ?>
<?php } ?>
<!-- //Section - ADD Registration end -->

<!-- Section - Registration start -->
  <?php Controller::view('eventRegister' , $data['forms']); ?>
<!-- //Section - Registration end -->

<!-- Section - Registration start -->
  <?php// include('views\memberRegister.php'); ?>
<!-- //Section - Registration end -->




@endsection
