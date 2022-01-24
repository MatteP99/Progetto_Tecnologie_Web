-- File contenente le query per il popolamento del database
-- Popolamento tabella cibo
-- Tipologia pizza
INSERT INTO Cibo VALUES (0, 'Pizza Margherita', 4.00, 'Mozzarella fior di latte, olio, basilico, pomodoro e impasto da 400g.', 'Pizze/pizza_margherita.png','Pizze');
INSERT INTO Cibo VALUES (1, 'Pizza Bufala', 8.00, 'Mozzarella di bufala, olio, basilico, pomodoro e impasto da 400g.', 'Pizze/pizza_bufala.png','Pizze');
INSERT INTO Cibo VALUES (2, 'Pizza Parmigiana', 10.00, 'Mozzarella fior di latte, olio, basilico, pomodoro, melanzane fresche e impasto da 400g.', 'Pizze/pizza_parmigiana.png','Pizze');
-- Tipologia primo
INSERT INTO Cibo VALUES (3, 'Pasta asciutta', 6.00, 'Pasca grano duro.', 'Primi/pasta_asciutta.jpg','Primo');
INSERT INTO Cibo VALUES (4, 'Pasta in Bianco', 6.00, 'Pasca grano duro, burro e un pizzico d\'olio.', 'Primi/pasta_bianco.jpg','Primi');
INSERT INTO Cibo VALUES (5, 'Pasta al pomodoro', 6.00, 'Pasca grano duro, sugo al pomodoro con olio, basilico e un pizzico d\'aglio.', 'Primi/pasta_pomodoro.jpg','Primi');
-- Popolamento tabella sede universitaria
INSERT INTO Sede_universitaria VALUES (0, 'Unibo Cesena - Scienze, Ingegneria e Architettura', 'Via del Puffarbacco 90');
INSERT INTO Sede_universitaria VALUES (1, 'Unibo Cesena - Economia', 'Via del Toro 30');
INSERT INTO Sede_universitaria VALUES (2, 'Unibo Cesena - Psicologia', 'Via Amadori 12');