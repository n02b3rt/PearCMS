<form action="../scripts/php/user_login.php" method="post" class="login">
    <span class="text-login">login</span>
    <div class="input__container">
        <input type="text" name="login" required />
        <label>Login</label>
    </div>
    <div class="input__container">
        <input type="password" name="password" required />
        <label>Hasło</label>
    </div>
    <button type="submit" class="btn btn--login">zaloguj</button>
    <span class="text-add"><a href="login.php?register" class="link">załóż konto!</a></span>
</form>