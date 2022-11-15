<?php 
/*TODO
  zrobić to na funkcjach
  tak aby każde zwracało true/false 
  na podstawie tego zrobić wyświetlanie tego przy pomocy GET
  typu:
    register=fail&&login=fail
  no i to wyświetlać bedzie style

  - zrobić sprawdzenie czy gość o takim nicku czasami już nie istnieje
 */


if(!preg_match("/^[a-z0-9_-]*$/", $_POST['login'])){
 header('LOCATION:../../pages/login.php?register=faillogin');
  exit();
}

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword'])){
  
  // sprawdzamy czy hasło równa się powtórz hasło ponieważ są takie 2 inputy aby ktoś nie pomylił się w haśle
  if($_POST['password'] == $_POST['repassword']){
    $login = $_POST['login'];
    $pass = hash('sha256',$_POST['password']);

 $connect = mysqli_connect('localhost', 'root', '', 'cms');
 if(!$connect){
  // Brak połączenia z baza
  exit();
  header("LOCATION:../../pages/login.php?register=failbaseconnect");
 }

  $query = "INSERT INTO users( login, haslo, user) VALUES ('$login', '$pass','user')";
  $result = mysqli_query($connect,$query);
  
    if(!$result){
      // Dodawanie użytkownika zakończone niepowodzeniem
      exit();
      header("LOCATION:../../pages/login.php?register=failquery");
    }
    
    session_start();
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $pass;
      $_SESSION['permission'] = "user";
    header("LOCATION:../../pages/dashboard.php");
    mysqli_close($connect);
  }
else{
  // tutaj działa jeżeli hasła podczas rejestracji nie są równe
  header("LOCATION:../../pages/login.php?register=fail");
}

}



?>