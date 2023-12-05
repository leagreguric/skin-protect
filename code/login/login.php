<?php
session_start();
error_reporting(0);
include("../connection.php"); 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select id, uloga from users where k_ime='$username' && lozinka='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['id'] = $ret['id'];
        header('location: ../naslovna/naslovna.php');

    } else { 
        header('location: login.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css" />


</head>

<body>
    <div class="container">
        <header>
            <div class="info">
                <div class="title">SKIN PROTECT</div>
                <div class="log-reg">
                <?php
                    $id = $_SESSION['id'];
                    $ret = mysqli_query($conn, "select * from users where id='$id'");
                    $row = mysqli_fetch_array($ret);
                    
                    if (strlen($_SESSION['id']) != 0) {
                        echo '<div class="login">' . $row['ime'] . '</div>';
                        echo '<div class="reg"><a class="register" href="../login/odjava.php">ODJAVA</a></div>';
                    } else {
                       
                        echo '<div class="log"><a class="login" href="../login/login.php">LOGIN</a></div>';
                        echo '<div class="reg"><a class="register" href="../login/reg.php">REGISTER</a></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li> <a class="logo-link" href="../naslovna/naslovna.php"><img class="logo"
                                src="../../ASSETS/logo.jpg"> </li></a>
                    
                    <li><a href="#contact">PROIZVODI</a></li>

                </ul>
            </div>
        </header>

        <div class="container-login">
            <div class="main">
             
            <form action="#" method="post" name="login">
            <div>
                <label for="uname">Korisničko ime:</label>
                <input type="text" id="username" placeholder="unesite korisničko ime" name="username" required>
            </div>
			<br>
            <div>
                <label for="pwd">Lozinka</label>
                <input type="password"id="password" placeholder="unesite lozinku" name="password" required>
            </div>
            <button type="submit" class="login-btn" name="login">PRIJAVI SE</button>
        </form>
                
            </div>
        </div>

        <footer>
            <div class="footer">
                <div class="social">
                    <img class="logo-footer" src="../../ASSETS/logo.jpg">
                    <div class="insts"><a class="ig" href="https://www.instagram.com/?hl=hr">Instagram</a></div>
                    <div class="tiktok"><a class="tt" href="https://www.tiktok.com/en/">TikTok</a></div>
                </div>
                <div class="txt">
                    <div class="poruka">“Glowing skin is always in.”</div>
                    <div class="sp">&copy;2023 Skin protect</div>
                </div>
            </div>
        </footer>
        <script src="login.js"></scripalert>
    </div>

</body>

</html>