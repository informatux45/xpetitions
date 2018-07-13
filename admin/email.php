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
include_once('header.inc.php');
include_once(XOOPS_ROOT_PATH . '/header.php');
include_once XOOPS_ROOT_PATH . '/class/xoopsmailer.php';
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'tab';

switch ($op) {

    case 'index':
    default: // Affichage du formulaire emails.inc.php
    xoops_cp_header();
    xpetitions_adminmenu('email.php');

    ?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

    // Aide
    helpMenu(_AM_XPETITIONS_MESS_EMAIL_HELP1, _AM_XPETITIONS_MESS_EMAIL_HELP2);

    include '../include/emails.inc.php'; // affichage du formulaire
    break;

    case 'update': // Mise à jour des emails
    extract($_POST, EXTR_OVERWRITE);

    $update_emails = updateEmail($subject_unconfirmed, $message_unconfirmed, $subject_toconfirmed, $message_toconfirmed);

    if (!$update_emails) {
        redirect_header('email.php', 1, _AM_XPETITIONS_ERROR_UPDATE);
    // exit;
    } else {
        redirect_header('email.php', 1, _AM_XPETITIONS_VALID_UPDATE);
    }

    break;

}

xpetitions_adminfooter();
xoops_cp_footer();

?>
