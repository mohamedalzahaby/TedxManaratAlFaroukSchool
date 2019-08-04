
<head>
	<link rel="shortcut icon" href="..\res\images\icons\product.png"/>
	<link rel="stylesheet" type="text/css" href="..\res\css\addproduct.css">
</head>

<body background="..\res\images\addproduct.jpg" >
	<div class="addproduct">
		<h1><b>Add Product Values</b></h1>
		<br><br><hr><br>	
		<form action ='<?php echo $GLOBALS['addValue'].$GLOBALS['submit'];?>' method ='POST'>
			<fieldset>
				<label ><b>Product</b></label>
				<select name="productId" >
					<optgroup label="Product">
					<?php foreach ($data as $key => $product) {?>
						<option  value="<?php echo $product['id'];?>"> <?php echo $product['name'];?> </option>
					<?php }?>
					</optgroup>
				</select>
			</fieldset>
			<br><br><hr><br>
			<?php echo '<div id="option"></div><br>'; ?>
			
			<input type="submit" name="submit" value="next">
			<br><br>
		</form>
	</div>
</body>


