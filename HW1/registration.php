<?php 
require_once "connection.php";
require_once "session2.php";

$error='';

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
    $username = mysqli_real_escape_string($connection,$_POST["username"]);
    $email = mysqli_real_escape_string($connection,$_POST["Email"]);
    $password = mysqli_real_escape_string($connection,$_POST["Password"]);
    $conferma_p=mysqli_real_escape_string($connection,$_POST["c_pass"]);
    $password_md5 = md5($password);

    $sql ="SELECT * FROM utente WHERE userName='$username'";
    $result= mysqli_query($connection,$sql);
    $rows=mysqli_num_rows($result);
    if($rows ==1){
        $error .= '<p class="error">Utente già registrato.</p>';
    }else{
        if(strlen($password)<8){
            $error .= '<p class="error">La password deve contenere 8 caratteri.</p>';
        }
        if(empty( $conferma_p)){
            $error .= '<p class="error">Immettere password di conferma.</p>';
        }else{
            if(empty($error) && ($password != $conferma_p)){
                $error .= '<p class="error">Le password non coincidono, impossibile proseguire.</p>';
            }
        }
        if(empty($username) || empty($email) || empty($password) || empty($conferma_p)){
            $error .= '<p class="error">Si prega di inserire tutti i campi prima di procedere.</p>';
        }
        if(empty($error)){
            $query_user= "INSERT INTO utente (userName,password,email) VALUES ('$username','$password_md5','$email')";
            $result_user= mysqli_query($connection,$query_user);
            if($result_user){
                $error .= '<p class="error">Utente registrato con successo.</p>';
            }else{
                $error .= '<p class="error">Impossibile registrarsi.</p>';
            }
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
            <link rel="shortcut icon" href="https://images.vexels.com/media/users/3/129334/isolated/preview/5e167ebc8f4491a5b2b123c57218c034-basketball-player-circle-icon-by-vexels.png">            <script src="OtherFunctions.js" defer="true"></script>
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
                            <a class="button" href="profilo.php">Profilo</a>;


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

            <section class="dad" id="dadH"> 
                <div class="reg-form">
                <div class="col">
                    <p id="p1">Compila i campi.</p>
                    <?php echo $error;?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label> Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Email:</label>
                            <input type="email" name="Email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Password:</label>
                            <input type="password" name="Password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label> Conferma Password:</label>
                            <input type="password" name="c_pass" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name ="submit" class="btn btn-submit" value="Iscriviti">
                        </div>

                        <p>Sei dei nostri?  <a href="login.php">Clicca qui!</a></p>

                    </form>
                </div>
                </div>
            </section>


            <footer>
                <address><strong> Vecchio Gerardo 1000012124</strong></address>
            </footer>
        
        </body>

    </html>