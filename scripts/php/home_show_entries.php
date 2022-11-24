<?php
// TODO ogarnąc funkcje javacript aby ograniczać tekst np do x znaków reszta ... "ZOBACZ WIĘCEJ"
// funkcja(tekst, ilosc znaków ile można)
$connect = mysqli_connect('localhost','root','','cms');
$query = 'SELECT date,login,content,users.id FROM `entries` 
JOIN users
ON id_autor = users.id;';

if(!$connect){
    echo "brak połączenia z bazą";
    exit();
}

$result = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($result)){
    
    
echo "<article class='article'>
<span class='article__autor&&date'>{$row['date']}/ {$row['login']}</span>
<p class='article__contnet'>{$row['content']}</p>
</article> ";
}
?>