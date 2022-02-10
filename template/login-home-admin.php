<section id="p_data">
    <h2>Ciao, <?php echo $templateParams["user_data"][0]["username"] ?></h2>
</section>
<section id="orders">
    <h2>Lista Notifiche</h2>
    <table>
        <thead>
            <tr>
                <th id="ord_num">Id notifica</th>
                <th id="ord_desc">Descrizione</th>
				<th id="ord_date">Data</th>
                <th id="ord_state">Stato</th>
				<th id="ord_action">Azione</th>
            </tr>
			<?php foreach($templateParams["admin_notify"] as $notify): ?>
			<tr>
				<th><?php echo $notify["id_notify"]?></th>
				<th><?php echo $notify["description"]?></th>
				<th><?php echo $notify["data"]?></th>
				<th><?php echo $notify["notify_state"]?></th>
				<?php if(isset($notify["id_food"])): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
							<form action="#" method="POST">
								<th><input type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" /></th>
							</form>
						<?php else: ?>
						<th><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" /></th>
						<?php endif; ?>
				<?php elseif($notify["order_type"] == "Effettuato"): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
						<form action="#" method="POST">
							<th><input type="submit" name="<?php echo $notify["id_notify"]?>confirm_order" value="Conferma ordine" />
							<input type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" /></th>
						</form>
						<?php else: ?>
						<th><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm_order" value="Conferma ordine" />
							<input disabled type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" /></th>
						<?php endif; ?>
				<?php elseif($notify["order_type"] == "Annullato"): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
						<form action="#" method="POST">
							<th><input type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Conferma lettura" /></th>
						</form>
						<?php else: ?>
						<th><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Conferma lettura" /></th>
						<?php endif; ?>
				<?php endif; ?>
			</tr>
			<?php endforeach; ?>
        </thead>
        <tbody>
        </tbody>
    </table>
</section>
<a href="logout.php">LogOut</a>