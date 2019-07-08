<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A Simple Page with CKEditor</title>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="app\libary\ckeditor\ckeditor.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>

    <section id="registration" class="bg-white-2">
        <div class="container">
            <div class="row no-padding-rl">
                <div class="col-md-12">
                    <h2 class="font-family-alt font-weight-700 sm-title-large title-extra-large-2 text-gray-dark-2">
                        Mail Decorator
                    </h2>
                    <span class="bg-base-color xs-margin-6 xs-no-margin-rl margin-3 no-margin-rl separator-line-extra-thick-long"></span>
                </div>
                <!-- //.col-md-12 -->
            </div>
            <fieldset>

                <!-- Form Name -->
                <legend>Form Name</legend>
                <form method="POST" action="<?php echo $GLOBALS['tedx'] . $GLOBALS['sendMail'] . '/' . $GLOBALS['decorateMail'] . $GLOBALS['Add']; ?>" class="form-horizontal">

                    <!-- Select Basic -->
                    <div class="form-group">
                        <!-- <label class="col-md-4 control-label" for="name">message Name</label> -->
                        <div class="col-md-4">
                            <?php Controller::selectTag('mesgId', 'mesgId', $data, 'id', 'name') ?>
                            <input type="submit" name="msgid" value="msgid">
                            <!-- <button id='add'> ADD </button> -->
                        </div>
                    </div>
                </form>
            </fieldset>
            <div id='msg'></div>

            <!-- <script>
                var id = document.getElementById("mesgId").value;
                // alert(id); 
                $(document).ready(function() {
                    $("#add").click(function() {
                        $.ajax({
                            type: 'POST',
                            data: ({
                                mesgId: id
                            }),
                            url: '<?php //echo $GLOBALS['ASSET'] . $GLOBALS['sendMail'] . '/' . $GLOBALS['decorateMail'] . $GLOBALS['Add']; ?>',

                            success: function(data) {

                                // $("#myOptions").append(data);
                                alert(data);
                                $("#msg").text(data);
                            }

                        });
                    });
                });
            </script> -->

</body>

</html>