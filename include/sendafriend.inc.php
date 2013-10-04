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
include_once(XOOPS_ROOT_PATH . "/class/xoopsformloader.php");

?>
<script type="text/javascript" src="<?php echo XOOPS_URL.$module_url; ?>/include/functions.js"></script>
<?php

$post = intval($_REQUEST['id']);

// Initialisation du formulaire
if (isset($post)) {
$friendform = new XoopsThemeForm(_MD_XPETITIONS_TITLE_FRIENDFORM, "friendform", "index.php?id=".$post."&op=friend_send");

// Prénom du signataire
$field_your_name = new XoopsFormText(_MD_XPETITIONS_YNAME_FRIENDFORM, 'yourname', 35, 50, $yourname);
$field_your_name->setExtra("onkeyup='return formatEmail(\"yourname\",\"your_name\")'");
$friendform->addElement($field_your_name, true);

// Nom du signataire
$field_friend_name = new XoopsFormText(_MD_XPETITIONS_FNAME_FRIENDFORM, 'friendname', 35, 50, $friendname);
$field_friend_name->setExtra("onkeyup='formatEmail(\"friendname\",\"friend_name\")'");
$friendform->addElement($field_friend_name, true);

// Adresse email de votre ami
$field_friend_email = new XoopsFormText(_MD_XPETITIONS_FEMAIL_FRIENDFORM, 'email', 35, 100, $femail);
// $field_friend_email->setExtra("onblur='return Email(\"email\", \"Merci de verifier votre adresse e-mail. Son format ne correspond pas &agrave; une adresse e-mail valide.\")'");
$field_friend_email->setExtra("onkeyup='return formatEmail(\"email\",\"contact\")'");
$friendform->addElement($field_friend_email, true);

// Format email envoyé
$field_email_format = sprintf(_MD_XPETITIONS_EMAIL_FRIENDFORM, $xoopsConfig['sitename'], $name_nav1, XOOPS_URL.$module_url.'/index.php?id='.$post);
$field_friend_format_email = new XoopsFormLabel(_MD_XPETITIONS_EMAIL_FORMAT_FRIENDFORM, $field_email_format);
$field_friend_format_email->setDescription(_MD_XPETITIONS_EMAIL_FORMAT_DSC);
$friendform->addElement($field_friend_format_email);

// Captcha image si option à oui
if ($xoopsModuleConfig['captcha_image'] == '1') {
	// --------------------------------
	// Recuperation du captcha en cours
	// --------------------------------
	$captcha_inprogress = getOptionInfos('captcha');
	switch($captcha_inprogress['options']) {
		default: // Option CAPTCHA (K.OHWADA) => 1
		$server1  = XOOPS_URL . $module_url . "/server.php";
		$onclick1 = "javasript:this.src='". $server1 ."?'+Math.random();";
		$captcha1  = _MD_XPETITIONS_CAPTCHA ."<br />\n";
		$captcha1 .= '<img src="'. $server1 .'" onclick="'. $onclick1 .'" alt="CAPTCHA image" style="padding: 3px; cursor: pointer;" />'."<br />\n";
		$captcha1 .= '<input name="captcha" type="text" />';
		$friendform->addElement(new XoopsFormLabel(_MD_XPETITIONS_CAPTCHA_DSC, $captcha1), true);
		break;

		case "2": // Option CAPTCHA (Jpgraph) => 2
		$server2  = XOOPS_URL . $module_url . "/generate.php";
		$onclick2 = "javasript:this.src='". $server2 ."?'+Math.random();";
		$captcha2  = _MD_XPETITIONS_CAPTCHA ."<br />\n";
		$captcha2 .= '<img src="'. $server2 .'" onclick="'. $onclick2 .'" alt="CAPTCHA image" style="padding: 3px; cursor: pointer;" />'."<br />\n";
		$captcha2 .= '<input name="captcha" type="text" />';
		$friendform->addElement(new XoopsFormLabel(_MD_XPETITIONS_CAPTCHA_DSC, $captcha2), true);
		break;

		case "3": // Option CAPTCHA (Texte) => 3
		require_once(XOOPS_ROOT_PATH . $module_url . "/class/antispam_text.php");
		$captcha3  = getCaptcha() . "<br />\n";
		$captcha3 .= '<input name="captcha" type="text" />';
		$friendform->addElement(new XoopsFormLabel(_MD_XPETITIONS_CAPTCHA_DSC, $captcha3), true);
		break;
	}
}

// Champs cachés
$field_hidden1 = new XoopsFormHidden('id', $post);
$friendform->addElement($field_hidden1);

// Bouton Ajouter/soumettre
$button_tray = new XoopsFormElementTray('');
$button_tray->addElement(new XoopsFormButton('','post', _MD_XPETITIONS_SUBMIT_FRIEND, 'submit'));
$friendform->addElement($button_tray);

// Affichage du formulaire
$friendform->display();
}
?>