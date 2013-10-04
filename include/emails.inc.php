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

// includes
include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");

$email_unconfirmed = getEmailInfos('1'); // Email aux retardataires
$email_toconfirmed = getEmailInfos('2'); // Email aux signataires pour validation

// Initialisation du formulaire
$emails = new XoopsThemeForm(_AM_XPETITIONS_TITLE_EMAILS, "emailform", "email.php?op=update");

echo '<br />';

// Message aux signataires à valider par email (sujet)
$field_submess_to = new XoopsFormText(_AM_XPETITIONS_SUB_EMAIL_TO, 'subject_toconfirmed', 50, 255, $email_toconfirmed['subject']);
$field_submess_to->setDescription(_AM_XPETITIONS_SUB_EMAIL_TODSC);
$emails->addElement($field_submess_to, true);
// Message aux signataires à valider par email (corps)
$field_mess_to = new XoopsFormTextArea(_AM_XPETITIONS_MESS_EMAIL_TO, 'message_toconfirmed', $email_toconfirmed['message'], 7, 50);
$field_mess_to->setDescription(_AM_XPETITIONS_MESS_EMAIL_TODSC);
$emails->addElement($field_mess_to, true);

// Message aux retardataires (sujet)
$field_submess_un = new XoopsFormText(_AM_XPETITIONS_SUB_EMAIL_UN, 'subject_unconfirmed', 50, 255, $email_unconfirmed['subject']);
$field_submess_un->setDescription(_AM_XPETITIONS_SUB_EMAIL_UNDSC);
$emails->addElement($field_submess_un, true);
// Message aux retardataires (corps)
$field_mess_un = new XoopsFormTextArea(_AM_XPETITIONS_MESS_EMAIL_UN, 'message_unconfirmed', $email_unconfirmed['message'], 7, 50);
$field_mess_un->setDescription(_AM_XPETITIONS_MESS_EMAIL_UNDSC);
$emails->addElement($field_mess_un, true);

// Bouton Soumettre
$button_tray  = new XoopsFormElementTray(_AM_XPETITIONS_MESS_NONE);
$button_tray->addElement(new XoopsFormButton('','post', _AM_XPETITIONS_SUBMIT_EMAILS, 'submit'));
$emails->addElement($button_tray);

// Affichage du formulaire
$emails->display();
?> 
