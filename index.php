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

include("header.php");

if (!isset($_REQUEST['op']) && !isset($_REQUEST['id'])) {
  $op       = 'index';
  $template = 'index';
} elseif (isset($REQUEST['id']) || !isset($_REQUEST['op'])) {
  $op       = 'indexid';
  $id       = intval($_REQUEST['id']);
  $template = 'display_index';
} else {
  $op       = $myts->addSlashes($_REQUEST['op']);
  $id       = intval($_REQUEST['id']);
  $template = 'display_'.$op;
}

$xoopsOption['template_main'] = 'xpetitions_' . $template . '.html';
include(XOOPS_ROOT_PATH."/header.php");
include(XOOPS_ROOT_PATH."/class/pagenav.php");

global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

// url du module
$module_url = '/modules/' . $xoopsModule->getVar('dirname');
$xoopsTpl->assign("xpetitions_urlmod", $module_url);

// si l'option barre de navigation à oui alors on l'affiche
$name_nav = ($xoopsModuleConfig['navigation'] == 1) ? '1' : '';
$xoopsTpl->assign("name_nav", $name_nav);

// si l'option barre de navigation lien de la page accueil à oui alors on l'affiche
$name_nav_home = ($xoopsModuleConfig['navigation_home'] == 1) ? '1' : '';
$xoopsTpl->assign("name_nav_home", $name_nav_home);

// si l'option affichage des petitions de la page accueil : Ligne (1) ou Colonne (2)
$xoopsTpl->assign("show_petitions_home", $xoopsModuleConfig['show_petitions_home']);

//urbanspaceman mod
$petition_detail = getPetitionDetails(intval($id));
if ($petition_detail['whoview'] == '1'){
    $xoopsTpl->assign("whoview", _MD_XPETITIONS_WHOVIEW1);
    $xoopsTpl->assign("whoview_group", 1);
}

elseif ($petition_detail['whoview'] == '2'){
    $xoopsTpl->assign("whoview", _MD_XPETITIONS_WHOVIEW2);
    $xoopsTpl->assign("whoview_group", 2);
}

elseif ($petition_detail['whoview'] == '3'){
    $xoopsTpl->assign("whoview", _MD_XPETITIONS_WHOVIEW3);
    $xoopsTpl->assign("whoview_group", 3);
}

switch ($op) {
case "allsigns": // affichage des signatures validées
	$petition_detail = getPetitionDetails(intval($id));
	$petition_name   = $petition_detail['name'];
	$status          = $petition_detail['status'];
	
	if ($petition_detail) {
		// pétition offline (statut = 2)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.intval($id);
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_ALLSIGNS;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		}

		// Initialisation de l'affichage des signatures
		$signature_job = $signature_country = $signature_email = $signature_city = $signature_date = '';
		$option1 = getOptionInfos('signature_show');
		$option2 = getOptionInfos('signature_nbcol');
		$option3 = getOptionInfos('signature_entry');
		list($signature_job, $signature_country, $signature_email, $signature_city, $signature_date) = explode("|", $option3['options']);
		$xpetitions_signature_col   = $option1['options'];
		$xpetitions_signature_nbcol = $option2['options'];

		// Assignation des variables smarty
		$xoopsTpl->assign(array(
		"petitions_option_col"     =>	$xpetitions_signature_col,
		"petitions_option_nbcol"   =>	$xpetitions_signature_nbcol,
		"petitions_option_job"     =>	$signature_job,
		"petitions_option_country" =>	$signature_country,
		"petitions_option_email"   =>	$signature_email,
		"petitions_option_city"    =>	$signature_city,
		"petitions_option_date"    =>	$signature_date
		));

		// affichage des lettres alphabétiques
		$link           = '/index.php?id='.intval($id).'&op=allsigns&letter=';
		$show_signs     = showLettersSigns(intval($id), $module_url, $link);
		$show_cpt       = getSignaturesInfos($petition_name, '1');
		$show_cpt      .= ' '._MD_XPETITIONS_CPT_ALLSIGNS;
		$allsigns_title = _MD_XPETITIONS_TITLE_ALLSIGNS;
		$xoopsTpl->assign(array(
		"petitions_allsigns"       => $show_signs,
		"petitions_allsigns_title" => $allsigns_title,
		"petitions_allsigns_cpt"   => $show_cpt,
		));
		if ($_REQUEST['letter']) {
			$aff_signatures = getSignatureLetter($myts->addSlashes($_REQUEST['letter']), $petition_name);
			if ($aff_signatures) {
				foreach ($aff_signatures as $row) {
					$petition_letter['firstname'] = strtolower($row['prenom']);
					$petition_letter['lastname']  = strtoupper($row['name']);
					$petition_letter['job']       = $row['job'];
					$petition_letter['country']   = $row['country'];
					$petition_letter['email']     = $row['email'];
					$petition_letter['city']      = $row['city'];
					$petition_letter['date']      = formatdatefr($row['date']);
					$petitions_letter[]           = $petition_letter;
				}
				if ($myts->addSlashes($_REQUEST['letter'] == 'all')) {
					$allsigns_letter = _MD_XPETITIONS_ALLSIGNS_LETTER_ALL;
				} else {
					$allsigns_letter = sprintf(_MD_XPETITIONS_ALLSIGNS_LETTER, $myts->addSlashes($_REQUEST['letter']), count($petitions_letter));
				}
				$xoopsTpl->assign(array(
				"petitions_allsigns_show"    => $petitions_letter,
				"petitions_allsigns_letter"  => $allsigns_letter,
				"petitions_allsigns_counter" => count($petitions_letter)
				));

				// Calcul des tailles des colonnes
				// Si plus de 1 colonne
				$xpetitions_signs_show  = getOptionInfos('signature_show');
				$xpetitions_signs_nbcol = getOptionInfos('signature_nbcol');
				if ($xpetitions_signs_show['options'] == 'colonne' && $xpetitions_signs_nbcol['options'] > 1) {
					$xpetitions_sign_divcol = floor(100/$xpetitions_signs_nbcol['options']);
					$xpetitions_sign_nb     = ceil(count($petitions_letter)/$xpetitions_signs_nbcol['options'])-1;
					$xoopsTpl->assign("petitions_sign_divcol", $xpetitions_sign_divcol);
				}
				// Assignation de l'etat de l'affichage des signatures
				$xoopsTpl->assign("petitions_signs_show", $xpetitions_signs_show['options']);
				$xoopsTpl->assign("petitions_sign_nb", $xpetitions_sign_nb);

			} else {
				if ($myts->addSlashes($_REQUEST['letter']) == 'all') {
					$petitions_noletter = _MD_XPETITIONS_ALLSIGNS_NOLETTER_ALL;
				} else {
					$petitions_noletter = sprintf(_MD_XPETITIONS_ALLSIGNS_NOLETTER, $myts->addSlashes($_REQUEST['letter']));
				}
				$xoopsTpl->assign("petitions_allsigns_noshow", $petitions_noletter);
			}
		} else {
		$xoopsTpl->assign("petitions_allsigns_noshow", _MD_XPETITIONS_ALLSIGNS_CHOOSE);
		}

	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "valid": // validation d'un signature
	$petition_detail = getPetitionDetails(intval($id));
	$status          = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.intval($id);
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_VALID;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		}
		// récupération des variables
		$petition_name   = $myts->addSlashes($_GET['name']);
		$petition_cle    = $myts->addSlashes($_GET['key']);
		$date_sign       = $_SERVER['REQUEST_TIME'];

		if ($petition_name && $petition_cle) {
		// Mise à jour de la base de données des signatures
		$valid_sign = validSignature($petition_name, $petition_cle, $date_sign);
			if (!$valid_sign) {
			// erreur dans la validation
			$petition_sign_valid = _MD_XPETITIONS_SIGN_ERROR;
			$xoopsTpl->assign("petition_sign_valid", $petition_sign_valid);
			break;
			}
		// message de confirmation
		$petition_sign_valid = _MD_XPETITIONS_SIGN_VALID;
		$xoopsTpl->assign("petition_sign_valid", $petition_sign_valid);
		} else {
		// erreur dans la récupération du lien de l'email
		$petition_sign_valid = _MD_XPETITIONS_SIGN_ERROR;
		$xoopsTpl->assign("petition_sign_valid", $petition_sign_valid);
		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "validpre": // validation d'un signature
	$petition_detail = getPetitionDetails(intval($id));
	$status          = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.intval($id);
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_VALID;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		}
		// récupération des variables
		$petition_name = $myts->addSlashes($_GET['name']);
		$date_sign     = $_SERVER['REQUEST_TIME'];
		$firstname     = $myts->addSlashes(trim($_POST['firstname']));
		$lastname      = $myts->addSlashes(trim($_POST['lastname']));
		$address       = $myts->addSlashes(trim($_POST['address']));
		$zip           = $myts->addSlashes(trim($_POST['zip']));
		$city          = $myts->addSlashes(trim($_POST['city']));
		$country       = $myts->addSlashes(trim($_POST['country']));
		$job           = $myts->addSlashes(trim($_POST['job']));
		$email         = trim($_POST['email']);
		$date          = $_SERVER['REQUEST_TIME'];
		$ip            = $_SERVER['REMOTE_ADDR'];
		$cle           = $myts->addSlashes($_GET['key']);

		// vérification de la signature en double
		$signature_double = getSignatureDouble($petition_name, strtoupper($firstname), strtolower($lastname), $email);
		if (!$signature_double) {

		if ($petition_name && $cle) {
		// Mise à jour de la base de données des signatures
		$insert_presign = insertPreSignatures($petition_name, $id, $firstname, $lastname, $address, $zip, $city, $country, $job, $email, $date, $ip, $cle);
		if (!$insert_presign) {
			// erreur dans l'insertion
			$petition_sign_valid = _MD_XPETITIONS_SIGN_ERROR;
			$xoopsTpl->assign("petition_sign_valid", $petition_sign_valid);
			break;
		}
		// message de confirmation
		$petition_sign_valid = _MD_XPETITIONS_SIGN_VALID;
		$xoopsTpl->assign("petition_presign_valid", $petition_sign_valid);
		} else {
		// erreur dans la récupération des données
		$petition_sign_valid = _MD_XPETITIONS_SIGN_ERROR;
		$xoopsTpl->assign("petition_presign_valid", $petition_sign_valid);
		}

		} else {
		$petition_sign = _MD_XPETITIONS_SIGN_DOUBLE;
		$xoopsTpl->assign("petition_sign", $petition_sign);
		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "friend_send": // envoi du message à un ami
	$petition_detail = getPetitionDetails(intval($id));
	$petition_email  = $petition_detail['email'];
	$status = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.intval($id);
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_FRIEND;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		// récupération des variables
		$yourname   = $myts->addSlashes(trim($_POST['yourname']));
		$friendname = $myts->addSlashes(trim($_POST['friendname']));
		$femail     = $myts->addSlashes(trim($_POST['email']));
		$captcha    = $myts->addSlashes(trim($_POST['captcha']));
		$body       = sprintf(_MD_XPETITIONS_EMAIL_FRIENDFORM_SEND, $yourname, $friendname, $xoopsConfig['sitename'], $name_nav1, XOOPS_URL.$module_url.'/index.php?id='.intval($id), $xoopsConfig['sitename'], $xoopsConfig['slogan'], XOOPS_URL);

		if (!filled_out($_POST)) {
			redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_ERROR_BLANK);
			break;
		}
		// vérification captcha si option à oui
		if ($xoopsModuleConfig['captcha_image']) {
			// Recuperation de l'option captcha
			$captcha_inprogress = getOptionInfos('captcha');
			switch($captcha_inprogress['options']) {
				default: // Option CAPTCHA (K.OHWADA) => 1
				require_once ('class/captcha_x/class.captcha_x.php');
				$captcha_check = &new captcha_x();
				if ( !isset($captcha) || !$captcha_check->validate($captcha) ) {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;

				case "2": // Option CAPTCHA (JPGRAPH) => 2
				if (!empty($captcha) && !empty($_SESSION['captcha_image']) && strtolower($captcha) == $_SESSION['captcha_image']) {
					continue;
				} else {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;

				case "3": // Option CAPTCHA (TEXTE) => 3
				require_once(XOOPS_ROOT_PATH . $module_url . "/class/antispam_text.php");
				if ($_SESSION['captcha_image'] != $captcha) {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;
			}
		}
		// envoi d'un email à votre ami
		include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
		$semail  = $petition_email;
		$sname   = $xoopsConfig['sitename'];
		$subject = sprintf(_MD_XPETITIONS_SUBJECT_EMAIL, $sname);
		if (get_xoops_version() >= 230)
			$xoopsMailer =& xoops_getMailer();
		else
			$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails($femail);
		$xoopsMailer->setFromEmail($semail);
		$xoopsMailer->setFromName($sname);
		$xoopsMailer->setSubject($subject);
		$xoopsMailer->setBody($body);
		$xoopsMailer->send(true);
	
		if($xoopsMailer->getErrors()) {
			redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_EMAIL_SEND_ERROR);
		}

		// message de confirmation
		$petition_email_send = _MD_XPETITIONS_EMAIL_SEND;
		$xoopsTpl->assign("petition_email_send", $petition_email_send);
		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "friend": // saisie des coordonnées pour l'envoi par mail d'un message à un ami
	$petition_detail = getPetitionDetails(intval($id));
	$status = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.$id;
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_FRIEND;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		// initialisation des variables
		$yourname = $friendname = $femail = '';
		// affichage du formulaire
		echo '<br />';
		include "include/sendafriend.inc.php";
		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "sign": // enregistrement d'une signature en ligne par email (par retour de lien)
	$petition_detail = getPetitionDetails(intval($id));
	$name_petition   = $petition_detail['name'];
	$email_petition  = $petition_detail['email'];
	$status          = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.$id;
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_SIGN_RECORDED;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		// récupération des données
		$firstname = $myts->addSlashes(trim($_POST['firstname']));
		$lastname  = $myts->addSlashes(trim($_POST['lastname']));
		$address   = $myts->addSlashes(trim($_POST['address']));
		$zip       = $myts->addSlashes(trim($_POST['zip']));
		$city      = $myts->addSlashes(trim($_POST['city']));
		$country   = $myts->addSlashes(trim($_POST['country']));
		$job       = $myts->addSlashes(trim($_POST['job']));
		$email     = trim($_POST['email']);
		$captcha   = $myts->addSlashes(trim($_POST['captcha']));
		$semail    = $email_petition;
		$sname     = $xoopsConfig['sitename'];
		$date      = $_SERVER['REQUEST_TIME'];
		$ip        = $_SERVER['REMOTE_ADDR'];
		$cle       = substr(createKey(),0,15);
		$urlcle    = XOOPS_URL.$module_url.'/index.php?op=valid&id='.intval($id).'&name='.$name_petition.'&key='.$cle;

		// vérification des champs obligatoire
		if (!$firstname && !$lastname && !$email) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK);
		}

		if (getFieldInfos(3, 2) == 1 && getFieldInfos(3, 1) == 1 && !$address) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_ADDRESS);
			break;
		}
		if (getFieldInfos(4, 2) == 1 && getFieldInfos(4, 1) == 1 && !$zip) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_ZIP);
			break;
		}
		if (getFieldInfos(5, 2) == 1 && getFieldInfos(5, 1) == 1 && !$city) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_CITY);
			break;
		}
		if (getFieldInfos(6, 2) == 1 && getFieldInfos(6, 1) == 1 && !$country) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_COUNTRY);
			break;
		}
		if (getFieldInfos(7, 2) == 1 && getFieldInfos(7, 1) == 1 && !$job) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_JOB);
			break;
		}

		// vérification du format valide de l'email
		if (mailValid($email) == 0) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_EMAIL);
			break;
		}
		// vérification de la signature en double
		$signature_double = getSignatureDouble($name_petition, strtoupper($firstname), strtolower($lastname), $email);
		if (!$signature_double) {
		// vérification captcha si option à oui
		if ($xoopsModuleConfig['captcha_image']) {
			// Recuperation de l'option captcha
			$captcha_inprogress = getOptionInfos('captcha');
			switch($captcha_inprogress['options']) {
				default: // Option CAPTCHA (K.OHWADA) => 1
				require_once ('class/captcha_x/class.captcha_x.php');
				$captcha_check = &new captcha_x();
				if ( !isset($captcha) || !$captcha_check->validate($captcha) ) {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;

				case "2": // Option CAPTCHA (JPGRAPH) => 2
				if (!empty($captcha) && !empty($_SESSION['captcha_image']) && strtolower($captcha) == $_SESSION['captcha_image']) {
					continue;
				} else {
					redirect_header("javascript:history.go(-1)", 2, 'captcha = '.$captcha.'<br />session = '.$_SESSION['captcha_image'].'<br />'._MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;

				case "3": // Option CAPTCHA (TEXTE) => 3
				require_once(XOOPS_ROOT_PATH . $module_url . "/class/antispam_text.php");
				if ($_SESSION['captcha_image'] != $captcha) {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;
			}
		}
		// enregistrement dans la base de données
		$insert_signatures = insertSignatures($name_petition, $id, strtoupper($firstname), strtolower($lastname), $address, $zip, strtoupper($city), $country, $job, $email, $date, $ip, $cle);
		if (!$insert_signatures) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_INSERT);
 		}

		// préparation du corps de l'email
		$email_validation = getEmailInfos('2'); // Email aux signataires pour validation
		$body = $email_validation['message'];
		$body = preg_replace("/{PRENOM}/", $firstname, $body);
		$body = preg_replace("/{NOM}/", $lastname, $body);
		$body = preg_replace("/{PETITION}/", $name_nav1, $body);
		$body = preg_replace("/{INFOS}/", $job, $body);
		$body = preg_replace("/{SITEURL}/", XOOPS_URL, $body);
		$body = preg_replace("/{SITENAME}/", $myts->DisplayTarea($xoopsConfig['sitename']), $body);
		$body = preg_replace("/{SITESLOGAN}/", $myts->DisplayTarea($xoopsConfig['slogan']), $body);
		$body = preg_replace("/{VALIDATION}/", $urlcle, $body);
		$body = stripslashes($body);

		// préparation du sujet de l'email
		$sample_subject = $email_validation['subject'];
		$sample_subject = preg_replace("/{SITENAME}/", $myts->DisplayTarea($xoopsConfig['sitename']), $sample_subject);
		$sample_subject = preg_replace("/{PETITION}/", $myts->DisplayTarea($petition_detail['title']), $sample_subject);

		// envoi email de confirmation au signataire
		include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
		if (get_xoops_version() >= 230)
			$xoopsMailer =& xoops_getMailer();
		else
			$xoopsMailer =& getMailer();
		$xoopsMailer->useMail();
		$xoopsMailer->setToEmails($email);
		$xoopsMailer->setFromEmail($semail);
		$xoopsMailer->setFromName($sname);
		$xoopsMailer->setSubject($sample_subject);
		$xoopsMailer->setBody($body);
		$xoopsMailer->send(true);
	
		if($xoopsMailer->getErrors()) {
			$id_sign = getSignatureId($name_petition, $cle);
			deleteSignature($name_petition, $id_sign['id']);
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_EMAIL_SEND_ERROR);
		}

		// message de remerciement
		$petition_sign = _MD_XPETITIONS_SIGN_RECORDED;
		$xoopsTpl->assign("petition_sign", $petition_sign);
		} else {
		$petition_sign = _MD_XPETITIONS_SIGN_DOUBLE;
		$xoopsTpl->assign("petition_sign", $petition_sign);
		}

		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "presign": // enregistrement d'une signature en ligne en automatique (double click)
	$petition_detail = getPetitionDetails(intval($id));
	$name_petition   = $petition_detail['name'];
	$email_petition  = $petition_detail['email'];
	$status          = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.$id;
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_PRESIGNED;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		// récupération des données
		$firstname = $myts->addSlashes(trim($_POST['firstname']));
		$lastname  = $myts->addSlashes(trim($_POST['lastname']));
		$address   = $myts->addSlashes(trim($_POST['address']));
		$zip       = $myts->addSlashes(trim($_POST['zip']));
		$city      = $myts->addSlashes(trim($_POST['city']));
		$country   = $myts->addSlashes(trim($_POST['country']));
		$job       = $myts->addSlashes(trim($_POST['job']));
		$email     = trim($_POST['email']);
		$captcha   = $myts->addSlashes(trim($_POST['captcha']));
		$date      = $_SERVER['REQUEST_TIME'];
		$ip        = $_SERVER['REMOTE_ADDR'];
		$cle       = substr(createKey(),0,15);
		$urlcle    = XOOPS_URL.$module_url.'/index.php?op=validpre&id='.intval($id).'&name='.$name_petition.'&key='.$cle;

		// vérification des champs obligatoire
		if (!$firstname && !$lastname && !$email) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK);
		}

		if (getFieldInfos(3, 2) == 1 && getFieldInfos(3, 1) == 1 && !$address) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_ADDRESS);
			break;
		}
		if (getFieldInfos(4, 2) == 1 && getFieldInfos(4, 1) == 1 && !$zip) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_ZIP);
			break;
		}
		if (getFieldInfos(5, 2) == 1 && getFieldInfos(5, 1) == 1 && !$city) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_CITY);
			break;
		}
		if (getFieldInfos(6, 2) == 1 && getFieldInfos(6, 1) == 1 && !$country) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_COUNTRY);
			break;
		}
		if (getFieldInfos(7, 2) == 1 && getFieldInfos(7, 1) == 1 && !$job) {
			redirect_header('index.php?id='.intval($id).'&op=form', 2, _MD_XPETITIONS_ERROR_BLANK_JOB);
			break;
		}

		// vérification de la signature en double
		$signature_double = getSignatureDouble($name_petition, strtoupper($firstname), strtolower($lastname), $email);
		if (!$signature_double) {
		// vérification captcha si option à oui
		if ($xoopsModuleConfig['captcha_image']) {
			// Recuperation de l'option captcha
			$captcha_inprogress = getOptionInfos('captcha');
			switch($captcha_inprogress['options']) {
				default: // Option CAPTCHA (K.OHWADA) => 1
				require_once ('class/captcha_x/class.captcha_x.php');
				$captcha_check = &new captcha_x();
				if ( !isset($captcha) || !$captcha_check->validate($captcha) ) {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;

				case "2": // Option CAPTCHA (JPGRAPH) => 2
				if (!empty($captcha) && !empty($_SESSION['captcha_image']) && strtolower($captcha) == $_SESSION['captcha_image']) {
					continue;
				} else {
					redirect_header("javascript:history.go(-1)", 2, 'captcha = '.$captcha.'<br />session = '.$_SESSION['captcha_image'].'<br />'._MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;

				case "3": // Option CAPTCHA (TEXTE) => 3
				require_once(XOOPS_ROOT_PATH . $module_url . "/class/antispam_text.php");
				if ($_SESSION['captcha_image'] != $captcha) {
					redirect_header("javascript:history.go(-1)", 2, _MD_XPETITIONS_CAPTCHA_ERROR);
				}
				break;
			}
		}
		// Passage des variables (form hidden)
		$xoopsTpl->assign(array(
		"pre_firstname"	=> $firstname,
		"pre_lastname"	=> $lastname,
		"pre_address"	=> $address,
		"pre_zip"	=> $zip,
		"pre_city"	=> $city,
		"pre_country"	=> $country,
		"pre_job"	=> $job,
		"pre_email"	=> $email,
		"pre_date"	=> $date,
		"pre_ip"	=> $ip,
		"pre_cle"	=> $cle
		));

		// message de validation par click
		$petition_presign1 = _MD_XPETITIONS_SIGN_PRESIGNED;
		$petition_submit  = _MD_XPETITIONS_PRESIGN_VALUE;
		$xoopsTpl->assign("petition_presign_valid", $petition_presign1);
		$xoopsTpl->assign("petition_value", $petition_submit);
		$xoopsTpl->assign("petition_presign_form_action", $urlcle);
		
		} else {
			$petition_presign2 = _MD_XPETITIONS_SIGN_DOUBLE;
			$xoopsTpl->assign("petition_presign", $petition_presign2);
		}

		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "form": // affichage du formulaire de signature de la pétition
	$petition_detail = getPetitionDetails(intval($id));
	$status = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2) ou archivée (statut = 3)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} elseif ($status == '3') {
		$name_nav1 = _MD_XPETITIONS_ARCHIVE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_ARCHIVE,
		));
		} else {
		$name_nav1 = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1 = $module_url.'/index.php?id='.$id;
		$name_nav2 = _MD_XPETITIONS_HOME_NAV_SIGN;
		$xoopsTpl->assign(array(
		"name_nav1"      => $name_nav1,
		"name_nav2"      => $name_nav2,
		"link_nav1"      => $link_nav1,
		"petition_title" => $name_nav1,
		));
		// initialisation des variables
		$firstname = $lastname = $address = $zip = $city = $country = $job = $email = '';
		// affichage du formulaire
		echo '<br />';
		include "include/signform.inc.php";
		echo _MD_XPETITIONS_FORM_REQUIRED;
		}
	
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "indexid": // affichage d'une pétition à signer
	$petition_detail = getPetitionDetails(intval($id));
	$status = $petition_detail['status'];
	if ($petition_detail) {
		// pétition offline (statut = 2)
		if ($status == '2') {
		$name_nav1 = _MD_XPETITIONS_OFFLINE;
		$xoopsTpl->assign(array(
		"name_nav1"        => $name_nav1,
		"petition_offline" => _MD_XPETITIONS_OFFLINE,
		));
		} else {
		// vérifier si la pétition est archivée
			if ($status == '3') {
			$petition_sign_online  = _MD_XPETITIONS_ARCHIVE;
			$link_sign_online      = '';
			$petition_sign_offline = '';
			$link_sign_offline     = '';
			$petition_sign_friend  = '';
			$link_sign_friend      = '';
			} else {
			$petition_sign_online  = $myts->DisplayTarea($xoopsModuleConfig['signature_title']);
			$link_sign_online      = $module_url.'/index.php?id='.$id.'&op=form';
			$petition_sign_offline = $myts->DisplayTarea($xoopsModuleConfig['signature_download']);
				if ($petition_detail['file'] == '1')
					$link_sign_offline = $xoopsModuleConfig['path_upload'].'/'.$petition_detail['link_file'];
				else
					$link_sign_offline = '';
				if ($xoopsModuleConfig['send_a_friend']) {
				$petition_sign_friend = $myts->DisplayTarea($xoopsModuleConfig['signature_friend']);
				$link_sign_friend     = $module_url.'/index.php?id='.$id.'&op=friend';
				} else {
				$petition_sign_friend = '';
				}
			}

		$petition_sign_show = $myts->DisplayTarea($xoopsModuleConfig['signature_show']);
		$link_sign_show     = $module_url.'/index.php?id='.$id.'&op=allsigns';
		$name_nav1          = $myts->DisplayTarea($petition_detail['title']);
		$link_nav1          = $module_url.'/index.php?id='.$id;
		$name_nav2          = _MD_XPETITIONS_HOME_NAV;
		$link_adm_modif     = $module_url.'/admin/petitions.php?op=modif&id='.$id;
		$link_adm_delete    = $module_url.'/admin/petitions.php?op=delete&id='.$id;
		$xoopsTpl->assign(array(
		"name_nav1"             => $name_nav1,
		"link_nav1"             => $link_nav1,
		"name_nav2"             => $name_nav2,
		"link_adm_modif"        => $link_adm_modif,
		"link_adm_delete"       => $link_adm_delete,
		"petition_sign_online"  => $petition_sign_online,
		"petition_sign_offline" => $petition_sign_offline,
		"petition_sign_friend"  => $petition_sign_friend,
		"petition_sign_show"    => $petition_sign_show,
		"link_sign_online"      => $link_sign_online,
		"link_sign_offline"     => $link_sign_offline,
		"link_sign_friend"      => $link_sign_friend,
		"link_sign_show"        => $link_sign_show,
		"petition_title"        => $myts->DisplayTarea($petition_detail['title']),
		"petition_desc"         => $myts->DisplayTarea($petition_detail['description'], 1, 1, 1, 1, 1),
		"petition_date"         => $petition_detail['date'],
		"petition_id"           => $id,
		));
		}
	} else {
	// controle du résultat de la requête SQL
	$name_nav1 = _MD_XPETITIONS_NO_DETAIL;
	$xoopsTpl->assign(array(
	"name_nav1"        => $name_nav1,
	"petition_offline" => _MD_XPETITIONS_NO_DETAIL,
	));
	}
	break;

case "index": // affichage de la page d'accueil des pétitions
	default :
	$name_nav1 = _MD_XPETITIONS_HOME_NAV;
	$xoopsTpl->assign("name_nav1", $name_nav1);
	$home_petitions_active = _MD_XPETITIONS_HOME_TAB1;
	$xoopsTpl->assign("home_petitions_active", $home_petitions_active);

	// ---------------------------
	// Liste des pétitions actives
	// ---------------------------
	$petitions_count_online = getPetitionsCountOnline(1);
	$choix_online           = 1;
	$petitions_sql_online   = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE status = "'.$choix_online.'"';
	$petitions_pagestart    = isset($_GET['page']) ? intval($_GET['page']) : 0;

	if ($petitions_count_online < 1) {
	$no_petition_active = _MD_XPETITIONS_NO_ACTIVE;
	$xoopsTpl->assign("no_petition_active", $no_petition_active);
	} else {
	  $pagenav = new XoopsPageNav($petitions_count_online, $xoopsModuleConfig['index_per_page'], $petitions_pagestart, 'page');
	  $limite = limite($petitions_pagestart, $petitions_count_online, $xoopsModuleConfig['index_per_page'], $petitions_sql_online);
	  $petition = dbResultToArray($limite);

	  foreach ($petition as $row) {
		$petition['title'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php?id='.$row['id'].'">'.$myts->DisplayTarea($row['title']).'</a>';
		if ($xoopsModuleConfig['get_counter_signs'] == 1) {
		$petition['counter'] = getSignaturesInfos($row['name'], 1);
		}
		$petitions[] = $petition;
	   }
	$xoopsTpl->assign("petitions", $petitions);
	$page_nav = "<div align='right'>".$pagenav->renderNav().'</div><br />';
	$xoopsTpl->assign('pagenav', $page_nav);
	}

	if ($xoopsModuleConfig['petitions_archives'] == 1) {
	$home_petitions_archive = _MD_XPETITIONS_HOME_TAB2;
	$xoopsTpl->assign("home_petitions_archive", $home_petitions_archive);

	// -----------------------------
	// Liste des pétitions archivées
	// -----------------------------
	$petitions_count_archive = getPetitionsCountOnline(3);
	$choix_archive           = 3;
	$petitions_sql_archive   = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE status = "'.$choix_archive.'"';
	$petitions_pagestart2    = isset($_GET['page']) ? intval($_GET['page']) : 0;

	if ($petitions_count_archive < 1) {
	$no_petition_archive = _MD_XPETITIONS_NO_ARCHIVE;
	$xoopsTpl->assign("no_petition_archive", $no_petition_archive);
	} else {
	  $pagenav2 = new XoopsPageNav($petitions_count_archive, $xoopsModuleConfig['index_per_page'], $petitions_pagestart2, 'page');
	  $limite2 = limite($petitions_pagestart2, $petitions_count_archive, $xoopsModuleConfig['index_per_page'], $petitions_sql_archive);
	  $petition_arch = dbResultToArray($limite2);

	  foreach ($petition_arch as $row) {
		$petition_arch['title'] = '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php?id='.$row['id'].'">'.$myts->DisplayTarea($row['title']).'</a>';
		if ($xoopsModuleConfig['get_counter_signs'] == 1) {
		$petition_arch['counter'] = getSignaturesInfos($row['name'], 1);
		}
		$petitions_arch[] = $petition_arch;
	   }
	$xoopsTpl->assign("petitions_arch", $petitions_arch);
	$page_nav2 = "<div align='right'>".$pagenav2->renderNav().'</div><br />';
	$xoopsTpl->assign('pagenav', $page_nav2);
	}

	}
	break;
}

include(XOOPS_ROOT_PATH."/footer.php");
?>