
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
(1, 'Pétition "{PETITION}" du site "{SITE_NAME}"', 'Bonjour {USER_NAME},\r\n\r\nVous avez récemment signé notre pétition en ligne ''{PETITION}'', mais vous avez omis de valider votre signature.\r\n\r\nNous vous offrons la possibilité de pouvoir le faire en cliquant sur ce lien :\r\n{LINK_URL}\r\n\r\nMerci de votre participation.\r\nL''administrateur.\r\n{SITE_NAME}\r\n{SITE_URL}'),
(2, 'Signature de la pétition "{PETITION}" du site "{SITENAME}"', 'Vous avez demandé à signer la pétition "{PETITION}" au nom de {PRENOM} {NOM} ({INFOS}).\r\n\r\nPour éviter toute mauvaise plaisanterie, nous vous demandons de confirmer votre signature.\r\nVotre signature ne sera validée qu''une fois cette opération effectuée.\r\n\r\nPour confirmer votre signature, il vous suffit de cliquer sur le lien ci-dessous :\r\n{VALIDATION}\r\n\r\nSi vous souhaitez ne pas confirmer cette signature, il vous suffit de ne pas répondre, les informations seront supprimées de notre base de données.\r\n\r\nCordialement,\r\n\r\n{SITENAME}\r\n{SITESLOGAN}\r\n{SITEURL}');

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
