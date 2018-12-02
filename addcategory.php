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
		displayNavbar();

		?>
		<center>
				<div class="w3-card-4" style="width:50%;">
					<header class="w3-container w3-blue">
						<h1>Add Category</h1>
					</header>

					<div class="w3-container">
						<form id="add_category_form" action="main.php?eType=addctg" method="POST">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="inputEmail4">Category</label>
									<input type="text" class="form-control" name="category_add" placeholder="Category">
								</div>
								<div class="form-group col-md-2 col-md-offset-10">
                        <button type="button" onclick="emptyCheckerGeneral();" class="btn btn-lg btn-primary" style="margin: 10px;">Add</button>
                    </div>
							</form>
						</div>
					</div>
				</center>
		</div>

	</body>
	</html>