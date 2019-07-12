<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="res\css\event.css">


</head>


<body>
    <?php if (isset($_SESSION['IsSignedUpIn']) && $_SESSION['userTypeId'] == 2) : ?>
        <br><br><br><br><br>
        <h1 style="margin-left:600px;margin-top:10px">Add New Event</h1>
        <form id="form" action="<?php echo $GLOBALS['ASSET'] . $GLOBALS['events'] . $GLOBALS['submit']; ?>" method="POST">
        <div class="col-md-12">
            <div class="form-group" style="margin-top:20px">
                <div class="col-md-4">
                    <label>name: </label>
                    <input type="text" name=":name" style="height:55px">
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-md-4">
                    <label>date: </label>
                    <input type="date" name=":date">
                </div>
            </div>
           
            
            <div class="form-group">
                <div class="col-md-4">
                    <label>Event start time: </label>
                    <input type="time" name=":eventStart">
                </div>
            </div>
            </div>
           


            <div class="col-md-12" >
            <div class="form-group"style="margin-top:20px" >
                <div class="col-md-4">
                    <label>Event end time: </label>
                    <input type="time" name=":eventEnd" style="height:50px" >
                </div>
            </div>
          
      
            <div class="form-group">
                <div class="col-md-4">
                    <label id="newAddressLabel">address: </label>
                    <?php EventController::addressHtml($data); ?>
                </div>
            </div>
            <div class="form-group" >
                <div class="col-md-4">
                    <label>academicYear: </label>
                    <select name=":academicYearId">
                        <?php foreach ($data as $key1 => $v) { ?>
                            <?php foreach ($v as $key => $value) { ?>
                                <?php if ($key1 == 'academicYears') { ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                    </select>
                </div>
</div>


            
            
                <div class="col-md-12">
                    <label>board: </label>
                    <select name=":boardId">
                        <?php foreach ($data as $key1 => $v) { ?>
                            <?php foreach ($v as $key => $value) { ?>
                                <?php if ($key1 == 'boards') { ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            
            
                <div class="col-md-12">
                    <label>Event description: </label>
                    <!-- <input type="text" name=":description"> -->
                    <textarea rows="7" cols="50">
</textarea>

                </div>
            

            <div class="form-group" style="margin-left:600px;">
                <div class="col-md-4">
                    <input type="submit" name="submit" style="border-radius:10px;width:300px;">
                </div>
            </div>
            
            
        </form>
        
       
    <?php endif ?>
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

        function myFunction(id) {
            var x = document.getElementById("mySelect").value;
            if (x == 0) {
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
            } else {
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

        function addType() {
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