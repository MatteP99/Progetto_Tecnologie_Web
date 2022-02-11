<section class="payment">
    <h2>Conclusione ordine</h2>    
    <form action="#" method="POST" name="pagamento">
        <fieldset>
			<legend>Indirizzo di spedizione</legend>
			<?php if(isset($templateParams["user_logged"])): 
					foreach($templateParams["user_data"] as $user): ?>
					<ul>
						<li>
							<label for="nome">Nome e Cognome:</label>
							<input required type="text" id="nome" name="nome" value="<?php echo $user["name"]?> "/>
						</li>
						<?php if(!isset($templateParams["user_university"])): ?>
						<li>  
							<label for="indirizzo">Indirizzo:</label>
							<input required type="text" id="indirizzo" name="indirizzo" placeholder="Via, civico" value="<?php echo $user["address"]?>" />
						</li>
						<?php else: ?>
						<li>  
							<label for="indirizzo">Indirizzo universitario:</label>
							<input disabled required type="text" id="indirizzo" name="indirizzo" placeholder="Via, civico" value="<?php echo $templateParams["user_university"][0]["uni_address"]?>" />
						</li>
						<?php endif; ?>
						<li>                 
							<label for="numero">Numero:</label>
							<input required type="text" id="numero" name="numero" value="<?php echo $user["phone_num"]?>" />
						</li>
						<li>                 
							<label for="mail">Mail Personale:</label>
							<input required type="text" id="mail" name="mail" value="<?php echo $user["email"]?> " />
						</li>
					</ul> 
					<?php endforeach;
			else: ?>
					<ul>
						<li>
							<label for="nome">Nome e Cognome:</label>
							<input required type="text" id="nome" name="nome" />
						</li>
						<li>  
							<label for="indirizzo">Indirizzo:</label>
							<input required type="text" id="indirizzo" name="indirizzo" placeholder="Via, civico" />
						</li>
						<li>                 
							<label for="numero">Numero:</label>
							<input required type="text" id="numero" name="numero" />
						</li>
						<li>                 
							<label for="mail">Mail Personale:</label>
							<input required type="text" id="mail" name="mail" />
						</li>
					</ul> 
			<?php endif; ?>
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
            </ul> 
        </fieldset>
        <input type="submit" name="submit" value="Acquista"/>
    </form>    
</section>