<!DOCTYPE html>
<html>
<head>
	<title>Main Menu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="plugin/jQuery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_edit.css">
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link rel="stylesheet" href="dashboard.css"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="script/animation_events.js"></script>
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background:#fff4ea;">

	
	<div class="container-fluid">
        <?php
		include "navbarparent.php";
		$pilihan_kategori = $_GET['ctg'];
		
		displayNavbar($pilihan_kategori);
		displaySideNavbar($pilihan_kategori);
		//$_SESSION['kategori_sebelumnya'] = $pilihan_kategori;
        
        ?>
		<!-- <div class="col-sm-11" id="tempat_kerja"><h1>My Notes</h1>
			<div class="list_notes">
				<?php
					//include("connection.php");

					$queryNote= $koneksi->query("select nama from msnote where id_category = '$pilihan_kategori';");
					while($listNote = $queryNote->fetch()){
						echo "<div class='kotak_tes'>".$listNote['nama']."</div>";
					}
				?>
				<div class="kotak_tes">hhhhhhhhhhhhhhhhh</div>
				<div class="kotak_tes"></div>
				<div class="kotak_tes"></div>
				<div class="kotak_tes"></div>
				<div class="kotak_tes"></div>
		</div> -->
		<div class="col-sm-11" id="tempat_kerja"><h1>My Notes</h1>
			<div class="list_notes" style="font-family:arial,sans-serif;">
				<center>
					<?php

						$queryNote= $koneksi->query("select nama from msnote where id_category = '$pilihan_kategori';");
						while($listNote = $queryNote->fetch()){
							echo "<ul>
									<li>
										<a href='#'>
											<h2>".$listNote['nama']."</h2>
											<p>TEXT CONTENT</P>
										</a>
									</li>
								</ul";
						}
					?>
				</center>
				</div>
			</div>
		<a href="addnote.php" class="fa fa-plus-circle" id="plus"></a>
	</div>
</body>
</html>