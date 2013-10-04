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

function b_xpetitions_all_petitions_show($options) {
// includes
require_once(XOOPS_ROOT_PATH.'/modules/xpetitions/include/mysql.php');
require_once(XOOPS_ROOT_PATH.'/modules/xpetitions/include/functions.php');

global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;
$myts =& MyTextSanitizer::getInstance();

$block = array();

$xpetitions_details = getPetitionsOnline(1);

$options[0] = (intval($options[0]) >= 8) ? $options[0] : '8';

if ($xpetitions_details) {
	foreach ($xpetitions_details as $row) {
		if (strlen($row['title']) >= $options[0]) {
			$petitions['title'] = substr($myts->DisplayTarea(strtolower($row['title'])),0,($options[0])).'...';
		} else {
		$petitions['title'] = $myts->DisplayTarea(strtolower($row['title']));
		}
		$petitions['id']    = strtolower($row['id']);
// 		$petitions['link']  = XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/index.php?id='.$petitions['id'];
		$petitions['link']  = XOOPS_URL.'/modules/xpetitions/index.php?id='.$petitions['id'];

		$block['petitions'][] = $petitions;
	}
} else {
$petitions = _MB_XPETITIONS_NONE;
$block['petitions']['none'] = $petitions;
}
return $block;
}

function b_xpetitions_all_petitions_edit($options) {
// options : Choix de la longueur des titres de pétitions
// includes
require_once(XOOPS_ROOT_PATH.'/modules/xpetitions/include/mysql.php');
$myts =& MyTextSanitizer::getInstance();

$form = _MB_XPETITIONS_INFOS_TITLE_SIZE_P . "<input type='text' name='options[0]' size='3' value='" . $options[0] . "' />";

$form .= _MB_XPETITIONS_INFOS_TITLE_SIZE_DSC;

return $form;
}

?>