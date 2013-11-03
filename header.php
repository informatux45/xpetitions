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

include "../../mainfile.php";
include XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/include/functions.php';
include XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/include/mysql.php';

$myts =& MyTextSanitizer::getInstance();

error_reporting(0);

?>