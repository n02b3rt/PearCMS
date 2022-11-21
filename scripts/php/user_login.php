<?php
  
  if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login']; 
    $pass = hash('sha256', $_POST['password'] );

    $connect = mysqli_connect('localhost', 'root', '', 'cms');

    if(!$connect){
      echo "Brak połaczenia z bazą";
      exit();
    }


    $query = "SELECT * FROM users WHERE login = '$login' AND haslo = '$pass'";
    // $query = "SELECT * FROM users WHERE login LIKE $login && haslo LIKE $pass";

    $result = mysqli_query($connect, $query);

    if($result && mysqli_num_rows($result)==1){
      $row = mysqli_fetch_assoc($result);
      session_start();
      $_SESSION['login'] = $row['haslo'];
      $_SESSION['password'] = $row['haslo'];
      $_SESSION['permission'] = $row['user'];
      header("LOCATION:../../pages/dashboard.php");
    }
    else {
      // baza nic nie zwróciła
      echo 'nie dziala ';
      header("LOCATION:../../pages/login.php?user=not-found");
      exit();
    }

   

    mysqli_close($connect);
  }

?>