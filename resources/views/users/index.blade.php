

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
                                {{-- <td><a href="user/{{$user->id}}" style="color: brown; font-weight: bold;">{{$user->fname}}</a></td>
                                <td><a href="user/{{$user->id}}" style="color: brown; font-weight: bold;">{{$user->lname}}</a></td> --}}
                                <td>{{$user->fname}}</td>
                                <td>{{$user->lname}}</td>
                                <td>{{$userType::find($user->userTypeId)->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}</td>
                                <td>{{$user->birthDate}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$user->id}}"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                            </div>
                                            <form action="user/{{$user->id}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>User Type</label>
                                                        <select name="userTypeId">
                                                            <option value="{{$userType->parentId}}" disabled selected>{{$userType::find($user->userTypeId)->name}}</option>
                                                            @foreach ($userTypes as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
