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
    <div class="dashboard">
        <div class="dashboard__nav">
            <a href='dashboard.php' class="menu__logo">
                <img src="<?php echo $_SESSION['logo']?>" alt="Login logo figure" class="menu__logo--img">
            </a>

            <?php include '../components/dashboard/menu.php'?>
        </div>
        <div class="dashboard__content">
            <?php
                if(isset($_GET['all-entries'])){
                    include '../components/dashboard/all-entries.php';
                }
                else if(isset($_GET['add-entries'])){
                    include '../components/dashboard/add-entry.php';
                }
                else if(isset($_GET['users'])){
                    include '../components/dashboard/users.php';
                }
                else if(isset($_GET['settings'])){
                    include '../components/dashboard/settings.php';
                }
                else  include '../components/dashboard/home.php';
            ?>

        </div>
    </div>

</body>

</html>