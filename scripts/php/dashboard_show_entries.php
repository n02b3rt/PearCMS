<?php
    $connect = mysqli_connect('localhost', 'root','','cms');
    if(!$connect){
        echo "brak połączenia z baza";
        exit();
    }
    $query = "SELECT entries.id,entries.title,users.login FROM entries JOIN users ON users.id = id_autor ORDER BY entries.id DESC;";
    $result = mysqli_query($connect,$query);
    if($result){
        $i = 1;
        ;
       while($row = mysqli_fetch_assoc($result)){
        echo "<div class='dashboard__itemContent--entry'>
            <div href='' class='dashboard__itemContent--title'>{$row['title']}</div>
            <div class='dashboard__itemContent--user'>{$row['login']}</div>
        </div>";
        $i++;
        if($i == 6){
            echo "<a href='' class='dashboard__link users__link'>zobacz wiecej...</a>";
            break;
            
        } 
       }
        
       mysqli_close($connect);
    }
    else {
        echo "błąd zapytania";
      exit();
    }
?>