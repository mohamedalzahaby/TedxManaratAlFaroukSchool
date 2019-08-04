@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">

    <label >Name:</label>
    <h4>{{ $form->name }}</h4>
    <label >Email:</label>
    <h4>{{ $form->email }}</h4>
    <label >Message:</label>
    <p>{{ $form->messege }}</p>
</div>
<br><br><br><br><br><br>
@endsection