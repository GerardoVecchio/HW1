<?php 
require_once 'connection.php';
require_once 'session.php';


    $alle=$_SESSION['allenatore'];
    $sql=mysqli_query($connection,"CALL scambiProposti('$alle')");
    $result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>