-- File contenente le query per la creazione del database
-- Tabella cibo
CREATE TABLE Cibo (
id INT(11) UNSIGNED  NOT NULL,
nome VARCHAR(20) NOT NULL,
prezzo DOUBLE NOT NULL,
descrizione VARCHAR(300) NOT NULL,
immagine_cibo VARCHAR(50) NOT NULL,
tipologia VARCHAR(20) NOT NULL,

PRIMARY KEY (id)
);
-- Tabella sede universitaria
CREATE TABLE Sede_universitaria (
id INT(11) UNSIGNED NOT NULL,
nome VARCHAR(50) NOT NULL,
indirizzo VARCHAR(50) NOT NULL,

 PRIMARY KEY (id)
);
-- Tabella utente
CREATE TABLE Utente (
id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
nome VARCHAR(30) NOT NULL,
cognome VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
numero_cellulare VARCHAR(10) NOT NULL,
indirizzo VARCHAR(40) NOT NULL,
email_istituzionale VARCHAR(50),
status_studente INT(1) NOT NULL,

PRIMARY KEY (id)
);
-- Tabella ordine
CREATE TABLE Ordine (
id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_cibo INT(11) UNSIGNED NOT NULL,
quantita_cibo INT(5) NOT NULL,
id_utente INT(11) UNSIGNED NOT NULL,

PRIMARY KEY (id),
FOREIGN KEY (id_utente) REFERENCES Utente (id),
FOREIGN KEY (id_cibo) REFERENCES Cibo(id)
);