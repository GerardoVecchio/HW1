<?php 
session_start();
$_SESSION['allenatore'] = '';
session_destroy();
header("Location: home.php");
?>