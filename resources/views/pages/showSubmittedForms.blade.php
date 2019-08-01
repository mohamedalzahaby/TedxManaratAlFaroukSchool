@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
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
                            <th>PDF Download</th>
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
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="pdf"><button class="btn btn-danger btn-xs" data-title="pdf" data-toggle="modal" data-target="#pdf{{$user->id}}"><span class="fa fa-file-pdf-o" aria-hidden="true"></span></button></p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#mytable #checkall").click(function() {
            if ($("#mytable #checkall").is(':checked')) {
                $("#mytable input[type=checkbox]").each(function() {
                    $(this).prop("checked", true);
                });
            } else {
                $("#mytable input[type=checkbox]").each(function() {
                    $(this).prop("checked", false);
                });
            }
        });
        $("[data-toggle=tooltip]").tooltip();
    });
</script>
@endsection
