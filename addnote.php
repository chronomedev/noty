<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Main Menu</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_edit.css">
	<link rel="stylesheet" type="text/css" href="responsive_navbar.css">
	<link rel="stylesheet" type="text/css" href="addnote.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="show.js"></script>
    <script src="script/addnote.js"></script>
</head>
<body style="background:#fff4ea;">

	
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
        
        <div class="row" id="editnote_container">
                <form action="main.php?eType=addnote" method="POST" jumbotron col-md-12" style="grid-gap: 1em;">
                        <h2 style="text-align: center;">New Note</h2>
                        <div class="form-group col-md-6 col-md-offset-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="judul_note"id="title"placeholder="Enter Your Note Title" value="">
                        </div>
                                <div class="form-group col-md-6 col-md-offset-3" style="margin-right: 9px;">
                                        <label for="note">Note</label>
                                        <textarea class="form-control" rows="8" id="note" name="isi_catatan"aria-valuemax=""></textarea>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle posisi" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Pilih Kategori
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php
                                                        include("connection.php");
                                                        
                                                        $queryAmbil = $koneksi->query("select id_category, category_name from mscategory where id_user = $passing_id;");
                                                        $i = 0;
                                                        while($tampung = $queryAmbil->fetch()){
                                                            echo "<a class='dropdown-item' id=".$i." href='javascript:getCategory(".$i.")'>".$tampung['category_name']."</a>";
                                                            $tampung_id_kategori[$i] = $tampung['id_category'];
                                                            $tampung_nama_kategori[$i] = $tampung['category_name'];
                                                            $i++;                                                
                                                        }
                                                    
                                                    
                                                    ?>
                                                  <!-- <a class="dropdown-item" id='1' href="javascript:getCategory();">Kampus</a>
                                                  <a class="dropdown-item" href="#">Kerja</a>
                                                  <a class="dropdown-item" href="#">Others</a> -->
                                                </div>
                                                <input type="hidden" name="kategori_note" class="kategori_note" value="">
                                                <input type="file" name="gambar_upload" id="file-input" class="posisi" multiple />
                                                   <div id="thumb-output"></div>
                                                <button type="submit" class="btn btn-primary btn-block posisi" style="width: 160px;">Create Note</button>
            
                                              </div>
                                </div>
                            </form>
        </div>

                                
                                
	
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>