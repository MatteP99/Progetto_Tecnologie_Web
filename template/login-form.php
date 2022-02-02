<form action="#" method="POST">
    <h2>Login</h2>
    <ul>
        <li>
            <input type="radio" id="login" name="accesso" value="Login" checked>
            <label for="login">Login</label>
            <input type="radio" id="registrazione" name="accesso" value="Registrazione">
            <label for="registrazione">Registrazione</label>
        </li>
        <li>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
        </li>
        <li class="signup">
            <label for="mail">Mail:</label>
            <input type="email" id="mail" name="mail" />
        </li>
        <li class="signup">
            <label for="mail_conf">Conferma email:</label>
            <input type="email" id="mail_conf" name="mail_conf" />
        </li>
        <li>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
        </li>
        <li class="signup">
            <label for="password_conf">Conferma password:</label>
            <input type="password" id="password_conf" name="password_conf" />
        </li>
        <li>
            <input type="submit" name="submit" value="Invia" />
        </li>
    </ul>
</form>