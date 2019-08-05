{{-- @php
dd($All_Users_QandA);

@endphp --}}

@php
    $ctr=1;
@endphp
@extends('layouts.app')
@section('content')
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
        <a href="/download_All_PDF_Files/{{$form->id}}" class="btn btn-primary"style="margin-left:10px;margin-bottom:10px;background-color:#e62b1e;border-radius:10px">download All PDF Files</a><br>
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
                                @php
                                    $mydata = $All_Users_QandA[0];
                                    $questions = $mydata['questions'];
                                @endphp
                                @foreach ($questions as $question)
                                    <th>{{ $question->name }}</th>
                                @endforeach

                                <th>PDF Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($All_Users_QandA as $item)
                                <form action="../valuesPdf" method="post">
                                    @csrf
                                    @php
                                        $user = $item['user'];
                                        $questions = $item['questions'];
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
                                        <input type="hidden" name="fname" value="{{$user->fname}}">
                                        <input type="hidden" name="lname" value="{{$user->lname}}">
                                        <input type="hidden" name="email" value="{{$user->email}}">
                                        <input type="hidden" name="" value="">
                                        <input type="hidden" name="gender" value="{{$user->ismale = ($user->ismale)? 'Male': 'Female'}}">
                                        <input type="hidden" name="birthDate" value="{{$user->birthDate}}">
                                        <?php for ($i=0; $i <sizeof($questions) ; $i++) {  ?>
                                            <input type='hidden' name='{{$questions[$i]->name}}' value='{{$answers[$i]->value}}'>
                                        <?php } ?>
                                        @foreach ($answers as $answer)
                                            <td>{{$answer->value}}</td>
                                        @endforeach
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="pdf"><button type="submit" name="submit" class="btn btn-danger btn-xs" data-title="pdf" data-toggle="modal" data-target="#pdf{{$user->id}}"><span class="fa fa-file-pdf-o" aria-hidden="true"></span></button></p>
                                        </td>
                                    </form>
                                </tr>
                                {{-- <div class="modal fade" id="pdf{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                                </div> --}}
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
