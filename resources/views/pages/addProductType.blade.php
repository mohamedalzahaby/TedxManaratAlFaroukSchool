<?php include('views\layouts\header.php'); ?>
<head>
	<link rel="shortcut icon" href="res\images\icons\product.png"/>
	<link rel="stylesheet" type="text/css" href="res\css\addproduct.css">
</head>

<body background="res\images\addproduct.jpg">
	<div class="addproduct">
		<br><br>
		<h1><b>Add New Product Type</b></h1><hr><br>	
		<table class="table">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">First</th>
				<th scope="col">Handle</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value) { ?>
						<tr>
							<th scope="row"><strong style="color:white;">1</strong></th>
							<td><strong style="color:white;"><?php echo $value['name']; ?></strong></td>
							<td><button id="1" type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
						</tr>
				<?php } ?>
			</tbody>
		</table>
		<form action = "<?php echo $GLOBALS['ASSET'].$GLOBALS['productType'].$GLOBALS['submit'];?>" method ='POST'>
			<p><b>product Type name </b></p>
			<input type="text" name="productType" placeholder="Enter product Type name here" required><br><br>
			<button id="1" class="submit" type="submit" name="submitProductTypeName">submit</button><br><br>
		</form>
	</div>
</body>
