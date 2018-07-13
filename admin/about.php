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
/*            <https://www.xoops.org>          */
/* ******************************************* */

// includes
require_once __DIR__ . '/header.inc.php';

//----------------------------------------------------------------------------//
//
if (!isset($_REQUEST['op'])) {
    xoops_cp_header();
    xpetitions_adminmenu('about.php'); ?>

<!-- <br> -->
<table border="0" cellspacing="1" style="width: 100%;" class="outer">
  <tr>
    <th><?php echo _AM_XPETITIONS_ABOUT_1; ?></th>
  </tr>
  <tr>
    <td class="odd">
	  <?php echo _AM_XPETITIONS_ABOUT_1_DSC; ?>
	</td>
  </tr>
</table>

<br>
<table border="0" cellspacing="1" style="width: 100%" class="outer">
  <tr>
    <th colspan="2">Informations Version</th>
  </tr>
  <tr>
    <td class="head" width="100">Version</td>
	<td class="odd"> <?php echo $xoopsModule->getVar('name'); ?> : <?php echo number_format(round($xoopsModule->getVar('version')/100, 2), 2); ?></td>
  </tr>
  <tr>
    <td class="head" width="100"><?php echo _AM_XPETITIONS_ABOUT_2; ?></td>
	<td class="odd">
	  <a href="http://www.informatux.com/xpetitions/"><?php echo _AM_XPETITIONS_ABOUT_2_DSC; ?></a>
	</td>
  </tr>
  <tr>
</table>

<br>
<table border="0" cellspacing="1" style="width: 100%;" class="outer">
  <tr>
    <th colspan="2"><?php echo _AM_XPETITIONS_ABOUT_3; ?></th>
  </tr>
<tr>
    <td class="head" width="100">Forums Support</td>
    <td class="odd">
        <?php echo $xoopsModule->getVar('name').' '._AM_XPETITIONS_ABOUT_3_DSC; ?>
    </td>
  </tr>
  <tr>
    <td class="head" width="100"><?php echo _AM_XPETITIONS_ABOUT_4; ?></td>
    <td class="odd">
      <?php echo _AM_XPETITIONS_ABOUT_4_DSC; ?>
    </td>
  </tr>
  <tr>
    <td class="head" width="100"><?php echo _AM_XPETITIONS_ABOUT_5; ?></td>
	<td class="odd">
	  <?php echo _AM_XPETITIONS_ABOUT_5_DSC; ?>
	</td>
  </tr>
</table>

<br>
<table border="0" cellspacing="1" style="width: 100%;" class="outer">
  <tr>
    <th><?php echo _AM_XPETITIONS_ABOUT_6; ?></th>
  </tr>
  <tr>
    <td class="odd">
	<?php echo _AM_XPETITIONS_ABOUT_6_DSC; ?>
	</td>
  </tr>
</table>

<?php

xpetitions_adminfooter();
    xoops_cp_footer();
}
?>
