<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "cadmus_personal";

    $conn =mysqli_connect($server, $user, $password, $dbname);
    if(!$conn){
        die("Connection Failed".mysqli_connect_error());
    }
?>