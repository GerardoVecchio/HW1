<?php 
require_once 'connection.php';

$sql=mysqli_query($connection,"SELECT * FROM classificagiocatori ORDER BY mediaPti DESC LIMIT 10");
$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>