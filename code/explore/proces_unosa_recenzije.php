<?php
session_start();
include("../connection.php");

$id = $_SESSION['id'];
$ret = mysqli_query($conn, "select * from users where id='$id'");
$row = mysqli_fetch_array($ret);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['ocjena']) &&
        isset($_POST['sadrzaj']) &&
        isset($_POST['proizvod_id']) &&
        is_numeric($_POST['ocjena']) &&
        is_numeric($_POST['proizvod_id'])
    ) {
        $ocjena = $_POST['ocjena'];
        $sadrzaj = $_POST['sadrzaj'];
        $proizvod_id = $_POST['proizvod_id'];
        $ime= $row['ime'];


        // Ovdje dodajte kod za unos recenzije u bazu podataka
        $sql_unos = "INSERT INTO reviews (page_id, name, content, rating, submit_date) 
                     VALUES ($proizvod_id,'$ime', '$sadrzaj', $ocjena, CURRENT_TIMESTAMP)";
        $rezultat_unos = $conn->query($sql_unos);

        if ($rezultat_unos) {
            // Uspješno unesena recenzija, možete preusmjeriti korisnika nazad na stranicu s detaljima proizvoda
            header("Location: detalji_proizvoda.php?id=" . $proizvod_id);
            exit();
        } else {
            echo "Greška prilikom unosa recenzije: " . $conn->error;
        }
    } else {
        echo "Nevažeći unos.";
    }
} else {
    echo "Nevažeći HTTP zahtjev.";
}
?>
