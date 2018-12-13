<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hasil search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="hasilsearch.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link rel="stylesheet" type="text/css" href="style_edit.css">
</head>
<body>
	<div class="container-fluid">
		<?php
		include("navbarparent.php");
		require("kelasDatabase.php");
		displayNavbar();

		$dbHandler = new databaseLibrary();
		
		if(isset($_GET['q_search'])){
            $query_search = $_GET['q_search'];

            
        } else if($_GET['q']==""){
            echo "<sript>window.location.assign('search.php')</script>";
        }

		?>

		<div class="row">
		<?php
		

		// $query = $koneksi->prepare("select * from msnote inner join mscategory on msnote.id_category = mscategory.id_category AND mscategory.id_user = $passing_id AND msnote.nama = ?;");
		$query = $koneksi->query("select * from msnote inner join mscategory on msnote.id_category = mscategory.id_category AND mscategory.id_user = $passing_id AND msnote.nama = '$query_search';");
		// $query->execute([$query_search]);
		while($tampung = $query->fetch()){
			if($tampung['foto']==null || $tampung['foto']==""){
				$pathfoto = "img/note_images/default_user_note.png";
			} else {
				$pathfoto = $tampung['foto'];
			}
			$pecahWaktu = explode("-", $tampung['tanggal']);
			// if($pecahWaktu[1] == 1)
			$ambil_tanggal = explode(" ", $pecahWaktu[2]);
			$konvertMonth = $dbHandler->getMonth(intval($pecahWaktu[1]));

			echo '<div class="example-1 card">
			<div class="wrapper" style="background: url('.$pathfoto.') center/cover no-repeat;">
				<div class="date">
					<span class="day" name="day" value="">'.$ambil_tanggal[0].'</span>
					<span class="month" name="month" value="">'.$konvertMonth.'</span>
					<span class="year" name="year" value="">'.$pecahWaktu[0].'</span>
				</div>
				<div class="data">
					<div class="content">
						<h1 class="title" name="title" value=""><a href="viewnote.php?nt='.$tampung['id_note'].'&ctg='.$tampung['id_category'].'">'.$tampung['nama'].'</a></h1>
						<p class="text" name="text" value="">'.$tampung['note_content'].'</p>
						<label for="show-menu" class="menu-button"><span></span></label>
					</div>
				</div>
			</div>
		</div>';
		}

		
		?>

		</div>
</body>
</html>