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
/*            <https://www.xoops.org>          */
/* ******************************************* */

require  dirname(dirname(__DIR__)) . '/mainfile.php';
require_once __DIR__ . '/class/captcha_x/class.captcha_x.php';
$server = new captcha_x();
$server->handle_request();
