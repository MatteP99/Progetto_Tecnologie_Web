<h2>Bentornato, <?php echo $templateParams["user_data"][0]["username"] ?></h2>
<section id="not_list">
    <h2>Lista Notifiche</h2>
    <table>
        <thead>
            <tr>
                <th id="ord_num">Id notifica</th>
				<th id="ord_user">Dati</th>
				<th id="ord_desc">Lista Ordine</th>
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
				<?php if(isset($notify["id_order"])): ?>
					<?php foreach($templateParams["notify_data_order"] as $data): ?>
						<?php if($data["id_order"] == $notify["id_order"]): ?>
							<td>ID ORDINE: <?php echo $data["id_order"]."<br/>" ?>
								STATO DELL'ORDINE: <?php echo $data["order_state"]."<br/>"."<br/>" ?>
								ID UTENTE: <?php echo $data["id_user"]."<br/>" ?>
								USERNAME: <?php echo $data["username"]."<br/>" ?>
								TEL: <?php echo $data["phone_num"]."<br/>" ?>
								<?php if($data["id_uni"] == 1): ?>
								INDIRIZZO: <?php echo $data["address"]."<br/>" ?>
								<?php else: ?>
								INDIRIZZO: <?php echo $data["uni_address"]."<br/>" ?>
								<?php endif; ?>
							</td>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php else: ?>
					<?php foreach($templateParams["notify_data_food"] as $food_data): ?>
						<?php if($food_data["id_food"] == $notify["id_food"]): ?>
							<td>ID: <?php echo $food_data["id_food"]."<br/>" ?>
								NOME: <?php echo $food_data["name"]."<br/>" ?>
								QUANTITA': <?php echo $food_data["quantity"]."<br/>" ?>
							</td>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if(isset($notify["id_order"])): ?>
				<td>
					<?php foreach($templateParams["notify_data_order_list"] as $list): ?>
						<?php if($list["id_order"] == $notify["id_order"]): ?>
							NOME CIBO: <?php echo $list["name"]."<br/>"?>
							QUANTITA': <?php echo $list["food_quantity"]?>
						<?php endif; ?>
					<?php endforeach; ?>
				</td>
				<?php else: ?>
					<td>/</td>
				<?php endif; ?>
				<td><?php echo $notify["description"]?></td>
				<td><?php echo $notify["data"]?></td>
				<td><?php echo $notify["notify_state"]?></td>
				<?php if(isset($notify["id_food"])): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
							<form action="#" method="POST">
								<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" /></td>
							</form>
						<?php else: ?>
							<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Gia' letto" /></td>
						<?php endif; ?>
				<?php elseif($notify["order_type"] == "Effettuato"): ?>
						<?php foreach($templateParams["notify_data_order"] as $data): ?>
								<?php if($data["id_order"] == $notify["id_order"] && $data["order_state"] == "Annullato dal cliente"): ?>
									<?php if($notify["notify_state"] != "Letto"): ?>
									<form action="#" method="POST">
										<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" /></td>
									</form>
									<?php else: ?>
										<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Gia' letto" /></td>
									<?php endif; ?>
								<?php elseif($data["id_order"] == $notify["id_order"] && $data["order_state"] != "Annullato dal cliente"): ?>
									<?php if($notify["notify_state"] != "Letto"): ?>
									<form action="#" method="POST">
										<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm_order" value="Conferma ordine" />
											<input type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" /></td>
									</form>
									<?php else: ?>
										<?php if($data["order_state"] != "Inviato" && $data["order_state"] != "Annullato"): ?>
										<form action="#" method="POST">
											<td><input type="submit" name="<?php echo $notify["id_notify"]?>send_order" value="Spedisci ordine" />
												<input type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" /></td>
										</form>
										<?php elseif($data["order_state"] == "Inviato"): ?>
											<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confim" value="Ordine gia' in viaggio" /></td>
										<?php else: ?>
											<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confim" value="Gia' letto" /></td>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif; ?>
						<?php endforeach; ?>
				<?php elseif($notify["order_type"] == "Annullato"): ?>
						<?php if($notify["notify_state"] != "Letto"): ?>
							<form action="#" method="POST">
								<td><input type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Conferma lettura" /></td>
							</form>
						<?php else: ?>
							<td><input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Gia' letto" /></td>
						<?php endif; ?>
				<?php endif; ?>
			</tr>
			<?php endforeach; ?>
        </tbody>
    </table>
</section>
<a href="logout.php">LogOut</a>