
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>submit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <script src="main.js"></script>
    </head>
    <body>
    <div class="card-columns" style="margin: 35px;" >
      <?php foreach($data as $user){ ?>
          <div>
              <p><?php echo $user['fname'] ?></p>
              <p><?php echo $user['lname'] ?></p>
            
          </div>
      <?php } ?>
    </div>


    </body>
    </html>