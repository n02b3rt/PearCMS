<?php
/* TODO paterny na inputy
*/
// content,category,data/czas,autor


// sprawdzanie czy jest post
session_start();
if((!isset($_POST['content']) || trim($_POST['content']) == '') || (!isset($_POST['category']) || trim($_POST['category']) == '')){
    header('LOCATION:../../index.php?errpost');
    exit();
}
$content = htmlentities($_POST['content']);
$category = strtolower(htmlentities($_POST['category']));
$autor_id = $_SESSION['id'];
$Cur_DATE = date("Y-m-d H:i:s");

$db = mysqli_connect('localhost','root','','cms');
if(!$db){
  // nie dziala baza
  header('LOCATION:../../index.php');
  exit();  
}

$query = "INSERT INTO entries(categories, content, id_autor, date) VALUES ('$category','$content','$autor_id','$Cur_DATE')";


if(!$result = mysqli_query($db, $query)){
    // nie dodano
    header('LOCATION:../../index.php');
    exit();
}
header("LOCATION:../../index.php?profil={$_GET['profil']}");
//dodano
?>