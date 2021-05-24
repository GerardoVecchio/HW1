<?php 
require_once "connection.php";
require_once "session.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['accetta'])){
    $chiave=$_POST['chiave'];
    $query_accScambio="CALL updateGestionePartite('$chiave')";
    $result_sq=mysqli_query($connection,$query_accScambio);
    header('Location: Profile.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['rifiuta'])){
    $chiave=$_POST['chiave'];
    $query_rifScambio="CALL rifiutaGestionePartite('$chiave')";
    $result_sq=mysqli_query($connection,$query_rifScambio);
    header('Location: Profile.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['gioca'])){
    $alle =$_SESSION['allenatore'];
    $sq2 = mysqli_real_escape_string($connection,$_POST["ssn2"]);
    $query="CALL inserisciGestionePartite('$alle','$sq2')";
    $result=mysqli_query($connection,$query);
    header('Location: Profile.php');
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel = "stylesheet" href ="mhw3.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
            <link rel="shortcut icon" href="https://images.vexels.com/media/users/3/129334/isolated/preview/5e167ebc8f4491a5b2b123c57218c034-basketball-player-circle-icon-by-vexels.png">
            <script src="partite.js" defer="true"></script>
            <script src="OtherFunctions.js" defer="true"></script>
            <title>NBA_simulator</title> 
        </head>

        <body>
            <header>
                <h1>
                    <strong>NBA Simulator</strong><br/>
                    <a class= "button" href='mhw3.php'>START</a></h1>
                    <nav>
                        <div class="menu" name="menu_sx">
                            <a class="button" href="home.php">Homepage</a>    <!--qui va il link della homepage mhw1-->
                            <a class="button" href="classifiche.php">Classifiche</a>
                        </div>
                        <div class="logo">
                            <img src="https://i.imgur.com/rAQpEzo.png" >
                        </div>
                        <div class="menu" name="menu_dx">
                            <a class="button" href="news.php">News</a>  
                            <?php include 'checkLogs.php'; ?>
                            <a class="button" href="Profile.php">Profilo</a>
                            

                        </div>

                        <!-- nav Mobile-->
                        <div id="NavM">
                            <div id="NewSideNav" class="sidenav">
                                <a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
                                <a href="home.php">Homepage</a>
                                <a href="classifiche.php">Classifiche</a>
                                <a href="news.php">News</a>
                                <?php include 'checkLogs.php'; ?>
                                <a href="Profile.php">Profilo</a>
                        

                                <a href="mhw3.php">Start</a>
                            </div>
                            <span id="burger" onclick="openNav()">&#9776;Menu</span>
                        </div>
                    </nav>
                    
            </header>

                <section class="dad" id="dadH">
                    <section class="dad" id="dadH1"> 
                        <p id="p1">Squadre che puoi sfidare</p>
                        <div class="form-sc" id="form-sc">
                        </div>         
                    </section>


                    <section class="dad" id="dadH1"> 
                        <p id="p1">Chi ti ha sfidato</p>
                        <div class="form-sc" id="form-sc2">
                        </div>         
                    </section>
                
                    <div class="col">


                    <form action="" method="post">

                        <div class="form-group">
                            <label> Che squadra vuoi sfidare ?</label>
                            <input type="text" name="ssn2" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name ="gioca" class="btn btn-submit" value="Invia richiesta">
                        </div>
                </div>
                
                
                
                
                
                
                
                </section>
            <footer>
                <address><strong> Vecchio Gerardo 1000012124</strong></address>
            </footer>
        
        </body>

    </html>