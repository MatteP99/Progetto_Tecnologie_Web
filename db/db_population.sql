-- File db population

-- Population table Types
-- Types food
INSERT INTO types VALUES (1, 'Antipasti');
INSERT INTO types VALUES (2, 'Primi');
INSERT INTO types VALUES (3, 'Secondi');
INSERT INTO types VALUES (4, 'Panini');
INSERT INTO types VALUES (5, 'Piadine');
INSERT INTO types VALUES (6, 'Pizze');
INSERT INTO types VALUES (7, 'Dolci');
INSERT INTO types VALUES (8, 'Bevande Analcoliche');
INSERT INTO types VALUES (9, 'Bevande Alcoliche');

-- Population table food
-- Antipasti
INSERT INTO food VALUES (1, 'Insalata Mista', 'Insalata di lattuga fresca, sedano, finocchio, carote tagliate a fettine, olio, sale e aceto.', 4.00, 'antipasti/insalata_mista.jpg', 1, 50);
INSERT INTO food VALUES (2, 'Tagliere Misto', 'Salame DOP IGP di Modena, Prosciutto di Parma, Coppa, Tacchino e Prosciutto Cotto.', 7.20, 'antipasti/tagliere_misto.jpg', 1, 50);
INSERT INTO food VALUES (3, 'Patatine', 'Patate con buccia cotte al forno.', 3.00, 'antipasti/patatine.jpg', 1, 50);
INSERT INTO food VALUES (4, 'Gratinati di Verdure', 'Gratinati di pomodoro, melanzane, peperone e cipolla.', 5.50, 'antipasti/gratinati_verdure.jpg', 1, 50);
INSERT INTO food VALUES (5, 'Caprese', 'Mozzarella fior di latte, olio, basilico, pomodoro e sale.', 6.70, 'antipasti/caprese.jpg', 1, 50);
INSERT INTO food VALUES (6, 'Verdure Cotte', 'Radicchio, peperoni, carote e zucchine cotte.', 5.10, 'antipasti/verdure_cotte.jpg', 1, 50);
-- Primi
INSERT INTO food VALUES (7, 'Penne al pomodoro', 'Penne grano duro, olio, basilico e pomodoro fresco.', 4.00, 'primi/pasta_pomodoro.jpg', 2, 50);
INSERT INTO food VALUES (8, 'Penne in bianco', 'Penne grano duro, olio e burro.', 3.50, 'primi/pasta_bianco.jpg', 2, 50);
INSERT INTO food VALUES (9, 'Riso allo zafferano', 'Riso e spezia zafferano.', 5.00, 'primi/riso_zafferano.jpg', 2, 50);
INSERT INTO food VALUES (10, 'Riso con verdure fresche', 'Riso bianco, sedano, carote, finocchio e fagioli.', 5.30, 'primi/riso_verdure.jpg', 2, 50);
INSERT INTO food VALUES (11, 'Tagliatelle al ragu\'', 'Tagliatelle grano duro, pomodoro, carote, carne di manzo, pizzico di vino bianco e sedano.', 6.10, 'primi/pasta_ragu.jpg', 2, 50);
INSERT INTO food VALUES (12, 'Spaghetti alla carbonara', 'Spaghetti grano duro, uova, sale, pepe e guanciale.', 6.50, 'primi/pasta_carbonara.jpg', 2, 50);
-- Secondi
INSERT INTO food VALUES (13, 'Parmigiana', 'Melanzane, pomodoro, mozzarella, sale, olio e basilico.', 7.00, 'secondi/parmigiana.jpg', 3, 50);
INSERT INTO food VALUES (14, 'Cotoletta di pollo alla milanese', 'Carne di pollo, sale e pepe, impanata e fritta nell\' di arachidi.', 7.50, 'secondi/cotoletta.jpg', 3, 50);
INSERT INTO food VALUES (15, 'Costina di manzo', 'Carne di manzo, accompagnata dalla nostra slasina di: olio, sale, pepe, origano e BBQ.', 8.60, 'secondi/costina.jpg', 3, 50);
INSERT INTO food VALUES (16, 'Salciccia di maiale', 'Carne di maiale salata e pepata, accompagnato da una salsina di pure\'.', 6.70, 'secondi/salciccia.jpg', 3, 50);
INSERT INTO food VALUES (17, 'Pure\' di patate con funghi porcini', 'Pure\' di patate accompagnato da funghi porcini freschi.', 5.90, 'secondi/pure.jpg', 3, 50);
INSERT INTO food VALUES (18, 'Vitello tonnato', 'Carne di vitello, immerso in una salsina di tonno e asparagi.', 6.00, 'secondi/vitello.jpg', 3, 50);
-- Panini
INSERT INTO food VALUES (19, 'Hamburger', 'Pane con semi di sesamo, carne bovina 150g, insalata, pomodoro e ketchup.', 4.00, 'panini/normale.jpg', 4, 50);
INSERT INTO food VALUES (20, 'Baconburger', 'Pane con semi di sesamo, carne bovina 150g, insalata, pomodoro, bacon e ketchup.', 5.00, 'panini/baconburger.jpg', 4, 50);
INSERT INTO food VALUES (21, 'Cheeseburger', 'Pane con semi di sesamo, carne bovina 150g, insalata, pomodoro, bacon, sottiletta e ketchup.', 5.50, 'panini/cheeseburger.jpg', 4, 50);
INSERT INTO food VALUES (22, 'Little boy', 'Pane con semi di sesamo, carne bovina 150g, insalata, pomodoro, bacon, sottiletta, cipolla rossa di tropea e ketchup.', 6.50, 'panini/little_boy.jpg', 4, 50);
INSERT INTO food VALUES (23, 'Alabama', 'Pane con semi di sesamo, carne bovina 150g, insalata, pomodoro, bacon, cipolla cotta su piastra, BBQ e ketchup.', 8.00, 'panini/alabama.jpg', 4, 50);
INSERT INTO food VALUES (24, 'Emiliano', 'Pane con semi di sesamo, carne bovina 150g, insalata, pomodoro, bacon, scamorza affumicata e ketchup.', 9.00, 'panini/emiliano.jpg', 4, 50);
-- Piadine
INSERT INTO food VALUES (25, 'Piada stracchino', 'Piada e stracchino.', 4.00, 'piada/piada_stracchino.jpg', 5, 50);
INSERT INTO food VALUES (26, 'Piadina emilia', 'Piada, insalata, pomodoro e stracchino.', 5.00, 'piada/piada_emilia.jpg', 5, 50);
INSERT INTO food VALUES (27, 'Piada salsicca', 'Piada, cipolla cotta e salsiccia.', 5.50, 'piada/piada_salsiccia.jpg', 5, 50);
INSERT INTO food VALUES (28, 'Piada crudo', 'Piada, prosciutto crudo, rucola e stracchino.', 5.30, 'piada/piada_crudo.jpg', 5, 50);
INSERT INTO food VALUES (29, 'Piada cotto', 'Piada, prosciutto cotto, insalata di lattuga e pomodoro.', 5.20, 'piada/piada_cotto.jpg', 5, 50);
INSERT INTO food VALUES (30, 'Piada sfiziosa', 'Piada, wurstels, ketchup e maionese.', 5.90, 'piada/piada_sfiziosa.jpg', 5, 50);
-- Pizze
INSERT INTO food VALUES (31, 'Pizza Margherita', 'Mozzarella fior di latte, olio, basilico, pomodoro e impasto da 200g.', 4.00, 'pizze/pizza_margherita.jpg', 6, 50);
INSERT INTO food VALUES (32, 'Pizza Bufala', 'Mozzarella di bufala, olio, basilico, pomodoro e impasto da 200g.', 6.50, 'pizze/pizza_bufala.jpg', 6, 50);
INSERT INTO food VALUES (33, 'Pizza Parmigiana', 'Mozzarella fior di latte, olio, basilico, pomodoro, melanzane fresche e impasto da 200g.', 9.00, 'pizze/pizza_parmigiana.jpg', 6, 50);
INSERT INTO food VALUES (34, 'Pizza Americana', 'Mozzarella fior di latte, olio, basilico, pomodoro, wurstel, patatine fritte e impasto da 200g.', 7.00, 'pizze/pizza_americana.jpg', 6, 50);
INSERT INTO food VALUES (35, 'Pizza Quattro Formaggi', 'Mozzarella fior di latte, gorgonzola, pecorino, scamorza, olio, basilico, pomodoro e impasto da 200g.', 8.50, 'pizze/pizza_formaggi.jpg', 6, 50);
INSERT INTO food VALUES (36, 'Pizza Funghi', 'Mozzarella fior di latte, olio, basilico, pomodoro, funghi porcini e impasto da 200g.', 5.50, 'pizze/pizza_funghi.jpg', 6, 50);
-- Dolci
INSERT INTO food VALUES (37, 'Tiramisu\'', 'Uova, zucchero, savoiardi, caffe\' mascarpone.', 6.00, 'dolci/tiramisu.jpg', 7, 50);
INSERT INTO food VALUES (38, 'Sorbetto al caffe\'', 'Succo di limone, zucchero, albumi, acqua e limoncello.', 7.10, 'dolci/sorbetto_limone.jpg', 7, 50);
INSERT INTO food VALUES (39, 'Sorbetto al limone', 'Caffe, zucchero e acqua.', 7.00, 'dolci/sorbetto_caffe.jpg', 7, 50);
INSERT INTO food VALUES (40, 'Mousse di cioccolato', 'Cioccolato fondente, tuorli, miele di acacia, panna e latte.', 7.50, 'dolci/mousse.jpg', 7, 50);
INSERT INTO food VALUES (41, 'Profitterol', 'Acqua, burro, zucchero, uova, latte, sale e farina.', 6.50, 'dolci/profitterol.jpg', 7, 50);
INSERT INTO food VALUES (42, 'Mascarpone con frutta', 'Mascarpone, zucchero, tuorli, acqua e frutti di bosco.', 6.20, 'dolci/mascarpone.jpg', 7, 50);
-- Bevande Analcoliche
INSERT INTO food VALUES (43, 'Acqua', 'Bottiglia d\'acqua in plastica da 550ml.', 1.50, 'analcoliche/acqua.jpg', 8, 50);
INSERT INTO food VALUES (44, 'The\' alla pesca', 'Lattina di the\' alla pesca da 500ml.', 2.50, 'analcoliche/pesca.jpg', 8, 50);
INSERT INTO food VALUES (45, 'The\' al limone', 'Lattina di the\' al limone da 500ml.', 2.50, 'analcoliche/limone.jpg', 8, 50);
INSERT INTO food VALUES (46, 'Coca-cola', 'Bottiglia in vetro di coca-cola da 550ml.', 2.50, 'analcoliche/coca-cola.jpg', 8, 50);
INSERT INTO food VALUES (47, 'Fanta', 'Lattina di fanta da 500ml.', 2.50, 'analcoliche/fanta.jpg', 8, 50);
INSERT INTO food VALUES (48, 'Sprite', 'Lattina di sprite da 500ml.', 2.50, 'analcoliche/sprite.jpg', 8, 50);
-- Bevande Alcoliche
INSERT INTO food VALUES (49, 'Birra bionda', 'Lattina di birra chiara da 660ml.', 4.00, 'alcoliche/bionda.jpg', 9, 50);
INSERT INTO food VALUES (50, 'Birra scura', 'Lattina di birra scura da 660ml.', 4.00, 'alcoliche/scura.jpg', 9, 50);
INSERT INTO food VALUES (51, 'Birra IPA', 'Lattina di birra indiana da 660ml.', 4.00, 'alcoliche/ipa.jpg', 9, 50);
INSERT INTO food VALUES (52, 'Vino rosso', 'Bottiglia in vetro di Sangiovese da 1L.', 28.00, 'alcoliche/sangiovese.jpg', 9, 20);
INSERT INTO food VALUES (53, 'Vino bianco', 'Bottiglia in vetro di Reggiano da 1L.', 30.00, 'alcoliche/reggiano.jpg', 9, 20);
INSERT INTO food VALUES (54, 'Vino rosato', 'Bottiglia in vetro di Lambrusco da 1L.', 33.00, 'alcoliche/lambrusco.jpg', 9, 20);

-- Population table university
INSERT INTO university VALUES (1, '---', '---');
INSERT INTO university VALUES (2, 'UniBo - Psicologia', 'Viale Europa, 115');
INSERT INTO university VALUES (3, 'UniBo - Alma Mater Studiorum', 'Via Cesare Pavese, 50');
INSERT INTO university VALUES (4, 'UniBo - Neuroscienze Cognitie', 'Viale Rasi e Spinelli, 176');

-- Population table users
INSERT INTO users VALUES (1, 'admin', 'administrator', 'admin', 'admin@zacolla.it', '331-7848795', '', NULL, 'Admin');