<head>
	<link rel="shortcut icon" href="..\..\res\images\icons\product.png"/>
	<link rel="stylesheet" type="text/css" href="..\..\res\css\addproduct.css">
</head>

<body >
	<div class="addproduct">
		<h1><b>Add Values</b></h1>
		<br><br><hr><br>	
		<form action ='..\<?php echo $GLOBALS['addValue'].$GLOBALS['insert'];?>' method ='POST'>
            <?php foreach ($data as $productOption) {?>
                <?php foreach ($productOption as $option) {?>
                    
                    <label><b> <?php echo $option['name']; ?></b></label><br>
                    <input type ="<?php echo $option['dataType']; ?>" name="<?php echo $option['id']; ?>"placeholder="<?php echo $option['name']; ?>" required>
                    <br><br>
                  
                <?php }?>
            <?php }?>
			<input type="submit" name="submit" value="next">
			
		</form>
	</div>
</body>



