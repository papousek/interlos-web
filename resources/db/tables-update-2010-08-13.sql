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

INSERT INTO `year` SET
`id_year` = 1,
`name` = '2009',
`registration_start` = '2009-09-01 00:00:00',
`registration_end` = '2009-10-01 00:00:00',
`game_start` = '2009-10-23 14:00:00',
`game_end` = '2009-10-23 20:00:00',
`inserted` = now(),
`updated` = now();

INSERT INTO `year` SET
`id_year` = 2,
`name` = '2010',
`registration_start` = '2010-09-01 00:00:00',
`registration_end` = '2010-10-23 12:00:00',
`game_start` = '2010-10-23 15:00:00',
`game_end` = '2010-10-23 20:00:00',
`inserted` = now(),
`updated` = now();

ALTER TABLE `serie` ADD COLUMN `id_year` INT(25) UNSIGNED NOT NULL AFTER `id_serie`;
ALTER TABLE `team` ADD COLUMN `id_year` INT(25) UNSIGNED NOT NULL AFTER `id_team`;

UPDATE `serie` SET `id_year` = 1;
UPDATE `team` SET `id_year` = 1;

ALTER TABLE `serie` ADD FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `team` ADD FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `team` DROP KEY `name`;
ALTER TABLE `team` DROP KEY `email`;
ALTER TABLE `team` ADD UNIQUE(`id_year`, `name`);
ALTER TABLE `team` ADD UNIQUE(`id_year`, `email`);
