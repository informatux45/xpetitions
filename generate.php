<?php
/* ******************************************* */
/*                INFORMATUX                   */
/*         http://www.informatux.com/          */
/*       SOLUTIONS AND WEB DEVELOPMENT         */
/*             Patrice BOUTHIER                */
/*                   2009                      */
/* ------------------------------------------- */
/*    XOOPS - PHP Content Management System    */
/*         Copyright (c) 2000 XOOPS.org        */
/*            <http://www.xoops.org/>          */
/* ******************************************* */

include("../../mainfile.php");

session_start();

// Initialisation
$_SESSION['captcha_image'] = '';

// Appel de la librairie
require "class/antispam_jpgraph.php";

// Instancier
$obj_captcha = new Antispam();

// Creer aléatoirement un chaîne de 7 caractères et la stocker en session
$_SESSION['captcha_image'] = $obj_captcha->Rand(7);

// Envoyer l'image contenant la chaîne au navigateur
$obj_captcha->Stroke();

?>