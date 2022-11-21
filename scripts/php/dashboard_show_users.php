<?php
                $connect = mysqli_connect('localhost', 'root','','cms');
                if(!$connect){
                    echo "brak połączenia z baza";
                    exit();
                }

                $query = "SELECT login, user FROM users";
                $result = mysqli_query($connect,$query);

                if($result){
                    $i = 1;
                    ;
                   while($row = mysqli_fetch_assoc($result)){
                    
                    echo "<div class='dashboard__itemContent--item'>
                        <div class='dashboard__itemContent--number'>$i</div>
                        <div class='dashboard__itemContent--login'>{$row['login']}</div>
                        <div class='dashboard__itemContent--permission'>{$row['user']}</div>
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