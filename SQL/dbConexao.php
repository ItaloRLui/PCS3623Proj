<?php

    include "/hospital/SQL/dbConfig.php";

    $conn = new PDO('mysql:host=' . $databaseHost . ';dbname='. $databaseSchema.';', $databaseUser, $databasePass );

?>