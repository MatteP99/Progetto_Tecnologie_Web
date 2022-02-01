<section class="delivery">
    <header>
        <h2>SCEGLI I TUOI PIATTI</h2>
        <p>Servizio online per ordinare i tuoi piatti. Ricordati che puoi decidere se venirli a prendere, oppure te li portiamo noi!</p>
    </header>
    <ul>
	    <?php foreach ($templateParams["type"] as $type):?>
        <li>
            <h3><?php echo $type["name"];?></h3>
            <ul>
            <?php foreach ($templateParams["food"] as $food):
            if($food["type_food"] == $type["id_type"]): ?>
                <li>
                <?php if($food["quantity"] > 0): ?>
                    <p class="itemId"><?php echo $food["id_food"] ?></p>
                    <img src="<?php echo UPLOAD_DIR.$food["img"];?>" alt="<?php echo $food["name"];?>" />
                    <h4><?php echo $food["name"]?></h4>
                    <h5>€ <?php echo $food["price"]?></h5>
                    <p><?php echo $food["description"]?></p>
                    <button class="addItemToCart">Aggiungi al Carrello</button>
                <?php else: ?>                    
                    <p class="itemId"><?php echo $food["id_food"] ?></p>
                    <img src="<?php echo UPLOAD_DIR.$food["img_out"];?>" alt="<?php echo $food["name"];?>" /><!--Immagine da cambiare-->
                    <h4><?php echo $food["name"]?></h4>
                    <h5>€ <?php echo $food["price"]?></h5>
                    <p><?php echo $food["description"]?></p>
                    <button class="blocked">Aggiungi al Carrello</button><!--Link da bloccare-->
                <?php endif; ?>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>
    </ul>    
    <button id="vcart" aria-label="Visualizza carrello" class="fas fa-shopping-cart"></button>
</section>
<section id="cart">
    <div>
        <button type="button" class="close">
            <span>&times;</span>
        </button>
        <h2>Carrello</h2>
        <table>
            <thead>
                <tr>
                    <th id="nome">Nome</th>
                    <th id="prezzo">Prezzo</th>
                    <th id="quantita">Quantità</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button>Acquista</button>
    </div>
</section>
