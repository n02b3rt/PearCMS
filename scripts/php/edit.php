<?php
session_start();
if(
    (isset($_SESSION['login']) && $_SESSION['login']==$_GET['profil'] 
    || $_SESSION['permission'] == "admin") 
    && isset($_GET['profil']) && $_GET['profil'] != "" 
    && $_GET['postid'] && $_GET['postid'] != ""){

    $db= mysqli_connect('localhost', 'root', '','cms');

    $content = htmlentities($_GET['content']); 

    if(!$db){
        exit();
    }

    $result = mysqli_query($db,"UPDATE `entries` SET `content`='{$content }' WHERE id = {$_GET['postid']}");
    if(!$result){
        exit();
    }
    header("LOCATION:../../index.php?profil={$_GET['profil']}");
}
?>