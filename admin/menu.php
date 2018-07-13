<?php
/* ******************************************* */
/*                INFORMATUX                   */
/*         http://www.informatux.com/          */
/*       SOLUTIONS AND WEB DEVELOPMENT         */
/*             Patrice BOUTHIER                */
/*                   2013                      */
/* ------------------------------------------- */
/*    XOOPS - PHP Content Management System    */
/*         Copyright (c) 2000 XOOPS.org        */
/*            <http://www.xoops.org/>          */
/* ******************************************* */

defined('XOOPS_ROOT_PATH') or die('Restricted access');
$path = dirname(dirname(dirname(dirname(__FILE__))));

global $xoopsModule, $xoopsUser;

$dirname        = basename(dirname(dirname(__FILE__)));
$module_handler = xoops_gethandler('module');
$module         = $module_handler->getByDirname($dirname);
$pathIcon32     = $module->getInfo('icons32');
$pathLanguage   = $path . $module->getInfo('dirmoduleadmin');

if (!file_exists($fileinc = $pathLanguage . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/' . 'main.php')) {
    $fileinc = $pathLanguage . '/language/english/main.php';
}
include_once $fileinc;

xoops_loadLanguage('admin', $dirname);

$i = 1;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU1;
$adminmenu[$i]['link']  = "admin/index.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/manage.png';
$i++;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU2;
$adminmenu[$i]['link']  = "admin/petitions.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/add.png';
$i++;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU4;
$adminmenu[$i]['link']  = "admin/signature.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/translations.png';
$i++;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU5;
$adminmenu[$i]['link']  = "admin/email.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/mail_foward.png';
$i++;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU6;
$adminmenu[$i]['link']  = "admin/field.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/insert_table_row.png';
$i++;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU7;
$adminmenu[$i]['link']  = "admin/captcha.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/security.png';
$i++;
$adminmenu[$i]['title'] = _MI_XPETITIONS_MENU3;
$adminmenu[$i]['link']  = "admin/about.php";
$adminmenu[$i]['icon']  = $pathIcon32.'/about.png';
