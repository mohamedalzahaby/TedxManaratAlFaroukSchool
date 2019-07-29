

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
                        <th>Name</th>
                        <th>parent</th>
                        <th>created At</th>
                        <th>Updated At</th>
                    </thead>
                    <tbody>
                        @foreach ($userTypes as $userType)
                            <tr>
                                <td><a href="usertype/{{$userType->id}}" style="color: brown; font-weight: bold;">{{$userType->name}}</a></td>
                                <td>{{$parent::find($userType->id)->name}}</td>
                                <td>{{$userType->created_at}}</td>
                                <td>{{$userType->updated_at}}</td>
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
