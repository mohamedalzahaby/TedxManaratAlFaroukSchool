@foreach ($data as $key => $value)
<form>
    <div class="form-group">
        <b><label class="col-md-4 control-label" for="textinput">{{$key}} :</label></b>
        <div class="col-md-4">
            <p>{{$value}}</p>
        </div>
    </div>
</form>
@endforeach

