<?php
/* ******************************************* */
/*                INFORMATUX                   */
/*         http://www.informatux.com/          */
/*       SOLUTIONS AND WEB DEVELOPMENT         */
/*             Patrice BOUTHIER                */
/*                   2008                      */
/* ------------------------------------------- */
/*    XOOPS - PHP Content Management System    */
/*         Copyright (c) 2000 XOOPS.org        */
/*            <http://www.xoops.org/>          */
/* ******************************************* */

// Le nom du module
define('_MI_XPETITIONS_NAME', 			'Xpetitions');

// Une brève description du module
define('_MI_XPETITIONS_DESC',			'Pétitions en ligne');

// Menu
define('_MI_XPETITIONS_MENU1',			'Accueil');
define('_MI_XPETITIONS_MENU2',			'Pétitions');
define('_MI_XPETITIONS_MENU3',			'A propos');
define('_MI_XPETITIONS_MENU4',			'Signatures');
define('_MI_XPETITIONS_MENU5',			'Emails');
define('_MI_XPETITIONS_MENU6',			'Champs');
define('_MI_XPETITIONS_MENU7',			'Captchas');

// Préférences du module
define('_MI_XPETITIONS_NAVIGATION',		'Barre de navigation');
define('_MI_XPETITIONS_NAVIGATION_DSC',		'Cette option permet aux visiteurs de votre site d\'utiliser une barre de navigation pour se déplacer dans le module entre vos différentes pétitions');
define('_MI_XPETITIONS_NAVIGATION_HOME',        'Barre de navigation lien page d\'accueil');
define('_MI_XPETITIONS_NAVIGATION_HOME_DSC',	'Cette option permet d\'afficher le lien de la page d\'accueil de votre site web');
define('_MI_XPETITIONS_SHOW_HOME',              'Affichage des pétitions de la page d\'accueil');
define('_MI_XPETITIONS_SHOW_HOME_DSC',          'Cette option permet d\'afficher les pétitions en ligne ou en colonne (actives et archivées)');
define('_MI_XPETITIONS_SHOW_HOME_LINE',         'Ligne');
define('_MI_XPETITIONS_SHOW_HOME_COL',          'Colonne');
define('_MI_XPETITIONS_UPLOAD_SIZE',		'Taille d\'upload maximum de la pétition papier');
define('_MI_XPETITIONS_UPLOAD_SIZE_DSC',	'Taille maximum en octets des fichiers joints (pétitions papier) à vos pétitions en ligne');
define('_MI_XPETITIONS_ADMIN_PAGE',		'Nombre de pétitions affichées');
define('_MI_XPETITIONS_ADMIN_PAGE_DSC',		'Nombre de pétitions affichées par page côté Admin');
define('_MI_XPETITIONS_INDEX_PAGE',		'Nombre de pétitions affichées');
define('_MI_XPETITIONS_INDEX_PAGE_DSC',		'Nombre de pétitions affichées par page côté Visiteurs');
define('_MI_XPETITIONS_ADMIN_SIGN_PAGE',	'Nombre de signatures affichées');
define('_MI_XPETITIONS_ADMIN_SIGN_PAGE_DSC',	'Nombre de signatures affichées par pages côté Admin');
define('_MI_XPETITIONS_INDEX_SIGNS',		'Afficher le nombre de signatures par pétitions');
define('_MI_XPETITIONS_INDEX_SIGNS_DSC',	'Cette option vous permet d\'afficher ou non le nombre de signatures validées par les signataires de vos pétitions sur la page d\'accueil du module côté Visiteurs. Le décompte n\'apparaît que s\'il y a au moins une signature');
define('_MI_XPETITIONS_INDEX_ARCHI',		'Afficher les pétitions archivées sur la page d\'accueil');
define('_MI_XPETITIONS_INDEX_ARCHI_DSC',	'Cette option vous permet d\'afficher ou non les pétitions dont vous avez changé le statut en "Archives" côté visiteurs.<br />N.B. : Les pétitions aux statuts "Archives" ne peuvent plus être signées');
define('_MI_XPETITIONS_SIGN_TITLE',		'Intitulé pour signer la pétition');
define('_MI_XPETITIONS_SIGN_TITLE_DSC',		'Texte du lien qui permettra à vos visiteurs d\'accéder au formulaire de signature en ligne');
define('_MI_XPETITIONS_SIGN_DOWNL',		'Intitulé pour télécharger la pétition papier');
define('_MI_XPETITIONS_SIGN_DOWNL_DSC',		'Texte du lien qui permettra à vos visiteurs de télécharger la version papier de votre pétition en ligne.<br />Si vous n\'avez pas inclus de version papier dans vos pétitions, ce lien n\'apparaîtra pas');
define('_MI_XPETITIONS_SIGN_FRIEND',		'Intitulé pour envoyer à un ami');
define('_MI_XPETITIONS_SIGN_FRIEND_DSC',	'Texte du lien qui permettra à vos visiteurs de prévenir un ami par email de votre pétition à signer');
define('_MI_XPETITIONS_SIGN_SHOW',		'Intitulé pour voir les signatures');
define('_MI_XPETITIONS_SIGN_SHOW_DSC',		'Texte du lien qui permettra de voir les signatures enregistrées par les internautes sur vos pétitions en ligne');
define('_MI_XPETITIONS_SEND_FRIEN',		'Afficher le lien pour envoyer un message à un ami');
define('_MI_XPETITIONS_SEND_FRIEN_DSC',		'Cette option permet d\'afficher ou non le lien "envoyer/prévenir un ami" dans les pétitions');
define('_MI_XPETITIONS_PATH_UPLOAD',		'Chemin physique pour l\'upload des pétitions papier');
define('_MI_XPETITIONS_PATH_UPLOAD_DSC',	'Le chemin physique doit être paramétré à la racine de xoops et pas avant.<br />Exemple : Les fichiers attachés à téléchargés doivent se trouver à http://www.votresite.com/uploads/xpetitions.<br />Alors le chemin à saisir sera alors \'/upload/xpetitions\' sans inclure le \'/\' final.<br />N\'oubliez pas de modifier les droits du répertoire en 777 (rwxrwxrwx).');
define('_MI_XPETITIONS_CAPTCHA_IMG',		'Vérification anti-spam');
define('_MI_XPETITIONS_CAPTCHA_IMG_DSC',	'Vous pouvez choisir d\'intégrer une image captcha dans vos formulaires de signatures en ligne à toutes vos pétitions pour éviter de recevoir des spams');
define('_MI_SSECTION_WYSIWYG', 			'Type d\'éditeur');
define('_MI_SSECTION_WYSIWYGDSC',		'Sélectionner le type d\'éditeur que vous désirez utiliser pour vos pétitions. Veuillez noter que tout autre éditeur que XoopsEditor doit être installé sur votre site.');
define('_MI_XPETITIONS_VALID_METHOD',		'Type de validation du formulaire de signature');
define('_MI_XPETITIONS_VALID_METHODSC',		'Le formulaire de validation des signatures peut être valider de deux façons :<br />1. Email : Par email envoyé au signataire (retour de confirmation par lien avec clé dans l\'email)<br />2. Auto : Automatiquement sur le site par double clic sans envoi d\'email');

// xoops version
define("_MI_XPETITIONS_INDEX",			"Template index du module");
define("_MI_XPETITIONS_HEADER",			"Template entête de page de l'index du module");
define("_MI_XPETITIONS_FOOTER",			"Template pied de page de l'index du module");
define("_MI_XPETITIONS_DISPLAY_INDEX",		"Template index de la page d'une pétition");
define("_MI_XPETITIONS_DISPLAY_FORM",		"Template du formulaire de signature en ligne d'une pétition");
define("_MI_XPETITIONS_DISPLAY_TOOLBAR",	"Template de la barre outil de chaque pétition");
define("_MI_XPETITIONS_DISPLAY_SIGNS",		"Template enregistrement d'une signature");
define("_MI_XPETITIONS_DISPLAY_FRIEND",		"Template prévenir un ami");
define("_MI_XPETITIONS_DISPLAY_ALLSIGNS",	"Template affichage des signatures validées");
define("_MI_XPETITIONS_DISPLAY_FRIEND_SEND",	"Template prévenir un ami - envoi du mail");
define("_MI_XPETITIONS_DISPLAY_VALID",		"Template validation d'une signature");
define("_MI_XPETITIONS_DISPLAY_PRESIGN",	"Template présignature avant validation automatique");
define("_MI_XPETITIONS_DISPLAY_VALID_PRESIGN",	"Template validation d'une présignature");

// xoops version config
define("_MI_XPETITIONS_SIGN_TITLE_DEFAULT",     "Je signe");
define("_MI_XPETITIONS_SIGN_DOWNL_DEFAULT",     "Télécharger une version imprimable de la pétition");
define("_MI_XPETITIONS_SIGN_FRIEND_DEFAULT",    "Prévenir un ami");
define("_MI_XPETITIONS_SIGN_SHOW_DEFAULT",      "Voir les signatures");

// blocks
define("_MI_XPETITIONS_BNAME1",			"Dernières signatures");
define("_MI_XPETITIONS_BNAME2",			"Mes pétitions actives");
define("_MI_XPETITIONS_BNAME3",			"Mes pétitions archivées");

?>