<?php
    if(isset($_GET['register'])){
        // echo $_GET['register'];
        // echo $_GET['login'];
        echo '<script>
        const input = document.querySelectorAll(".input__container");
        let element = "";
        </script>';

        // hasła podane przy rejestracji są różne 
        if(isset($_GET['password']) && $_GET['password'] == 'fail'){
            //<div class='err__register'><p>Podane hasła są różne</p></div>
            echo '<script>
            element = `<div class="err__register"><p>Podane hasła są różne</p></div>`
            input[1].innerHTML += element;
            input[1].classList.add("err");
            input[2].classList.add("err");
            </script>';
        }

        if(isset($_GET['password']) && $_GET['password'] == 'lowquality'){
            //<div class='err__register'><p>Podane hasła są różne</p></div>
            echo '<script>
            element = `<div class="err__register"><p>
            Hasło powinno zawierać minimum 8 znaków: duże litery, małe litery i cyfry
            </p></div>`
            input[1].innerHTML += element;
            input[1].classList.add("err");
            input[2].classList.add("err");
            </script>';
        }

        // podany login jest zły mają być male litery cyfry opcjonalnie "_" lub "-"
        if(isset($_GET['login']) && $_GET['login'] == 'fail'){
            echo '<script>
            element = `<div class="err__register "><p>Login może zawierac jedynie: małe litery, cyfery oraz znaki "-" i "_" i maksymalnie 20 znaków </p></div>`
            input[0].innerHTML += element;
            input[0].classList.add("err");
            </script>';
        }

        // nie ma połączenia z baza!
        if(isset($_GET['baseconnect']) && $_GET['baseconnect'] == 'fail'){

        }
    }

    if(isset($_GET['user']) && $_GET['user'] == 'not-found'){
        
        echo '<script>
        const input = document.querySelectorAll(".input__container");
        let element = `<div class="err__register "><p>Błędne dane logowania</p></div>`
        input[0].innerHTML += element;
        input[0].classList.add("err");
        input[1].classList.add("err");
        </script>';
    }
    ?>