<?php 
if(session_status() !=2){
    session_start();
}

if(!empty ($_SESSION["allenatore"])){
    echo '<a class="button" href="logout.php">Logout</a>
    <a class="button" href="pagina-scambi.php">Scambi</a>
    <a class="button" href="partite.php">Partite</a>';
}else{
    echo '<a class="button" href="login.php">Login</a>';
}
?>