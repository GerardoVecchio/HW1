<?php 
require_once 'connection.php';
require_once 'session.php';

    $alle=$_SESSION['allenatore'];
    $sql=mysqli_query($connection,"SELECT g.ssn,g.nome,g.cognome FROM giocatore g join squadra s on g.squadraN=s.nome WHERE s.allenatore = '$alle'");
    $result=mysqli_fetch_all($sql,MYSQLI_ASSOC);

exit(json_encode($result));

?>