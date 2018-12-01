<?php



    require("connection.php");
    $query = $koneksi->query("select * from notydatabase.msnote where id_category = 'K2002'");


    while($tampung = $query->fetch()){
        echo $tampung['id_note']."<br>";
    }

?>