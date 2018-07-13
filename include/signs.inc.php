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
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

if (is_file(XOOPS_ROOT_PATH . '/class/wysiwyg/formwysiwygtextarea.php')) {
    include_once XOOPS_ROOT_PATH . '/class/wysiwyg/formwysiwygtextarea.php';
}

// Initialisation du formulaire
$signsform = new XoopsThemeForm(_AM_XPETITIONS_TITLE_SHOW_SIGN, 'signsform', 'signature.php?op=signshow_update');
$signsform->setExtra("enctype='multipart/form-data'");

// Choix de l'affichage des signatures (colonnes ou lignes)
$field_select1   = new XoopsFormSelect(_AM_XPETITIONS_SELECT_SHOW, 'col', $col);
$select1_options = ['colonne' => _AM_XPETITIONS_SELECT_SHOW1, 'ligne' => _AM_XPETITIONS_SELECT_SHOW2];
$field_select1->addOptionArray($select1_options);
$field_select1->setDescription(_AM_XPETITIONS_SELECT_SHOW_DSC);
$signsform->addElement($field_select1, true);

// Choix du nombre de colonnes visible sur la page des signatures
$field_select2   = new XoopsFormSelect(_AM_XPETITIONS_SELECT_NBCOL, 'nbcol', $nbcol);
$select2_options = ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10];
$field_select2->addOptionArray($select2_options);
$field_select2->setDescription(_AM_XPETITIONS_SELECT_NBCOL_DSC);
$signsform->addElement($field_select2, true);

// Choix des champs visibles par signataire
$field_signs1 = new XoopsFormCheckBox('', 'job');
$field_signs1->addOption(1, _AM_XPETITIONS_INFOS_SIGN1);
if ($job == 1) {
    $field_signs1->setExtra('checked');
}
$field_signs2 = new XoopsFormCheckBox('', 'country');
$field_signs2->addOption(1, _AM_XPETITIONS_INFOS_SIGN2);
if ($country == 1) {
    $field_signs2->setExtra('checked');
}
$field_signs3 = new XoopsFormCheckBox('', 'email');
$field_signs3->addOption(1, _AM_XPETITIONS_INFOS_SIGN3);
if ($email == 1) {
    $field_signs3->setExtra('checked');
}
$field_signs4 = new XoopsFormCheckBox('', 'city');
$field_signs4->addOption(1, _AM_XPETITIONS_INFOS_SIGN4);
if ($city == 1) {
    $field_signs4->setExtra('checked');
}
$field_signs5 = new XoopsFormCheckBox('', 'date');
$field_signs5->addOption(1, _AM_XPETITIONS_INFOS_SIGN5);
if ($date == 1) {
    $field_signs5->setExtra('checked');
}

$field_signs = new XoopsFormElementTray(_AM_XPETITIONS_INFOS_SIGN, '<br />');
$field_signs->addElement($field_signs1); // Emploi
$field_signs->addElement($field_signs2); // Pays
$field_signs->addElement($field_signs3); // Email
$field_signs->addElement($field_signs4); // Ville
$field_signs->addElement($field_signs5); // Date
$field_signs->setDescription(_AM_XPETITIONS_INFOS_SIGN_DSC);
$signsform->addElement($field_signs, true);

// Bouton Ajouter/soumettre
$button_tray = new XoopsFormElementTray('');
$button_tray->addElement(new XoopsFormButton('', 'post', _AM_XPETITIONS_SUBMIT, 'submit'));
$signsform->addElement($button_tray);

// Affichage du formulaire
$signsform->display();
