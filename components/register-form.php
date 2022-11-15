<form action="../scripts/php/user_create_account.php" method="post" class="login">
    <span class="text-login">Rejestracja</span>
    <div class="input__container">
        <input type="text" name='login' required />
        <label>Login</label>
    </div>
    <div class="input__container">
        <input type="password" name= 'password' required />
        <label for='password'>Password</label>
    </div>
    <div class="input__container">
        <input type="password" name='repassword'  required />
        <label for='repassword'>Repassword</label>
    </div>
    <button type="submit" class="btn btn--login">Załóż</button>
    <span class="text-add"><a href="login.php" class="link">zaloguj się!</a></span>
</form>
