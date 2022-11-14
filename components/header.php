<!-- <?php
$connect = mysqli_connect('localhost', 'root', '', 'cms');
$query = "SELECT * FROM base";
$result = mysqli_query($conn,$query);
if(!$result){
    echo "Header nie połączył się z bazą danych";
    exit();
}
$row = mysqli_fetch_assoc($result);
$img = 'data:image/jpeg;base64,'.base64_encode($row['logo'] ).''
?>


<header class='header'>
    <div class='header__widget-1'>
        <img src="<?php echo $img?>" class="header__logo" alt="header logo" />
    </div>
    <div class='header__widget-2'>
        <p class='header__paragrap'><?php echo $row[''] ?></p>
    </div>
    <div class='header__widget-3'>
        <a href='pages/login.php' class='btn btn--login'>Zaloguj się!</a>
    </div>
</header>
<?php
// mysqli_close($connect);
?> -->