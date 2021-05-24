<?php 
require_once 'connection.php';
$sql=mysqli_query($connection," SELECT nome, imgSquadra,fondazione FROM squadra WHERE allenatore IS null AND imgSquadra IS NOT null and fondazione IS NOT null");
$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));
?>