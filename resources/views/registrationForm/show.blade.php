@extends('layouts.app')
@section('content')
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
<a href="/showtable/{{$form->id}}" class="btn btn-primary"style="margin-left:10px;margin-bottom:10px;background-color:#e62b1e;border-radius:10px">show Values Table</a><br>
</div>
    <form action="{{'../FormOptionValues'}}" method="post" class="form-horizontal">
        @csrf
        <fieldset>
        <input type="hidden" name="formId" value="{{$form->id}}">
            @foreach ($formQuestions as $question)
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">{{$question->name}}</label>
                    <div class="col-md-4">
                        <input type="{{$dataTypesObj->find($question->dataTypeId)->name}}"  name="{{$question->id}}" placeholder="{{$question->name}}" >
                    </div>
                </div>
            @endforeach
        </fieldset>
    </form>
@endsection
