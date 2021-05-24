<?php 
require_once 'connection.php';
$sql=mysqli_query($connection," SELECT ssn,nome,cognome,imgGiocatore FROM giocatore WHERE squadraN IS null AND imgGiocatore IS NOT null");
$result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>