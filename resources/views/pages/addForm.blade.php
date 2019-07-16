@extends('layouts.app')
@section('content')



<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<!-- <link rel="shortcut icon" href="res\images\icons\product.png"/> -->
		<link rel="stylesheet" type="text/css" href="res\css\addproduct.css">
		<!-- <link rel="stylesheet" type="text/css" href="res\css\addproduct.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

	<body>
		<div class="addproduct" >
			<br><br>
			<h1><b>Add Form Queastions</b></h1><br><br><hr><br>
			<form id="form" action='<?php echo $GLOBALS['ASSET'].$GLOBALS['register'].'/'.$GLOBALS['addForm'].$GLOBALS['submit'];?>' method='POST'>
				<p><b>Form Title</b></p>
				<input type="text" name="name" placeholder="Enter product name here" required><br><br>
				<input type="hidden" name="registerationFormTypeId" value="<?php echo $data['registerationFormType'];?>">
				<input type="hidden" name="RegisterAs" value="<?php echo $data['RegisterAs'];?>">
				<p><b>For which event</b></p>
				<?php
					if ($data['IsForEvent']) : Controller::selectTag('eventId','eventId',$data['events'] , 'id' , 'name');
					else: Controller::selectTag('departmentId','departmentId',$data['Departments'] , 'id' , 'name');
					endif;
				?>
				<br><br><br><br>
				<?php echo'<div id="myOptions"></div><br>';  ?>
				<button class="submit" type="submit" name="next" value="submit">next</button><br><br>

				</select>
			</form>
			<button type="button" name="AnotherOption"  id="AnotherOption">add Option</button>
		</div>
		<br><br><br><br><br><br><br><br><br><br>
	</body>





<script>
    var myctr = 1;
    $(document).ready(function() {
        $("#AnotherOption").click(function() {
            $.ajax({
                type: 'POST',
                data: ({
                    ctr: myctr
                }),
                url: '<?php echo $GLOBALS['ASSET'].$GLOBALS['addForm'].$GLOBALS['addQuestion'];?>',

                success: function(data) {

                    $("#myOptions").append(data);
                }

            });
            myctr++;
        });
    });
</script>
@endsection
