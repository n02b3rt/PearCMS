<?php

use LDAP\Result;

session_start();
if(($_POST['login']==$_SESSION['login'])){
    
    if(strlen($_POST['change__nick'])>20){
        header("location:../../index.php?profil={$_POST['login']}");
        echo "za długi";
        exit();
    }

    $db = mysqli_connect('localhost','root','','cms');

    $nick = htmlentities($_POST['change__nick']);


    $result = mysqli_query($db,"UPDATE `users` SET `nick`='{$nick}' WHERE login = '{$_SESSION['login']}'");

    if(!$result){
        header("location:../../index.php?profil={$_POST['login']}");
        exit();
    }
}
header("location:../../index.php?profil={$_POST['login']}");
?>