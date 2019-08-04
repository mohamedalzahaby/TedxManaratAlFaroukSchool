@php
    $ctr=1;
@endphp
@extends('layouts.app')
@section('content')
<<<<<<< Updated upstream
<br><br><br><br><br><br><br><br>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
</head>
    <div class="scroll-wrapper">
        <div class="scroll-scroller">
            <div class="scroll-scroller-inner"></div>
        </div>
        <ul class="scroll-legend">
        <li class="scroll-legend-title">{{ $form->name }}</li>
        @foreach ($All_Users_QandA as $index => $value)
            <li class="scroll-legend-row">{{$index+1}}</li>
        @endforeach
        </ul>
        <div class="scroll-overflow">
            <table class="scroll-table">
                <thead>
                    <tr>
                        <th>first name</th>
                        <th>last name</th>
                        <th>email</th>
                        <th>user Type</th>
                        <th>gender</th>
                        <th>birth Date</th>
                        @foreach ($All_Users_QandA as $item)
                            @php
                                $user = $item['user'];
                                $questions = $item['questions'];
                                $values = $item['values'];
                            @endphp
                            @foreach ($questions as $question)
                                <th>{{ $question->name }}</th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($All_Users_QandA as $item)
                            @php
                                $user = $item['user'];
                                $answers = $item['values'];
                            @endphp
                        <tr>
                                <td>{{$user->fname}}</td>
                                <td>{{$user->lname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$userType::find($user->userTypeId)->name }}</td>
                                <td>{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</td>
                                <td>{{$user->birthDate}}</td>
                            @foreach ($answers as $answer)
                                <td>{{$answer->value}}</td>
=======
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<br><br><br><br><br>

<div class="container">
    <div class="row no-padding-rl no-padding-top padding-4">
        <div class="col-md-12">
        <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
            {{$form->name}}
        </h2>
          <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl no-margin-bottom separator-line-extra-thick-long"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>email</th>
                            <th>user Type</th>
                            <th>gender</th>
                            <th>birth Date</th>
                            @foreach ($All_Users_QandA as $item)
                                @php
                                    $user = $item['user'];
                                    $questions = $item['questions'];
                                    $values = $item['values'];
                                @endphp
                                @foreach ($questions as $question)
                                    <th>{{ $question->name }}</th>
                                @endforeach
>>>>>>> Stashed changes
                            @endforeach
                        </tr>
<<<<<<< Updated upstream
                    @endforeach
                </tbody>
            </table>
=======
                    </thead>
                    <tbody>
                        @foreach ($All_Users_QandA as $item)
                                @php
                                    $user = $item['user'];
                                    $answers = $item['values'];
                                @endphp
                            <tr>
                                    <td>{{$ctr++}}</td>
                                    <td>{{$user->fname}}</td>
                                    <td>{{$user->lname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$userType::find($user->userTypeId)->name }}</td>
                                    <td>{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</td>
                                    <td>{{$user->birthDate}}</td>
                                @foreach ($answers as $answer)
                                    <td>{{$answer->value}}</td>
                                @endforeach
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="pdf"><button class="btn btn-danger btn-xs" data-title="pdf" data-toggle="modal" data-target="#pdf{{$user->id}}"><span class="fa fa-file-pdf-o" aria-hidden="true"></span></button></p>
                                </td>
                            </tr>
                            <div class="modal fade" id="pdf{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                        </div>
                                        <form action="usertype/{{$userType->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="{{$userType->name}}"  class="form-control ">
                                                </div>
                                                @if ($userType->parentId != 0)
                                                    <div class="form-group">
                                                        <label>parent</label>
                                                        <select name="parent">
                                                            <option value="{{$userType->parentId}}" disabled selected>{{$parent::find($userType->parentId)->name}}</option>
                                                            @foreach ($parentTypes as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer ">
                                                <button name="submit" type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
            </div>
>>>>>>> Stashed changes
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{{asset("js/table.js")}}"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
