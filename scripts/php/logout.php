<?php
session_start();
if(isset($_SESSION['login'])){
    session_destroy();
    session_unset();
    header('LOCATION:../../');
}
else header('LOCATION:../../');
?>