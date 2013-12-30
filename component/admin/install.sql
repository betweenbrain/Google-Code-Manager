CREATE TABLE IF NOT EXISTS `#__page_code_urls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `url` text NOT NULL,
  `typeId` tinyint(1) DEFAULT '0',
  `published` tinyint(1) DEFAULT '0',
  `publish_up` datetime DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__page_code_types` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `type` text NOT NULL,
  `code` mediumtext NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;