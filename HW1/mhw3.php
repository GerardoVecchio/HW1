<?php 
require_once 'connection.php';
require_once 'session.php';

$error='';

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
    $alle=$_SESSION['allenatore'];
    $sq=$_POST['squadraUtente'];
    $query_team="CALL assegnaSquadra('$alle','$sq')";
    $result_sq=mysqli_query($connection,$query_team);

    if(!$result_sq){
        $error .= "<h2>Possiedi già una squadra</h2> ";
    }else{

    $gioc0=$_POST['0'];
    $gioc1=$_POST['1'];
    $gioc2=$_POST['2'];
    $gioc3=$_POST['3'];
    $gioc4=$_POST['4'];

    $query_giocatori="CALL assegnaGiocatori('$gioc0','$gioc1','$gioc2','$gioc3','$gioc4','$sq')";
    $result_sq=mysqli_query($connection,$query_giocatori);
    }
}


?>
<!DOCTYPE html>
    <html>
        <head> <!--scrivi i commenti-->
            <meta charset="utf-8"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel = "stylesheet" href ="mhw3.css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
            <link rel="shortcut icon" href="https://images.vexels.com/media/users/3/129334/isolated/preview/5e167ebc8f4491a5b2b123c57218c034-basketball-player-circle-icon-by-vexels.png">
            <script src="Loading2.js" defer="true"></script>
           <script src="OtherFunctions.js" defer="true"></script> 
            <title>NBA_simulator</title> 
        </head>

        <body>
            <header>
                <h1>
                    <strong>NBA Simulator</strong><br/>
                    <a class= "button" href='mhw3.php'>START</a></h1>     <!--qui va la pagina PHP che inserisce la squadra del utente-->
                    <nav>
                        <div class="menu" name="menu_sx">
                            <a class="button" href="home.php">Homepage</a>  
                            <a class="button" href="classifiche.php">Classifiche</a>
                        </div>
                        <div class="logo">
                            <img src="https://i.imgur.com/rAQpEzo.png" >
                        </div>
                        <div class="menu" name="menu_dx">
                            <a class="button" href="news.php">News</a>  
                            <?php include 'checkLogs.php'; ?>
                            <a class="button" href="profilo.php">Profilo</a>
                        </div>

                        <!-- nav Mobile-->
                        <div id="NavM">
                            <div id="NewSideNav" class="sidenav">
                                <a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
                                <a href="home.php">Homepage</a>
                                <a href="classifiche.php">Classifiche</a>
                                <a href="news.php">News</a>
                                <?php include 'checkLogs.php'; ?>
                                <a  href="profilo.php">Profilo</a>
                                <a href="mhw3.php">Start</a>
                            </div>
                            <span id="burger" onclick="openNav()">&#9776;Menu</span>
                        </div>
                    </nav>
                    
            </header>

            <section class="dad" name="contenuto" id='dadF'>
                <div class="scelte" id="ChoiceSection">
                    
                    <h2>Le tue scelte</h2>
                    <?php echo $error; ?>
                <form action='' method='post'>
                    <div class='team-grid' id='choices'>
                    
                    </div>
                    <div class='team-grid' id='choicep'>

                    </div>

                    <input type="submit" name ="submit" id="btn-submit" value="Conferma Squadra">
                </form>
                </div>
                
                
                <div class='contenuto'>
                        <div class='box-squadre' id='box-squadre'>   
                            <h1>Scegli il logo della tua squadra</h1>
                            <input type='text' id='searchBar' onkeyup='search()' placeholder="inserisci il nome della squadra">
                            <div class='team-grid' id='team-grid'>

                                
                            </div>
                        </div> 
                        
                        <div class='box-giocatori' id='box-giocatori'>
                            <h1>Scegli i componenti del tuo team</h1>
                            <input type='text' id='searchBarG' onkeyup='searchG()' placeholder="inserisci il nome del giocatore">
                            <div class='team-grid' id='player-grid'>
                        
                        </div>
                </div>
            </section>
            
            <footer>
                <address><strong> Vecchio Gerardo 1000012124</strong></address>
            </footer>
        
        </body>

    </html>