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
    <script src="script/addnote_category.js"></script>
</head>
<body style="background:#fff4ea;">

	
	<div class="container-fluid">
    <?php
        include("navbarparent.php");//session start
        require("kelasDatabase.php");

        if(!isset($_GET['ctg'])){
            $pilihan_kategori = null;
        } else {
            $pilihan_kategori = $_GET['ctg'];
            $pilihan_id_note = $_GET['nt'];
        }
		
		displayNavbar();//---sesssion start
        displaySideNavbar($pilihan_kategori);
        $dbHandler = new databaseLibrary();

        $_SESSION['pass_kategori_update'] = $pilihan_kategori;

        $tampung_note = $dbHandler->displayNotes($koneksi, $pilihan_id_note);

		//$_SESSION['kategori_sebelumnya'] = $pilihan_kategori;
        
        ?>
        
        <div class="row" id="editnote_container">
                <form action="main.php?eType=updatenote" method="POST" id="edit_note_form" enctype="multipart/form-data" style="grid-gap:1em;" >
                        <h2 style="text-align: center;">Edit Note</h2>
                        <div class="form-group col-md-6 col-md-offset-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="judul_note"id="title"placeholder="Enter Your Note Title" value="<?php echo $tampung_note['nama']; ?>">
                        </div>
                                <div class="form-group col-md-6 col-md-offset-3" style="margin-right: 9px;">
                                        <label for="note">Note</label>
                                        <textarea class="form-control" rows="8" id="note" name="isi_catatan"><?php echo $tampung_note['note_content']; ?></textarea>
                                            
                                                
                                                <input type="hidden" name="id_note_update" value="<?php echo $pilihan_id_note; ?>">
                                                <input type="hidden" class="instruksi_update" name="instruksi_update" value="">
                                                <input type="file" name="gambar_note_upload" id="file-input" class="posisi" multiple />
                                                   <div id="thumb-output"></div>
                                                <button type="button" onclick="updateNote();" class="btn btn-primary btn-block posisi" style="width: 160px;">Update Note</button>
                                                <button type="button" onclick="deleteNote();" class="btn btn-primary btn-block posisi" style="width: 160px;">Delete Note</button>
            
                                              </div>
                                </div>
                            </form>
        </div>

                                
                                
	
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>