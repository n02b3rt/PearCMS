<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,300;0,400;0,600;1,400;1,600&display=swap"
        rel="stylesheet">

    <?php 
        if(!isset($_SESSION['title']) && !isset($_SESSION['favicon']))
            include '../scripts/php/base_session_set.php';
    ?>

    <title><?php echo $_SESSION['title']?></title>
    <link rel="shortcut icon" href="<?php echo $_SESSION['favicon']?>" />

</head>

<body>
    <?php include '../scripts/php/data_base_con.php'; ?>
    <!-- content -->
    <div class="login__content">

        <div class="login__content--logobox">
            <img src="<?php echo $_SESSION['logo']?>" alt="Login logo figure" class="logobox__image">
            <h2 class="logobox__caption">
                <span class="logobox__caption--main">Pear</span></br>
                Content Management System
            </h2>
        </div>
        <div class="login__content--form">
            <?php
    if(isset($_GET['register']) || isset($_GET['register'])){
     
        if( $_GET['register'] == '' || $_GET['register'] == 'fail' )  
        include '../components/register-form.php';
       
    }
    else include '../components/login-form.php';
            ?>
        </div>

    </div>
    <?php

    //   niedziala jeszcze 
//    if(isset($_GET['page'])){
//     if($_GET['page'] == 'register-fail' ) echo "<script src='../scripts/javascript/password_fail_login.js''></script>";
// }
if(isset($_GET['login']) || isset($_GET['register'] )){
    if($_GET['login'] == 'fail' )
    echo '<script>
    const input = document.querySelector("input");
    input.style = "border-bottom-color: red; ";
</script>';
// if($_GET['register'] == 'fail' ) echo "<script src='../scripts/javascript/password_fail_login.js''></script>";
}
    else echo $_GET['login'];
    ?>
</body>

</html>