<?php
    //session_start();
require_once('connection.php');
require('kelasDatabase.php');
    include('navbarparent.php');//-->session start();

    $id_user = $_SESSION['passing_id'];

    $dbHandler = new databaseLibrary();

    $detail_pengguna = $dbHandler->displayUserDetails($koneksi, $id_user, 'sdf');
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <title>Main Menu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style_edit.css">
        <link rel="stylesheet" type="text/css" href="responsive_navbar.css">
        <link rel="stylesheet" type="text/css" href="profile_edit.css">
        <link rel="stylesheet" href="warningnotification.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <script src="plugin/jQuery.js"></script>
        <script src="script/input_checker.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript" src="show.js"></script>
    </head>
    <body>
        <!--- BUAT NOTIFIKASI WARNING JANGAN DI RUBAH -->
        <div class="row" id="warningnotif">
            <div class="col">
                <div class="dialogwarning">
                    ERRORRR!!!!<hr>
                    <p class="warning_content">Password Lama haurs di isi!</p>
                    <button style="color:black;"onclick="closeWarning()">tutup</button>
                </div>                        
            </div>
        </div>
        <!------------------------------------------------------------------------------------------->
        <div class="container-fluid">
            <?php
            displayNavbar();
            ?>
                <h2 class="judul">EDIT PROFILE</h2>
                <form enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type='text' class='form-control' id='first_name'placeholder='Enter Your First Name' value=<?php echo $detail_pengguna['NamaDepan'];?>>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name"placeholder="Enter Your Last Name" value=<?php echo $detail_pengguna['NamaBelakang'];?>>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username"placeholder="Enter Your username" value=<?php echo $detail_pengguna['Username']; ?>>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"placeholder="Enter Your Password" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="old-password">Old Password</label>
                        <input type="password" class="form-control" id="old-password"placeholder="Enter Your Old Password">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="bagian_upload_avatar"> 
                            <label>Upload Avatar mu!</label>
                            <input type="file" id="file-input" multiple/>
                            <div id="thumb-output"></div>
                        </div>
                        
                    </div>
                   
                    <div class="form-group col-md-12">
                        <button type="button" onclick="emptyChecker()"class="btn btn-lg btn-primary addnew" style="margin: 10px;">Save Changes</button>
                    </div>                     
                </form>

            </div>
</body>
</html>