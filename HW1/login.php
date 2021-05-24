<?php 
    require_once 'connection.php';
    require_once 'session2.php';

    $error='';

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password=  mysqli_real_escape_string($connection, $_POST['password']);
        $password_md5 = md5($password);

        if(empty($username)){
            $error .= '<p class="error"> Inserire nome utente</p>';
        }

        if(empty($password)){
            $error .= '<p class="error"> Inserire password</p>';
        }

        if(empty($error)){
            $sql ="SELECT * FROM utente WHERE userName= '$username'  AND password = '$password_md5'";
            $result = mysqli_query($connection,$sql);
            $rows=mysqli_num_rows($result);
            if($rows ==1){
                session_start();
                $_SESSION['allenatore'] = $username;
                $row = mysqli_fetch_assoc($result);
                header("Location: home.php");
                exit;
            }else{
                $error .= '<p class"error">Username o password non valide</p>';
            }
        }
        mysqli_close($connection);
    }
?>


<!DOCTYPE html>
    <html>
        <head> <!--scrivi i commenti-->
            <meta charset="utf-8"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel = "stylesheet" href ="mhw3.css">
            <link href="<link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
            <link rel="shortcut icon" href="https://images.vexels.com/media/users/3/129334/isolated/preview/5e167ebc8f4491a5b2b123c57218c034-basketball-player-circle-icon-by-vexels.png">
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
                                <a  href="Profile.php">Profilo</a>

                                <a href="mhw3.php">Start</a>
                            </div>
                            <span id="burger" onclick="openNav()">&#9776;Menu</span>
                        </div>
                    </nav>
                    
            </header>

        <section class="dad" id="dadH"> 
            <div class="log-box">
            <div class="col">
                <p id="p1">Inserisci le tue credenziali</p>
                <?php echo $error;?>
                <form action="" method="post">
                <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn" value="Accedi">
                        </div>
                        <p>Non sei ancora dei nostri?   <a href="registration.php">Clicca qui!</a></p>
                </form>
            </div>
            </div>
        </section>


             
            <footer>
                <address><strong> Vecchio Gerardo 1000012124</strong></address>
            </footer>
        
        </body>

    </html>