<?php
    //Database Connection Declaration
    //2018 Hansrenee Willysandro 
    //www group (Web Design And Development)
    try{
        $koneksi = new PDO("mysql:host=den1.mysql4.gear.host;dbname=notydatabase", "notydatabase", "kelompokwww!");
        //$koneksi = new PDO("mysql:host=localhost;dbname=notydatabase", "root", "");
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e){
        echo "SEDANG ADA GANGGUAN SERVER HARAP SABAR!";
    }
    


?>