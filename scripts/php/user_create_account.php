<?php 
if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword'])){
  
  // sprawdzamy czy hasło równa się powtórz hasło ponieważ są takie 2 inputy aby ktoś nie pomylił się w haśle
  if($_POST['password'] == $_POST['repassword']){
    $login = $_POST['login'];
    $pass = hash('sha256',$_POST['password']);

 $connect = mysqli_connect('localhost', 'root', '', 'cms');
 if(!$connect){
  echo "Brak połączenia z baza";
  exit();
  header("LOCATION:../../pages/login.php");
 }

  $query = "INSERT INTO users( login, haslo, user) VALUES ('$login', '$pass','user')";
  $result = mysqli_query($connect,$query);
  
    if(!$result){
      echo "Dodawanie użytkownika zakończone niepowodzeniem";
      exit();
      header("LOCATION:../../pages/login.php");
    }
    header("LOCATION:../../pages/dashboard.php");
    mysqli_close($connect);
  }
else{
  // tutaj działa jeżeli hasła podczas rejestracji nie są równe
  header("LOCATION:../../pages/login.php?register=fail");
}

}



?>