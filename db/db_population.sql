-- File db population

-- Population table food
-- Pizza
INSERT INTO food VALUES (1, 'Pizza Margherita', 4.00, 'Mozzarella fior di latte, olio, basilico, pomodoro e impasto da 400g.', 'pizze/pizza_margherita.png','Pizze');
INSERT INTO food VALUES (2, 'Pizza Bufala', 8.00, 'Mozzarella di bufala, olio, basilico, pomodoro e impasto da 400g.', 'pizze/pizza_bufala.png','Pizze');
INSERT INTO food VALUES (3, 'Pizza Parmigiana', 10.00, 'Mozzarella fior di latte, olio, basilico, pomodoro, melanzane fresche e impasto da 400g.', 'pizze/pizza_parmigiana.png','Pizze');
-- Primo
INSERT INTO food VALUES (4, 'Pasta asciutta', 5.00, 'Pasca grano duro.', 'primi/pasta_asciutta.jpg','Primo');
INSERT INTO food VALUES (5, 'Pasta in Bianco', 6.00, 'Pasca grano duro, burro e un pizzico d\'olio.', 'primi/pasta_bianco.jpg','Primi');
INSERT INTO food VALUES (6, 'Pasta al pomodoro', 6.50, 'Pasca grano duro, sugo al pomodoro con olio, basilico e un pizzico d\'aglio.', 'primi/pasta_pomodoro.jpg','Primi');
-- Population table university
INSERT INTO university VALUES (1, 'Unibo Cesena - Scienze, Ingegneria e Architettura', 'Via del Puffarbacco 90');
INSERT INTO university VALUES (2, 'Unibo Cesena - Economia', 'Via del Toro 30');
INSERT INTO university VALUES (3, 'Unibo Cesena - Psicologia', 'Via Amadori 12');