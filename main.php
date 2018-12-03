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
        try{
            $pwod_unlock = $dbHandler->unchiper($_POST['password']);
            $pwod = hash('sha256', $pwod_unlock);
            $dbHandler->insertDatabase($koneksi, $_POST['first_name'], $_POST['last_name'], $pwod, $_POST['username']);
            
            echo "berhasil buat Akun!<br>";
            sleep(10);
            echo "Harap tunggu, anda akan di redirect!";
            echo "<script>window.location.assign('login.html');</script>";
        } catch(Exception $e){
            echo "gagal buat akun. Coba lagi nanti";
        }
        
        

    } else if($eventType == "login") {
        $pwod_unlock = $dbHandler->unchiper($_POST['password']);
        $pwod = hash('sha256', $pwod_unlock);
        $dbHandler->logInDatabase($koneksi, $_POST['username'], $pwod);
        
    } else if($eventType == "out"){
        session_destroy();
        $_SESSION = array();
        echo "<script>window.location.assign('main.html')</script>";
        

    } else if($eventType == "updatenote"){
        echo var_dump($_POST['instruksi_update']);
        echo var_dump($_POST['id_note_update']);
        echo var_dump($_FILES['gambar_note_upload']);

        if(isset($_POST['instruksi_update'])){
            session_start();
            if($_POST['instruksi_update'] == "delete"){
                $dbHandler->deleteNotes($koneksi, $_POST['id_note_update']);
                echo "<script>window.location.assign('dashboard.php?ctg=".$_SESSION['pass_kategori_update']."')</script>";
            } else {
                if($_FILES['gambar_note_upload']['size'] == 0){
                    $direktoriFile = null;
                } else {
                    $direktoriFile = "img/note_images/".$_FILES['gambar_note_upload']['name'];
                    move_uploaded_file($_FILES['gambar_note_upload']['tmp_name'], $direktoriFile);
                }
                $waktu = date('Y-m-d h:i:s', time());
                $dbHandler->updateNote($koneksi, $_POST['id_note_update'], $_POST['judul_note'], $_POST['isi_catatan'], $waktu, $direktoriFile);
                echo "masuk";
                echo "<script>window.location.assign('viewnote.php?nt=".$_POST['id_note_update']."&ctg=".$_SESSION['pass_kategori_update']."');</script>";
            }
            
        } else {
            echo "data gak lengkap. Coba lagi!";
        }
        

    } else if($eventType == "updatectg"){

        session_start();
        if($_POST['pilihan_instruksi'] == "delete"){

            $dbHandler->deleteCategory($koneksi, $_POST['id_kategori_pilihan']);

        } else {
            $dbHandler->updateCategory($koneksi, $_POST['id_kategori_pilihan'], $_POST['nama_category_edit']);
        }

        $categoryID_parameter = $dbHandler->getFirstCategory($koneksi, $_SESSION['passing_id']);
        echo "<script>window.location.assign('dashboard.php?ctg=$categoryID_parameter')</script>";

    } else if($eventType == "addctg"){
        session_start();
        $angka_id_kategori = $dbHandler->getLastCategory($koneksi, $_SESSION['passing_id']);
        $id_category_add = "K".$_SESSION['passing_id'].$angka_id_kategori;
        $dbHandler->insertCategory($koneksi, $id_category_add, $_POST['category_add'], $_SESSION['passing_id']);
        echo "<script>window.location.assign('dashboard.php?ctg=".$id_category_add."');</script>";
        

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
        if(!isset($_POST['old_password'])){
            echo "UPDATE PROFILE GAGAL. SILAHKAN COBA LAGI NANTI";
        } else {
            $pwod_unlock = $dbHandler->unchiper($_POST['old_password']);
            $pwodlama = hash('sha256', $pwod_unlock);
            if($dbHandler->matchOldPassword($koneksi, $pwodlama, $_SESSION['passing_id'])){
                if(!isset($_POST['password_update']) || $_POST['password_update'] == ""){
                    $pwod = null;
                } else {
                    $pwod_unlock = $dbHandler->unchiper($_POST['password_update']);
                    $pwod = hash('sha256', $pwod_unlock);
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
            } else {
                //echo var_dump($pwod_unlock);
                echo "<script>window.location.assign('profiledit.php?war=1')</script>";
            } 
        }

    }

?>