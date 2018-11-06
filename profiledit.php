<?php
    session_start();
    require_once('connection.php');
    require('kelasDatabase.php');

    $id_user = $_SESSION['passing_id'];

    $dbHandler = new databaseLibrary();

    $detail_pengguna = $dbHandler->displayUserDetails($koneksi, $id_user, 'sdf');
?>


<!DOCTYPE html>
<html>
<head>
        <title>Main Menu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="plugin/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="plugin/jQuery.js"></script>
        <script src="script/input_checker.js"></script>
    <link rel="stylesheet" type="text/css" href="style_edit.css">
    <link rel="stylesheet" type="text/css" href="profile_edit.css">
    <link rel="stylesheet" href="warningnotification.css"/>
    
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
        <div class="row" id="warningnotif">
                <div class="col">
                        <div class="dialogwarning">
                        ERRORRR!!!!<hr>
                        <p class="warning_content">Password Lama haurs di isi!</p>
                        <button style="color:black;"onclick="closeWarning()">tutup</button>
                        </div>
                        
                        
                </div>
        </div>
	<div class="container-fluid">
		<nav class="navbar border-bottom navbar-dark bg-white justify-content-between navbar-fixed-top col-md-12">
			<div class="container-fluid">
			<div class="navbar-brand kanan col-md-1"><font size="6"><span class="text-primary">N</span><span class="text-danger">o</span><span class="text-warning">t</span><span class="text-success">y</span></font></div>
			<a href="" class="glyphicon glyphicon-arrow-left col-md-offset-1"></a>
			<form class="navbar-form navbar-left col-md-3" action="/action_page.php">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			<div class="col-md-offset-6">
			<a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
		</div>
		</div>
		</nav>

		<div class="container-fluid">
                <h2 class="judul">EDIT PROFILE</h2>
                <form>
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
                                    
                                                    <button type="button" onclick="emptyChecker()"class="btn btn-lg btn-primary addnew" style="margin: 10px;">Save Changes</button>

                </form>
    
            </div>
</div>
</body>
</html>