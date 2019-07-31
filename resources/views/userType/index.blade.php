@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<br><br><br><br><br>
<div class="container">
        <form method="POST" action="/usertype" class="form-horizontal">
            @method("POST")
            @csrf
            <fieldset>
                <!-- Form Name -->
                <legend>Add User Type</legend>
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="RegisterationType">User Type Name</label>
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control" placeholder="enter name" >
                        <select name="parent" class="form-control">
                            @foreach ($parentTypes as $type)
                                <option value=" {{$type->id}} ">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </fieldset>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <input type="submit" id="singlebutton" value="Add" name="singlebutton" class="btn btn-primary"style="background-color:#e62b1e;border-radius:10px">
                </div>
            </div>
        </form>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Name</th>
                        <th>parent</th>
                        <th>created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($userTypes as $userType)
                        <tr>
                            @if ($userType->parentId != 0)
                                <td><a href="usertype/{{$userType->id}}" style="color: brown; font-weight: bold;">{{$userType->name}}</a></td>
                                <td>{{ $parentName = ($userType->parentId == 0) ? '---' : $parent::find($userType->parentId)->name }}</td>
                                <td>{{$userType->created_at}}</td>
                                <td>{{$userType->updated_at}}</td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{$userType->id}}"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete{{$userType->id}}"><span class="glyphicon glyphicon-trash"></span></button></p>
                                </td>
                            @endif
                        </tr>
                        <div class="modal fade" id="edit{{$userType->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                        <div class="modal fade" id="delete{{$userType->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                                    </div>
                                    <div class="modal-footer ">
                                        <form action="usertype/{{$userType->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                        </form>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                    </div>
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
