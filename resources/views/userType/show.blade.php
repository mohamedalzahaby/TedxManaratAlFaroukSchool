@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<br><br><br><br><br><br><br>
<div class="container">
    <form action="../usertype/attach" method="post">
        <input type="hidden" name="userTypeId" value="{{$userTypeId}}">
            @csrf
            <fieldset>
                <!-- Form Name -->
                <legend>Attach Permission</legend>
                <!-- Select Basic -->
                @if ($Permissions->isEmpty())
                    <h5>This User Type is attached to All permissions</h6>
                @else
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="RegisterationType">Permissions</label>
                        <div class="col-md-4">
                                <select name="permissionId"  class="form-control">
                                    @foreach ($Permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <input type="submit" id="singlebutton" value="Attach" name="singlebutton" class="btn btn-primary"style="background-color:#e62b1e;border-radius:10px">
                        </div>
                    </div>
                @endif
    </form>

</div>
<br><br>
@if ($UserType_permissions->isEmpty())
    <div class="container">
        <h1>No Permissions Attached Yet</h1>
    </div>
@else
<div class="container">
        <form action="../usertype/detach" method="post">
            <input type="hidden" name="userTypeId" value="{{$userTypeId}}">
            @csrf
            <fieldset>
                <!-- Form Name -->
                <legend>detach Permission</legend>
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="RegisterationType">Permissions</label>
                    <div class="col-md-4">
                            <select name="permissionId"  class="form-control">
                                @foreach ($UserType_permissions as $permission)
                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <input type="submit" id="singlebutton" value="detach" name="singlebutton" class="btn btn-primary"style="background-color:#e62b1e;border-radius:10px">
                    </div>
                </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Name</th>
                            <th>created At</th>
                            <th>Updated At</th>
                        </thead>
                        <tbody>
                            @foreach ($UserType_permissions as $permission)
                                <tr>
                                    {{-- <td><a href="../permissions/{{$permission->id}}" style="color: brown; font-weight: bold;">{{$permission->name}}</a></td> --}}
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->created_at}}</td>
                                    <td>{{$permission->updated_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endif



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
