<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    session_start();
    error_reporting(0);

    include("../connection.php");
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bore</title>
    <link rel="stylesheet" href="detail.css" />
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


 
<?php
echo '<div class="proizvod-wrapper">';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM prod WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="proizvod-wrapper2">';
        echo '<img class="proizvod-img" src=' . $row['slika'] . '" alt="' . $row['name'] . ' onclick="prikaziDetalje(' . $row['id'] . ') ">';
        
        echo '<div class="proizvod-ime">' . $row['name'] . '</div>';
        echo '<div class="proizvod-info">';
        echo '<div class="proizvod-tip">Tip proizvoda: ' . $row['type'] . '</div>';
        echo '</div>';
    
        echo '</div>';
        
 

$sql_recenzije = "SELECT * FROM reviews WHERE page_id = $id";
$result_recenzije = $conn->query($sql_recenzije);

if ($result_recenzije->num_rows > 0) {
    echo '<div class="recenzije-wrapper">';
    echo '<div class="recenzije">';
    echo '<h2 class="recenzije-title">Recenzije:</h2>';
    while ($row_recenzije = $result_recenzije->fetch_assoc()) {
        echo '<div class="recenzija">';
        echo '<div class="recenzija-ime">' . $row_recenzije['name'] . '</div>';
        echo '<div class="sadrzaj">' . $row_recenzije['content'] . '</div>';
        echo '<div class="recenzija-info">';
        echo '<div class="ocjena">Ocjena: ' . $row_recenzije['rating'] . '/5</div>';
        echo '<div class="datum">' . $row_recenzije['submit_date'] . '</div>';
        
        echo '</div></div>';
    }
} else {
    echo '<div class="recenzija">';
    echo '<p>Nema recenzija za ovaj proizvod.</p>';
    echo '</div>';
}

       

        if (strlen($_SESSION['id']) != 0) {
            echo '<div class="unos-recenzije">';
            echo '<h3 class="recenzija-title">Napiši recenziju:</h3>';
            echo '<form class="recenzija-actions" action="proces_unosa_recenzije.php" method="post">';
            
            echo '<textarea id="sadrzaj" class="sadrzaj-recenzije" name="sadrzaj" required></textarea>';
            
            echo '<div class="recenzija-submit-actions">';
            echo '<div class="ocjena-wrapper">';
            echo '<label for="ocjena">Ocjena:</label>';
            echo '<select id="ocjena" name="ocjena" required>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
            echo '</select>';
            echo '</div>';
            echo '<input type="hidden" name="proizvod_id" value="' . $id . '">';
            echo '<input type="submit" class="objavi-btn" value="Objavi">';
            echo '</div>';
            echo '</form>';
            echo '</div>';
            
        } else {
            echo '<p>Prijavite se kako biste mogli objaviti recenziju.</p>';
        }
        
        
        echo '</div>';
        echo '</div>';
    } else {
        echo "Proizvod nije pronađen.";
    }
    
    echo '</div>';
    $conn->close();
}


?>
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



</body>
</html>


