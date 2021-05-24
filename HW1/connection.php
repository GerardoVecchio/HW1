<?php 
    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname="nbanuovo";

    $connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
    if(mysqli_connect_errno()){
        die("problemi di connessione con il database:". mysqli_connect_errno());
    }
    ?>