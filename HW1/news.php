<!DOCTYPE html>
    <html>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href ="mhw3.css">
        <link href="<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="https://images.vexels.com/media/users/3/129334/isolated/preview/5e167ebc8f4491a5b2b123c57218c034-basketball-player-circle-icon-by-vexels.png">
        <script src="OtherFunctions.js" defer="true"></script>
        <script src="mhw3_news.js" defer="true"></script>
        <title>NBA_simulator/News</title> 
        <body>
            <header>
                <h1>
                    <strong>NBA Simulator</strong><br/>
                    <a class= "button" href='mhw3.php'>START</a></h1>
                    <nav>
                        <div class="menu" name="menu_sx">
                            <a class="button" href="home.php ">Homepage</a>  
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
                        <div id="NavM">
                            <div id="NewSideNav" class="sidenav">
                                <a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
                                <a href="home.php">Homepage</a>
                                <a href="classifiche.php">Classifiche</a>
                                <a href="news.php">News</a>
                                <?php include 'checkLogs.php'; ?>
                                <a  href="Profile.php">Profilo</a>

                                <a href="mhw3.php">Start</a>
                            </div>
                            <span id="burger" onclick="openNav()">&#9776;Menu</span>
                        </div>
                    </nav>
            </header>
            <section class="dad" name="News" id='dadN'>    
            </section>
            <footer>
                <address><strong> Vecchio Gerardo 1000012124</strong></address>
            </footer>        
        </body>
    </html>