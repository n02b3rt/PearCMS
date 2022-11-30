<?php
if(!isset($_SESSION['login'])){
    $link = 'pages/login.php';
}
else $link = "index.php?profil={$_SESSION['login']}";
?>
<nav class="menu">
    <a href="index.php" class="link-logo"><img src="<?php echo $_SESSION['logo']?>" alt="Login logo figure"
            class="logobox__image"></a>
    <?php if(isset($_SESSION['login'])){
        echo "<a href='{$link}' class='menu__login'>Witaj {$_SESSION['login']}!</a>";
    }
        else echo '<a href="pages/login.php" class="menu__login">login</a>';
     
     ?> <ul class="menu--side">
        <a href='index.php'>
            <li>Home</li>
        </a>
        <a href='<?php echo $link?>'>
            <li>Twój profil</li>
        </a>
        <?php if (isset($_SESSION['login'])) echo "<a href='scripts/php/logout.php'>
            <li>Wyloguj się</li>
        </a>"?>

    </ul>
</nav>