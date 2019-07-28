

@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>joined Since</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="user/{{$user->id}}" style="color: brown; font-weight: bold;">{{$user->fname}}</a></td>
                                <td><a href="user/{{$user->id}}" style="color: brown; font-weight: bold;">{{$user->lname}}</a></td>
                                <td>{{$userType::find($user->userTypeId)->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</td>
                                <td>{{$user->birthDate}}</td>
                                <td>{{$user->created_at}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
                {{-- <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul> --}}
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
