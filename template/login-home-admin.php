<section id="p_data">
    <h2>Salve, amministratore</h2>
    <form action="#" method="POST">
        <ul>
            <li>
                <label for="a_data">Vuoi la password da amministratore?</label>
                <input type="checkbox" id="a_data" name="a_data"/>
            </li>
            <li class="signup">
                <label for="a_password">Nuova Password:</label>
                <em class="fas" aria-label="Icona di verifica"></em>
                <input type="password" class="toBeChecked pass" id="a_password" name="a_password" required />
            </li>
            <li class="signup">
                <label for="a_password_conf">Conferma password:</label>
                <em class="fas" aria-label="Icona di verifica"></em>
                <input type="password" class="toBeChecked check_pass" id="a_password_conf" name="a_password_conf" />
            </li>        
            <li class="signup">
                <input type="submit" name="m_submit" value="Invia" />
            </li>
        </ul>
    </form>
</section>
<section id="not_tab">
    <h2>Notifiche</h2>
    <table>
        <thead>
            <tr>
                <th id="not_type">Tipo notifica</th>
                <th id="not_desc">Descrizione</th>
                <th id="not_stat">Stato</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</section>
<a href="logout.php">LogOut</a>