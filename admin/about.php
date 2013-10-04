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
include_once("header.inc.php");

//----------------------------------------------------------------------------//
//
if(!isset($_REQUEST['op'])) {
xoops_cp_header();
xpetitions_adminmenu('about.php');
?>

<!-- <br /> -->
<table border="0" cellspacing="1" style="width: 100%;" class="outer">
  <tr>
    <th><?php echo _AM_XPETITIONS_ABOUT; ?></th>
  </tr>
  <tr>
    <td class="odd">
	  Xpetitions est un module de p&eacute;titions en ligne multilangue pour XOOPS v2, d&eacute;velopp&eacute; pour &ecirc;tre compatible avec le hack Smartfactory Multilanguages. Les formulaires ont &eacute;t&eacute; accompagn&eacute; d'une image captcha param&eacute;trable par son fichier ini et activable depuis le backoffice.
	</td>
  </tr>
</table>

<br />
<table border="0" cellspacing="1" style="width: 100%" class="outer">
  <tr>
    <th colspan="2">Informations Version</th>
  </tr>
  <tr>
    <td class="head" width="100">Version</td>
	<td class="odd"> version install&eacute;e du module <?php echo $xoopsModule->getVar('name'); ?> : <?php echo number_format(round($xoopsModule->getVar('version')/100 , 2), 2); ?></td>
  </tr>
  <tr>
    <td class="head" width="100">Mise &agrave; jour</td>
	<td class="odd">
	  <a href="http://www.informatux.com/xpetitions/">V&eacute;rifier les mises &agrave; jour</a>
	</td>
  </tr>
  <tr>
</table>

<br />
<table border="0" cellspacing="1" style="width: 100%;" class="outer">
  <tr>
    <th colspan="2">Support, demandes et commentaires</th>
  </tr>
<tr>
    <td class="head" width="100">Forums Support</td>
    <td class="odd">
      <?php echo $xoopsModule->getVar('name'); ?> poss&egrave;de <a href="http://www.informatux.com/xpetitions" target="_blank">un site et un forum pour le suivi des bugs</a>. V&eacute;rifier qu'un bug n'a pas d&eacute;j&agrave; &eacute;t&eacute; soumis avant d'ajouter le votre.
    </td>
  </tr>
  <tr>
    <td class="head" width="100">Demandes d'am&eacute;lioration</td>
    <td class="odd">
      Vous pouvez effectuer vos demandes d'am&eacute;lioration sur <a href="http://www.informatux.com/xpetitions/modules/liaise" target="_blank"> le site par le biais du formulaire de contact</a>.
    </td>
  </tr>
  <tr>
    <td class="head" width="100">E-mail</td>
	<td class="odd">
	  Je peux aussi &ecirc;tre contacter par email sur mon site par le biais  
	  <a href="http://www.informatux.com/xpetitions/modules/liaise" target="_blank">du formulaire de contact</a>.
	</td>
  </tr>
</table>

<br />
<table border="0" cellspacing="1" style="width: 100%;" class="outer">
  <tr>
    <th>Remerciements</th>
  </tr>
  <tr>
    <td class="odd">
	Un grand merci &agrave; Thomas HUBERT (worldcoalition.org) pour la traduction en anglais du module <?php echo $xoopsModule->getVar('name'); ?>.
	</td>
  </tr>
</table>

<?php

xpetitions_adminfooter();
xoops_cp_footer();
}
?>