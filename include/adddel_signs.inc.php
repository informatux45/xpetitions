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

// Préparation des tableaux à fournir au formulaire
$xpetitions_name = getPetitionsInfos();

include("delform.inc.php");

// Initialisation du formulaire
$addform = new XoopsThemeForm(_AM_XPETITIONS_TITLE_ADDFORM, "addform", "signature.php?op=addsign");

// Prénom du signataire
$field_firstname = new XoopsFormText(_AM_XPETITIONS_FNAME_ADDFORM, 'firstname', 35, 50, '');
$addform->addElement($field_firstname, true);

// Nom du signataire
$field_lastname = new XoopsFormText(_AM_XPETITIONS_LNAME_ADDFORM, 'lastname', 35, 50, '');
$addform->addElement($field_lastname, true);

// Adresse du signataire
$field_address = new XoopsFormText(_AM_XPETITIONS_ADDRESS_ADDFORM, 'address', 35, 100, '');
$addform->addElement($field_address, true);

// Code postal du signataire
$field_zip = new XoopsFormText(_AM_XPETITIONS_ZIP_ADDFORM, 'zip', 35, 10, '');
$addform->addElement($field_zip, true);

// Ville du signataire
$field_city = new XoopsFormText(_AM_XPETITIONS_CITY_ADDFORM, 'city', 35, 50, '');
$addform->addElement($field_city, true);

// Pays du signataire
$field_country = new XoopsFormSelectCountry(_AM_XPETITIONS_COUNTRY_ADDFORM, 'country', '', 1);
$addform->addElement($field_country, true);

// Profession du signataire
$field_job = new XoopsFormText(_AM_XPETITIONS_JOB_ADDFORM, 'job', 35, 50, '');
$addform->addElement($field_job, true);

// Adresse email du signataire (pour validation)
$field_email = new XoopsFormText(_AM_XPETITIONS_EEMAIL_ADDFORM, 'email', 35, 100, '');
$field_email->setExtra("onblur='return Email(\"email\", \"Merci de verifier votre adresse e-mail. Son format ne correspond pas &agrave; une adresse e-mail valide.\")'");
$addform->addElement($field_email, true);

// Date de la signature
$field_date = new XoopsFormTextDateSelect(_AM_XPETITIONS_DDATE_ADDFORM, 'date', 30, '');
$addform->addElement($field_date, true);

// Nom de la table des signatures de la pétition
$field_petition_name = new XoopsFormSelect(_AM_XPETITIONS_PETITIONS_ADDFORM, 'name_petition', '');
$xpetitions_name = getPetitionsInfos();
foreach ($xpetitions_name as $row) {
	$xpetitions_liste = array($row['name'] => substr($myts->DisplayTarea($row['title']),0, 50));
	$field_petition_name->addOptionArray($xpetitions_liste);
}
$addform->addElement($field_petition_name, true);

// Bouton Ajouter/soumettre
$button_tray = new XoopsFormElementTray('');
$button_tray->addElement(new XoopsFormButton('','post', _AM_XPETITIONS_SUBMIT, 'submit'));
$addform->addElement($button_tray);

// Affichage du formulaire
echo '<br />';
$addform->display();
?>