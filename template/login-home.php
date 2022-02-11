<section id="p_data">
    <h2>Ciao, <?php echo $templateParams["user_data"][0]["username"] ?></h2>
    <form action="#" method="POST">
        <ul>
            <li>
                <label for="a_data">Vuoi modificare i tuoi dati?</label>
                <input type="checkbox" id="a_data" name="a_data"/>
            </li>
            <li class="signup">
                <label for="a_password">Nuova Password:</label>
                <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
                <input type="password" class="toBeChecked pass" id="a_password" name="a_password" required />
            </li>
            <li class="signup">
                <label for="a_password_conf">Conferma password:</label>
                <em class="fas" aria-label="Icona di controllo: requisiti non soddisfatti"></em>
                <input type="password" class="toBeChecked check_pass" id="a_password_conf" name="a_password_conf" />
            </li>        
            <li class="signup">
                <label for="a_tel">Numero di telefono:</label>
                <em class="fas fa-check" aria-label="Icona di controllo: requisiti soddisfatti"></em>
                <input type="tel" class="toBeChecked valid tel" id="a_tel" name="a_tel" value="<?php echo $templateParams["user_data"][0]["phone_num"] ?>"/>
            </li>
            <li class="signup">
                <label for="a_address">Indirizzo completo:</label>
                <input type="text" id="a_address" name="a_address" value="<?php echo $templateParams["user_data"][0]["address"] ?>" />
            </li>
            <li class="signup">
                <input type="submit" name="m_submit" value="Invia" />
            </li>
        </ul>
    </form>
</section>
<section id="orders">
    <h2>Riepilogo ordini</h2>
    <table>
        <thead>
            <tr>
                <th id="ord_num">Ordine numero</th>
                <th id="ord_itms">Cibi acquistati</th>
                <th id="ord_price">Prezzo totale</th>
                <th id="ord_stat">Stato dell'ordine</th>
				<th id="ord_date">Data ordine</th>
				<th id="ord_gest">Gestione ordine</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($templateParams["user_orders"] as $orders): ?>
            <tr>
                <td headers="ord_num"><?php echo $orders["id_order"]?></td>
                <td headers="ord_itms"><?php foreach($templateParams["user_orders_list"] as $list): 
                            if($list["id_order"] == $orders["id_order"]):
                            echo $list["name"]." x".$list["food_quantity"]."<br/>";
                            endif;
                            endforeach; ?></td>
                <td headers="ord_price"><?php echo $orders["food_total_price"]?></td>
                <td headers="ord_stat"><?php echo $orders["order_state"]?></td>
                <td headers="ord_date"><?php echo $orders["data"]?></td>
                <td headers="ord_gest">
                    <form action="#" method="POST">
                        <?php if($orders["order_state"] == "In stato di conferma" || $orders["order_state"] == "Confermato"): ?>
                        <input type="submit" name="<?php echo $orders["id_order"]?>cancel" value="Cancella ordine" />
                        <?php elseif($orders["order_state"] == "Annullato dal cliente"): ?>
                        <input disabled type="submit" name="<?php echo $orders["id_order"]?>cancel" value="Ordine gia' cancellato." />
						<?php elseif($orders["order_state"] == "Annullato"): ?>
                        <input disabled type="submit" name="<?php echo $orders["id_order"]?>cancel" value="Ordine annullato dal ristorante." />
						<?php else: ?>
						<input disabled type="submit" name="<?php echo $orders["id_order"]?>cancel" value="Non e' possibile annullare l'ordine ora." />
                        <?php endif; ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<a href="logout.php">LogOut</a>