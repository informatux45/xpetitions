<?php
// $Id: index.php,v 0.1 2007/10/16 10:00:00 Patrice BOUTHIER
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <https://www.xoops.org>                             //
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
require_once __DIR__ . '/header.inc.php';

xoops_cp_header();
global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

?>
<script type="text/javascript" src="<?php echo XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
<?php

// Upload Directory XPETITIONS / Directory CSV
$dir_upload_xpetitions = XOOPS_ROOT_PATH . $xoopsModuleConfig['path_upload'] . '/';
$dir_csv_xpetitions    = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/csv/';

// Recuperer les valeurs de la synthese
$xpetitions_petitions_create   = getPetitionsCount() ?: '0';
$xpetitions_petitions_online   = getPetitionsCountOnline(1) ?: '0';
$xpetitions_petitions_offline  = getPetitionsCountOnline(2) ?: '0';
$xpetitions_petitions_archives = getPetitionsCountOnline(3) ?: '0';

// Droits du repertoire d'upload
$dir_upload_xpetitions_writable = @is_writable($dir_upload_xpetitions);

// Droits du repertoire csv
$dir_csv_xpetitions_writable = @is_writable($dir_csv_xpetitions);

// Version de PHP (upload csv)
$server_php_version        = PHP_VERSION;
$xpetition_csv_php_version = version_compare($server_php_version, '5.1.0', '>=');

$home_info = [
    $dir_upload_xpetitions,
    $xpetitions_petitions_create,
    $xpetitions_petitions_online,
    $xpetitions_petitions_offline,
    $xpetitions_petitions_archives,
    $dir_upload_xpetitions_writable,
    $dir_csv_xpetitions_writable,
    $xpetition_csv_php_version
];

xpetitions_adminmenu('index.php', $home_info);

xpetitions_adminfooter();
xoops_cp_footer();

?>
