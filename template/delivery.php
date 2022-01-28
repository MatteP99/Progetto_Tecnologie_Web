<section>
    <header>
        <h2>SCEGLI I TUOI PIATTI</h2>
        <p>Servizio online per ordinare i tuoi piatti. Ricordati che puoi decidere se venirli a prendere, oppure te li portiamo noi!</p>
    </header>
	<?php foreach ($templateParams["type"] as $type):?>
			<div>
				<h3><?php $type["name"] ?></h3><!--Bottone categoria-->
			</div>
			<?php foreach ($templateParams["food"] as $food):
				if($food["type_food"] == $type["id_type"]): ?>
					<?php if($food["quantity"] > 0): ?>
						<div>
							<img src="<?php echo UPLOAD_DIR.$food["img"];?>" alt="<?php echo $food["name"];?>" />
						</div>
						<div>
							<h3><?php $food["name"]?></h3>
						</div>
						<div>
							<h3><?php $food["price"]?></h3>
						</div>
						<div>
							<h3><?php $food["description"]?></h3>
						</div>
						<div>
							<h3>Aggiungi al Carrello</h3>
						</div>
					<?php else: ?>
						<div>
							<img src="<?php echo UPLOAD_DIR.$food["img_out"];?>" alt="<?php echo $food["name"];?>" /><!--Immagine da cambiare-->
						</div>
						<div>
							<h3><?php $food["name"]?></h3>
						</div>
						<div>
							<h3><?php $food["price"]?></h3>
						</div>
						<div>
							<h3><?php $food["description"]?></h3>
						</div>
						<div>
							<h3>Aggiungi al Carrello</h3><!--Link da bloccare-->
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>
	<?php endforeach; ?>
</section>