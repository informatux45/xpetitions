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

// ENCODAGE DU FICHIER ISO-8859-1
// index
define('_MD_XPETITIONS_INDEX', 'Pétitions en ligne');
define('_MD_XPETITIONS_SIGNATURES', 'signatures');
define('_MD_XPETITIONS_ARCHIVE', 'Pétition archivée');
define('_MD_XPETITIONS_HOME_NAV', 'Accueil');
define('_MD_XPETITIONS_HOME_NAV_SIGN', 'Signer la pétition');
define('_MD_XPETITIONS_HOME_NAV_SIGN_RECORDED', 'Signature enregistrée');
define('_MD_XPETITIONS_HOME_NAV_PRESIGNED', 'Signature à valider');
define('_MD_XPETITIONS_HOME_NAV_SIGN_VALID', 'Signature validée');
define('_MD_XPETITIONS_HOME_NAV_FRIEND', 'Prévenir un ami');
define('_MD_XPETITIONS_HOME_NAV_VALID', 'Validation de votre signature');
define('_MD_XPETITIONS_HOME_NAV_ALLSIGNS', 'Voir les signatures');
define('_MD_XPETITIONS_HOME_TAB1', 'Pétitions en ligne');
define('_MD_XPETITIONS_HOME_TAB2', 'Pétitions archivées');
define('_MD_XPETITIONS_NO_ACTIVE', 'Aucune pétition en ligne à signer.');
define('_MD_XPETITIONS_NO_ARCHIVE', 'Aucune pétition archivée.');
define('_MD_XPETITIONS_NO_DETAIL', 'Aucun détail disponible sur cette pétition');
define('_MD_XPETITIONS_OFFLINE', 'Pétition désactivée');

// formulaire de signature d'une pétition
define('_MD_XPETITIONS_TITLE_SIGNFORM', '<br />Remplissez le formulaire pour signer en ligne la pétition.<br />Une confirmation par %s vous sera demandée pour valider votre signature.<br />Les champs marqués par un * sont obligatoires.<br /><br />');
define('_MD_XPETITIONS_TITLE_SIGNFORM1', 'email');
define('_MD_XPETITIONS_TITLE_SIGNFORM2', 'double click');
define('_MD_XPETITIONS_FNAME_SIGNFORM', 'Nom');
define('_MD_XPETITIONS_LNAME_SIGNFORM', 'Prénom');
define('_MD_XPETITIONS_ADDRESS_SIGNFORM', 'Adresse');
define('_MD_XPETITIONS_ZIP_SIGNFORM', 'Code postal');
define('_MD_XPETITIONS_CITY_SIGNFORM', 'Ville');
define('_MD_XPETITIONS_COUNTRY_SIGNFORM', 'Pays');
define('_MD_XPETITIONS_JOB_SIGNFORM', 'Profession');
define('_MD_XPETITIONS_EMAIL_SIGNFORM', 'Email');
define('_MD_XPETITIONS_SUBMIT', 'Signez la pétition');
define('_MD_XPETITIONS_CAPTCHA', "Saisissez le texte présent dans l'image.<br />Respectez les caractères majuscules et minuscules.<br />Si vous n'arrivez pas à lire le texte, vous pouvez le changer en cliquant sur l'image.");
define('_MD_XPETITIONS_CAPTCHA_DSC', 'Vérification anti-spam');
// ---------------------------------------------------------------------------------------------
//                                        22/05/09 urbanspaceman mod
// ---------------------------------------------------------------------------------------------
define('_MD_XPETITIONS_WHOVIEW1', 'Les signatures de la pétition sont publiques');
define('_MD_XPETITIONS_WHOVIEW2', 'Les signatures de la pétition sont visibles par les utilisateurs enregistrés uniquement');
define('_MD_XPETITIONS_WHOVIEW3', 'Les signatures de la pétition sont visibles par les administrateurs du site uniquement');
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------

// formulaire de pré-signature d'une pétition
define('_MD_XPETITIONS_SIGN_PRESIGNED', 'Vous avez demandé à signer notre pétition en ligne et nous vous en remercions.<br />
<br />Votre signature sera enregistrée dans notre base de données en cliquant sur le bouton suivant. Après cela, vous serez pris en compte parmi les signataires.<br /><br />');
define('_MD_XPETITIONS_PRESIGN_VALUE', 'Valider votre signature');

// formulaire pour prévenir un ami
define('_MD_XPETITIONS_TITLE_FRIENDFORM', "<br />Remplissez le formulaire pour prévenir un ami qu'il peut signer la pétition.<br />Un email sera envoyé à celui-ci avec un lien jusqu'à la pétition.<br />Tous les champs sont obligatoires.<br /><br />");
define('_MD_XPETITIONS_YNAME_FRIENDFORM', 'Nom de votre ami');
define('_MD_XPETITIONS_FNAME_FRIENDFORM', 'Votre nom');
define('_MD_XPETITIONS_FEMAIL_FRIENDFORM', 'Adresse email de votre ami');
define('_MD_XPETITIONS_SUBMIT_FRIEND', 'Prévenir votre ami');
define('_MD_XPETITIONS_EMAIL_FORMAT_FRIENDFORM', 'Email envoyé à :');
define('_MD_XPETITIONS_EMAIL_FORMAT_DSC', "<span style='font-weight: bold;' id='contact'></span>");
define('_MD_XPETITIONS_EMAIL_FRIENDFORM', "Bonjour <span style='font-weight: bold;' id='your_name'></span>,<br /><br />Ce message vous est transmis par <span style='font-weight: bold;' id='friend_name'></span> depuis le site de <span style='font-weight: bold;'>%s</span>.<br />Vous pouvez signer la pétition en ligne (<span style='font-weight: bold;'>%s</span>) à cette adresse :<br /><span style='font-weight: bold;'>%s</span><br /><br />Merci<br />A bientôt<br />");
define('_MD_XPETITIONS_EMAIL_FRIENDFORM_SEND', "Bonjour %s,\n\nCe message vous est transmis par %s depuis le site de %s.\nVous pouvez signer la petition en ligne (%s) a cette adresse :\n%s\n\nMerci\nA bientot\n\n%s\n%s\n%s");
define('_MD_XPETITIONS_EMAIL_SEND', "L'email a été envoyé à votre ami.<br />Nous vous remercions de l'interêt que vous portez à notre site.");
define('_MD_XPETITIONS_SUBJECT_EMAIL', 'Pétition du site %s');

// enregistrement d'une signature
define('_MD_XPETITIONS_SIGN_RECORDED', "Merci d'avoir signé notre pétition en ligne.<br /><br />Votre signature est enregistrée dans notre base de données maintenant. Vous devez néanmoins valider celle-ci en cliquant sur le lien de l'email que nous venons de vous envoyer.<br />Après cela, vous serez pris en compte parmi les signataires.");
define('_MD_XPETITIONS_SIGN_VALID', "La validation de votre signature vient d'être effectuée dans notre base de données.<br />Vous allez donc apparaître dès maintenant, dans la liste des signatures de la pétition.<br />Nous vous remercions de l'interêt que vous nous portez.");
define('_MD_XPETITIONS_SIGN_ERROR', "Une erreur est survenu lors de l'enregistrement de votre signature dans notre base de données.<br />Il s'agit peut être d'une erreur de communication avec celle-ci.<br />Recommencez ultérieurement. Si le problème persiste, contactez-nous par email pour nous en informer.<br /><br />Merci de votre compréhension.");

// signature en double
define('_MD_XPETITIONS_SIGN_DOUBLE', "Votre nom, prénom et adresse email correspondent à une signature déjà enregistrée dans notre base de données.<br />Peut être qu'il s'agit d'une erreur de saisie et dans ce cas, nous vous invitons à saisir à nouveau vos informations dans le formulaire de signature en ligne.<br />Sinon, vous êtes déjà enregistré.<br /><a href='javascript:history.go(-1)'>Retour au formulaire</a>");

// voir toutes les signatures
define('_MD_XPETITIONS_TITLE_ALLSIGNS', 'Listes des signataires :<br /><br />');
define('_MD_XPETITIONS_CPT_ALLSIGNS', 'signatures enregistrées');
define('_MD_XPETITIONS_ALL_ALLSIGNS', 'Toutes');
define('_MD_XPETITIONS_ALLSIGNS_CHOOSE', "Choisissez une lettre de l'alphabet.");
define('_MD_XPETITIONS_ALLSIGNS_NOLETTER', 'Aucun signataire commençant par la lettre %s.');
define('_MD_XPETITIONS_ALLSIGNS_NOLETTER_ALL', 'Aucun signataire.');
define('_MD_XPETITIONS_ALLSIGNS_LETTER', 'Signataires commençant par la lettre %s (%s signatures) :');
define('_MD_XPETITIONS_ALLSIGNS_LETTER_ALL', 'Tous les signataires de la pétition :');

// email message
define('_MD_XPETITIONS_SUBJECT_EMAIL_SIGN1', "Signature de la pétition '%s'");

// message
define('_MD_XPETITIONS_ERROR_BLANK', 'Des champs requis ne sont pas remplis !!!');
define('_MD_XPETITIONS_CAPTCHA_ERROR', 'Le code de vérification anti-spam est incorrect, veuillez recommencer !');
define('_MD_XPETITIONS_ERROR_INSERT', "Erreur lors de l'insertion des données dans notre base !!!");
define('_MD_XPETITIONS_ERROR_EMAIL', 'Merci de verifier votre adresse e-mail. Son format ne correspond pas à une adresse e-mail valide.');
define('_MD_XPETITIONS_EMAIL_SEND_ERROR', "Une erreur est survenue lors de l'envoi de l'email.<br />Réessayer plus tard.");
define('_MD_XPETITIONS_FORM_REQUIRED', '&nbsp;&nbsp;* Requis');
define('_MD_XPETITIONS_ERROR_BLANK_ADDRESS', "Le champs 'Adresse' n'est pas rempli !!!");
define('_MD_XPETITIONS_ERROR_BLANK_ZIP', "Le champs 'Code postal' n'est pas rempli !!!");
define('_MD_XPETITIONS_ERROR_BLANK_CITY', "Le champs 'Ville' n'est pas rempli !!!");
define('_MD_XPETITIONS_ERROR_BLANK_COUNTRY', "Le champs 'Pays' n'est pas rempli !!!");
define('_MD_XPETITIONS_ERROR_BLANK_JOB', "Le champs 'Profession' n'est pas rempli !!!");

// Captcha Text
define('_MD_XPETITIONS_CAPTCHA_STRING', 'abcdefghijklmnopqrstuvwxyz');
define('_MD_XPETITIONS_CAPTCHA_TXT_1', 'quelle lettre se trouve entre');
define('_MD_XPETITIONS_CAPTCHA_TXT_2', 'Combien font');
define('_MD_XPETITIONS_CAPTCHA_TXT_3', 'Quel est');
define('_MD_XPETITIONS_CAPTCHA_TXT_4', 'caractère dans');
define('_MD_XPETITIONS_CAPTCHA_TXT_5', '');
define('_MD_XPETITIONS_CAPTCHA_TXT_LESS', 'moins');
define('_MD_XPETITIONS_CAPTCHA_TXT_MORE', 'plus');
define('_MD_XPETITIONS_CAPTCHA_TXT_TIMES', 'fois');
define('_MD_XPETITIONS_CAPTCHA_TXT_IN', 'Dans');
define('_MD_XPETITIONS_CAPTCHA_TXT_AND', 'et');
define('_MD_XPETITIONS_CAPTCHA_TXT_THE', 'le');
define('_MD_XPETITIONS_CAPTCHA_TXT_THEFIRST', 'le premier');
define('_MD_XPETITIONS_CAPTCHA_TXT_THESECOND', 'le second');
define('_MD_XPETITIONS_CAPTCHA_TXT_THELAST', 'le dernier');
define('_MD_XPETITIONS_CAPTCHA_TXT_THELASTFRONT', "l'avant dernier");
define('_MD_XPETITIONS_CAPTCHA_TXT_ZERO', 'zero');
define('_MD_XPETITIONS_CAPTCHA_TXT_ONE', 'un');
define('_MD_XPETITIONS_CAPTCHA_TXT_TWO', 'deux');
define('_MD_XPETITIONS_CAPTCHA_TXT_THREE', 'trois');
define('_MD_XPETITIONS_CAPTCHA_TXT_FOUR', 'quatre');
define('_MD_XPETITIONS_CAPTCHA_TXT_FIVE', 'cinp');
define('_MD_XPETITIONS_CAPTCHA_TXT_SIX', 'six');
define('_MD_XPETITIONS_CAPTCHA_TXT_SEVEN', 'sept');
define('_MD_XPETITIONS_CAPTCHA_TXT_EIGHT', 'huit');
define('_MD_XPETITIONS_CAPTCHA_TXT_NINE', 'neuf');
define('_MD_XPETITIONS_CAPTCHA_TXT_TEN', 'dix');
