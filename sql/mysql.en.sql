
CREATE TABLE `xpetitions_petitions` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `email` varchar(100) NOT NULL default '',
  `date` int(12) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `whoview` tinyint(1) NOT NULL default '0',
  `file` tinyint(1) NOT NULL default '0',
  `link_file` text,
  PRIMARY KEY  (`id`)
) COMMENT='xpetitions by INFORMATUX [www.informatux.com]' AUTO_INCREMENT=1;

CREATE TABLE `xpetitions_emails` (
  `id` int(5) NOT NULL auto_increment,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`id`)
) COMMENT='xpetitions by INFORMATUX [www.informatux.com]' AUTO_INCREMENT=3;

INSERT INTO `xpetitions_emails` (`id`, `subject`, `message`) VALUES 
(1, 'Petition "{PETITION}" of the WebSite "{SITE_NAME}"', 'Hello {USER_NAME},\r\n\r\nYou have recently signed our online petition ''{PETITION}'', but you seem to have forgotten to confirm your signature.\r\n\r\nWe would appreciate if you could confirm it by clickin here:\r\n{LINK_URL}\r\n\r\nThank you for taking part.\r\nThe Webmaster.\r\n{SITE_NAME}\r\n{SITE_URL}'),
(2, 'Petition signature "{PETITION}" of the WebSite "{SITENAME}"', 'You have requested to sign the petition "{PETITION}" in the name of {PRENOM} {NOM} ({INFOS}).\r\n\r\nTo make sure every signature is genuine, we need you to confirm your signature.\r\nIt will be taken into account once you complete this last step.\r\n\r\nTo confirm your signature, just click on the link below:\r\n{VALIDATION}\r\n\r\nIf you do not want to confirm you signature, you can just ignore this email. Your personal data will be deleted from our database.\r\n\r\nBest regards,\r\n\r\n{SITENAME}\r\n{SITESLOGAN}\r\n{SITEURL}');

CREATE TABLE `xpetitions_fields` (
  `id` int(5) NOT NULL auto_increment,
  `visibility` smallint(2) NOT NULL,
  `obligatory` smallint(2) NOT NULL,
  PRIMARY KEY  (`id`)
) COMMENT='xpetitions by INFORMATUX [www.informatux.com]' AUTO_INCREMENT=9;

INSERT INTO `xpetitions_fields` (`id`, `visibility`, `obligatory`) VALUES 
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1);

CREATE TABLE `xpetitions_options` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `options` text NOT NULL,
  `div` text,
  `sort` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) COMMENT='xpetitions by INFORMATUX [www.informatux.com]' AUTO_INCREMENT=5 ;

INSERT INTO `xpetitions_options` (`id`, `name`, `options`, `div`, `sort`) VALUES
(1, 'captcha', '1', NULL, NULL),
(2, 'signature_show', 'colonne', NULL, NULL),
(3, 'signature_entry', '0|0|0|0|0', NULL, NULL),
(4, 'signature_nbcol', '2', NULL, NULL);
