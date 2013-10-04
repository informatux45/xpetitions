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

// includes
$module_url = '/modules/' . $xoopsModule->getVar('dirname');
include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");
include_once(XOOPS_ROOT_PATH . $module_url . "/class/antispam_jpgraph.php");
include_once(XOOPS_ROOT_PATH . $module_url . "/class/antispam_text.php");

// Initialisation du formulaire
$captcha = new XoopsThemeForm(_AM_XPETITIONS_TITLE_CAPTCHA . _AM_XPETITIONS_CAPTCHA_SAMPLES, "captchaform", "captcha.php?op=update");

echo '<br />';

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//                     Captcha 1 : K.OHWADA                    -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$server1  = XOOPS_URL.$module_url."/server.php";
$onclick1 = "javasript:this.src='". $server1 ."?'+Math.random();";
$captcha_kohwada  = '<img src="'. $server1 .'" onclick="'. $onclick1 .'" alt="CAPTCHA K.OHWADA" title="CAPTCHA K.OHWADA" style="padding: 0px; border: 2px solid black; cursor: pointer;" />'."<br />\n";
$captcha->addElement(new XoopsFormLabel(_AM_XPETITIONS_CAPTCHA_CHOICE1 . '<br /><span style="font-weight: normal;">' . _AM_XPETITIONS_CAPTCHA_CHOICE1_DSC . '</span>', $captcha_kohwada));

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//                     Captcha 2 : JPGRAPH                     -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$server2  = XOOPS_URL.$module_url."/generate.php";
$onclick2 = "javasript:this.src='". $server2 ."?'+Math.random();";
$captcha_jpgraph  = '<img src="'. $server2 .'" onclick="'. $onclick2 .'" alt="CAPTCHA Jpgraph" title="CAPTCHA Jpgraph" style="padding: 3px; cursor: pointer;" />'."<br />\n";
$captcha->addElement(new XoopsFormLabel(_AM_XPETITIONS_CAPTCHA_CHOICE2 . '<br /><span style="font-weight: normal;">' . _AM_XPETITIONS_CAPTCHA_CHOICE2_DSC . '</span>', $captcha_jpgraph));

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//                      Captcha 3 : TEXTE                      -=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$captcha_text  = '<div style="border: 2px solid black; padding: 3px; width: auto; cursor: pointer;">';
$captcha_text .= getCaptcha();
$captcha_text .= '</div>';
$captcha->addElement(new XoopsFormLabel(_AM_XPETITIONS_CAPTCHA_CHOICE3 . '<br /><span style="font-weight: normal;">' . _AM_XPETITIONS_CAPTCHA_CHOICE3_DSC . '</span>', $captcha_text));

// --------------------------------
// Recuperation du captcha en cours
// --------------------------------
$captcha_inprogress = getOptionInfos('captcha');
// --------------------------------
// Choix du captcha
// --------------------------------
$captcha_choice = new xoopsFormRadio(_AM_XPETITIONS_CAPTCHA_CHOICE, 'captcha_choice', $captcha_inprogress['options'], '<br />');
$captcha_option = array('1' => _AM_XPETITIONS_CAPTCHA_CHOICE1A, '2' => _AM_XPETITIONS_CAPTCHA_CHOICE2A, '3' => _AM_XPETITIONS_CAPTCHA_CHOICE3A);
$captcha_choice->addOptionArray($captcha_option);
$captcha->addElement($captcha_choice, true);

// Bouton Soumettre
$button_tray  = new XoopsFormElementTray(_AM_XPETITIONS_MESS_NONE);
$button_tray->addElement(new XoopsFormButton('','post', _AM_XPETITIONS_CAPTCHA_SUBMIT, 'submit'));
$captcha->addElement($button_tray);

// Affichage du formulaire
$captcha->display();
?> 
