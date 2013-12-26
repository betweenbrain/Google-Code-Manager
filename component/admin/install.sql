CREATE TABLE IF NOT EXISTS `#__google_codes` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `url` text NOT NULL,
  `code` text NOT NULL,
  `publish_up` datetime DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `#__google_codes` (`id`, `url`, `code`) VALUES ('1','http://foo.com','Test Foo'), ('2', 'http://bar.com', 'Test Bar'), ('3', 'http://foo.com/baz/*', 'Test Foo Wildcard');