CREATE TABLE IF NOT EXISTS `#__page_code_urls` (
	`id`        INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`url`       TEXT             NOT NULL,
	`typeId`    TINYINT(1) DEFAULT '0',
	`published` TINYINT(1) DEFAULT '0',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `#__page_code_types` (
	`id`           INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name`         TEXT             NOT NULL,
	`code`         MEDIUMTEXT       NOT NULL,
	`published`    TINYINT(1) DEFAULT '0',
	`publish_up`   DATETIME DEFAULT '0000-00-00 00:00:00',
	`publish_down` DATETIME DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;