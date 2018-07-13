<?php
/* ******************************************* */
/*                INFORMATUX                   */
/*         http://www.informatux.com/          */
/*       SOLUTIONS AND WEB DEVELOPMENT         */
/*             Patrice BOUTHIER                */
/*                   2013                     */
/* ------------------------------------------- */
/*    XOOPS - PHP Content Management System    */
/*         Copyright (c) 2000 XOOPS.org        */
/*            <http://www.xoops.org/>          */
/* ******************************************* */

// includes
include_once("header.inc.php");
global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

include XOOPS_ROOT_PATH.'/header.php';
// creation
$dir_upload_xpetitions = XOOPS_ROOT_PATH . $xoopsModuleConfig['path_upload'];
$oldumask              = @umask(0);
$create_dir            = @mkdir($dir_upload_xpetitions, 0777);
@umask($oldumask);

$message = (!$create_dir) ? redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_DIR_NOT_CREATED) : redirect_header("index.php", 2, _AM_XPETITIONS_DIR_CREATED);

xrent_adminfooter();
xoops_cp_footer();
