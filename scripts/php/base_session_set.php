<?php 
        session_start();

        $connect = mysqli_connect('localhost', 'root', '', 'cms');
        $query = "SELECT * FROM base";

        $result = mysqli_query($connect,$query);
        if(!$result ){
            echo "nie udało się pobrać favicon z bazy";
            exit();
        }

        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['title'] = $row['title'];
        $_SESSION['logo'] = 'data:image/jpeg;base64,'.base64_encode($row['logo']).'';
        $_SESSION['favicon'] = 'data:image/jpeg;base64,'.base64_encode($row['favicon']).'';
        mysqli_close($connect);
?>