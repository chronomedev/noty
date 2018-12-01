<?php

    // Main Event Handling (CRUD) server-side code
    // 2018 Hansrenee Willysandro
    // www web design and development
    require_once('connection.php');
    require('kelasDatabase.php');
    $dbHandler = new databaseLibrary();
    //$dbHandler->initializeConnection($koneksi);
    
    $eventType= $_GET['eType'];
    

    if($eventType == "form"){
        $pwod = hash('sha256', $_POST['password']);
        $dbHandler->insertDatabase($koneksi, $_POST['first_name'], $_POST['last_name'], $pwod, $_POST['username']);

    } else if($eventType == "login") {
        $pwod = hash('sha256', $_POST['password']);
        $dbHandler->logInDatabase($koneksi, $_POST['username'], $pwod);
        
    } else if($eventType == "out"){
        session_destroy();
        $_SESSION = array();
        echo "<script>window.location.assign('main.html')</script>";
        

    } else if($eventType == "updatenote"){
        

    } else if($eventType == "addnote"){

        date_default_timezone_get();
        $waktu = date('Y-m-d h:i:s', time());
        session_start();
        $passing_id = $_SESSION['passing_id'];
        $id_note = "N".$passing_id.$dbHandler->getLastNote($koneksi, $_POST['kategori_note']);
        $dbHandler->insertNote($koneksi, $id_note, $_POST['judul_note'], $_POST['isi_catatan'], $waktu, $_POST['kategori_note']);

        echo "<script>window.location.assign('dashboard.php?ctg=".$_POST['kategori_note']."')</script>";

    } else if($eventType == "updateprofile"){
        
        session_start();
        if(!isset($_POST['password_update']) || $_POST['password_update'] == ""){
            $pwod = null;
        } else {
            $pwod = hash('sha256', $_POST['password_update']);
            //echo "HASHHHHHHHHHH MASUK";
        }
        $id_user_edit = $_SESSION['passing_id'];

        if(!isset($_FILES['avatar_user_upload'])|| $_FILES['avatar_user_upload']['size']==0){
            $avatar_path = null;
        } else {
            $avatar_path = "img/avatars/".$_FILES['avatar_user_upload']['name'];
            move_uploaded_file($_FILES['avatar_user_upload']['tmp_name'], $avatar_path);
        }
        echo var_dump($_FILES['avatar_user_upload']);

        echo $dbHandler->updateUser($koneksi, $id_user_edit, $_POST['first_name_update'], $_POST['last_name_update'], $pwod, $avatar_path);
        
        $_SESSION['first_name'] = $_POST['first_name_update'];

        $categoryID_parameter = $dbHandler->getFirstCategory($koneksi, $id_user_edit);
        echo "<script>window.location.assign('dashboard.php?ctg=$categoryID_parameter')</script>";
    }

?>