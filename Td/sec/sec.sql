create database securitel;

	use securitel;

CREATE TABLE comptes ( id int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant', nom varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nom d''utilisateur', motdepasse varchar(41) COLLATE utf8_unicode_ci NOT NULL, typecarte varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'type de carte', numerocarte varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'numéro de carte', message text COLLATE utf8_unicode_ci NOT NULL COMMENT 'texte long', PRIMARY KEY (id), UNIQUE KEY nom (nom) ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci