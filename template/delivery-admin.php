<section class="delivery">
    <header>
        <h2>Gestione delivery</h2>
    </header>
    <ul>
	    <?php foreach ($templateParams["type"] as $type):?>
        <li>
            <h3><?php echo $type["name"];?></h3>
            <ul>
            <?php foreach ($templateParams["food"] as $food):
            if($food["type_food"] == $type["id_type"]): ?>
                <li>
                    <p class="itemId"><?php echo $food["id_food"] ?></p>
                    <img src="<?php echo UPLOAD_DIR.$food["img"];?>" alt="<?php echo $food["name"];?>" />
                    <h4><?php echo $food["name"]?></h4>
                    <h5>€ <?php echo $food["price"]?></h5>
                    <p><?php echo $food["description"]?></p>
					<h6>Quantita': <?php echo $food["quantity"]?></h6>
                    <div class="edit">
						<button type="button" class="modifyItem" name="<?php echo $food["id_food"]."modify" ?>" id="<?php echo $food["id_food"]."modify" ?>">Modifica</button>
						<form action="#" method="post">
							<button type="submit" class="delete" name="<?php echo $food["id_food"]."delete" ?>" id="<?php echo $food["id_food"]."delete" ?>">Rimuovi</button>
						</form>
                    </div>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>        
        <li>
            <button type="button" class="fas fa-plus voverlay" aria-label="Aggiungi elemento"></button>
        </li>
    </ul>    
</section>
<section class="overlay">
    <div>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
        <h2>Aggiungi elemento</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
			<input type="text" id="m_id" name="m_id" value=""/>
            <ul>
                <li>
                    <label for="m_name">Nome:</label>
                    <input type="text" id="m_name" name="m_name" />
                </li>
                <li>
                    <label for="m_description">Descrizione:</label>
                    <textarea id="m_description" name="m_description"></textarea>
                </li>
                <li >
                    <label for="m_price">Prezzo:</label>
                    <input type="text" id="m_price" name="m_price" />
                </li>
				<li >
                    <label for="m_quantity">Disponibili:</label>
                    <input type="text" id="m_quantity" name="m_quantity" />
                </li>
				<li>
					<label for="m_type">Tipologia:</label>
					<select id="m_type" name="m_type">
						<?php foreach($templateParams["type"] as $type): ?>
						<option value="<?php echo $type["id_type"]?>"><?php echo $type["name"]?></option>
						<?php endforeach; ?>
					</select>
				</li>
                <li>
                    <label for="m_type">Immagine:</label>
                    <div>
                        <img src="dummy.png" alt="Immagine da caricare" />
                        <input type="file" id="m_image" name="m_image" />
                    </div>
                </li>
                <li>
                    <input type="submit" name="m_submit" id="m_submit" value="Invia" formmethod="post"/>
                </li>
            </ul>
        </form>
    </div>
</section>