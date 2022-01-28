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
                    <img src="<?php echo UPLOAD_DIR.$food["img"];?>" alt="<?php echo $food["name"];?>" />
                    <h4><?php echo $food["name"]?>
                    <h5>€ <?php echo $food["price"]?></h3>
                    <p><?php echo $food["description"]?></p>
                    <button>Aggiungi al Carrello</button>
                    </div>
                <?php else: ?>
                    <img src="<?php echo UPLOAD_DIR.$food["img_out"];?>" alt="<?php echo $food["name"];?>" /><!--Immagine da cambiare-->
                    <h4><?php echo $food["name"]?></h4>
                    <h5>€ <?php echo $food["price"]?></h5>
                    <p><?php echo $food["description"]?></p>
                    <button>Aggiungi al Carrello</button><!--Link da bloccare-->
                <?php endif; ?>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>
        <li>
            <button id="vcart">Visualizza carrello</button>
        </li>
    </ul>    
</section>
<section id="cart">    
        <button type="button" class="close">
            <span>&times;</span>
        </button>
<section>
