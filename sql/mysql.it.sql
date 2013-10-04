
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
(1, 'Petizione "{PETITION}" del sito web "{SITE_NAME}"', 'Ciao {USER_NAME},\r\n\r\nhai recentemente firmato la nostra petizione ''{PETITION}'', ma non hai ancora confermato la tua firma.\r\n\r\nci farebbe molto piacere che tu confermassi la tua firma cliccando qui:\r\n{LINK_URL}\r\n\r\nGrazie per aver partecipato.\r\nIl webmaster.\r\n{SITE_NAME}\r\n{SITE_URL}'),
(2, 'Firma per la petizione "{PETITION}" del sito web "{SITENAME}"', 'Hai richiesto di firmare la petizione "{PETITION}" con il nome di {PRENOM} {NOM} ({INFOS}).\r\n\r\nPer essere sicuri che tutte le firme pervenute siano genuine, abbiamo bisogno di avere una tua conferma.\r\nLa tua adesione sar&agrave; conteggiata dopo aver confermato la firma.\r\n\r\nPer confirmare la tua firma, clicca il link seguente:\r\n{VALIDATION}\r\n\r\nSe non vuoi confermare la tua firma, ignora questa email. I tuoi dati saranno cancellati dal nostro database.\r\n\r\nGrazie,\r\n\r\n{SITENAME}\r\n{SITESLOGAN}\r\n{SITEURL}');

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
