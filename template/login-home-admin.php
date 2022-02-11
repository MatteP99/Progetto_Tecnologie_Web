<h2>Bentornato, <?php echo $templateParams["user_data"][0]["username"] ?></h2>
<section id="not_list">
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
        </thead>
        <tbody>
			<?php foreach($templateParams["admin_notify"] as $notify): ?>
			<tr>
				<td><?php echo $notify["id_notify"]?></td>
				<td><?php echo $notify["description"]?></td>
				<td><?php echo $notify["data"]?></td>
				<td><?php echo $notify["notify_state"]?></td>
				<?php if(isset($notify["id_food"])): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
							<form action="#" metdod="POST">
								<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" /></td>
							</form>
						<?php else: ?>
						<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" /></td>
						<?php endif; ?>
				<?php elseif($notify["order_type"] == "Effettuato"): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
						<form action="#" metdod="POST">
							<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm_order" value="Conferma ordine" />
							<input type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" /></td>
						</form>
						<?php else: ?>
						<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm_order" value="Conferma ordine" />
							<input disabled type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" /></td>
						<?php endif; ?>
				<?php elseif($notify["order_type"] == "Annullato"): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
						<form action="#" metdod="POST">
							<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Conferma lettura" /></td>
						</form>
						<?php else: ?>
						<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Conferma lettura" /></td>
						<?php endif; ?>
				<?php endif; ?>
			</tr>
			<?php endforeach; ?>
        </tbody>
    </table>
</section>
<a href="logout.php">LogOut</a>