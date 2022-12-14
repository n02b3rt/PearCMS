<?php

$connect = mysqli_connect('localhost','root','','cms');
// nie ma warunków więcej ponieważ jeśli profile nie będzie ustawione to aplikacja wywali errora B)

    $query = 'SELECT date,nick,login,categories,content,entries.id FROM `entries` 
    JOIN users
    ON id_autor = users.id
    ORDER BY date DESC;';

if(!$connect){
    echo "brak połączenia z bazą";
    exit();
}

$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result)==0){
    echo '<div class="u-nie-ma">Ten urzytkownik nie ma postów</div>';
}


while($row = mysqli_fetch_assoc($result)){
    
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
    </div>
    </div>
</article> ";
}


?>