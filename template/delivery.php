<section class="delivery">
    <header>
        <h2>SCEGLI I TUOI PIATTI</h2>
        <p>Servizio online per ordinare i tuoi piatti. Ricordati che gli ordini non possono essere modificati! Se sei intollerante o allergico a qualcosa, ordina chiamandoci al numero: 331-7848795</p>
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
                <?php if($food["quantity"] > 0): ?>
                    <p class="itemQuantity"> <?php echo $food["quantity"]?></p>
                    <img src="<?php echo UPLOAD_DIR.$food["img"];?>" alt="<?php echo $food["name"];?>" />
                    <h4><?php echo $food["name"]?></h4>
                    <h5>€ <?php echo $food["price"]?></h5>
                    <p><?php echo $food["description"]?></p>
                    <button class="addItemToCart">Aggiungi al Carrello</button>
                <?php else: ?>
                    <img src="upload/out_of_stock.jpg" alt="<?php echo $food["name"]."non disponibile";?>" />
                    <h4><?php echo $food["name"]?></h4>
                    <h5>€ <?php echo $food["price"]?></h5>
                    <p><?php echo $food["description"]?></p>
                    <button disabled>Aggiungi al Carrello</button>
                <?php endif; ?>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>
        <li>
            <button class="fas fa-shopping-cart voverlay" aria-label="visualizza carrello"></button>
        </li>
    </ul>    
</section>
<section class="overlay">
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
            <tfoot>
                <tr><td colspan="3" ></td></tr>
            </tfoot>
        </table>
        <a <?php isActive("payment.php");?> href="payment.php">Acquista</a>
    </div>
</section>
