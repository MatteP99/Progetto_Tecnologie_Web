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
                    <div class="edit">
                        <button class="modifyItem">Modifica</button>
						<form action="delivery.php" method="post">
							<button class="delete" name="<?php echo $food["id_food"]."delete" ?>">Rimuovi</button>
						</form>
                    </div>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>        
        <li>
            <button id="vcart" class="fas fa-plus" aria-label="Aggiungi elemento"></button>
        </li>
    </ul>    
</section>
<section class="overlay">
    <div>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
        <h2>Aggiungi elemento</h2>
        <form action="#" method="POST">
            <ul>
                <li>
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" />
                </li>
                <li>
                    <label for="description">Descrizione:</label>
                    <textarea id="description" name="description"></textarea>
                </li>
                <li >
                    <label for="price">Prezzo:</label>
                    <input type="text" id="price" name="price" />
                </li>
                <li>
                    <label for="image">Immagine:</label>
                    <div>
                        <img src="dummy.png" alt="Immagine da caricare" />
                        <input type="file" id="image" name="image" />
                    </div>
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>
    </div>
</section>