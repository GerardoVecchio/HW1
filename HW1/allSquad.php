<?php 
require_once 'connection.php';
require_once 'session.php';

$all=$_SESSION['allenatore'];
$sql=mysqli_query($connection,"SELECT s.nome , s.allenatore FROM squadra s WHERE s.allenatore != '$all'");
$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>