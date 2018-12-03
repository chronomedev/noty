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
	<script src="script/addnote_category.js"></script>
</head>
<body style="background:#fff4ea;">

	
	<div class="container-fluid">
        <?php
		include "navbarparent.php";

		if(isset($_GET['ctg'])){
			$pilihan_kategori = $_GET['ctg'];
		} else {
			$pilihan_kategori = null;
		}
		
		
		displayNavbar();
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

		</div> -->
		<div class="col-sm-11" id="tempat_kerja"><h1>My Notes</h1>
			<div class="list_notes" style="font-family:arial,sans-serif;">
				<center>
					<?php

						$queryNote= $koneksi->query("select id_note, nama, note_content from msnote where id_category = '$pilihan_kategori';");
						$isNULL = false;
						while($listNote = $queryNote->fetch()){
							if($listNote['nama'] == null){
								$isNULL = TRUE;
							}
							$overview = explode(" ", $listNote['note_content']);
							$appendOverview = "";
							for($i=0;$i<4;$i++){
								if($i==count($overview)-1){
									$appendOverview = $appendOverview;
									break;
								} else if($i==3){
									$appendOverview = $appendOverview."...";
								} else {
									$appendOverview = $appendOverview.$overview[$i]." ";
								}
							}
							
							echo "<ul>
									<li>
										<a href='viewnote.php?nt=".$listNote['id_note']."&ctg=".$pilihan_kategori."'>
											<h2>".$listNote['nama']."</h2>
											<p>".$appendOverview."</P>
										</a>
									</li>
								</ul";
						}
						if($listNote == false){
							echo "<h3 style='color:grey;'>Catatan Kosong</h3>";
						}
					?>
				</center>
				</div>
			</div>
		<a href="addnote.php" class="fa fa-plus-circle" id="plus"></a>
	</div>
</body>
</html>