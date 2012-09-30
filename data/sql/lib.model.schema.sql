
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- page
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`slug` VARCHAR(255) NOT NULL,
	`menu_index` INTEGER,
	`content` TEXT,
	`language` VARCHAR(2),
	`published` TINYINT(1),
	`homepage` TINYINT(1),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- profil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER NOT NULL,
	`firstname` VARCHAR(255),
	`lastname` VARCHAR(255),
	`email` VARCHAR(255),
	`birthdate` DATE,
	`phone` VARCHAR(50),
	PRIMARY KEY (`id`),
	INDEX `profil_FI_1` (`user_id`),
	CONSTRAINT `profil_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
