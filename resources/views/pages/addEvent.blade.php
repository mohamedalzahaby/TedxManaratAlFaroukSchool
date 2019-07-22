@extends('layouts.app')
@section('content')

    @if (!Auth::guest())
        <h1 style="margin-left:600px;margin-top:130px">Add New Event</h1>
        <form id="form" action="/events" method="POST">
            @method('POST')
            @csrf
            <div class="col-md-12">
                <div class="form-group" style="margin-top:20px">
                    <div class="col-md-4">
                        <label>name: </label>
                        <input type="text" name="name" style="height:55px">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>date: </label>
                        <input type="date" name="date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Event start time: </label>
                        <input type="time" name="eventStart">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" style="margin-top:20px">
                    <div class="col-md-4">
                        <label>Event end time: </label>
                        <input type="time" name="eventEnd" style="height:50px">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label id="newAddressLabel">address: </label>
                        <?php $data['eventController']->addressHtml($data); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>academicYear: </label>
                        <select name="academicYearId">
                            @foreach ($data['academicYears'] as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Event Cover Image: </label>
                        <input type="file" name="coverImage" >
                    </div>
                </div>
                <div class="col-md-12">
                    <label>board: </label>
                    <select name="boardId">
                        @foreach ($data['boards'] as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                    <label>Event description: </label>
                    <!-- <input type="text" name="description"> -->
                    <textarea rows="7" cols="50"></textarea>
            </div>
            <div class="form-group" style="margin-left:600px;">
                    <div class="col-md-4">
                        <input type="submit" name="submit" style="border-radius:10px;width:300px;">
                    </div>
            </div>

        </form>
    @endif

    <div class="container">
        <div class="page-header text-center">
            <h1 id="timeline"style="margin-top:780px;margin-right:70px">Our Events</h1>
        </div>
        <ul class="timeline" style="float:left;">
            <?php $rightSide = true; ?>
            @foreach ($data['events'] as $value)
                @if (!$rightSide)
                    <li>
                    <div class='timeline-badge primary'><a><i class='glyphicon glyphicon-record' rel='tooltip' title= '{{ $value->name }}' ></i></a></div>
                @else
                    <li class="timeline-inverted">
                    <div class='timeline-badge primary'><a><i class='glyphicon glyphicon-record invert' rel='tooltip' title= '{{ $value->name }}'></i></a></div>
                @endif
                <div class="timeline-panel col-md-2">
                    <div class="timeline-heading">
                        <h1 style="padding-top:10px;padding-bottom:10px;margin-left:15px"><b> {{ $value->name }} </b></h1>
                        <img  src=" {{ asset('images/bg-home-2.jpg') }}"  />
                    </div>
                    <div class="timeline-body">
                        <p> {{ $value->description }} </p>
                    </div>
                    <div class="timeline-footer">
                        <label>Date:</label> <?php echo $value->date . ' From ' . $value->eventStart . ' To ' . $value->eventEnd; ?>
                        <br>
                        <label>Address:</label> <p>{{ $value->eventAddressString }}</p>
                        <br><br>
                        <!-- <a><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                            <a><i class="glyphicon glyphicon-share"></i></a> -->
                        @if ($value->isRegisterationOpened == 1)
                            <a href="../tedx/register" class="pull-right">Join Now</a>
                        @endif
                    </div>
                </div>
                </li>
                @if ($rightSide)
                    @php $rightSide = false; @endphp
                @else
                    @php $rightSide = true; @endphp
                @endif
            @endforeach
            <li class="clearfix" style="float: none;"></li>
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            var my_posts = $("[rel=tooltip]");
            var size = $(window).width();
            for (i = 0; i < my_posts.length; i++) {
                the_post = $(my_posts[i]);
                if (the_post.hasClass('invert') && size >= 767) {
                    the_post.tooltip({
                        placement: 'left'
                    });
                    the_post.css("cursor", "pointer");
                } else {
                    the_post.tooltip({
                        placement: 'rigth'
                    });
                    the_post.css("cursor", "pointer");
                }
            }
        });
    </script>
    <script>
        document.getElementById("mySelect").selectedIndex = "-1";
        var br = document.createElement("BR");
        var p = document.createElement("P"); //paragraph
        var b = document.createElement("B"); //bold
        var t = document.createTextNode("New Place Name"); //text
        var input = document.createElement("INPUT");
        var btn = document.createElement("BUTTON");
        var form = document.getElementById("form");
        var select = document.getElementById("mySelect");
        function myFunction(id)
        {
            var x = document.getElementById("mySelect").value;
            if (x == 0)
            {
                b.appendChild(t);
                p.appendChild(b);
                input.setAttribute("type", "text");
                input.setAttribute("id", "newType");
                input.setAttribute("name", "newPlace");
                input.setAttribute("placeholder", "Enter name here");
                input.setAttribute("required", true);
                btn.setAttribute('id', 'submitPlace');
                btn.setAttribute('name', 'submitPlace');
                // btn.setAttribute('location.href', 'tedx/newAddress/submit');
                btn.innerHTML = "submit place";
                btn.setAttribute('onclick', 'addType();'); // for FF
                btn.onclick = function() {
                    addType();
                }; // for IE
                document.getElementById("newAddressLabel").style.display = 'none';
                select.style.display = 'none';
                form.insertBefore(p, form.childNodes[9]);
                form.insertBefore(input, form.childNodes[10]);
                form.insertBefore(btn, form.childNodes[11]);
                form.insertBefore(br, form.childNodes[12]);
                // = "<input  type='text'   name='productType' placeholder='Enter product Type name here' required> <button type='submit' name='submitProductTypeName'>submit</button>";
            }
            else
            {
                // var xmlhttp = new XMLHttpRequest();
                // xmlhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //         document.getElementById("mySelect").appendChild(this.responseText);
                //     }
                // };
                // xmlhttp.open("GET", "<?php echo $GLOBALS['ASSET'] . $GLOBALS['newAddress'] . $GLOBALS['submit']; ?>?id=" + id, true);
                // xmlhttp.send();
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        array = this.responseText;
                        for (let i = 0; i < array.length; i++) {
                            var element = array[i];
                            console.log(element);
                            // var option = document.createElement("option");
                            // // option.value = element['id'];
                            // // option.name  = element['id'];
                            // // option.text = element['name'];
                            // document.getElementById("mytest").innerHTML = element['id'];
                            // document.getElementById("mySelect").add(option);
                        }
                        // document.getElementById("mytest").innerHTML = element;
                        // document.getElementById("mytest").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "<?php echo $GLOBALS['ASSET'] . $GLOBALS['newAddress'] . $GLOBALS['submit']; ?>?id=" + id, true);
                xmlhttp.send();
                // var myctr = document.getElementById("mytest").name;
                // $(document).ready(function() {
                //     $("#AnotherOption").click(function() {
                //         $.ajax({
                //             type: 'POST',
                //             data: ({
                //                 ctr: myctr
                //             }),
                //             url: '<?php echo $GLOBALS['ASSET'] . $GLOBALS['newAddress'] . $GLOBALS['submit']; ?>',
                //             success: function(data) {
                //                 $("#product").append(data);
                //             }
                //         });
                //         myctr++;
                //     });
                // });
            }
        }
        function addType()
        {
            form.removeChild(p);
            form.removeChild(input);
            form.removeChild(br);
            form.removeChild(btn);
            document.getElementById("newAddressLabel").style.visibility = 'visible';
            document.getElementById("newAddressLabel").style.display = 'inline';
            select.style.display = 'inline';
            select.selectedIndex = "-1";
            // window.location.replace("newAddress/submit");
        }
    </script>
@endsection
