<?php
session_start();
error_reporting(0);
include("../connection.php"); 
$sql = "SELECT * FROM prod WHERE kategorija = 'bore'";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proizvodi za Akne</title>
    <link rel="stylesheet" href="explore.css" />
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
                    <li> <a class="logo-link" href="../naslovna/naslovna.php"><img class="logo" src="../../ASSETS/logo.jpg"> </li></a>
                
                    <li><a href="../navigation/proizvodi.php">PROIZVODI</a></li>
                    
                    
                  </ul>
            </div>
        </header>

    <div class="select" id="istrai">
      <div class="bore"><a href="akne.php">AKNE</a></div>
      <div class="suha-koza"><a href="suha-koza.php">SUHA KOŽA</a></div>
      <div class="masna-koza"><a href="masna-koza.php">MASNA KOŽA</a></div>
  </div>

        <div class="proizvodi">
            <div class="naslov">BORE</div>
            <div class="sadrzaj">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="proizvod">';
                            echo '<a href="detalji_proizvoda.php?id=' . $row['id'] . '">';
                            echo '<img class="proizvod-img" src=' . $row['slika'] . '" alt="' . $row['name'] . ' onclick="prikaziDetalje(' . $row['id'] . ') ">';
                            echo '</a>';
                            echo '<div class="naziv">' . $row['name'] . '</div>';
                            echo '</div>';
                            echo '<div class="proizvod">';
                            echo '<a href="detalji_proizvoda.php?id=' . $row['id'] . '">';
                            echo '<img class="proizvod-img" src=' . $row['slika'] . '" alt="' . $row['name'] . ' onclick="prikaziDetalje(' . $row['id'] . ') ">';
                            echo '</a>';
                            echo '<div class="naziv">' . $row['name'] . '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Nema dostupnih proizvoda.";
                    }

                    $conn->close();
                    ?>
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

    </div>

    <script src="../script.js"></script>
    <script>
        function prikaziDetalje(id) {
            window.location.href = 'product.php?id=' + id;
        }
    </script>
</body>
</html>
