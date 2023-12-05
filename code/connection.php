<?php
$conn = mysqli_connect("localhost", "root", "", "skinprotect");
if(mysqli_connect_errno()){
echo "Spoj na bazu neuspjesan.".mysqli_connect_error();
}
?>