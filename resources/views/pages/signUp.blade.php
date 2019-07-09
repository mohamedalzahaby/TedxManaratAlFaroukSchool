<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body  background = 'res\images\tedxersmfis.jpg'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action="<?php echo $GLOBALS['ASSET'].$GLOBALS['signUp'].$GLOBALS['submit']; ?>">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                    <input type="text" name="fname" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lname" class="form-control" placeholder=" ">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="">
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Birth Date</label>
                                <input type="date" name="birthDate" class="form-control" placeholder="">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ismale" value="1" checked>
                                    <span class="form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ismale" value="0">
                                    <span class="form-check-label"> Female</span>
                                </label>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Create password</label>
                                <input class="form-control" type="password" name="password">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>confirm password</label>
                                <input class="form-control" type="password" name="confirmpassword">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <button type="submit" name="register_btn" value="Sign up" class="btn btn-primary btn-block"> Register </button>
                            </div> <!-- form-group// -->
                            <input type="hidden" name="userTypeId" value="1">
                        </form>
                    </article> <!-- card-body end .// -->
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div> <!-- row.//-->


    </div>
    <!--container end.//-->



</body>

</html>
