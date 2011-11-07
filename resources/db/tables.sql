DROP TABLE IF EXISTS `year`;
CREATE TABLE `year` (
	`id_year` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
	`name` VARCHAR(50) NOT NULL,
	`registration_start` DATETIME NOT NULL COMMENT 'cas, kdy zacina registrace do tohoto rocniku',
	`registration_end` DATETIME NOT NULL COMMENT 'cas, kdy konci registrace do tohoto rocniku',
	`game_start` DATETIME NOT NULL COMMENT 'cas, kdy zacina hra',
	`game_end` DATETIME NOT NULL COMMENT 'cas, kdy konci hra',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	UNIQUE(`name`)
) ENGINE = InnoDB COMMENT = 'Rocniky' COLLATE = utf8_czech_ci;

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
	`id_team` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
	`name` VARCHAR(150) NOT NULL COMMENT 'prihlasovaci jmeno',
	`password` VARCHAR(160) NOT NULL COMMENT 'zahashovane heslo',
	`category` ENUM('high_school','college', 'other') NOT NULL COMMENT 'soutezni kategorie',
	`email` VARCHAR(150) NULL COMMENT 'e-mailova adresa',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	UNIQUE(`name`),
	UNIQUE(`email`)
) ENGINE = InnoDB COMMENT = 'Soutezni tymy' COLLATE = utf8_czech_ci;

DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
	`id_school` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
	`name` VARCHAR(150) NOT NULL COMMENT 'nazev skoly',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	UNIQUE(`name`)
) ENGINE = InnoDB COMMENT = 'Skoly, ze kterych pochazi soutezici' COLLATE = utf8_czech_ci;

DROP TABLE IF EXISTS `competitor`;
CREATE TABLE `competitor` (
	`id_competitor` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
	`id_team` INT(25) UNSIGNED NOT NULL COMMENT 'tym, do ktereho ucastnik patri',
	`id_school` INT(25) UNSIGNED NULL COMMENT 'skola, kam ucastnik chodi',
	`name` VARCHAR(250) NOT NULL COMMENT 'jmeno',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	FOREIGN KEY (`id_team`) REFERENCES  `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`id_school`) REFERENCES  `school` (`id_school`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB COMMENT = 'informace o soutezicich' COLLATE = utf8_czech_ci;

DROP TABLE IF EXISTS `serie`;
CREATE TABLE `serie` (
	`id_serie` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
	`to_show` DATETIME NOT NULL COMMENT 'cas, kdy ma byt serie zverejnena',
	`text` TEXT NOT NULL COMMENT 'komentar k serii, ktery muze napr. obsahovat odkaz ke stazeni pdf apod.',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena'
) ENGINE = InnoDB COMMENT = 'serie ukolu';

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
	`id_task` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
    `id_serie` INT(25) UNSIGNED NULL COMMENT 'serie, do ktere ukol patri',
	`number` INT(2) UNSIGNED NOT NULL COMMENT 'cislo ukolu v ramci serie',
	`type` ENUM('logical','programming','idea') NOT NULL COMMENT 'typ ukolu',
    `name` VARCHAR(250) NOT NULL COMMENT 'nazev ukolu',
    `code` VARCHAR(250) NOT NULL COMMENT 'kod ukolu, ktery maji ucastnicke tymy resit',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	FOREIGN KEY (`id_serie`) REFERENCES  `serie` (`id_serie`) ON DELETE CASCADE ON UPDATE CASCADE,
	INDEX(`id_serie`)
) ENGINE = InnoDB COMMENT = 'ukoly';

DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
    `id_answer` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
    `id_team` INT(25) UNSIGNED NOT NULL COMMENT 'tym, ktery hada kod',
    `id_task` INT(25) UNSIGNED NOT NULL COMMENT 'ukol, jehoz kod se hada',
	`code` VARCHAR(250) NOT NULL COMMENT 'kod ukolu, na ktery tym odpovida',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	FOREIGN KEY (`id_team`) REFERENCES  `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`id_task`) REFERENCES  `task` (`id_task`) ON DELETE CASCADE ON UPDATE CASCADE,
	UNIQUE(`id_team`, `id_task`, `code`),
	INDEX(`id_team`), INDEX(`id_task`)
) ENGINE = InnoDB COMMENT = 'pokusy uhadnout kod ukolu';


DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
    `id_chat` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
    `id_team` INT(25) UNSIGNED NOT NULL COMMENT 'tym, ktery prispevek vlozil',
	`content` TEXT NOT NULL COMMENT 'text prispevku',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	`updated` TIMESTAMP NOT NULL COMMENT 'cas, kdy byla polozka naposledy zmenena',
	FOREIGN KEY (`id_team`) REFERENCES  `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
	INDEX(`id_team`)
) ENGINE = InnoDB COMMENT = 'diskusni prispevku na chatu';

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
	`id_log` INT(25) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'identifikator',
    `id_team` INT(25) UNSIGNED NOT NULL COMMENT 'tym, ktereho se zaznam tyka',
	`type` VARCHAR(250) NULL COMMENT 'typ zaznamu',
	`text` TEXT NOT NULL COMMENT 'text zaznamu',
	`inserted` DATETIME NOT NULL COMMENT 'cas, kdy byla polozka vlozena do systemu',
	FOREIGN KEY (`id_team`) REFERENCES  `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
	INDEX(`id_team`)
) ENGINE = InnoDB COMMENT = 'logovani akci tymu';