<?php

    require("connection.php");
    require_once("kelasDatabase.php");
    $a = $_POST['halo'];

    $query = "insert into coba_ajax(password)values(?);";
    $sqlCommand = $koneksi->prepare($query);
    $sqlCommand->execute([$a]);


    

?>