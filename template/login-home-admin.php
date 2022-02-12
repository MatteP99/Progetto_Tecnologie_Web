<h2>Bentornato, <?php echo $templateParams["user_data"][0]["username"] ?></h2>
<section id="not_list">
    <h2>Lista Notifiche</h2>
    <table>
        <thead>
            <tr>
                <th id="not_id">Id notifica</th>
				<th id="not_data">Dati</th>
				<th id="not_ls">Lista Ordine</th>
                <th id="not_desc">Descrizione</th>
				<th id="not_date">Data</th>
                <th id="not_state">Stato</th>
				<th id="not_action">Azione</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach($templateParams["admin_notify"] as $notify): ?>
			<tr>
				<td headers="not_id"><?php echo $notify["id_notify"]?></td>
				<?php if(isset($notify["id_order"])): ?>
					<?php foreach($templateParams["notify_data_order"] as $data): ?>
						<?php if($data["id_order"] == $notify["id_order"]): ?>
							<td headers="not_data">ID ORDINE: <?php echo $data["id_order"]."<br/>" ?>
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
							<td headers="not_ls">ID: <?php echo $food_data["id_food"]."<br/>" ?>
								NOME: <?php echo $food_data["name"]."<br/>" ?>
								QUANTITA': <?php echo $food_data["quantity"]."<br/>" ?>
							</td>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if(isset($notify["id_order"])): ?>
				<td headers="not_ls">
					<?php foreach($templateParams["notify_data_order_list"] as $list): ?>
						<?php if($list["id_order"] == $notify["id_order"]): ?>
							NOME CIBO: <?php echo $list["name"]."<br/>"?>
							QUANTITA': <?php echo $list["food_quantity"]?>
						<?php endif; ?>
					<?php endforeach; ?>
				</td>
				<?php else: ?>
					<td headers="not_ls">/</td>
				<?php endif; ?>
				<td headers="not_desc"><?php echo $notify["description"]?></td>
				<td headers="not_date"><?php echo $notify["data"]?></td>
				<td headers="not_state"><?php echo $notify["notify_state"]?></td>
                <td headers="not_action">
                    <form action="#" method="POST">
                    <?php if(isset($notify["id_food"])): ?>
                        <?php if($notify["notify_state"] != "Letto"): ?>
                            <input type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" />
                        <?php else: ?>
                            <input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Gia' letto" />
                        <?php endif; ?>
                    <?php elseif($notify["order_type"] == "Effettuato"): ?>
                        <?php foreach($templateParams["notify_data_order"] as $data): ?>
                            <?php if($data["id_order"] == $notify["id_order"] && $data["order_state"] == "Annullato dal cliente"): ?>
                                <?php if($notify["notify_state"] != "Letto"): ?>
                                    <input type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Conferma lettura" />
                                <?php else: ?>
                                    <input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm" value="Gia' letto" />
                                <?php endif; ?>
                            <?php elseif($data["id_order"] == $notify["id_order"] && $data["order_state"] != "Annullato dal cliente"): ?>
                                <?php if($notify["notify_state"] != "Letto"): ?>
                                    <input type="submit" name="<?php echo $notify["id_notify"]?>confirm_order" value="Conferma ordine" />
                                    <input type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" />
                                <?php else: ?>
                                    <?php if($data["order_state"] != "Inviato" && $data["order_state"] != "Annullato"): ?>
                                        <input type="submit" name="<?php echo $notify["id_notify"]?>send_order" value="Spedisci ordine" />
                                        <input type="submit" name="<?php echo $notify["id_notify"]?>cancel_order" value="Cancella ordine" />
                                    <?php elseif($data["order_state"] == "Inviato"): ?>
                                        <input disabled type="submit" name="<?php echo $notify["id_notify"]?>confim" value="Ordine gia' in viaggio" />
                                    <?php else: ?>
                                        <input disabled type="submit" name="<?php echo $notify["id_notify"]?>confim" value="Gia' letto" />
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>		
                    <?php elseif($notify["order_type"] == "Annullato"): ?>
                        <?php if($notify["notify_state"] != "Letto"): ?>
                            <input type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Conferma lettura" />
                        <?php else: ?>
                            <input disabled type="submit" name="<?php echo $notify["id_notify"]?>confirm_c_order" value="Gia' letto" />
                        <?php endif; ?>
                    <?php endif; ?>
                    </form>
                </td>
			</tr>
			<?php endforeach; ?>
        </tbody>
    </table>
</section>
<a href="logout.php">LogOut</a>