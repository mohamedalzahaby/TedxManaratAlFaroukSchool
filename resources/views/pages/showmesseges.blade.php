

@extends('layouts.app')
@section('content')
@if (!Auth::guest() && $isAccepted == true)
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
                        <th>Sent At</th>
                        <th> E-Mail</th>
                        <th>Messege</th>
                        <th>Delete</th>
                        
                       
                        
                        
                        {{-- <th>Delete </th> --}}
                        {{-- <th>Edit</th> --}}
                    </thead>
                    <tbody>
                        @foreach ($forms as $form)
                            <tr>
                                <td><a href="/contactus/{{$form->id}}" style="color: brown; font-weight: bold;">{{$form->name}}</a></td>                                
                                <td>{{$form->created_at}}</td>
                                <td><a >{{$form->email}}</a></td>
                                <td><a >{{$form->messege}}</a></td>                              
                                                                                                
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete{{ $form->id }}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            </tr>
                            {{-- <tr>
                              
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete{{ $form->id }}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            </tr> --}}


                            <div class="modal fade" id="delete{{ $form->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                                            <form action="contactus/{{$form->id}}" method="post">
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
@endif
@endsection
