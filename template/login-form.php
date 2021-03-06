<form action="#" method="POST" class="login">
    <h2>Login</h2>
    <strong class="signup">Attenzione: i campi con la X non sono corretti!</strong>
    <ul>
        <li>
			<?php if(isset($templateParams["error_login"])): ?>
			<p><?php echo $templateParams["error_login"]; ?></p>
			<?php elseif(isset($templateParams["error_registration_name"])): ?>
			<p><?php echo $templateParams["error_registration_name"]; ?></p>
			<?php elseif(isset($templateParams["error_registration_mail"])): ?>
			<p><?php echo $templateParams["error_registration_mail"]; ?></p>
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
            <input type="text" id="username" name="username" autocomplete="username" required />
        </li>
        <li class="signup">
            <label for="name">Nome completo:</label>
            <input type="text" id="name" name="name" placeholder="Nome Cognome"/>
        </li>
        <li class="signup">
            <label for="mail">Mail:</label>
            <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
            <input type="email" class="toBeChecked" id="mail" name="mail" />
        </li>
        <li class="signup">
            <label for="mail_conf">Conferma email:</label>
            <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
            <input type="email" class="toBeChecked" id="mail_conf" name="mail_conf" />
        </li>
        <li>
            <label for="password">Password:</label>
            <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
            <input type="password" autocomplete="new-password" class="toBeChecked" id="password" name="password" required />
        </li>
        <li class="signup">
            <label for="password_conf">Conferma password:</label>
            <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
            <input type="password" class="toBeChecked" autocomplete="new-password" id="password_conf" name="password_conf" />
        </li>        
        <li class="signup">
            <label for="tel">Numero di telefono:</label>
            <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
            <input type="tel" class="toBeChecked tel" maxlength="10" id="tel" name="tel" />
        </li>
        <li class="signup">
            <label for="address">Indirizzo fatturazione:</label>
            <input type="text" id="address" name="address" placeholder="Via civico, CAP, Comune, Provincia" />
        </li>
    </ul>
    <fieldset class="signup">
        <ul>
            <li>
                <label for="student">Sei uno studente?</label>
                <input type="checkbox" id="student" name="student"/>
            </li>
			<li>
				<p>NOTA!! Se sei uno studente di una delle seguenti facolta', avrai diritto ad uno sconto del 20% per ogni ordine, ma non potrai cambiare l'indirizzo di spedizione!</p>
			</li>
            <li>
                <label for="unimail">Mail universit??:</label>
                <input type="email" id="unimail" name="unimail"/>
            </li>
            <li>
                <label for="campus">Sede:</label>
                <select id="campus" name="campus">
					<?php foreach($templateParams["university"] as $university): ?>
                    <option value="<?php echo $university["id_uni"]."uni"?>"><?php echo $university["name"]?></option>
					<?php endforeach; ?>
                </select>
            </li>
        </ul>
    </fieldset>
    <input type="submit" name="submit" value="Invia" />
</form>