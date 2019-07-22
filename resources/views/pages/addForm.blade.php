@extends('layouts.app')
@section('content')

<head>
    <meta name="_token" content="{{csrf_token()}}" />
</head>
<br><br><br><br><br><br><br><br><br>
<div class="addproduct">
    <div class="container">
        <h1><b>Add Form Queastions</b></h1><br><br>
        <hr><br>
        <form id="form" action='/registeration' method='POST'>
            <p><b>Form Title</b></p>
            @csrf
            <input type="hidden" name="ctr" id ='hidden'>
            <input type="text" name="name" placeholder="Enter product name here" required><br><br>
            <input type="hidden" name="registerationFormTypeId" value="<?php echo $data['registerationFormType']; ?>">
            <input type="hidden" name="RegisterAs" value="<?php echo $data['RegisterAs']; ?>">
            <p><b>For which event</b></p>
            @if ($data['IsForEvent'])
                <select name="eventId" id="eventId">
                    @foreach ($data['events'] as $event)
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                </select>
            @else
                <select name="departmentId" id="departmentId">
                    @foreach ($data['Departments'] as $Department)
                    <option value="{{$Department->id}}">{{$Department->name}}</option>
                    @endforeach
                </select>
            @endif
            <br><br>
            <div id="myOptions"></div><br>
            <button class="submit" type="submit" name="next" value="submit">next</button><br><br>


        </form>
        <button type="button" name="AnotherOption" id="addq">add Option</button>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>





<script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
        </script>
<script>
    var ctr = 0;

    jQuery(document).ready(function() {
        jQuery('#addq').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/addquestion') }}",
                method: 'post',
                success: function(result) {
                    var p = document.createElement("P");
                    p.innerHTML = "<b>Question name</b>";
                    document.getElementById("myOptions").appendChild(p);

                    /*<<start setting input Tag */
                        var name = 'OptionName'+ctr;
                        var inputTag = document.createElement("INPUT");
                        inputTag.setAttribute('type' , 'text');
                        inputTag.setAttribute('name' , name);
                        inputTag.setAttribute('placeholder' , 'Question');
                        inputTag.setAttribute('required' , true);
                        document.getElementById("myOptions").appendChild(inputTag);
                    /*end setting select Tag >>*/
                    /*<<start setting select Tag */
                        var optionTypes = result.optionTypes;
                        var type = 'OptionType'+ctr;
                        var selectTag = document.createElement("SELECT");
                        selectTag.setAttribute('name', type);
                        optionTypes.forEach(setSelectTag);
                        function setSelectTag(item, index) {
                            var optionTag = document.createElement("OPTION");
                            optionTag.setAttribute('value', item.id);
                            optionTag.innerHTML = item.name;
                            selectTag.appendChild(optionTag);
                        }
                        var label = document.createElement("LABEL");
                        label.innerHTML = '<b>Question Type</b>';
                        document.getElementById("myOptions").appendChild(label);
                        document.getElementById("myOptions").appendChild(selectTag);
                    /*end setting select Tag >>*/
                    document.getElementById("hidden").setAttribute('value' , ctr);

                    ctr++;
                }
            });
        });
    });
</script>
@endsection
