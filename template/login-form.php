<form action="#" method="POST">
    <h2>Login</h2>
    <ul>
        <li>
			<?php if(isset($templateParams["errorlogin"])): ?>
			<p><?php echo $templateParams["errorlogin"]; ?></p>
			<?php endif; ?>
            <fieldset>
                <input type="radio" id="login" name="accesso" value="Login" checked>
                <label for="login">Login</label>
                <input type="radio" id="registrazione" name="accesso" value="Registrazione">
                <label for="registrazione">Registrazione</label>
            </fieldset>
        </li>
        <li>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
        </li>
        <li class="signup">
            <label for="mail">Mail:</label>
            <em class="fas" aria-label="Icona di verifica"></em>
            <input type="email" id="mail" name="mail" />
        </li>
        <li class="signup">
            <label for="mail_conf">Conferma email:</label>
            <em class="fas" aria-label="Icona di verifica"></em>
            <input type="email" id="mail_conf" name="mail_conf" />
        </li>
        <li>
            <label for="password">Password:</label>
            <em class="fas" aria-label="Icona di verifica"></em>
            <input type="password" id="password" name="password" required />
        </li>
        <li class="signup">
            <label for="password_conf">Conferma password:</label>
            <em class="fas" aria-label="Icona di verifica"></em>
            <input type="password" id="password_conf" name="password_conf" />
        </li>
        <li>
            <input type="submit" name="submit" value="Invia" />
        </li>
    </ul>
</form>