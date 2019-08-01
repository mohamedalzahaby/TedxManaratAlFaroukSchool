@extends('layouts.app')
@section('content')
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
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{{asset("js/table.js")}}"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
