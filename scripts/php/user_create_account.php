<?php 
// TODO Logim MAX 20 znaków
 function test_login($login){
  if(preg_match('/^[a-z0-9_-]*$/', $login)) return 1;
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

    $query = "INSERT INTO users( login, haslo, user) VALUES ('$login', '$pass','user')";
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'cms'),$query);

    if(!$result){
      // Dodawanie użytkownika zakończone niepowodzeniem
      header("LOCATION:../../pages/login.php?register=failquery");
      exit();
    }

    session_start();
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $pass;
      $_SESSION['permission'] = "user";
    header("LOCATION:../../pages/dashboard.php");
    mysqli_close($connect);

  }
  else {
    header("LOCATION:../../pages/login.php?register$failCode");
    exit();
  }
}
 ?>