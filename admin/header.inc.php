<?php
/**
* $Id: header.inc.php,v 0.1 2007/10/16 10:00:00 Patrice BOUTHIER $
* Module: Xpetitions
* Author: INFORMATUX <www.informatux.com>
* Licence: GPLv2
*/

// includes
require  dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';

if (file_exists($GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php'))) {
    include_once $GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
} else {
    redirect_header('../../../admin.php', 5, _AM_XPETITIONS_MISSING, false);
}

if (file_exists(__DIR__ . '/../language/' . $xoopsConfig['language'] . '/main.php')) {
    require  dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/main.php';
} else {
    require  dirname(__DIR__) . '/language/english/main.php';
}

// module fonctions
require_once dirname(__DIR__) . '/include/functions.php';
require_once dirname(__DIR__) . '/include/config.php';
require_once dirname(__DIR__) . '/include/mysql.php';

$moduleInfo      = $moduleHandler->get($xoopsModule->getVar('mid'));
$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');
$pathIcon16      = '../'.$xoopsModule->getInfo('icons16');
$pathIcon32      = '../'.$xoopsModule->getInfo('icons32');

$myts = MyTextSanitizer::getInstance();
