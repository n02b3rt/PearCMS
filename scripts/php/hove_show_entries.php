<?php
// TODO ogarnąc funkcje javacript aby ograniczać tekst np do x znaków reszta ... "ZOBACZ WIĘCEJ"
// funkcja(tekst, ilosc znaków ile można)
$connect = mysqli_connect('localhost','root','','cms');
$query = 'SELECT title,date,login,photo,content,users.id FROM `entries` 
JOIN users
ON id_autor = users.id;';

if(!$connect){
    echo "brak połączenia z bazą";
    exit();
}

$result = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($result)){
    $img = 'data:image/jpeg;base64,'.base64_encode($row['photo']).'';
    
    
echo "<article class='article'>
<h3 class='article__heading'>{$row['title']}</h3>
<span class='article__autor&&date'>{$row['date']}/ {$row['login']}</span>
<img src='$img' alt='nie wiem' class='article__photo'>
<p class='article__contnet'>{$row['content']}</p>

</article> ";
}
?>