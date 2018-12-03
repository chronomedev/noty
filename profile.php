<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Main Menu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style_edit.css">
    <link rel="stylesheet" type="text/css" href="myprofile.css">
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="script/addnote_category.js"></script>
</head>
<body>
	
	
	<div class="container-fluid">
        <?php
            include("navbarparent.php");
            require("kelasDatabase.php");

            if(!isset($_GET['ctg'])){
                $pilihan_kategori = null;
                displayNavbar();
		        displaySideNavbar($pilihan_kategori);     
        
            }
           
            $dbHandler = new databaseLibrary();

            $detail_pengguna = $dbHandler->displayUserDetails($koneksi, $passing_id, "all");
        
        ?>
        
        <div>
                <h2 style="text-align:center; margin-bottom: 20px;">My Profile</h2>
        </div>
        <div class="row align-items-center">
                <div class="col-md-1">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <a href="#" class="fa fa-google"></a>
                </div>
                <div class="col-md-3 text-center">
                    <img  class="img-thumbnail" style="width:300px;" src="<?php

                        if($detail_pengguna['foto_user'] == null){
                            echo "img/avatars/defaultprofile.png";
                        } else {
                            echo $detail_pengguna['foto_user'];
                        }
                        
                    ?>">
                </div>
                <div class="col-md-7">
                    <h2><?php echo $detail_pengguna['NamaDepan']." ".$detail_pengguna['NamaBelakang']?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                </div>
                
        </div>
                                
                                
	
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>