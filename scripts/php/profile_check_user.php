<?php
// TODO sprawdzanie regex do GET'profile' - bo ktoś może sobie wjebac tam więcej użytkowników jakiś jebany śmieszek
if(isset($_GET['profil']) && $_GET['profil'] != ''){
    $db = mysqli_connect('localhost','root','','cms');
    $query = "SELECT id,login,nick,user FROM `users` WHERE login = '{$_GET['profil']}';";
    
    $result = mysqli_query($db,$query);
    
    if($result && mysqli_num_rows($result) == 0){
        echo "<span style='font-size:3rem;text-align:center; grid-column:3/4'>NIE MA TAKIEGO UŻYTKOWNIKA</span>";
        exit();
    }
    
    $row = mysqli_fetch_assoc($result);
    
}
?>