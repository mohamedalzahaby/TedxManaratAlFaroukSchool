


<?php include('views\layouts\header.php');?>

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

	<body  background = 'res\images\addproduct.jpg'>
		<div class="addproduct" >
			<br><br>
			<h1><b>Add Product</b></h1>
			<br><br>
			<hr><br>
			<form id="form" action='<?php echo $GLOBALS['ASSET'].$GLOBALS['addNewProduct'].$GLOBALS['submit'];?>' method='POST'>
				<p><b>product name </b></p>
				<input type="text" name="name" placeholder="Enter product name here" required>
				<br><br>
				<fieldset>
					<label id='productTypeLabel'><b>Product Type</b></label>
					<select onchange="myFunction()" id="mySelect" name="productTypeId">
						<optgroup label="Product Type">	
						<option value="0">add new product Type</option>
						<?php foreach ($data as $productType) { ?> 
							<option value="<?php echo $productType["id"] ?>"><?php echo $productType["name"] ?></option>
						<?php }?>
						</optgroup>
					</select>	
					
					<div id = 'productType' ></div>
					
				</fieldset>
				<label><b>Quantity:</b></label>
				<input type="number" name="quantity" placeholder="quantity" required>
				<label><b>price:</b></label>
				<input type="number" name="price" placeholder="price" required>
				<?php echo'<div id="product"></div><br>';  ?>
				<button class="submit" type="submit" name="next" value="submit">next</button>
				<br><br>

				</select>
			</form>
			<button type="button" name="AnotherOption"  id="AnotherOption">add Option</button>
		</div>
		<br><br><br><br><br><br><br><br><br><br>
	</body>
	
		
	

	
	<script>
		document.getElementById("mySelect").selectedIndex = "-1";
	

		var myctr=1;
		$(document).ready(function () {
			$("#AnotherOption").click(function () {
				$.ajax({
					type: 'POST',
					data:({ctr: myctr}),
					url: 'views/AnotherOption.php',

					success: function (data) {

						$("#product").append(data);
					}

				});
				myctr++;
			});
		});
		var br = document.createElement("BR");
		var p = document.createElement("P");
		var b = document.createElement("B");
		var t = document.createTextNode("New Type name");
		var input = document.createElement("INPUT");
		var btn = document.createElement("BUTTON");
		var form = document.getElementById("form");
		var select = document.getElementById("mySelect");
		function myFunction() 
		{
			var x = document.getElementById("mySelect").value;
			if (x == 0) {
				b.appendChild(t);
				p.appendChild(b);
				input.setAttribute("type", "text");
				input.setAttribute("id", "newType");
  				input.setAttribute("name", "productType World!");
  				input.setAttribute("placeholder", "Enter product Type name here");
  				input.setAttribute("required", true);
				btn.setAttribute('id','submitType');
				btn.innerHTML = "submit type";   
				btn.setAttribute('onclick','addType();'); // for FF
    			btn.onclick = function() {addType();}; // for IE
				document.getElementById("productTypeLabel").style.display = 'none';
				select.style.display = 'none';
				form.insertBefore(p, form.childNodes[9]);
				form.insertBefore(input, form.childNodes[10]);
				form.insertBefore(btn, form.childNodes[11]);
				form.insertBefore(br, form.childNodes[12]);
				// = "<input  type='text'   name='productType' placeholder='Enter product Type name here' required> <button type='submit' name='submitProductTypeName'>submit</button>";
			}
		}
		function addType() {
			form.removeChild(p);
			form.removeChild(input);
			form.removeChild(br);
			form.removeChild(btn);
			document.getElementById("productTypeLabel").style.visibility = 'visible';
			document.getElementById("productTypeLabel").style.display = 'inline';
			select.style.display = 'inline';
			select.selectedIndex = "-1";
		}
	</script>


