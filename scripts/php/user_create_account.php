<?php 
 function test_login($login){
  if(preg_match('/^[a-z0-9_-]*$/', $login) && strlen($login) <= 20) return 1;
  return 0;
 }
 function test_password($password, $repassword){
  // Sprawdzanie hasła czy 2 hasła są poprawne
  if($password == $repassword) return 1;
  return 0;
 } 
 function quality_password($password){
  // siła hasła
  if(preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[0-9]/', $password) && strlen($password) >= 8) return 1;
  return 0;
 }
 function base_connect_test(){
  $connect = mysqli_connect('localhost', 'root', '', 'cms');
  if($connect) return 1;
  return 0;
   }

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword'])){
  $failCode = "";

  // Sprawdzenie poprawności danych + połączenia z bazą
  if(!test_login($_POST['login'])) $failCode .= '&&login=fail';
  if(!test_password($_POST['password'],$_POST['repassword'])) $failCode .= '&&password=fail';
  if(!quality_password($_POST['password'])) $failCode .= '&&password=lowquality';
  if(!base_connect_test()) $failCode .= '&&baseconnect=fail';
  
  if($failCode == ''){
    $login = $_POST['login'];
    $pass = hash('sha256',$_POST['password']);

    $db = mysqli_connect('localhost', 'root', '', 'cms');
    if(!$db){
      header("LOCATION:../../pages/login.php?register=base");
      exit();
    }

    $query = "INSERT INTO users( login, haslo, user) VALUES ('$login', '$pass','user')";
    $result = mysqli_query($db,$query);

    if(!$result){
      // Dodawanie użytkownika zakończone niepowodzeniem
      header("LOCATION:../../pages/login.php?register=failquery");
      exit();
    }

    $query = "SELECT * FROM users WHERE login = '$login' AND haslo = '$pass'";
    $result = mysqli_query($db,$query);
    

    if($result && mysqli_num_rows($result)==1){
      $row = mysqli_fetch_assoc($result);
      session_start();
      $_SESSION['login'] = $row['login'];
      $_SESSION['password'] = $row['haslo'];
      $_SESSION['permission'] = $row['user'];
      $_SESSION['id'] = $row['id'];
      header("LOCATION:../../index.php");
    }

  }
  else {
    header("LOCATION:../../pages/login.php?register$failCode");
    exit();
  }
}
 ?>