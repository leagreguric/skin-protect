<?php
session_start();
error_reporting(0);
include("../connection.php"); 

if (isset($_POST['register'])) {
    $fname = $_POST['name'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "select id from users where k_ime='$username'");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        echo '<script>alert("Korisnicko ime zauzeto!")</script>';
    } else {
        $query = mysqli_query($conn, 'INSERT INTO users (ime, prezime, k_ime, lozinka, uloga) VALUES("' . $fname . '", "' . $lname . '", "' . $username . '", "' . $password . '", "kupac")');
        $query2 = mysqli_query($conn, 'select id from users where k_ime="' . $username . '"');
        if ($query) {
            $ret = mysqli_fetch_array($query2);
            $_SESSION['id'] = $ret['id'];
            header('location: ../naslovna/naslovna.php');
        } else {
            echo '<script>alert("Greška kod registracije")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="registration.css" />


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

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="../../ASSETS/logo.jpg" alt="">
				</div>
				<form action="#" method="POST" name="login" id="registrationForm">
					<h3>Registracija</h3>
					<div class="form-group">
						<input type="text" placeholder="Ime" name="name" class="form-control" required>
						<input type="text" placeholder="Prezime" name="lname" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Korisničko ime" name="username" class="form-control" required>
						
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email" name="email" class="form-control" id="email" required>
						
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Lozinka" name="password" class="form-control" id="password" required>
						
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Potrvdite lozinku" class="form-control" id="confirmPassword" required>
						
					</div>
					<button type="submit" name="register"  onclick="provjeri()">Registriraj se</button>
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
		<script src="register.js"></script>
	</div>




</body>

</html>