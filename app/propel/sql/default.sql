
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- al_theme
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `al_theme`;

CREATE TABLE `al_theme`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`theme_name` VARCHAR(255) NOT NULL,
	`active` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `I_THEME` (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
