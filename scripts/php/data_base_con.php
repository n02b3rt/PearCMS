<?php 
$conn = mysqli_connect('localhost','root','','cms');

// Check connection
if (!$conn) {
    echo "Brak połącznia z baza danych";
    exit();
  }
  
  mysqli_close($conn);
?>