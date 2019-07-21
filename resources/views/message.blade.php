<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="_token" content="{{csrf_token()}}" />
        <title>Grocery Store</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <br><br><br><br><br><br><br><br>
      <div class="container">
            <div class="alert alert-success" style="display:none"></div>

            <button class="btn btn-primary" id="addq">add question</button>
            <div id="tita"></div>
        </div>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
        </script>
      <script>
          myctr = 0;
         jQuery(document).ready(function(){
            jQuery('#addq').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/addquestion') }}",
                  method: 'post',
                  success: function(result){

                    var optionTypes = result.optionTypes;
                    // alert(optionTypes[0].id);
                    var name = 'OptionType' . i;
                    var selectTag = document.createElement("SELECT");
                    selectTag.setAttribute('name',name );
                    optionTypes.forEach(myFunction);

                    function myFunction(item, index) {
                        var optionTag = document.createElement("OPTION");
                        optionTag.setAttribute('value',item.id);
                        optionTag.innerHTML = item.name;
                        selectTag.appendChild(optionTag);
                    }
                    /*for (let i = 1; i <= optionTypes.length; i++) {
                        var optionTag = document.createElement("OPTION");
                        optionTag.setAttribute('value',optionTypes[i].id);
                        optionTag.innerHTML = optionTypes[i].name;
                        selectTag.appendChild(optionTag);
                    }*/
                    // document.getElementById("tita").appendChild(optionTag);
                    // document.getElementById("tita").innerHTML = optionTypes[0]->id;
                    document.getElementById("tita").appendChild(selectTag);
                    alert(selectTag.innerHTML);
                    //  jQuery('tita').show();
                    // // jQuery('tita').html(result.success);
                    //  alert(result.success);
                  }});
               });
            });
      </script>
    </body>
</html>
{{-- <form id="myForm">
            <div class="form-group">
              <label for="name">Name:</label>
              <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input name="type" type="text" class="form-control" id="type">
            </div>
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
        </form> --}}


{{-- <html>
   <head>
      <title>Ajax Example</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<script>

        $(document).ready(function() {
            $("#btn").click(function() {
                $.ajax({

                    type: 'POST',
                    data: ({
                        ctr: 'myctr'
                    }),
                    url: '/getmsg',

                    success: function(data) {

                        $("#msg").append(data);
                    }

                });
            });
        });
    </script>
   </head>

   <body>
       <div id = 'msg'>This message will be replaced using Ajax.
         Click the button to replace the message.</div>

         <button type="button" id="btn"  >Replace Message</button>

<script>

        $(document).ready(function() {
            $("#btn").click(function() {
                $("#msg").append('htmllll')
            });
        });
    </script>

   </body>

</html> --}}
