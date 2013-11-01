<?php
// $Id: petitions.php,v 0.1 2007/10/16 10:00:00 Patrice BOUTHIER
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
global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB, $pathIcon16;

$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'petitions';

// variable pour fichier uploader
$upload_size = $xoopsModuleConfig['upload_size'];
$mimetypes   = array('application/pdf', 'application/msword');
$upload_dir  = XOOPS_ROOT_PATH.$xoopsModuleConfig['path_upload'];

switch ($op) {
    case "petitions": //
        include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
	xoops_cp_header();
	xpetitions_adminmenu('petitions.php');
        // Aide
        helpMenu(_AM_XPETITIONS_INDEX_HELP1, _AM_XPETITIONS_INDEX_HELP2);

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
            echo '<img src="'.$pathIcon16.'/'.($row['status'] == 1 ? 'on' : 'off').'.png" />';
            echo '</td><td style="text-align: center;">';
            echo '<a href="petitions.php?op=modif&id='.$row['id'].'"><img src="'.$pathIcon16.'/edit.png" alt="'._AM_XPETITIONS_UPDATE.'" title="'._AM_XPETITIONS_UPDATE.'" /></a>';
            echo '&nbsp;';
            echo '<a href="petitions.php?op=delete&id='.$row['id'].'&name='.$row['name'].'&ok=0"><img src="'.$pathIcon16.'/delete.png" alt="'._AM_XPETITIONS_CANCEL.'" title="'._AM_XPETITIONS_CANCEL.'" /></a>';
            echo '</td></tr>';
           }
        echo '</tbody></table>';
        echo "<div align='right'>".$pagenav->renderNav().'</div><br />';
        }        
    break;
    case "post": // formulaire posté
	include XOOPS_ROOT_PATH.'/header.php';
	// récupération des données
	$name        = $myts->oopsAddSlashes($_POST['name']);
	$title       = $myts->oopsAddSlashes($_POST['title']);
	$description = $myts->oopsAddSlashes($_POST['description']);
	$email       = $myts->oopsAddSlashes($_POST['email']);
	$whoview     = $myts->oopsAddSlashes($_POST['whoview']);
	$date        = formatdatestamp($_POST['date']);
	$status      = $myts->oopsAddSlashes($_POST['status']);
	$link_file   = '';
	$link        = '0';

	include_once(XOOPS_ROOT_PATH."/class/uploader.php");
	$file = trim($_POST["xoops_upload_file"][0]);

	// taille du fichier avant upload
	$file_size = $_FILES[$file]['size'];
	if ($file_size != '0') {
		if($_FILES[$file]['tmp_name'] == "" || !is_readable($_FILES[$file]['tmp_name'])) {
		// upload echoué retour au formulaire
		redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_ERROR_FILE_UPLOAD) ;
		exit ;
		}
	// création de l'objet uploader
	$uploader = new XoopsMediaUploader($upload_dir, $mimetypes, $upload_size);
	// vérifier si le fichier uploadé n'est pas plus grand en taille, et copié du répertoire temporaire au répertoire upload prévu
	if($uploader->fetchMedia($file) && $uploader->upload()) {
	// upload réussi
	$link_file = $uploader->getSavedFileName();
	$link      = '1';
	} else {
	// sinon l'upload a échoué : message d'erreur
	echo $uploader->getErrors();
	}
	}

	$create_petition = insertPetition($name, $title, $description, $email, $date, $status, $whoview, $link, $link_file);
	$message = (!$create_petition) ? redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_ERROR_INSERT) : redirect_header("petitions.php", 2, _AM_XPETITIONS_VALID_INSERT);

    break;

    case "update": // formulaire posté (mis à jour)
	include XOOPS_ROOT_PATH.'/header.php';
	// récupération des données
	extract($_POST,EXTR_OVERWRITE);
	$id          = intval($id);
	$title       = $myts->oopsAddSlashes($title);
	$description = $myts->oopsAddSlashes($description);
	$email       = $myts->oopsAddSlashes($email);
	$status      = $myts->oopsAddSlashes($status);
	$whoview     = $myts->oopsAddSlashes($whoview);
	$date        = formatdatestamp($date);
	$checkbox    = $_POST['file_delete'];

	include_once(XOOPS_ROOT_PATH."/class/uploader.php");
	$file = $_POST["xoops_upload_file"][0];

	// vérification si suppression
	$petitionid = getPetitionDetails($id);

	if ($checkbox == '1') {
	$delfile   = $upload_dir.'/'.$petitionid['link_file'];
	$link_file = '';
	$link      = '0';
	updatePetitionFile($id, $link, $link_file);
	if (file_exists($delfile))
		$delete = unlink("$delfile");
	}


	$petition    = getPetitionDetails($id);
	// Vérification si présence fichier
	if (!empty($file) || $file != "") {

	// taille du fichier avant upload
	$file_size = $_FILES['file']['size'];
	// update du fichier enregistré
	if ($file_size != 0) {
		if($_FILES['file']['tmp_name'] == "" || !is_readable($_FILES['file']['tmp_name'])) {
		// upload echoué retour au formulaire
		redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_ERROR_FILE_UPLOAD) ;
		exit ;
		}
	// création de l'objet uploader
	$uploader = new XoopsMediaUploader($upload_dir, $mimetypes, $upload_size);
	// vérifier si le fichier uploadé n'est pas plus grand en taille, et copié du répertoire temporaire au répertoire upload prévu
		if($uploader->fetchMedia($file) && $uploader->upload()) {
		// upload réussi
		$link_file = $uploader->getSavedFileName();
		$link      = '1';
		} else {
		// sinon l'upload a échoué : message d'erreur
		echo $uploader->getErrors();
		}

	} else {
	$link      = $petition['file'];
	$link_file = $petition['link_file'];
	}

	}
	
	$update_petition = updatePetition($id, $title, $description, $email,  $status, $whoview, $date, $link, $link_file);
	
	$message = (!$update_petition) ? redirect_header("javascript:history.go(-1)", 2, _AM_XPETITIONS_ERROR_UPDATE) : redirect_header("petitions.php", 2, _AM_XPETITIONS_VALID_UPDATE);

    break;


    case "form": // affichage du formulaire
	xoops_cp_header();
	xpetitions_adminmenu('petitions.php');

	// Initialisations des variables
	$name        = '';
	$title       = '';
	$description = '';
	$email       = !empty($xoopsUser) ? $xoopsUser->getVar("email", "E") : "";
	$status      = '';
	//$whoview     = '';

	include "../include/addform.inc.php"; // affichage du formulaire
    break;

    case "delete": // suppression d'une pétition avant confirmation
	include XOOPS_ROOT_PATH.'/header.php';
	$delid   = intval($_REQUEST['id']);
	$delname = $myts->oopsAddSlashes($_REQUEST['name']);
	$ok      = isset($_REQUEST['ok']) ? intval($_REQUEST['ok']) : 0;
	// confirmation donc suppression de la pétition
	if ($ok == 1 && isset($delid) && isset($delname)) {
		$delete_petition = deletePetition($delid, $delname);
		$message = (!$delete_petition) ? redirect_header("index.php", 2, _AM_XPETITIONS_ERROR_DELETE) : redirect_header("index.php", 2, _AM_XPETITIONS_VALID_DELETE);
	} else {
	xoops_cp_header();
	xoops_confirm(array('op' => 'delete', 'id' => $delid, 'name' => $delname, 'ok' => 1), 'petitions.php', _AM_XPETITIONS_DELETE_CONFIRM);
	xoops_cp_footer();
	}
    break;

    case "modif": // modification d'une pétition
	xoops_cp_header();
	xpetitions_adminmenu('petitions.php');

	$petitionid = getPetitionDetails(intval($_REQUEST['id']));
	// récupération des variables
	$name        = $petitionid['name'];
	$title       = $petitionid['title'];
	$description = $petitionid['description'];
	$email       = $petitionid['email'];
	$status      = $petitionid['status'];
	$date        = $petitionid['date'];
	$whoview     = $petitionid['whoview'];
	// affichage du formulaire
	include "../include/editform.inc.php";
    break;
	
}

xpetitions_adminfooter();
xoops_cp_footer();

?>