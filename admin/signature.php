<?php
// $Id: signature.php,v 0.1 2007/10/16 10:00:00 Patrice BOUTHIER
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

// includes
include_once("header.inc.php");
include_once(XOOPS_ROOT_PATH."/header.php");
include_once XOOPS_ROOT_PATH."/class/xoopsmailer.php";
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'tab';

switch ($op) {

case "delsign": // Supprimer une signature
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Récupération des variables
	$xpetitions_name   = $_POST['petitions'];
	$xpetitions_signid = $_POST['signs'];
	$ok = isset($_REQUEST['ok']) ? intval($_REQUEST['ok']) : 0;

	if ($ok == 1 && isset($xpetitions_signid) && isset($xpetitions_name)) {
		$xpetitions_delete = deleteSignature($xpetitions_name, $xpetitions_signid);
	
		if (!$xpetitions_delete) {
			redirect_header("signature.php?op=signma", 2, _AM_XPETITIONS_ERROR_DELETE);
			exit;
		} else {
			redirect_header("signature.php?op=signma", 2, _AM_XPETITIONS_VALID_DELETE);
		}
	} else {
	xoops_cp_header();
	xoops_confirm(array('op' => 'delsign', 'signs' => $xpetitions_signid, 'petitions' => $xpetitions_name, 'ok' => 1), 'signature.php?op=signma', _AM_XPETITIONS_DELETE_SIGN);
	xoops_cp_footer();
	}
	break;

case "addsign": // Ajouter manuellement une signature
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Récupération des variables
	extract($_POST,EXTR_OVERWRITE);
	$petitionid = getPetitionId($name_petition);

	// Vérification si signature en double
	$signature_double = getSignatureDouble($name_petition, strtoupper($lastname), strtolower($firstname), $email);
	if (!$signature_double) {

	// insertion de la signature dans la base de données
	$insert_signature = insertSignaturesMan($name_petition, $petitionid['id'], strtoupper($lastname), strtolower($firstname), $address, $zip, strtoupper($city), $country, $job, $email, formatdatestamp($date));

		if (!$insert_signature) {
			redirect_header("signature.php?op=signma", 2, _AM_XPETITIONS_ERROR_INSERT);
			exit;
 		} else {
			redirect_header("signature.php?op=signma", 2, _AM_XPETITIONS_VALID_INSERT);
		}
	} else {
		redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_SIGN_DOUBLE);
	}
	break;

case "signma": // Enregistrer/Supprimer des signatures manuellement
	xoops_cp_header();
	xpetitions_adminmenu('signature.php');
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;
	
	// Aide
	helpMenu(_AM_XPETITIONS_SIGN_HELP1, _AM_XPETITIONS_SIGN_HELP4);

	?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

	// Formulaire insérer/supprimer des signatures
	include "../include/adddel_signs.inc.php";

	//echo '</div>'; // fin id central
	xpetitions_adminfooter();
	xoops_cp_footer();
	break;

case "novalid": // Formulaire d'envoi email multiple pour les retardataires
	xoops_cp_header();
	xpetitions_adminmenu('signature.php');
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Aide
	helpMenu(_AM_XPETITIONS_SIGN_HELP1, _AM_XPETITIONS_SIGN_HELP3);

	?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

	// Formulaire d'envoi email multiple (retardataires)
	include "../include/sendlatecomer.inc.php";

	xpetitions_adminfooter();
        xoops_cp_footer();
	break;

case "signfo": // Validation forcée des signatures non validées
	include XOOPS_ROOT_PATH.'/header.php';
	$petition_id   = intval($_REQUEST['id']);
	$petition_name = $myts->oopsAddSlashes($_REQUEST['name']);
	$ok            = isset($_REQUEST['ok']) ? intval($_REQUEST['ok']) : 0;
	// confirmation donc suppression de la pétition
	if ($ok == 1 && isset($petition_name)) {
		$update_validation = validSignatureForced($petition_name);
		$message = (!$update_validation) ? redirect_header("signature.php", 2, _AM_XPETITIONS_ERROR_UPDATE) : redirect_header("signature.php", 2, _AM_XPETITIONS_VALID_UPDATE);
	} else {
	xoops_cp_header();
	$petition_title = getPetitionDetails($id);
	xoops_confirm(array('op' => 'signfo', 'name' => $petition_name, 'id' => $petition_id, 'ok' => 1), 'signature.php', sprintf(_AM_XPETITIONS_FORCE_SIGN_CONFIRM, $myts->DisplayTarea($petition_title['title'])));
	xoops_cp_footer();
	}
	break;

case "latecomer_send": // Envoi des emails aux retardaires
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Récupération des variables
	$petition_detail  = getPetitionDetails(intval($_POST['id']));
	$petition_email   = $petition_detail['email'];
	$array_latecomers = getSignaturesDetails($_POST['name'], 0);
	
	$link_url         = XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/index.php?op=valid&id='.intval($_POST['id']).'&name='.$_POST['name'].'&key=';

	// Remplacer les chaines de caracteres dans le corps du message
	foreach ($array_latecomers as $row) {
            $body = $_POST['message'];
            $body = preg_replace("/{USER_NAME}/", $row['prenom'].' '.$row['name'], $body);
            $body = preg_replace("/{PETITION}/", $myts->DisplayTarea($petition_detail['title']), $body);
            $body = preg_replace("/{USER_EMAIL}/", $row['email'], $body);
            $body = preg_replace("/{SITE_URL}/", XOOPS_URL, $body);
            $body = preg_replace("/{SITE_NAME}/", $myts->DisplayTarea($xoopsConfig['sitename']), $body);
            $body = preg_replace("/{LINK_URL}/", $link_url.$row['cle'], $body);
            $body = stripslashes($body);

            $get_subject    = getEmailInfos('1'); // Email aux retardataires
            $sample_subject = $get_subject['subject'];
            $sample_subject = preg_replace("/{SITE_NAME}/", $myts->DisplayTarea($xoopsConfig['sitename']), $sample_subject);
            $sample_subject = preg_replace("/{PETITION}/", $myts->DisplayTarea($petition_detail['title']), $sample_subject);

            // envoi d'un email à votre ami
            $site_email  = $petition_email;
            $site_name   = $xoopsConfig['sitename'];
            $subject     = $sample_subject;
            $xoopsMailer =& getMailer();
            $xoopsMailer->useMail();
            $xoopsMailer->setToEmails($row['email']);
            // $xoopsMailer->setToEmails(array($email, $email2, $email3));
            $xoopsMailer->setFromEmail($site_email);
            $xoopsMailer->setFromName($site_name);
            $xoopsMailer->setSubject($sample_subject);
            $xoopsMailer->setBody($body);
                    if (!$xoopsMailer->send(true)) {
                            redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_EMAIL_SEND_ERROR_LATECOMER);
                    }
	}
	if($xoopsMailer->getErrors()) {
		redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_LATECOMER_SEND_ERROR);
	}
	// message de confirmation
	redirect_header("signature.php", 2, _AM_XPETITIONS_EMAIL_SEND_LATECOMER);
	break;

case "recorded": // Affichage des signatures enregistrées
	xoops_cp_header();
	xpetitions_adminmenu('signature.php');
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;
	$petition_name = $_REQUEST['name'];
	$petition_id   = $_REQUEST['id'];

	// Tableau des signatures
	echo '<br /><table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="1" class="outer">';
	echo '<tbody><tr class="bg3">';
	echo '<td style="text-align: center;" colspan="8">' . _AM_XPETITIONS_SIGN_DETAIL . '</td>';
	echo '</tr><tr class="bg3">';
	echo '<td style="width: 14%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL1 . '</td>';
	echo '<td style="width: 14%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL2 . '</td>';
	echo '<td style="width: 5%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL3 . '</td>';
	echo '<td style="width: 24%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL4 . '</td>';
	echo '<td style="width: 14%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL5 . '</td>';
	echo '<td style="width: 12%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL6 . '</td>';
	echo '<td style="width: 12%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL7 . '</td>';
	echo '<td style="width: 5%; text-align: center;">' . _AM_XPETITIONS_SIGN_DETAIL8 . '</td>';
	echo '</tr>';

	// Paramètres getSignaturesInfos : 2 = totales;
	$petitions_count     = getSignaturesInfos($petition_name, 2);
	$petitions_sql       = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name);
	$petitions_pagestart = isset($_GET['page']) ? intval($_GET['page']) : 0;

	if ($petitions_count < 1) {
	echo '<tr><td colspan="5">';
	echo '<span class="gras">' . _AM_XPETITIONS_SIGN_NONE . '</span>';
	echo '</td></tr>';
	} else {
	  $pagenav = new XoopsPageNav($petitions_count, $xoopsModuleConfig['adminsign_per_page'], $petitions_pagestart, 'page', 'id='.$petition_id.'&name='.$petition_name.'&op=recorded');
	  $limite = limite($petitions_pagestart, $petitions_count, $xoopsModuleConfig['adminsign_per_page'], $petitions_sql);
	  $signatures_aff_tab = dbResultToArray($limite);

	  foreach ($signatures_aff_tab as $row) {
	    echo '<tr class="bg1"><td style="text-align: center;">';
	    echo $row['name'];
	    echo '</td><td style="text-align: center;">';
	    echo $row['prenom'];
	    echo '</td><td style="text-align: center;">';
	    echo $row['country'];
	    echo '</td><td style="text-align: center;">';
	    echo $row['email'];
	    echo '</td><td style="text-align: center;">';
	    echo $row['city'];
	    echo '</td><td style="text-align: center;">';
	    echo $row['job'];
	    echo '</td><td style="text-align: center;">';
	    echo formatdatefr($row['date']);
	    echo '</td><td style="text-align: center;">';
	    $validation = ($row['validation'] == 1) ? _YES : _NO;
	    echo $validation;
	  }
	    echo '</tr>';
	}

	echo '</tbody></table>';
	echo "<div align='right'>".$pagenav->renderNav().'</div><br />';

	xpetitions_adminfooter();
	xoops_cp_footer();
	break;

case "extract": // Extraire les signatures validées au format csv
	xoops_cp_header();
	xpetitions_adminmenu('signature.php');
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

	// Paramètre : 1 (signatures validées)
	$petition_name        = $_REQUEST['name'];
	$petition_title       = getPetitionDetails(intval($_GET['id']));
	$petition_sign_entete = array(_AM_XPETITIONS_SIGN_CSV_LASTNAME, _AM_XPETITIONS_SIGN_CSV_FIRSTNAME, _AM_XPETITIONS_SIGN_CSV_EMAIL, _AM_XPETITIONS_SIGN_CSV_ADDRESS, _AM_XPETITIONS_SIGN_CSV_ZIP, _AM_XPETITIONS_SIGN_CSV_CITY, _AM_XPETITIONS_SIGN_CSV_COUNTRY, _AM_XPETITIONS_SIGN_CSV_JOB, _AM_XPETITIONS_SIGN_CSV_IP);
	$petition_signs       = getSignaturesCsv($petition_name);
	$date                 = date("jmY-Hi");

	echo _AM_XPETITIONS_SIGN_CSV_TITLE;
	echo _AM_XPETITIONS_SIGN_CSV_PETITION.$myts->DisplayTarea($petition_title['title']).'<br /><br />';

	echo '<div id="construct_csv">'. _AM_XPETITIONS_SIGN_CSV_INPROGRESS .'</div>';

	if ($file = @fopen(XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/csv/cvs_'.$date.'.csv', 'w')) {
		fputcsv($file, $petition_sign_entete, ',', '"');
		foreach ($petition_signs as $row) {
			fputcsv($file, $row, ',', '"');
		}
	fclose($file);
	echo '<script type="text/javascript">chdiv("construct_csv","'. _AM_XPETITIONS_SIGN_CSV_SUCCESS .'");</script>';
	echo '<br />';
	echo 'T&eacute;l&eacute;charger le fichier g&eacute;n&eacute;r&eacute; : ';
	?><a href="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/csv/cvs_'.$date.'.csv'; ?>">cvs_<?php echo $date; ?>.csv</a><?php
	} else {
	echo '<script type="text/javascript">chdiv("construct_csv","'. _AM_XPETITIONS_SIGN_CSV_ERROR .'");</script>';
	}
	xpetitions_adminfooter();
	xoops_cp_footer();
	break;

case "tab": // Récapitulatifs des signatures par pétitions
	default:
	xoops_cp_header();
	xpetitions_adminmenu('signature.php');
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Aide
	helpMenu(_AM_XPETITIONS_SIGN_HELP1, _AM_XPETITIONS_SIGN_HELP2);

	?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

	// Tableau des pétitions
	echo '<br /><table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="1" class="outer">';
	echo '<tbody><tr class="bg3">';
	echo '<td style="text-align: center;" colspan="6">' . _AM_XPETITIONS_SIGN_TAB . '</td>';
	echo '</tr><tr class="bg3">';
	echo '<td style="width: 5%; text-align: center;">' . _AM_XPETITIONS_SIGN_TAB1 . '</td>';
	echo '<td style="width: 55%; text-align: center;">' . _AM_XPETITIONS_SIGN_TAB2 . '</td>';
	echo '<td style="width: 10%; text-align: center;">' . _AM_XPETITIONS_SIGN_TAB3 . '</td>';
	echo '<td style="width: 10%; text-align: center;">' . _AM_XPETITIONS_SIGN_TAB4 . '</td>';
	echo '<td style="width: 10%; text-align: center;">' . _AM_XPETITIONS_SIGN_TAB5 . '</td>';
	echo '<td style="width: 10%; text-align: center;">' . _AM_XPETITIONS_SIGN_TAB6 . '</td>';
	echo '</tr>';

	$petitions_count     = getPetitionsCount();
	$petitions_sql       = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions');
	$petitions_pagestart = isset($_GET['page']) ? intval($_GET['page']) : 0;

	if ($petitions_count < 1) {
	echo '<tr><td colspan="5">';
	echo '<span class="gras">' . _AM_XPETITIONS_NONE . '</span>';
	echo '</td></tr>';
	echo '</tbody></table>';
	} else {
	  $pagenav = new XoopsPageNav($petitions_count, $xoopsModuleConfig['adminindex_page'], $petitions_pagestart, 'page');
	  $limite = limite($petitions_pagestart, $petitions_count, $xoopsModuleConfig['adminindex_page'], $petitions_sql);
	  $petitions_aff_tab = dbResultToArray($limite);

	  foreach ($petitions_aff_tab as $row) {
	    echo '<tr class="bg1"><td style="text-align: center;">';
	    echo $row['id'];
	    echo '</td><td style="text-align: left;">';
	    echo '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php?petition='.$row['id'].'">'.$myts->DisplayTarea($row['title']).'</a>';
	    echo '</td><td style="text-align: center;">';
	    echo formatdatefr($row['date']);
	    echo '</td><td style="text-align: center;">';
	    // Paramètres getSignaturesInfos : 2 = totales; 1 = validées; 0 = non validées
	    $totales = getSignaturesInfos($row['name'], 2);
	    $valides = getSignaturesInfos($row['name'], 1);
	    $novalid = getSignaturesInfos($row['name'], 0);
	    if ($totales == 0) {
		 echo '0';
		} else {
		 echo '<a href="signature.php?id='.$row['id'].'&name='.$row['name'].'&op=recorded">' . $totales . '</a>';
		}
    	    echo '</td><td style="text-align: center;">';
	    if ($valides == 0) {
		 echo '0';
		} else {
		 echo '<a href="signature.php?id='.$row['id'].'&name='.$row['name'].'&op=extract">' . $valides . '</a>';
		}
	    echo '</td><td style="text-align: center;">';
	    if ($novalid == 0) {
		 echo '0';
		} else {
		 echo '<a href="signature.php?id='.$row['id'].'&name='.$row['name'].'&op=novalid">' . $novalid . '</a>';
		}
	    echo '</tr>';
	   }
	echo '</tbody></table>';
	echo "<div align='right'>".$pagenav->renderNav().'</div><br />';
	}

	xpetitions_adminfooter();
	xoops_cp_footer();
	break;

case "signshow": // Gestion de l'affichage des signatures
	xoops_cp_header();
	xpetitions_adminmenu('signature.php');
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Aide
	helpMenu(_AM_XPETITIONS_SIGN_HELP1, _AM_XPETITIONS_SIGN_HELP5);

	?>
	<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
	<?php

	// Recuperation des variables
	$signshow_col   = getOptionInfos('signature_show');
	$signshow_nbcol = getOptionInfos('signature_nbcol');
	$signshow_entry = getOptionInfos('signature_entry');
	list($job, $country, $email, $city, $date) = explode("|", $signshow_entry['options']);

	// Assignation des variables
	$col   = $signshow_col['options'];
	$nbcol = $signshow_nbcol['options'];

	// Formulaire insérer/supprimer des signatures
	include "../include/signs.inc.php";

	xpetitions_adminfooter();
	xoops_cp_footer();
	break;

case "signshow_update": // Mise a jour de l'affichage des signatures
	global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

	// Récupération des variables
	$col     = $_POST['col'];
	$nbcol   = $_POST['nbcol'];
	$job     = ($_POST['job']) ? $_POST['job'] : 0;
	$country = ($_POST['country']) ? $_POST['country'] : 0;;
	$email   = ($_POST['email']) ? $_POST['email'] : 0;
	$city    = ($_POST['city']) ? $_POST['city'] : 0;
	$date    = ($_POST['date']) ? $_POST['date'] : 0;

	// Preparation pour l'enregistrement
	$entries = $job.'|'.$country.'|'.$email.'|'.$city.'|'.$date;

	// insertion de la signature dans la base de données
	$update_signshow = updateSignaturesShow($col, $nbcol, $entries);

	if (!$update_signshow) {
		redirect_header("signature.php?op=signshow", 2, _AM_XPETITIONS_ERROR_UPDATE);
 	} else {
		redirect_header("signature.php?op=signshow", 2, _AM_XPETITIONS_VALID_UPDATE);
	}
	break;
}

?>