<?php
/**
* $Id: header.inc.php,v 0.1 2007/10/16 10:00:00 Patrice BOUTHIER $
* Module: Xpetitions
* Author: INFORMATUX <www.informatux.com>
* Licence: GPLv2
*/

// includes
include ('../../../include/cp_header.php');

if ( file_exists($GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php'))){
        include_once $GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
} else {
        redirect_header("../../../admin.php", 5, _AM_MODULEADMIN_MISSING, false); 
}

if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) {
	include ("../language/".$xoopsConfig['language']."/main.php");
} else {
	include ("../language/english/main.php");
}

// module fonctions
include_once("../include/functions.php");
include_once("../include/config.php");
include_once("../include/mysql.php");

$moduleInfo      =& $module_handler->get($xoopsModule->getVar('mid'));
$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');
$pathIcon16      = '../'.$xoopsModule->getInfo('icons16');
$pathIcon32      = '../'.$xoopsModule->getInfo('icons32');

$myts =& MyTextSanitizer::getInstance();

?>