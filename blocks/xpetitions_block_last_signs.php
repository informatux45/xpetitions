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

function b_xpetitions_last_signs_show($options) {

// includes
require_once(XOOPS_ROOT_PATH.'/modules/xpetitions/include/mysql.php');
require_once(XOOPS_ROOT_PATH.'/modules/xpetitions/include/functions.php');

global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;
$myts =& MyTextSanitizer::getInstance();

$block = array();

$number_signatures = intval($options[4]);
$petition_detail   = getPetitionDetails(intval($options[6]));

$options[1] = (intval($options[1]) >= 8) ? $options[1] : '8';

// si option 'affichage infos titre de la pétition'
if ($options[0] == 1) {
	if (strlen($petition_detail['title']) >= $options[1]) {
		$block['xpetitions_title'] = substr($myts->DisplayTarea(strtolower($petition_detail['title'])),0,($options[1])).'...';
	} else {
		$block['xpetitions_title'] = $myts->DisplayTarea($petition_detail['title']);
	}
}
// si option 'affichage infos date de mise en ligne'
if ($options[2] == 1)
	$block['xpetitions_online'] = formatdatefr($petition_detail['date']);

// si option 'affichage infos nombres totales de signatures enregistrées'
if ($options[3] == 1)
	$block['xpetitions_recorded'] = getSignaturesInfos($petition_name_table, '1');

$xpetitions_signatures = getSignaturesBlock($petition_name_table, '1', $number_signatures);
if ($xpetitions_signatures) {
	foreach ($xpetitions_signatures as $row) {
		$signatures['name']   = strtoupper($row['name']);
		$signatures['prenom'] = strtolower($row['prenom']);
		// si option 'affichage de la date'
		if ($options[5] == 1)
			$signatures['date'] = formatdatefr($row['date']);

		$block['signatures'][] = $signatures;
	}
} else {
$signatures = _MB_XPETITIONS_NOSIGN;
$block['signatures']['none'] = $signatures;
}

return $block;

}

function b_xpetitions_last_signs_edit($options) {
// options : Choix de la pétition à afficher
// options : INFOs (affichage du titre, affichage de la date, affichage du compteur de signatures)
// options : Nombre de signatures à afficher, affichage de la date de la signature

// includes
require_once(XOOPS_ROOT_PATH.'/modules/xpetitions/include/mysql.php');
$myts =& MyTextSanitizer::getInstance();

$form = '<span style="font-weight: bold;">'._MB_XPETITIONS_INFOS.'</span><br />';

$form .= _MB_XPETITIONS_INFOS_TITLE ."<input type=\"radio\" name=\"options[0]\" value=\"1\"";
if ($options[0] == 1) $form .= " checked=\"checked\"";
$form .= " />"._YES."<input type=\"radio\" name=\"options[0]\" value=\"0\"";
if ($options[0] == 0) $form .= " checked=\"checked\"";
$form .= " />"._NO;

$form .= "<br />" . _MB_XPETITIONS_INFOS_TITLE_SIZE . "<input type='text' name='options[1]' size='3' value='" . $options[1] . "' />";

$form .= _MB_XPETITIONS_INFOS_TITLE_SIZE_DSC;

$form .= "<br />". _MB_XPETITIONS_INFOS_DATE ."<input type=\"radio\" name=\"options[2]\" value=\"1\"";
if ($options[2] == 1) $form .= " checked=\"checked\"";
$form .= " />"._YES."<input type=\"radio\" name=\"options[2]\" value=\"0\"";
if ($options[2] == 0) $form .= " checked=\"checked\"";
$form .= " />"._NO;

$form .= "<br />". _MB_XPETITIONS_INFOS_SIGNS ."<input type=\"radio\" name=\"options[3]\" value=\"1\"";
if ($options[3] == 1) $form .= " checked=\"checked\"";
$form .= " />"._YES."<input type=\"radio\" name=\"options[3]\" value=\"0\"";
if ($options[3] == 0) $form .= " checked=\"checked\"";
$form .= " />"._NO;

$form .= "<br /><br /><span style='font-weight: bold;'>" . _MB_XPETITIONS_RECORDED_TITLE . "</span>";

$form .= "<br />" . _MB_XPETITIONS_NUMBER_SIGNS . "<input type='text' name='options[4]' size='3' value='" . $options[4] . "' />";

$form .= "<br />". _MB_XPETITIONS_SIGNS_DATE ."<input type=\"radio\" name=\"options[5]\" value=\"1\"";
if ($options[5] == 1) $form .= " checked=\"checked\"";
$form .= " />"._YES."<input type=\"radio\" name=\"options[5]\" value=\"0\"";
if ($options[5] == 0) $form .= " checked=\"checked\"";
$form .= " />"._NO;

$form .= '<br /><br /><span style="font-weight: bold;">'._MB_XPETITIONS_CHOOSE.'</span><br />';

$option_select = getPetitionsOnline(1);
$form .= "<select name=\"options[6]\" size=\"5\" style=\"width: 200px;\">";
if (is_array($option_select)) {
	foreach ($option_select as $row) {
	$form .= '<option value="'.$row['id'].'"';
	if ($options[6] == $row['id']) $form .= ' selected="selected"';
	$form .= '>'.$myts->DisplayTarea($row['title']).'</option>';
	}
} else {
$form .= '<option>'. _MD_XPETITIONS_NO_PETITION .'</option>';
}
$form .= '</select>';

return $form;

// $option[0] = Afficher le titre de la pétition (OUI/NON)
// $option[1] = Longueur du titre de la pétition
// $option[2] = Afficher la date de mise en ligne de la pétition (OUI/NON)
// $option[3] = Afficher le compteur de signatures enregistrées (OUI/NON)
// $option[4] = Afficher le nombre de dernières signatures enregistrées
// $option[5] = Afficher la date de chaque signature des dernières signatures enregistrées
// $option[6] = Choix de la pétition
}

?>