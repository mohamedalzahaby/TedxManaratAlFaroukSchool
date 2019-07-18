@extends('layouts.app')
@section('content')

@if (!Auth::guest())
    <br><br><br><br><br><br><br><br><br><br><br>
    <h1>Add New Event</h1>
    <form id="form" action=" {{ $GLOBALS['ASSET'] .$GLOBALS['events'].$GLOBALS['submit'] }} " method="POST">
        <div class="form-group">
            <div class="col-md-4">
                <label>name: </label>
                <input type="text" name=":name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label>date: </label>
                <input type="date" name=":date">
            </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <div class="col-md-4">
                <label>Event start time: </label>
                <input type="time" name=":eventStart">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label>Event end time: </label>
                <input type="time" name=":eventEnd">
            </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <div class="col-md-4">
                <label>Event description: </label>
                <input type="text" name=":description">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label id="newAddressLabel">address: </label>
                <?php $data['eventController']->addressHtml($data); ?>
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <div class="col-md-4">
                <label>academicYear: </label>
                <select name=":academicYearId">
                    @foreach ($data['academicYears'] as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label>board: </label>
                <select name=":boardId">
                    @foreach ($data['boards'] as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <input type="submit" name="submit">
            </div>
        </div>
    </form>
@endif

<div class="container">
    <div class="page-header text-center">
        <h1 id="timeline">Our Events</h1>
    </div>
    <ul class="timeline">
        <?php $rightSide = true; ?>
        @foreach ($data['events'] as $value)
            @if (!$rightSide)
                <li>
                <div class='timeline-badge primary'><a><i class='glyphicon glyphicon-record' rel='tooltip' title= '$name' ></i></a></div>
            @else
                <li class="timeline-inverted">
                <div class='timeline-badge primary'><a><i class='glyphicon glyphicon-record invert' rel='tooltip' title= '$name'></i></a></div>
            @endif

            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h3><b><?php echo $value->name; ?></b></h3>
                    <img class="img-responsive" src=" {{ asset('images/bg-home-2.jpg') }}" />

                </div>
                <div class="timeline-body">
                    <p>Reshape the universe in your eyes. Why see the world from only one dimension when there is so much more to it? Seeing things one way doesn't mean that's how they actually are. Sometimes, the answer to any problem that we face is right in front of our eyes, but it's just us who can't see it. Although if we just change our perspective, maybe we'll add more depth and meaning to our world. Perhaps if we look differently, from new perspectives, we would be able to dream more and hopefully achieve more.Through a series of talks, performances, activities and a vast range of ideas; you'll get to inspect different dimensions throughout our event which will leave you with a whole different inner dimension of your own.</p>
                </div>

                <div class="timeline-footer">
                    <label>Date:</label> <?php echo $value->date . ' From ' . $value->eventStart . ' To ' . $value->eventEnd; ?>
                    <br>
                    <label>Address:</label> <?php echo $value->eventAddressString; ?>
                    <br>
                    <br>
                    <!-- <a><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                        <a><i class="glyphicon glyphicon-share"></i></a> -->
                    <?php if ($value->isRegisterationOpened == 1) :  ?> <a href="../tedx/register" class="pull-right">Join Now</a>
                    <?php endif; ?>
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
