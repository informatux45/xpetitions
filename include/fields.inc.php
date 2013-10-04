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

// $email_unconfirmed = getEmailInfos('1'); // Email aux retardataires
// $email_toconfirmed = getEmailInfos('2'); // Email aux signataires pour validation

// Initialisation du formulaire
$fields = new XoopsThemeForm(_AM_XPETITIONS_TITLE_FIELDS, "fieldform", "field.php?op=update");

echo '<br />';

// Champs "nom"
$field_lastname1 = new XoopsFormCheckBox('', 'field_lastname1', 0);
$field_lastname1->addOption(getFieldInfos(1, 1), _AM_XPETITIONS_FIELD_VISIBLE);
$field_lastname1->setExtra("checked");
$field_lastname1->setExtra("disabled");

$field_lastname2 = new XoopsFormCheckBox('', 'field_lastname2', 0);
$field_lastname2->addOption(getFieldInfos(1, 2), _AM_XPETITIONS_FIELD_OBLIGATORY);
$field_lastname2->setExtra("checked");
$field_lastname2->setExtra("disabled");

$field_lastname = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_1, '');
$field_lastname->addElement($field_lastname1);
$field_lastname->addElement($field_lastname2);
$fields->addElement($field_lastname);

// Champs "prénom"
$field_firstname1 = new XoopsFormCheckBox('', 'field_firstname', 0);
$field_firstname1->addOption(getFieldInfos(2, 1), _AM_XPETITIONS_FIELD_VISIBLE);
$field_firstname1->setExtra("checked");
$field_firstname1->setExtra("disabled");

$field_firstname2 = new XoopsFormCheckBox('', 'field_firstname2', 0);
$field_firstname2->addOption(getFieldInfos(2, 2), _AM_XPETITIONS_FIELD_OBLIGATORY);
$field_firstname2->setExtra("checked");
$field_firstname2->setExtra("disabled");

$field_firstname = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_2, '');
$field_firstname->addElement($field_firstname1);
$field_firstname->addElement($field_firstname2);
$fields->addElement($field_firstname);

// Champs "adresse"
$field_address1 = new XoopsFormCheckBox('', 'field_address1');
$field_address1->addOption(1, _AM_XPETITIONS_FIELD_VISIBLE);
if (getFieldInfos(3, 1) == 1) {
	$field_address1->setExtra("checked");
}

$field_address2 = new XoopsFormCheckBox('', 'field_address2');
$field_address2->addOption(1, _AM_XPETITIONS_FIELD_OBLIGATORY);
if (getFieldInfos(3, 2) == 1) {
	$field_address2->setExtra("checked");
}

$field_address = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_3, '');
$field_address->addElement($field_address1);
$field_address->addElement($field_address2);
$fields->addElement($field_address);

// Champs "code postal"
$field_zip1 = new XoopsFormCheckBox('', 'field_zip1');
$field_zip1->addOption(1, _AM_XPETITIONS_FIELD_VISIBLE);
if (getFieldInfos(4, 1) == 1)
	$field_zip1->setExtra("checked");

$field_zip2 = new XoopsFormCheckBox('', 'field_zip2');
$field_zip2->addOption(1, _AM_XPETITIONS_FIELD_OBLIGATORY);
if (getFieldInfos(4, 2) == 1)
	$field_zip2->setExtra("checked");

$field_zip = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_4, '');
$field_zip->addElement($field_zip1);
$field_zip->addElement($field_zip2);
$fields->addElement($field_zip, true);

// Champs "ville"
$field_city1 = new XoopsFormCheckBox('', 'field_city1');
$field_city1->addOption(1, _AM_XPETITIONS_FIELD_VISIBLE);
if (getFieldInfos(5, 1) == 1)
	$field_city1->setExtra("checked");

$field_city2 = new XoopsFormCheckBox('', 'field_city2');
$field_city2->addOption(1, _AM_XPETITIONS_FIELD_OBLIGATORY);
if (getFieldInfos(5, 2) == 1)
	$field_city2->setExtra("checked");

$field_city = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_5, '');
$field_city->addElement($field_city1);
$field_city->addElement($field_city2);
$fields->addElement($field_city, true);

// Champs "pays"
$field_country1 = new XoopsFormCheckBox('', 'field_country1');
$field_country1->addOption(1, _AM_XPETITIONS_FIELD_VISIBLE);
if (getFieldInfos(6, 1) == 1)
	$field_country1->setExtra("checked");

$field_country2 = new XoopsFormCheckBox('', 'field_country2');
$field_country2->addOption(1, _AM_XPETITIONS_FIELD_OBLIGATORY);
if (getFieldInfos(6, 2) == 1)
	$field_country2->setExtra("checked");

$field_country = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_6, '');
$field_country->addElement($field_country1);
$field_country->addElement($field_country2);
$fields->addElement($field_country, true);

// Champs "profession"
$field_job1 = new XoopsFormCheckBox('', 'field_job1');
$field_job1->addOption(1, _AM_XPETITIONS_FIELD_VISIBLE);
if (getFieldInfos(7, 1) == 1)
	$field_job1->setExtra("checked");

$field_job2 = new XoopsFormCheckBox('', 'field_job2');
$field_job2->addOption(1, _AM_XPETITIONS_FIELD_OBLIGATORY);
if (getFieldInfos(7, 2) == 1)
	$field_job2->setExtra("checked");

$field_job = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_7, '');
$field_job->addElement($field_job1);
$field_job->addElement($field_job2);
$fields->addElement($field_job, true);

// Champs "email"
$field_email1 = new XoopsFormCheckBox('', 'field_email1');
$field_email1->addOption(getFieldInfos(8, 1), _AM_XPETITIONS_FIELD_VISIBLE);
$field_email1->setExtra("checked");
$field_email1->setExtra("disabled");

$field_email2 = new XoopsFormCheckBox('', 'field_email2');
$field_email2->addOption(getFieldInfos(8, 2), _AM_XPETITIONS_FIELD_OBLIGATORY);
$field_email2->setExtra("checked");
$field_email2->setExtra("disabled");

$field_email = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_8, '');
$field_email->addElement($field_email1);
$field_email->addElement($field_email2);
$fields->addElement($field_email, true);

// Bouton Soumettre
$button_tray  = new XoopsFormElementTray(_AM_XPETITIONS_FIELD_NONE);
$button_tray->addElement(new XoopsFormButton('','post', _AM_XPETITIONS_SUBMIT_FIELDS, 'submit'));
$fields->addElement($button_tray);

// Affichage du formulaire
$fields->display();
?> 
