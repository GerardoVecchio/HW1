<?php 
    if(session_status() !=2){
        session_start();
    }
    if(!empty($_SESSION['allenatore'])){
        header("Location: home.php");
        exit;
    }
?>