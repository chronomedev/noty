<?php

    // Main Event Handling server-side code
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
        
        
    } else if($eventType == "update"){

    }
    

    

    //buat debug
    // $dbHandler->insertDatabase($koneksi, "ehhh", "doh", $pwod, "kampret123");

?>