<?php 
require_once 'connection.php';
$sql=mysqli_query($connection,"CALL classificaRIM()");
$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>