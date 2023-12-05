<?php
session_start();
error_reporting(0);
include("../connection.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="naslovna.css" />

    
</head>



<body>
    <div class="container">
        <header>
            <div class="info">
                <div class="title">SKIN PROTECT</div>
                <div class="log-reg">
                    <?php
                   $user_id = $_SESSION['id'];
                   $query = mysqli_query($conn, 'SELECT ime FROM users WHERE id = "'.$user_id.'"');
                   $row = mysqli_fetch_array($query);
                    
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
                    <li> <a class="logo-link" href="../naslovna/naslovna.php"><img class="logo" src="../../ASSETS/logo.jpg"> </li></a>
                    <li><a href="../navigation/proizvodi.php">PROIZVODI</a></li>
                  </ul>
            </div>
        </header>

        <div class="slike">
            <img class="image" src="..\..\ASSETS\bore2.jpg" />
            <img class="image" src="..\..\ASSETS\acne1.jpg" />
            <img class="image" src="..\..\ASSETS\care.jpg" />
            <img class="image" src="..\..\ASSETS\acne2.jpg" />
            <img class="image" id="img1" src="..\..\ASSETS\bore1.jpg" />
          </div>
        
        <div class="select">
            <div class="akne"><a href="../explore/akne.php">AKNE</a></div>
            <div class="bore"><a href="../explore/bore.php">BORE</a></div>
            <div class="suha-koza"><a href="../explore/suha-koza.php">SUHA KOŽA</a></div>
            <div class="masna-koza"><a href="../explore/masna-koza.php">MASNA KOŽA</a></div>
        </div>
    
        <footer>
            <div class="footer">
                <div class="social">
                    <img class="logo-footer" src="..\..\ASSETS\logo.jpg">
                    <div class="insts"><a class="ig" href="https://www.instagram.com/?hl=hr">Instagram</a></div>
                    <div class="tiktok"><a class="tt" href="https://www.tiktok.com/en/">TikTok</a></div>
                </div>
            <div class="txt">
                <div class="poruka">“Glowing skin is always in.”</div>
               <div class="sp">&copy;2023 Skin protect</div>
            </div>
            </div>
        </footer>
<script src="naslovna.js"></script>
</div>


</body>
</html>