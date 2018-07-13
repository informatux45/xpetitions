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

$post    = intval($_GET['id']);
$is_file = getPetitionDetails($post);

// Initialisation du formulaire
$editform = new XoopsThemeForm(_AM_XPETITIONS_TITLE1_EDITFORM, "editform", "petitions.php?op=update");
$editform->setExtra("enctype='multipart/form-data'");

// Nom de la table des signatures de la pétition
$field_name = new XoopsFormText(_AM_XPETITIONS_NAME_ADDFORM, 'name', 50, 15, $name);
$field_name->setDescription(_AM_XPETITIONS_NAME_ADDFORM_DSC);
$field_name->setExtra("readonly = 'readonly'");
$editform->addElement($field_name);

// Titre de la petition
$field_title = new XoopsFormText(_AM_XPETITIONS_TITLE2_ADDFORM, 'title', 50, 500, $title);
$field_title->setDescription(_AM_XPETITIONS_TITLE2_ADDFORM_DSC);
$editform->addElement($field_title, true);

// Description de la petition
$field_description = getEditor(_AM_XPETITIONS_DESC_ADDFORM, 'description', $description);
$field_description->setDescription(_AM_XPETITIONS_DESC_ADDFORM_DSC);
$editform->addElement($field_description, true);

// Email de la petition
$field_email = new XoopsFormText(_AM_XPETITIONS_EMAIL_ADDFORM, 'email', 50, 255, $email);
$field_email->setDescription(_AM_XPETITIONS_EMAIL_ADDFORM_DSC);
$editform->addElement($field_email, true);

// Statut de la petition
$field_status = new XoopsFormSelect(_AM_XPETITIONS_STATUS_ADDFORM, 'status', $status);
$options = array('1' => _AM_XPETITIONS_STATUS1, '2' => _AM_XPETITIONS_STATUS2, '3' => _AM_XPETITIONS_STATUS3);
$field_status->addOptionArray($options);
$field_status->setDescription(_AM_XPETITIONS_STATUS_ADDFORM_DSC);
$editform->addElement($field_status, true);

// Date de la pétition
$field_date = new XoopsFormTextDateSelect(_AM_XPETITIONS_DATE_ADDFORM, 'date', 15, $date);
$field_date->setDescription(_AM_XPETITIONS_DATE_ADDFORM_DSC);
$editform->addElement($field_date);

//chi può vedere le firme di questa petizione - modifica urbanspaceman 22/05
$field_whoview = new XoopsFormSelect(_AM_XPETITIONS_WHOVIEW_ADDFORM, 'whoview', $whoview);
$options = array('1' => _AM_XPETITIONS_WHOVIEW1, '2' => _AM_XPETITIONS_WHOVIEW2, '3' => _AM_XPETITIONS_WHOVIEW3);
$field_whoview->addOptionArray($options);
$field_whoview->setDescription(_AM_XPETITIONS_WHOVIEW_ADDFORM_DSC);
$editform->addElement($field_whoview, true);

// Affichage d'une séparation
$editform->insertBreak(_AM_XPETITIONS_BREAK_ADDFORM, 'bg3');

// Affichage d'un fichier uploader si présent
if ($is_file['file'] == '1') {
    $field_file_show = new XoopsFormElementTray(_AM_XPETITIONS_FILE_SHOW_ADDFORM, '<br />');
    $field_file_show->setDescription(_AM_XPETITIONS_FILE_SHOW_ADDFORM_DSC);
    $field_file_check = new XoopsFormCheckBox('', 'file_delete', 0);
    $link_file = sprintf("<a href='%s%s/%s' target='_blank'>%s</a>\n", XOOPS_URL, $xoopsModuleConfig['path_upload'], $is_file['link_file'], $is_file['link_file']);
    $field_file_check->addOption(1, $link_file);
    $field_file_show->addElement($field_file_check, false);
    $label_delete = new XoopsFormLabel(_AM_XPETITIONS_DELETE_FILE_ADDFORM, '');
    $field_file_show->addElement($label_delete, false);
    $editform->addElement($field_file_show);
}

// Insérer/Modifier une pétition papier
$max_upload = $xoopsModuleConfig['upload_size'];
$field_file = new XoopsFormFile(_AM_XPETITIONS_FILE_ADDFORM, 'file', $max_upload);
$field_file->setDescription(_AM_XPETITIONS_FILE_ADDFORM_DSC);
$editform->addElement($field_file);

// Champs caché
$field_hidden = new XoopsFormHidden('id', $post);
$editform->addElement($field_hidden);

// Bouton Ajouter/soumettre
$button_tray = new XoopsFormElementTray('');
$button_tray->addElement(new XoopsFormButton('', 'post', _AM_XPETITIONS_SUBMIT, 'submit'));
$editform->addElement($button_tray);

// Affichage du formulaire
$editform->display();
