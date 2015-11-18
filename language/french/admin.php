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

define("_AM_XPETITIONS_XOOPS_PRO",		"http://www.informatux.com/");
define("_AM_XPETITIONS_XOOPS_PRO1",		"Support et mise à jour disponible sur ");
define("_AM_XPETITIONS_XOOPS_PRO2",		"Solutions et développement WEB");
define("_AM_XPETITIONS_XOOPS_PRO3",		"Avez-vous besoin d'aide avec ce module ?");

// * header.inc.php *
define("_AM_MODULEADMIN_MISSING",               "La classe ModuleAdmin n'est pas présente, installez là sur votre xoops.<br />/Frameworks/moduleclasses/moduleadmin/");

// * index.php *
define("_AM_XPETITIONS_INDEX_HELP1",		"<b>AIDE</b>");
define("_AM_XPETITIONS_INDEX_HELP2",		"- En cliquant sur le nom d'une pétition, vous accéder à la page d'accueil de celle-ci.<br />- La date correspond à la mise en ligne d'une pétition.<br />- Le statut d'une pétition possède 3 états :<br />* <b style='color: green;'>Active</b> (La pétition peut être signée si la date n'est pas supérieur à la date du jour)<br />* <b style='color: orange;'>hors ligne</b> (La pétition n'est pas visible et ne peut pas être signée)<br />* <b style='color: red;'>Archivée</b> (La pétition est visible mais ne peut pas être signée)<br />- Les actions possibles :<br />* Modification (Vous pouvez tout modifier sauf le nom de la table qui recevra les signatures)<br />* Suppression (Cette action supprimera la pétition en ligne y compris toutes les signatures enregistrées. Si vous souhaitez conserver votre pétition mais quelle ne soit plus signée ni accessible, modifiez l'état à 'hors ligne')");
define("_AM_XPETITIONS_INDEX",			"Accueil");
define("_AM_XPETITIONS_CREATION",		"Création");
define("_AM_XPETITIONS_MODIFICATION",		"Modification");
define("_AM_XPETITIONS_PETITION",		"Pétition");
define("_AM_XPETITIONS_SIGNATURE",		"Signatures");
define("_AM_XPETITIONS_EMAILS",			"Emails");
define("_AM_XPETITIONS_FIELD",			"Champs");
define("_AM_XPETITIONS_CAPTCHA",		"Captchas");
define("_AM_XPETITIONS_GENERALSET",		"Préférences");
define("_AM_XPETITIONS_GOTOMOD",		"Aller au module");
define("_AM_XPETITIONS_MODULEADMIN",		"ADMIN");
define("_AM_XPETITIONS_HELP",			"Aide");
define("_AM_XPETITIONS_PETITION_CREATE",	"<span class='xpetitions_summary_create'>%s</span> pétition créée");
define("_AM_XPETITIONS_PETITIONS_CREATE",	"<span class='xpetitions_summary_create'>%s</span> pétitions créées");
define("_AM_XPETITIONS_PETITION_ONLINE",	"<span class='xpetitions_summary_online'>%s</span> pétition active");
define("_AM_XPETITIONS_PETITIONS_ONLINE",	"<span class='xpetitions_summary_online'>%s</span> pétitions actives");
define("_AM_XPETITIONS_PETITION_OFFLINE",	"<span class='xpetitions_summary_offline'>%s</span> pétition hors ligne");
define("_AM_XPETITIONS_PETITIONS_OFFLINE",	"<span class='xpetitions_summary_offline'>%s</span> pétitions hors ligne");
define("_AM_XPETITIONS_PETITION_ARCHIVE",	"<span class='xpetitions_summary_archive'>%s</span> pétition archivée");
define("_AM_XPETITIONS_PETITIONS_ARCHIVE",	"<span class='xpetitions_summary_archive'>%s</span> pétitions archivées");
define("_AM_XPETITIONS_SIGNATURE_NOVALID",	"Signatures non validées :");
define("_AM_XPETITIONS_INDEX_SUMMARY",		"Sommaire");
define("_AM_XPETITIONS_INDEX_SUMMARY_BOX1",     "Configuration XPETITIONS");
define("_AM_XPETITIONS_INDEX_SUMMARY_BOX2",     "Synthèse");
define("_AM_XPETITIONS_CREATE",			"Création");
define("_AM_XPETITIONS_CREATE_BUTTON",		"Créer une pétition");
define("_AM_XPETITIONS_DIRECTORY_CREATED",      "créé");
define("_AM_XPETITIONS_DIRECTORY_NOT_CREATED",  "pas créé");
define("_AM_XPETITIONS_DIRECTORY_TO_CREATE",    "le créer maintenant");
define("_AM_XPETITIONS_INDEX_TAB1",		"Id");
define("_AM_XPETITIONS_INDEX_TAB2",		"Pétitions en ligne");
define("_AM_XPETITIONS_INDEX_TAB3",		"Date");
define("_AM_XPETITIONS_INDEX_TAB4",		"Statut");
define("_AM_XPETITIONS_INDEX_TAB5",		"Action");
define("_AM_XPETITIONS_NONE",			"Aucune pétition créée ou disponible");
define("_AM_XPETITIONS_CHECK1",			"Répertoire de dépôt des pétitions au format PDF : %s");
define("_AM_XPETITIONS_CHECK2",			"Droits d'écriture du répertoire d'upload : %s");
define("_AM_XPETITIONS_CHECK3",			"Droits d'écriture du répertoire \"csv\" : %s");
define("_AM_XPETITIONS_CHECK4",			"Version de php >= 5.1.0 (création des csv) : %s");
define("_AM_XPETITIONS_DIR_CREATED",		"Répertoire créé avec succès");
define("_AM_XPETITIONS_DIR_NOT_CREATED",	"Erreur lors de la création du répertoire !");

// * petitions.php *
define("_AM_XPETITIONS_TITLE1_ADDFORM",		"Créer une pétition");
define("_AM_XPETITIONS_TITLE1_EDITFORM",	"Modifier une pétition");
define("_AM_XPETITIONS_NAME_ADDFORM",		"Nom");
define("_AM_XPETITIONS_NAME_ADDFORM_DSC",	"Nom de la table MySQL de la pétition (espaces et caractères exotiques interdits)<br />Ex : mapetition<br /><span style='color: red;'>Zone non modifiable en mode 'Modification'</span>");
define("_AM_XPETITIONS_TITLE2_ADDFORM",		"Titre");
define("_AM_XPETITIONS_TITLE2_ADDFORM_DSC",	"Titre de la pétition visible pour les internautes");
define("_AM_XPETITIONS_DESC_ADDFORM",		"Description");
define("_AM_XPETITIONS_DESC_ADDFORM_DSC",	"Insérez le texte de votre pétition en ligne");
define("_AM_XPETITIONS_EMAIL_ADDFORM",		"Email de réponse");
define("_AM_XPETITIONS_EMAIL_ADDFORM_DSC",	"Email visible lors de l'envoi d'un message de confirmation ou de relance.<br />Ex : noreply@petition.com");
define("_AM_XPETITIONS_STATUS_ADDFORM",		"Statut");
define("_AM_XPETITIONS_STATUS_ADDFORM_DSC",	"Etat de la pétition");
define("_AM_XPETITIONS_DATE_ADDFORM",		"Date");
define("_AM_XPETITIONS_DATE_ADDFORM_DSC",	"Date de démarrage de la pétition");
define("_AM_XPETITIONS_FILE_ADDFORM",		"Uploader un fichier");
define("_AM_XPETITIONS_FILE_ADDFORM_DSC",	"Ajouter une pétition identique à celle que les visiteurs peuvent signer en ligne, au format PDF ou DOC, téléchargeable pour ceux qui ne désirent ou ne peuvent pas signer en ligne (si un fichier est uploadé, un lien apparaîtra directement dans la barre d'outil sur la pétition)");
define("_AM_XPETITIONS_BREAK_ADDFORM",		"<b>Uploader une petition au format papier</b>");
define("_AM_XPETITIONS_FILE_SHOW_ADDFORM",	"Fichier enregistré");
define("_AM_XPETITIONS_FILE_SHOW_ADDFORM_DSC",	"Pour visualiser le fichier enregistré, cliquez sur son nom.<br />Pour le supprimer, cochez la case du fichier et valider le formulaire.<br />Pour le remplacer/mettre à jour, uploader un nouveau fichier (ATTENTION, cela ne supprimera pas l'ancien fichier du serveur, sauf si vous cochez la case pour le supprimer)");
define("_AM_XPETITIONS_DELETE_FILE_ADDFORM",	"Suppression du fichier");
define("_AM_XPETITIONS_STATUS1",		"active");
define("_AM_XPETITIONS_STATUS2",		"hors ligne");
define("_AM_XPETITIONS_STATUS3",		"archive");
define("_AM_XPETITIONS_SUBMIT",			"Enregistrer");
define("_AM_XPETITIONS_DELETE",			"Supprimer");
define("_AM_XPETITIONS_PREVIEW",		"Visualiser");
define("_AM_XPETITIONS_ERROR_INSERT",		"Erreur lors de l'insertion des données dans la base !!!");
define("_AM_XPETITIONS_ERROR_UPDATE",		"Erreur lors de la mise à jour de la base de données !!!");
define("_AM_XPETITIONS_ERROR_DELETE",		"Erreur lors de la suppression des données dans la base !!!");
define("_AM_XPETITIONS_ERROR_BLANK",		"Des champs requis ne sont pas remplis !!!");
define("_AM_XPETITIONS_SIGN_DOUBLE",		"Signature déjà présente dans la base de données !");
define("_AM_XPETITIONS_VALID_INSERT",		"Création dans la base de données effectuée avec succès !");
define("_AM_XPETITIONS_VALID_UPDATE",		"Mise à jour de la base de données effectuée avec succès !");
define("_AM_XPETITIONS_VALID_DELETE",		"Suppression effectuée avec succès !");
define("_AM_XPETITIONS_DELETE_CONFIRM",		"Voulez-vous supprimer cette pétition ?<br />Attention, cela supprimera également toutes les signatures enregistrées pour celle-ci");
define("_AM_XPETITIONS_DELETE_SIGN",		"Voulez-vous supprimer cette signature ?");
define("_AM_XPETITIONS_ERROR_FILE_UPLOAD",	"Une erreur est survenue dans l'upload du fichier !!!");
// ---------------------------------------------------------------------------------------------
//                                        22/05/09 urbanspaceman mod
// ---------------------------------------------------------------------------------------------
define("_AM_XPETITIONS_WHOVIEW_ADDFORM",	"Qui peut visualiser les signatures de la pétition ?");
define("_AM_XPETITIONS_WHOVIEW_ADDFORM_DSC",	"Choisissez le groupe d'utilisateurs qui sera autorisé à voir les signatures de la pétition");
define("_AM_XPETITIONS_WHOVIEW1",		"Tous");
define("_AM_XPETITIONS_WHOVIEW2",		"Utilisateurs enregistrées");
define("_AM_XPETITIONS_WHOVIEW3",		"Administrateurs");
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------


// * signature.php *
define("_AM_XPETITIONS_SIGN_TAB",		"SIGNATURES");
define("_AM_XPETITIONS_SIGN_TAB1",		"Id");
define("_AM_XPETITIONS_SIGN_TAB2",		"Pétitions en ligne");
define("_AM_XPETITIONS_SIGN_TAB3",		"Date");
define("_AM_XPETITIONS_SIGN_TAB4",		"Enregistrées");
define("_AM_XPETITIONS_SIGN_TAB5",		"Validées");
define("_AM_XPETITIONS_SIGN_TAB6",		"Non validées");
define("_AM_XPETITIONS_SIGN_HELP1",		"<b>AIDE</b>");
define("_AM_XPETITIONS_SIGN_HELP2",		"- En cliquant sur un compteur de la colonne signatures 'Enregistrées', vous pouvez visualiser les signatures effectuées par les internautes.<br />- En cliquant sur un compteur de la colonne signatures 'Validées, vous pouvez extraire celles-ci dans un fichier tableur (.csv).<br />- En cliquant sur un compteur de la colonne signatures 'Non validées', vous pouvez relancer par email tous ces signataires n'ayant pas confirmés leurs signatures en ligne et/ou forcer la validation des signataires par un simple click.<br />- Si vous voulez supprimer des signatures enregistrées ou enregistrer manuellement des signatures (reçu par pétition papier par exemple), cliquez sur le bouton 'Enregistrer / Supprimer des signatures manuellement'.");
define("_AM_XPETITIONS_SIGN_HELP3",		"Vous pouvez modifier le message de relance aux retardataires à votre guise. Les variables que vous pouvez insérer dans le message sont les suivantes (respectez la même syntaxe) :<br />{USER_NAME} : Nom du retardataire.<br />{USER_EMAIL} : Email du retardataire.<br />{LINK_URL} : Lien à cliquer pour que le retardataire valide sa signature.<br />{SITE_NAME} : Nom de votre site.<br />{SITE_URL} : Url de votre site.<br /><br />Vous pouvez forcer la validation des signatures de retardataires en cliquant sur le bouton du même nom.");
define("_AM_XPETITIONS_SAVE_SIGN",		"Enregistrer / Supprimer des signatures manuellement");
define("_AM_XPETITIONS_DEL_SIGN",		"Supprimer la signature");
define("_AM_XPETITIONS_DEL_TITLE",		"Cliquez sur une pétition pour afficher ses signatures");
define("_AM_XPETITIONS_SIGN_DETAIL",		"Signataires enregistrées");
define("_AM_XPETITIONS_SIGN_DETAIL1",		"Nom");
define("_AM_XPETITIONS_SIGN_DETAIL2",		"Prénom");
define("_AM_XPETITIONS_SIGN_DETAIL3",		"Pays");
define("_AM_XPETITIONS_SIGN_DETAIL4",		"Email");
define("_AM_XPETITIONS_SIGN_DETAIL5",		"Ville");
define("_AM_XPETITIONS_SIGN_DETAIL6",		"Job");
define("_AM_XPETITIONS_SIGN_DETAIL7",		"Date");
define("_AM_XPETITIONS_SIGN_DETAIL8",		"Validée");
define("_AM_XPETITIONS_SIGN_NONE",		"Aucune signature enregistrées");
define("_AM_XPETITIONS_TITLE_LATECOMERFORM",	"Envoi d'emails aux retardataires");
define("_AM_XPETITIONS_MESS_LATECOMER",		"Message à envoyer aux retardataires.<br /><i>(Voir l'aide pour les variables)</i>");
define("_AM_XPETITIONS_MSG_BUTTON_LATECOMER2",	"Envoi du message aux %s retardataires");
define("_AM_XPETITIONS_MSG_BUTTON_LATECOMER1",	"Envoi du message à %s retardataire");
define("_AM_XPETITIONS_SUBMIT_LATECOMER",	"Envoyer le message");
define("_AM_XPETITIONS_EMAIL_SEND_LATECOMER",	"Emails envoyés avec succès aux retardataires !");
define("_AM_XPETITIONS_LATECOMER_SEND_ERROR",	"Erreur dans l'envoi d'un des emails aux retardataires !!!");
define("_AM_XPETITIONS_SIGN_CSV_LASTNAME",	"NOM");
define("_AM_XPETITIONS_SIGN_CSV_FIRSTNAME",	"PRENOM");
define("_AM_XPETITIONS_SIGN_CSV_EMAIL",		"EMAIL");
define("_AM_XPETITIONS_SIGN_CSV_ADDRESS",	"ADRESSE");
define("_AM_XPETITIONS_SIGN_CSV_ZIP",		"CODE POSTAL");
define("_AM_XPETITIONS_SIGN_CSV_CITY",		"VILLE");
define("_AM_XPETITIONS_SIGN_CSV_COUNTRY",	"PAYS");
define("_AM_XPETITIONS_SIGN_CSV_JOB",		"EMPLOI");
define("_AM_XPETITIONS_SIGN_CSV_DATE",		"DATE");
define("_AM_XPETITIONS_SIGN_CSV_IP",		"ADRESSE IP");
define("_AM_XPETITIONS_SIGN_CSV_INPROGRESS",	"Ecriture du fichier CSV en cours...");
define("_AM_XPETITIONS_SIGN_CSV_SUCCESS",	"Fichier CSV écrit avec succès !");
define("_AM_XPETITIONS_SIGN_CSV_ERROR",		"Une erreur est survenue lors de l'écriture du fichier !<br />Est-ce que votre répertoire 'xpetitions/csv/' est ouvert en écriture ?");
define("_AM_XPETITIONS_SIGN_CSV_TITLE",		"<h1>EXTRACTION DES SIGNATURES (format CSV)</h1>");
define("_AM_XPETITIONS_SIGN_CSV_PETITION",	"<u>Pour la pétition :</u> ");
define("_AM_XPETITIONS_SIGN_HELP4",		"<u>Suppression de signatures :</u><br />En cliquant sur une pétition, vous affichez les signatures associées. Cliquez sur une signature puis sur 'supprimer la signature' pour enveler la signature de la base de données.<br /><br /><u>Ajout d'une signature :</u><br />Vous avez la possibilité d'ajouter manuellement une signature suite à une signature retournée sur support papier.");
define("_AM_XPETITIONS_SIGN_SHOW",		"Réglages de l'affichage des signatures");
define("_AM_XPETITIONS_TITLE_DELFORM",		"Suppression de signatures");
define("_AM_XPETITIONS_PETITIONS_DELFORM",	"Pétitions");
define("_AM_XPETITIONS_PETITIONS_DELFORM_DSC",	"Choisissez la pétition pour pouvoir accéder aux signatures");
define("_AM_XPETITIONS_SIGN_DELFORM",		"Signatures");
define("_AM_XPETITIONS_SIGN_DELFORM_DSC",	"Choisissez la signature à supprimer");

define("_AM_XPETITIONS_TITLE_ADDFORM",		"Ajout de signatures");
define("_AM_XPETITIONS_FNAME_ADDFORM",		"Prénom du signataire");
define("_AM_XPETITIONS_LNAME_ADDFORM",		"Nom du signataire");
define("_AM_XPETITIONS_ADDRESS_ADDFORM",	"Adresse du signataire");
define("_AM_XPETITIONS_ZIP_ADDFORM",		"Code postal du signataire");
define("_AM_XPETITIONS_CITY_ADDFORM",		"Ville du signataire");
define("_AM_XPETITIONS_COUNTRY_ADDFORM",	"Pays du signataire");
define("_AM_XPETITIONS_JOB_ADDFORM",		"Emploi du signataire");
define("_AM_XPETITIONS_EEMAIL_ADDFORM",		"Email du signataire");
define("_AM_XPETITIONS_DDATE_ADDFORM",		"Date de la signature");
define("_AM_XPETITIONS_PETITIONS_ADDFORM",	"Nom de la pétition (table MySQL)");
define("_AM_XPETITIONS_FORCE_SIGN",		"Validation forcée des retardataires");
define("_AM_XPETITIONS_FORCE_SIGN_CONFIRM",	"Voulez-vous forcer la validation des signatures non validées pour la pétition '%s'");
define("_AM_XPETITIONS_TITLE_SHOW_SIGN",	"Affichage des signatures");
define("_AM_XPETITIONS_SELECT_SHOW",		"Sens de l'affichage des signatures");
define("_AM_XPETITIONS_SELECT_SHOW_DSC",	"Choisissez le sens d'affichage des signataires de vos pétitions.<br />Soit sous forme de colonnes, soit les unes à la suite des autres séparées par des virgules.");
define("_AM_XPETITIONS_SELECT_SHOW1",		"Colonne");
define("_AM_XPETITIONS_SELECT_SHOW2",		"Ligne");
define("_AM_XPETITIONS_SELECT_NBCOL",		"Nombre de colonnes");
define("_AM_XPETITIONS_SELECT_NBCOL_DSC",	"Si vous choisissez l'affichage en colonne, vous pouvez choisir le nombre de colonne pour visualiser vos signataires.");
define("_AM_XPETITIONS_INFOS_SIGN",		"Informations présentes dans les signatures");
define("_AM_XPETITIONS_INFOS_SIGN_DSC",		"Cochez les informations que vous voulez voir apparaître sur les signatures de vos pétitions.<br />Si vous décidez de ne pas choisir d'option, alors il n'apparaîtra que le nom et le prénom de vos signataires.<br /><br />Si vous choisissez des options, celles-ci apparaîtront entre les parenthèses comme ci-dessous :<br />Patrice BOUTHIER <span style='font-weight: bold;'>(</span><span style='color: red;'>Développeur web - FRANCE - contact@informatux.com</span><span style='font-weight: bold;'>)</span>");
define("_AM_XPETITIONS_INFOS_SIGN1",		"Emploi");
define("_AM_XPETITIONS_INFOS_SIGN2",		"Pays");
define("_AM_XPETITIONS_INFOS_SIGN3",		"Email");
define("_AM_XPETITIONS_INFOS_SIGN4",		"Ville");
define("_AM_XPETITIONS_INFOS_SIGN5",		"Date");
define("_AM_XPETITIONS_SIGN_HELP5",		"Choisissez ici comment les signatures de vos pétitions seront affichées lorsque les internautes les consulteront sur votre site.<br /><br /><span style='text-decoration: underline;'>Deux choix :</span><br />- Affichage en colonne (choisissez également le nombre de colonnes)<br />- Affichage en ligne (séparées par des virgules)<br /><br />Choisissez le formatage d'une signature parmi les options disponibles (emploi, pays, email, ville, date).<br />Si vous choisissez des options, elles apparaîtront entre parenthèses avec le nom et le prénom du signataire.<br />Si vous ne choisissez pas d'option, seuls le nom et le prénom apparaîtront.");

// * email.php
define("_AM_XPETITIONS_TITLE_EMAILS",		"Gestion du contenus des emails envoyés");
define("_AM_XPETITIONS_MESS_EMAIL_UN",		"Email envoyé aux retardaires");
define("_AM_XPETITIONS_MESS_EMAIL_UNDSC",	"Vous pouvez insérer des variables dans le corps de votre message (voir l'aide)");
define("_AM_XPETITIONS_SUB_EMAIL_UN",		"Email envoyé aux retardaires (Sujet)");
define("_AM_XPETITIONS_SUB_EMAIL_UNDSC", 	"Vous pouvez insérer le nom de la pétition dans le sujet en mettant {PETITION} et le nom de votre site en mettant {SITE_NAME} (respectez la même syntaxe)");
define("_AM_XPETITIONS_SUB_EMAIL_TO",		"Email envoyé aux signataires pour valider leur signature (Sujet)");
define("_AM_XPETITIONS_SUBMIT_EMAILS",		"Modifier les emails");
define("_AM_XPETITIONS_SUB_EMAIL_TODSC",	"Vous pouvez insérer le nom de la pétition dans le sujet en mettant {PETITION} et le nom de votre site en mettant {SITENAME}  (respectez la même syntaxe)");
define("_AM_XPETITIONS_MESS_EMAIL_TO",		"Email envoyé aux signataires pour valider leur signature");
define("_AM_XPETITIONS_MESS_EMAIL_TODSC",	"Vous pouvez insérer des variables dans le corps de votre message (voir l'aide)");
define("_AM_XPETITIONS_MESS_EMAIL_HELP1",	"<b>AIDE</b>");
define("_AM_XPETITIONS_MESS_EMAIL_HELP2",	"<div style='font-weight: normal; text-align: center;'>Vous pouvez insérer les variables suivantes dans le corps de votre message (respectez la même syntaxe) :</div><br /><table style='text-align: left; width: 100%;' border='0' cellpadding='0' cellspacing='0'><tbody><tr><td style='text-align: center; vertical-align: middle;'><span style='font-weight: bold; text-decoration: underline;'>Email aux retardaires</span></td><td style='text-align: center; vertical-align: middle;'><span style='font-weight: bold; text-decoration: underline;'>Email aux signataires pour validation</span></td></tr><tr><td style='width: 50%; text-align: center; vertical-align: top;'>{PETITION} nom de la pétition<br />{USER_NAME} Nom complet du retardataire.<br />{USER_EMAIL} Email du retardataire.<br />{LINK_URL} Lien à cliquer pour que le retardataire valide sa signature.<br />{SITE_NAME} Nom de votre site.<br />{SITE_URL} Url de votre site.</td><td style='width: 50%; text-align: center; vertical-align: top;'>{PETITION} nom de la pétition<br />{PRENOM} prénom du signataire<br />{NOM} nom du signataire<br />{INFOS} informations sur le signataire<br />{VALIDATION} lien de confirmation de signature<br />{SITENAME} nom de votre site<br />{SITESLOGAN} slogan de votre site<br />{SITEURL} url de votre site</td></tr></tbody></table>");
define("_AM_XPETITIONS_MESS_NONE",		"");

// * field.php
define("_AM_XPETITIONS_FIELD_HELP1",		"<b>AIDE</b>");
define("_AM_XPETITIONS_FIELD_HELP2",		"Gérer le formulaire de signatures des pétitions.<br /><br />Vous pouvez afficher ou non les champs du formulaire et les rendre ou non obligatoire.<br /><br />Si vous cochez un champs 'obligatoire' et qu'il n'est pas coché 'visible', celui-ci n'apparaitra pas dans le formulaire et son caractère d'obligation ne sera pas pris en compte.<br />Il faut d'abord qu'un champs soit 'visible' pour que le paramètre 'obligatoire' soit accessible.");
define("_AM_XPETITIONS_TITLE_FIELDS",		"Gestion des champs du formulaire de signature des pétitions");
define("_AM_XPETITIONS_FIELD_VISIBLE",		"Visible&nbsp;&nbsp;");
define("_AM_XPETITIONS_FIELD_OBLIGATORY",	"Requis");
define("_AM_XPETITIONS_FIELD_1",		"Champs Nom");
define("_AM_XPETITIONS_FIELD_2",		"Champs Prénom");
define("_AM_XPETITIONS_FIELD_3",		"Champs Adresse");
define("_AM_XPETITIONS_FIELD_4",		"Champs Code postal");
define("_AM_XPETITIONS_FIELD_5",		"Champs Ville");
define("_AM_XPETITIONS_FIELD_6",		"Champs Pays");
define("_AM_XPETITIONS_FIELD_7",		"Champs Profession");
define("_AM_XPETITIONS_FIELD_8",		"Champs Email");
define("_AM_XPETITIONS_SUBMIT_FIELDS",		"Enregistrer");
define("_AM_XPETITIONS_FIELD_NONE",		"");

// * captcha.php
define("_AM_XPETITIONS_TITLE_CAPTCHA",		"Choisissez votre captcha");
define("_AM_XPETITIONS_CAPTCHA_SAMPLES",	" parmi ceux disponibles et visibles par votre serveur");
define("_AM_XPETITIONS_STATUS_CAPTCHA",		"Etat de la vérification anti-spam (modifier vos %s) : ");
define("_AM_XPETITIONS_CAPTCHA_SUBMIT",		"Valider votre captcha");
define("_AM_XPETITIONS_CAPTCHA_HELP1",		"<b>AIDE</b>");
define("_AM_XPETITIONS_CAPTCHA_HELP2",		"Choisissez le CAPTCHA adapté à votre serveur ou bien à votre envie.<br />Si l'état de la vérification anti-spam est à <span style='color: red;'>NON</span>, alors le choix du captcha ne sera pas visible dans vos formulaires.");
define("_AM_XPETITIONS_CAPTCHA_CHOICE",		"Quel captcha voulez-vous utiliser ?");
define("_AM_XPETITIONS_CAPTCHA_CHOICE1",	"Choix 1 : Captcha (K.OHWADA)");
define("_AM_XPETITIONS_CAPTCHA_CHOICE1A",	"Choix 1");
define("_AM_XPETITIONS_CAPTCHA_CHOICE1_DSC",	"Pour modifier les préférences des images CAPTCHA affichées dans vos formulaires, modifiez le fichier /xpetitions/class/captcha_x/captcha_x.ini .<br />Les explications des différentes options se trouvent dans le fichier.");
define("_AM_XPETITIONS_CAPTCHA_CHOICE2",	"Choix 2 : Captcha (JPGRAPH)");
define("_AM_XPETITIONS_CAPTCHA_CHOICE2A",	"Choix 2");
define("_AM_XPETITIONS_CAPTCHA_CHOICE2_DSC",	"Pour modifier les préférences des images CAPTCHA affichées dans vos formulaires, modifiez le fichier /xpetitions/generate.php .<br />La seule option disponible est le nombre de caractères présent dans l'image CAPTCHA.");
define("_AM_XPETITIONS_CAPTCHA_CHOICE3",	"Choix 3 : Captcha (TEXTE)");
define("_AM_XPETITIONS_CAPTCHA_CHOICE3A",	"Choix 3");
define("_AM_XPETITIONS_CAPTCHA_CHOICE3_DSC",	"Aucun réglage n'est nécessaire.<br />Les questions sont aléatoires, rafraîchissez la page pour voir d'autres questions.");


// * about.php *
define("_AM_XPETITIONS_ABOUT_1",		"A propos");
define("_AM_XPETITIONS_UPDATE",			"Modifier");
define("_AM_XPETITIONS_CANCEL",			"Supprimer");
define("_AM_XPETITIONS_ABOUT_1_DSC",            "Xpetitions est un module de pétitions en ligne multilangue pour XOOPS. Les formulaires ont été accompagné d'une image captcha paramétrable par son fichier ini et activable depuis le backoffice.");
define("_AM_XPETITIONS_ABOUT_2",                "Mise à jour");
define("_AM_XPETITIONS_ABOUT_2_DSC",            "Vérifier les mises à jour");
define("_AM_XPETITIONS_ABOUT_3",                "Support, demandes et commentaires");
define("_AM_XPETITIONS_ABOUT_3_DSC",            " possède <a href='https://github.com/informatux45/xpetitions' target='_blank'>un dépôt pour le suivi des bugs</a>. Vérifier qu'un bug n'a pas déjà été soumis avant d'ajouter le votre.");
define("_AM_XPETITIONS_ABOUT_4",                "Demandes d'amélioration");
define("_AM_XPETITIONS_ABOUT_4_DSC",            "Vous pouvez effectuer vos demandes d'amélioration sur <a href='https://github.com/informatux45/xpetitions' target='_blank'> le dépôt par le biais du formulaire de contact</a>.");
define("_AM_XPETITIONS_ABOUT_5",                "Email");
define("_AM_XPETITIONS_ABOUT_5_DSC",            "Je peux aussi être contacter par email sur mon site par le biais <a href='http://www.informatux.com/' target='_blank'>du formulaire de contact</a>.");
define("_AM_XPETITIONS_ABOUT_6",                "Remerciements");
define("_AM_XPETITIONS_ABOUT_6_DSC",            "Un grand merci à Thomas HUBERT (worldcoalition.org) pour la traduction en anglais du module.");
?>