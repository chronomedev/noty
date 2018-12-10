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
		
		if(isset($_GET['cari_search'])){
            $query_search = $_GET['cari_search'];

            $list_kategori = $dbHandler->getAllCategory($koneksi, $_SESSION['passing_id']);
            $list_search = array();
            if($list_kategori!=null){
                for($i=0;$i<count($list_kategori);$i++){
                    array_push($list_kategori[$i], $dbHandler->noteSearch($koneksi, $list_kategori[$i], $_GET['cari_search']));
                }
            } else {
                echo "<sript>window.location.assign('search.php')</script>";
            }
            
        } else if($_GET['q']==""){
            echo "<sript>window.location.assign('search.php')</script>";
        }

		?>
		<div class="row">
			<div class="example-1 card">
				<div class="wrapper" style="background: url(img/note_images/default_user_note.png) center/cover no-repeat;">
					<div class="date">
						<span class="day" name="day" value="">12</span>
						<span class="month" name="month" value="">Aug</span>
						<span class="year" name="year" value="">2016</span>
					</div>
					<div class="data">
						<div class="content">
							<span class="author" name="category" valei="">Category</span>
							<h1 class="title" name="title" value=""><a href="#">J.Fla is love, J.Fla is live ༼ つ ◕_◕ ༽つ J.Fla TAKE MY ENERGY ༼ つ ◕_◕ ༽つ</a></h1>
							<p class="text" name="text" value="">The highly anticipated world championship fight will take place at 10am and is the second major boxing blockbuster in the nation after 20 years.</p>
							<label for="show-menu" class="menu-button"><span></span></label>
						</div>
					</div>
				</div>
			</div>

			<div class="example-1 card">
				<div class="wrapper" style="background: url(img/note_images/default_user_note.png) center/cover no-repeat;">
					<div class="date">
						<span class="day" name="day" value="">12</span>
						<span class="month" name="month" value="">Aug</span>
						<span class="year" name="year" value="">2016</span>
					</div>
					<div class="data">
						<div class="content">
							<span class="author" name="category" valei="">Category</span>
							<h1 class="title" name="title" value=""><a href="#">J.Fla is love, J.Fla is live ༼ つ ◕_◕ ༽つ J.Fla TAKE MY ENERGY ༼ つ ◕_◕ ༽つ</a></h1>
							<p class="text" name="text" value="">The highly anticipated world championship fight will take place at 10am and is the second major boxing blockbuster in the nation after 20 years.</p>
							<label for="show-menu" class="menu-button"><span></span></label>
						</div>
					</div>
				</div>
			</div>
			<div class="example-1 card">
				<div class="wrapper" style="background: url(img/note_images/default_user_note.png) center/cover no-repeat;">
					<div class="date">
						<span class="day" name="day" value="">12</span>
						<span class="month" name="month" value="">Aug</span>
						<span class="year" name="year" value="">2016</span>
					</div>
					<div class="data">
						<div class="content">
							<span class="author" name="category" valei="">Category</span>
							<h1 class="title" name="title" value=""><a href="#">J.Fla is love, J.Fla is live ༼ つ ◕_◕ ༽つ J.Fla TAKE MY ENERGY ༼ つ ◕_◕ ༽つ</a></h1>
							<p class="text" name="text" value="">The highly anticipated world championship fight will take place at 10am and is the second major boxing blockbuster in the nation after 20 years.</p>
							<label for="show-menu" class="menu-button"><span></span></label>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>