<section class="payment">
    <h2>Conclusione ordine</h2>    
    <form action="#" method="POST" name="pagamento">
        <fieldset>
            <legend>Indirizzo di spedizione</legend>
            <ul>
                <li>
                    <label for="nome">Nome:</label>
                    <input required type="text" id="nome" name="nome"/>
                </li>
                <li>
                    <label for="cognome">Cognome:</label>
                    <input required type="text" id="cognome" name="cognome"/>
                </li>
                <li>  
                    <label for="indirizzo">Indirizzo:</label>
                    <input required type="text" id="indirizzo" name="indirizzo" placeholder="Via, civico"/>
                </li>
                <li>                 
                    <label for="città">Città:</label>
                    <input required type="text" id="città" name="città" />
                </li>
                <li>
                    <label for="provincia">Provincia:</label>
                    <input required type="text" id="provincia" pattern="[A-Z]{2}" name="provincia" maxlength="2" placeholder="XX"/>
                </li>
                <li>                
                    <label for="cap">CAP:</label>
                    <input required id="cap" type="tel" pattern="[0-9]{5}" maxlength="5" placeholder="xxxxx" name="cap"/>
                </li>
            <ul> 
        </fieldset>
        <fieldset>
            <legend>Carta di credito o prepagata</legend>
            <ul>
                <li>
                    <label for="nomeCarta">intestatario della carta:</label>
                    <input required type="text" id="nomeCarta" name="nomeCarta"/>
                </li>
                <li>
                    <label for="numeroCarta">Numero carta:</label>
                    <input required id="numeroCarta" type="tel" pattern="[0-9\s]{19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"/>
                </li>
                <li>                
                    <label for="scadenza">Scadenza:</label>
                    <input required type="date" id="scadenza" name="scadenza"/>
                </li>
                <li>                
                    <label for="CVV">CVV:</label>
                    <input required id="CVV" type="tel"  pattern="[0-9]{3}" maxlength="3" placeholder="xxx"/>
                </li>
            <ul> 
        </fieldset>
        <input type="submit" name="submit" value="Acquista"/>
    </form>    
</section>