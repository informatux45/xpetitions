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

// Initialisation du formulaire
$latecomer = new XoopsThemeForm(_AM_XPETITIONS_TITLE_LATECOMERFORM, "latecomerform", "signature.php?id=".$_GET['id']."&op=latecomer_send");

$petition_name  = getPetitionDetails($_GET['id']);
$sample_message =  getEmailInfos('1'); // Email aux retardataires

echo '<br />';
// Message aux retardataires
$field_message = new XoopsFormTextArea(_AM_XPETITIONS_MESS_LATECOMER, 'message', $sample_message['message'], 7, 10);
$latecomer->addElement($field_message, true);

// Champs cachés
$field_hidden1 = new XoopsFormHidden('id', $_GET['id']);
$latecomer->addElement($field_hidden1);

$field_hidden2 = new XoopsFormHidden('name', $_GET['name']);
$latecomer->addElement($field_hidden2);

// Bouton Envoyer
$nb_latecomer = getSignaturesInfos($_GET['name'], 0);
$button_msg   = ($nb_latecomer < 2) ? sprintf(_AM_XPETITIONS_MSG_BUTTON_LATECOMER1, $nb_latecomer) : sprintf(_AM_XPETITIONS_MSG_BUTTON_LATECOMER2, $nb_latecomer);
$button_tray  = new XoopsFormElementTray($button_msg);
$button_tray->addElement(new XoopsFormButton('','post', _AM_XPETITIONS_SUBMIT_LATECOMER, 'submit'));
$latecomer->addElement($button_tray);

// Affichage du formulaire
$latecomer->display();
?> 
