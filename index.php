<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,300;0,400;0,600;1,400;1,600&display=swap"
        rel="stylesheet">

    <?php 
        if(!isset($_SESSION['title']) && !isset($_SESSION['favicon']))
            include 'scripts/php/base_session_set.php';
    ?>

    <title><?php echo $_SESSION['title']?></title>
    <link rel="shortcut icon" href="<?php echo $_SESSION['favicon']?>" />

    <script src="scripts/javascript/content_shortening.js" defer></script>
    <script src="scripts/javascript/menu.js" defer></script>
    <?php if(isset($_GET['profil'])){
        echo '<script src="scripts/javascript/profile-edit.js" defer></script>';
        if(isset($_SESSION['login']) && $_GET['profil']==$_SESSION['login']){
            echo '<script src="scripts/javascript/profile-edit-nick.js" defer></script>';
        }
    }?>

</head>

<body>
    <div class="mobile-Menu">
        <span class="mobile-Menu__icon">&nbsp;</span>
    </div>
    <?php include 'components/home/menu.php'?>

    <?php

        if(isset($_GET['profil']) && $_GET['profil'] != ""){
            include 'scripts/php/profile_check_user.php';
            echo '<div class="profile__header">';
            include 'components/profile/profile-header.php';}
            echo '</div>';
        ?>
    <div class="content<?php if(!isset($_GET['profil'])) echo " main";?>">
        <?php
            if(isset($_GET['profil']) && $_GET['profil'] != ""){
                include 'pages/profile.php';
                
            }
            else{
                include 'pages/home.php';
            }
        ?>
        <?php  ?>;
    </div>

    <div class="idk-bar">

    </div>

    <!-- //  -->

</body>

</html>