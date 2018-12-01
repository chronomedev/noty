<?php

    include("connection.php");
    include("kelasDatabase.php");
    $test = new databaseLibrary();

    $test->getFirstCategory($koneksi, 20);












?>