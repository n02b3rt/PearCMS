<?php

$connect = mysqli_connect('localhost','root','','cms');
// nie ma warunków więcej ponieważ jeśli profile nie będzie ustawione to aplikacja wywali errora B)
if(isset($_GET['profil']) && $_GET['profil'] != ""){
    $profile = strval($_GET['profil']);
    $query = "SELECT date,nick,login,categories,content,entries.id FROM `entries` 
    JOIN users
    ON id_autor = users.id
    WHERE login = '$profile'
    ORDER BY date DESC;";
}
else header('LOCATION:index.php');


if(!$connect){
    echo "brak połączenia z bazą";
    exit();
}

$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result)==0){
    echo '<div class="u-nie-ma">Ten urzytkownik nie ma postów</div>';
}

$buttons='';
$date = '';

if(isset($_SESSION['login']) 
&& isset($_GET['profil'])
&& (($_SESSION['login'] == $_GET['profil']) || ($_SESSION['permission'] == 'admin'))
&& isset($_GET['usunid']) 
&& preg_match('/[0-9]/',$_GET['usunid'])){
    $x = mysqli_query($connect,"DELETE FROM entries WHERE id = {$_GET['usunid']}");
    echo $x;
    echo "<script> alert(`Usunięto post`);window.location=`index.php?profil={$_GET['profil']}`;</script>";
}
$i = 0;



while($row = mysqli_fetch_assoc($result)){
    if(
        (isset($_SESSION['login']) && $_GET['profil']==$_SESSION['login'])
        || (isset($_SESSION['permission']) && $_SESSION['permission'] == 'admin')
        ){
        $buttons = "<form action='' method='get'>
        <input type='hidden' name='profil' class='edit_id' value='{$row['login']}'>
        <input type='hidden' name='edycja' value='{$row['id']}'>
        <button type='button' class='btn-profile' onClick='edit({$row['id']},$i)'>edytuj</button>
    </form>
    <form action='index.php?profil={$_GET['profil']}' method='get'>
        <input type='hidden' name='profil' value='{$row['login']}'>
        <input type='hidden' name='usunid' value='{$row['id']}'>
        <input type='submit' class='' value='usuń'>
    </form>";
    }
    
    if(date('Y-m-d', strtotime($row['date'])) == date('Y-m-d')){
        $date = date('H:i:s', strtotime($row['date']));
    }
        
    else{
        $date = date('Y/m/d H:i:s', strtotime($row['date']));
    }

    // style='<?php echo $style
echo "<article class='article'>
    <a href='index.php?profil={$row['login']}' >
        <svg class='add-post__profil__photo'>
            <use xlink:href='img/icons/profile.svg#icon-user'>
        </svg>
    </a>
    <div class='article__wrapper'>
    <p class='article__autorXdate'>
        <span class='article__autor'>{$row['nick']}</span>
        <span class='article__autorXdate__wrapper'>
        <a href='index.php?profil={$row['login']}' class='article__login'>{$row['login']}</a>
        <span class='article__date'>{$date}</span>
        </span>
     </p>
    <p class='article__content'>{$row['content']}</p>
    </div>
    <div class='article__bottom-bar'>
    <div class='article__category'>{$row['categories']}</div>
    <div class='article__bottom-bar__wrapper'>
    $buttons
    </div>
    </div>
</article> ";
$i++;
}

// echo

?>