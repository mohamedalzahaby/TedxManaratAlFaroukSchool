@php
    // dd($data);
@endphp
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
            <li class="scroll-legend-title">Lorem Ipsum</li>
            <li class="scroll-legend-row">1</li>
            <li class="scroll-legend-row">2</li>
            <li class="scroll-legend-row">3</li>
            <li class="scroll-legend-row">4</li>
            <li class="scroll-legend-row">5</li>
            <li class="scroll-legend-row">6</li>
            <li class="scroll-legend-row">7</li>
            <li class="scroll-legend-row">8</li>
            <li class="scroll-legend-row">9</li>
            <li class="scroll-legend-row">10</li>
            <li class="scroll-legend-row">11</li>
            <li class="scroll-legend-row">12</li>
        </ul>
        <div class="scroll-overflow">
            <table class="scroll-table">
                <thead>
                    <tr>
                        <th>fname</th>
                        @foreach ($data as $item)
                            <th>{{$item->question}}</th>
                        @endforeach 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                         @foreach ($data as $item)
                            <td>{{$item->answer}}</td>
                        @endforeach 
                     
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="{{asset("js/table.js")}}"></script>






@endsection