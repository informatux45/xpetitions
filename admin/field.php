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
include_once("header.inc.php");
include_once(XOOPS_ROOT_PATH."/header.php");
include_once XOOPS_ROOT_PATH."/class/xoopsmailer.php";
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'index';

switch ($op) {

    case "index":
    default: // Affichage du formulaire emails.inc.php
    xoops_cp_header();
    xpetitions_adminmenu('field.php');

    ?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

    // Aide
    helpMenu(_AM_XPETITIONS_FIELD_HELP1, _AM_XPETITIONS_FIELD_HELP2);

    include "../include/fields.inc.php"; // affichage du formulaire
    break;

    case "update": // Mise à jour des champs
    $field_address1 = (!isset($_POST['field_address1']) || $_POST['field_address1'] != 1) ? 0 : 1;
    $field_address2 = (!isset($_POST['field_address2']) || $_POST['field_address2'] != 1) ? 0 : 1;
    $field_zip1     = (!isset($_POST['field_zip1']) || $_POST['field_zip1'] != 1) ? 0 : 1;
    $field_zip2     = (!isset($_POST['field_zip2']) || $_POST['field_zip2'] != 1) ? 0 : 1;
    $field_city1    = (!isset($_POST['field_city1']) || $_POST['field_city1'] != 1) ? 0 : 1;
    $field_city2    = (!isset($_POST['field_city2']) || $_POST['field_city2'] != 1) ? 0 : 1;
    $field_country1 = (!isset($_POST['field_country1']) || $_POST['field_country1'] != 1) ? 0 : 1;
    $field_country2 = (!isset($_POST['field_country2']) || $_POST['field_country2'] != 1) ? 0 : 1;
    $field_job1     = (!isset($_POST['field_job1']) || $_POST['field_job1'] != 1) ? 0 : 1;
    $field_job2     = (!isset($_POST['field_job2']) || $_POST['field_job2'] != 1) ? 0 : 1;

    $update_fields = updateFields($field_address1, $field_address2, $field_zip1, $field_zip2, $field_city1, $field_city2, $field_country1, $field_country2, $field_job1, $field_job2);

    if (!$update_fields) {
        redirect_header("email.php", 2, _AM_XPETITIONS_ERROR_INSERT);
    } else {
        redirect_header("field.php", 2, _AM_XPETITIONS_VALID_UPDATE);
    }

    break;

}

xpetitions_adminfooter();
xoops_cp_footer();

?>