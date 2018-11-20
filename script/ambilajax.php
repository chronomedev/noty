<?php
    //header("content-type: application/json");
    require("connection.php");
    require_once("kelasDatabase.php");
    //$z = file_get_contents('php://input');
    
    
    

    $a = $_POST['halo'];
    //$x= json_decode($z, true);
    //$a = $x['halo'];
    $query = "insert into ajaxkampret(inputan)values(?);";
    $sqlCommand = $koneksi->prepare($query);
    $sqlCommand->execute([$a]);
    //echo "masuk ke db";


    

?>