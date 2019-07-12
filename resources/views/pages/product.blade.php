@extends('layouts.app')
@section('content')
<br><br><br><br><br><br>
<div class="row margin-5 no-margin-rl no-margin-bottom">
  <div class="col-md-5 no-padding-rl">
    <div class="row text-center">
      <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['addNewProduct'];?>" class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl"> <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
        Add Product
      </h3> </a>
    </div>
  </div>
  <!-- //.col-md-5 -->

  <div class="contact-address col-md-6 col-md-offset-1">
    <div class="row text-center">
      <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['productType'];?>" class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl"> <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
        Add Product Type
      </h3> </a>
    </div>
  </div>
  <!-- //.col-md-6 -->
</div>

<div class="row margin-5 no-margin-rl " >
  <div class="col-md-5 no-padding-rl">
    <div class="row text-center">
      <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['product'].'/'.$GLOBALS['addValue'];?>" class="btn btn-outline-base-color sm-btn-medium btn-large no-margin-rl"> <h3 class="font-family-alt font-weight-900 letter-spacing-2 text-uppercase xs-title-small title-medium title-sideline-base-color">
        Add Product Value
      </h3> </a>
    </div>
  </div>
  <!-- //.col-md-5 -->
</div>
@endsection
