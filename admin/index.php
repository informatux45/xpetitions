<?php
// $Id: index.php,v 0.1 2007/10/16 10:00:00 Patrice BOUTHIER
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

// includes
include_once("header.inc.php");
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

xoops_cp_header();
global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

?>
<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
<?php

// Upload Directory XPETITIONS / Directory CSV
$dir_upload_xpetitions = XOOPS_ROOT_PATH . $xoopsModuleConfig['path_upload'] . '/';
$dir_csv_xpetitions    = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/csv/';

// Recuperer les valeurs de la synthese
$xpetitions_petitions_create   = getPetitionsCount() ? getPetitionsCount() : '0';
$xpetitions_petitions_online   = getPetitionsCountOnline(1) ? getPetitionsCountOnline(1) : '0';
$xpetitions_petitions_offline  = getPetitionsCountOnline(2) ? getPetitionsCountOnline(2) : '0';
$xpetitions_petitions_archives = getPetitionsCountOnline(3) ? getPetitionsCountOnline(3) : '0';

// Droits du repertoire d'upload
$dir_upload_xpetitions_writable = @is_writable($dir_upload_xpetitions);

// Droits du repertoire csv
$dir_csv_xpetitions_writable = @is_writable($dir_csv_xpetitions);

// Version de PHP (upload csv)
$server_php_version        = phpversion();
$xpetition_csv_php_version = version_compare($server_php_version, "5.1.0", ">=");

$home_info = array($dir_upload_xpetitions,
		   $xpetitions_petitions_create,
		   $xpetitions_petitions_online,
		   $xpetitions_petitions_offline,
		   $xpetitions_petitions_archives,
		   $dir_upload_xpetitions_writable,
		   $dir_csv_xpetitions_writable,
		   $xpetition_csv_php_version
		   );

xpetitions_adminmenu('index.php', $home_info);

// Aide
helpMenu(_AM_XPETITIONS_INDEX_HELP1, _AM_XPETITIONS_INDEX_HELP2);
echo '<br />';

// Tableau des pétitions
echo '<br /><table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="1" class="outer">';
echo '<tbody><tr class="bg3">';
echo '<td style="width: 5%; text-align: center;">'  . _AM_XPETITIONS_INDEX_TAB1 . '</td>';
echo '<td style="width: 50%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB2 . '</td>';
echo '<td style="width: 15%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB3 . '</td>';
echo '<td style="width: 15%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB4 . '</td>';
echo '<td style="width: 15%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB5 . '</td>';
echo '</tr>';

$petitions_count      = getPetitionsCount();
$petitions_sql        = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions');
$petitions_pagestart  = isset($_GET['page']) ? intval($_GET['page']) : 0;

if ($petitions_count < 1) {
echo '<tr><td colspan="5">';
echo '<span class="gras">' . _AM_XPETITIONS_NONE . '</span>';
echo '</td></tr>';
echo '</tbody></table>';
} else {
  $pagenav = new XoopsPageNav($petitions_count, $xoopsModuleConfig['adminindex_page'], $petitions_pagestart, 'page');
  $limite = limite($petitions_pagestart, $petitions_count, $xoopsModuleConfig['adminindex_page'], $petitions_sql);
  $petitions_aff_tab = dbResultToArray($limite);

  foreach ($petitions_aff_tab as $row) {
    echo '<tr class="bg1"><td style="text-align: center;">';
    echo $row['id'];
    echo '</td><td style="text-align: left;">';
    echo '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/index.php?id='.$row['id'].'">'.$myts->DisplayTarea($row['title']).'</a>';
    echo '</td><td style="text-align: center;">';
    echo formatdatefr($row['date']);
    echo '</td><td style="text-align: center;">';
    // Petitions Status
    // 1 : Online
    // 2 : Offline
    // 3 : Archive
    echo '<img src="'.$pathIcon16.($row['status'] == 1 ? 'green' : ($row['status'] == 2 ? 'red_off' : 'red')).'.gif" />';
    echo '</td><td style="text-align: center;">';
    echo '<a href="petitions.php?op=modif&id='.$row['id'].'"><img src="'.$pathIcon16.'edit.png" alt="'._AM_XPETITIONS_UPDATE.'" title="'._AM_XPETITIONS_UPDATE.'" /></a>';
    echo '&nbsp;';
    echo '<a href="petitions.php?op=delete&id='.$row['id'].'&name='.$row['name'].'&ok=0"><img src="'.$pathIcon16.'delete.png" alt="'._AM_XPETITIONS_CANCEL.'" title="'._AM_XPETITIONS_CANCEL.'" /></a>';
    echo '</td></tr>';
   }
echo '</tbody></table>';
echo "<div align='right'>".$pagenav->renderNav().'</div><br />';
}

//echo '</div>'; // fin id central

xpetitions_adminfooter();
xoops_cp_footer();

?>