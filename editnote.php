<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Edit Note</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_edit.css">
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="addnote.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="show.js"></script>
</head>
<body>
	<div class="container-fluid">
		<?php

		include "navbarparent.php";//session start
        
        if(!isset($_GET['ctg'])){
            $pilihan_kategori = null;
        }
		
		displayNavbar();
        displaySideNavbar($pilihan_kategori);
        
        $tampung_id_kategori = array();
        $tampung_nama_kategori = array();

		//$_SESSION['kategori_sebelumnya'] = $pilihan_kategori;
        
        ?>
		?>
		
		<div class="jumbotron col-md-12" style="grid-gap: 1em;">
			<h2 style="text-align: center;">Edit Note</h2>
			<div class="form-group col-md-6 col-md-offset-3">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title"placeholder="Note Title" value="">
			</div>
			<div class="form-group col-md-6 col-md-offset-3" style="margin-right: 9px;">
				<label for="note">Note</label>
				<textarea class="form-control" rows="8" id="note" aria-valuemax=""></textarea>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle posisi" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Category
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Kampus</a>
						<a class="dropdown-item" href="#">Kerja</a>
						<a class="dropdown-item" href="#">Others</a>
					</div>
					<input type="file" id="file-input" class="posisi" multiple />
					<div id="thumb-output"></div>
					<button type="submit" class="btn btn-primary btn-block posisi" style="width: 160px;">Save</button>

				</div>

			</div>
		</body>
		</html>