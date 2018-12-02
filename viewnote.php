<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Main Menu</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_edit.css">
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="viewnote.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="script/addnote_category.js"></script>
</head>
<body>

	
	<div class="container-fluid">
		<?php

		include "navbarparent.php";
		if(!isset($_GET['ctg'])){
            $pilihan_kategori = null;
		} else {
			$pilihan_kategori = $_GET['ctg'];
		}
		$pilihan_id_note = $_GET['nt'];

		displayNavbar();
        displaySideNavbar($pilihan_kategori);
		require("kelasDatabase.php");

		$dbHandler = new databaseLibrary();
		$noteTampil = $dbHandler->displayNotes($koneksi, $pilihan_id_note);

		?>

		<a href="editnote.php?ctg=<?php echo $pilihan_kategori."&nt=".$pilihan_id_note ?>" class="fa fa-edit" id="editnote"></a>

		<center>
		<div class="w3-card-4" style="width:50%;">
			<header class="w3-container w3-blue">
				<h1><?php echo $noteTampil["nama"] ?></h1>
			</header>
			<!--gambar-->
			<center>
			<!-- <a target="_blank" href="https://pbs.twimg.com/profile_images/865178253262061568/-8C-49SC.jpg"> -->
				<img src="<?php
				
					if($noteTampil['foto']==null){
						echo "img/note_images/default_user_note.png";
					} else {
						echo $noteTampil['foto'];
					}
				
				?>" alt="Norway" class="gambar">
			</a>
			</center>

			<div class="w3-container">
				<p><?php echo $noteTampil['note_content'] ?></p>
			</div>

			<footer class="w3-container w3-blue" style="margin-bottom: 20px;">
				<h5><?php $noteTampil["tanggal"] ?></h5>
			</footer>
		</div>
		</center>
	</div>
</body>
</html>