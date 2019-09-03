@extends('layouts.app')
@section('content')
    <form action="{{'../FormOptionValues'}}" method="post" class="form-horizontal">
        @csrf
        <fieldset>
        <input type="hidden" name="formId" value="{{$form->id}}">
            <br><br><br><br><br><br><br><br><br>
            @foreach ($formQuestions as $question)

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">{{$question->name}}</label>
                    <div class="col-md-4">
                        <input type="{{ $dataTypesObj->find($question->dataTypeId)->name }}"  name="{{$question->id}}" placeholder="{{$question->name}}" >
                        <input type="hidden"  name="{{$question->id}}" value="{{$dataTypesObj->find($question->dataTypeId)->name}}" >
                    </div>
                </div>
            @endforeach
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput"></label>
                <div class="col-md-4">
                    <input type="submit" value="submit"  class="form-control input-md">
                </div>
            </div>
        </fieldset>
    </form>
@endsection
