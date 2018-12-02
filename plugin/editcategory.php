<!DOCTYPE html>
<html>
<head>
	<title>Main Menu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="addcategory.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_edit.css">
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link rel="stylesheet" type="text/css" href="viewnote.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<script src="plugin/jQuery.js"></script>
	<script src="script/input_checker.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="show.js"></script>
</head>
<body>
	<div class="container-fluid content">
		<?php

		include "navbarparent.php";
		$pilihan_kategori = $_GET['ctg'];
		displayNavbar();

		?>
		<center>
				<div class="w3-card-4" style="width:50%;">
					<header class="w3-container w3-blue">
						<h1>Edit Category</h1>
					</header>

					<div class="w3-container">
						<form>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="inputEmail4">Category</label>
									<input type="text" class="form-control" name="category_edit" placeholder="Category" value="
									<?php 
										include("connection.php");
										$query = $koneksi->query("select category_name from mscategory where id_category = '$pilihan_kategori'");
										
										while($tampung = $query->fetch()){
											
											$z = $tampung['category_name'];
										}
										echo $z;
										
									?>">
								</div>
								<div class="col">
						<button type="button" onclick="emptyChecker()"class="btn btn-lg btn-primary" style="margin: 10px;">Delete</button>
                        <button type="button" onclick="emptyChecker()"class="btn btn-lg btn-primary" style="margin: 10px;">Confirm</button>
                    </div>
							</form>
						</div>
					</div>
				</center>
		</div>

	</body>
	</html>