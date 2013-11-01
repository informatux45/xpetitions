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
/*            <http://www.xoops.org/>          */
/* ******************************************* */

function get_xoops_version() {
	$xoopsVersion = str_replace('XOOPS ','',XOOPS_VERSION);
	$xoopsVersion = str_replace('.', '', $xoopsVersion);
	return $xoopsVersion;
}

function xpetitions_adminmenu($navigation = 'index.php', $home_info = array()) {
	global $xoopsModule, $pathIcon16;

	/* Xpetitions Style */
	$urlMod = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname');
        echo '<link rel="stylesheet" type="text/css" media="all" href="'.$urlMod.'/css/style.css" />';

	/* Nice Xoops GUI */
	$indexAdmin = new ModuleAdmin();
	
	echo $indexAdmin->addNavigation($navigation);
        
        switch ($navigation) {
        
            case "index.php":
                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		//              Nouvelle box
		// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$box1 = 'Configuration XPETITIONS';
		$box2 = 'Synth&egrave;se';
                
		$indexAdmin->addInfoBox($box1);
                // ------------------------------------
                // --- Affichage de boutons
                // ------------------------------------
                $indexAdmin->addItemButton(_AM_XPETITIONS_CREATE_BUTTON, 'petitions.php', 'add', '');
		$indexAdmin->addInfoBoxLine($box1, $indexAdmin->renderbutton('left'), '', '', 'default');
                
                // ------------------------------------
		// --- Repertoire d'upload
                // ------------------------------------
                $dir_upload_xpetitions = $home_info[0];
		if (is_dir($dir_upload_xpetitions)) {
			$dir_upload['value']  = 'cr&eacute;&eacute;';
			$dir_upload['button'] = '';
			$dir_upload['color']  = 'green';
		} else {
			$dir_upload['value']  = 'pas cr&eacute;&eacute;<br />';
			$dir_upload['button'] = '<form name="create_dir" action="dir.php" method="post"><input type="submit" value="le cr&eacute;er maintenant" /></form>';
			$dir_upload['color']  = 'red';
		}
		$indexAdmin->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK1.' ('.$dir_upload_xpetitions.')'.$dir_upload['button'], $dir_upload['value'], $dir_upload['color'], 'default');
                // ------------------------------------
                // --- Droits d'ecriture du repertoire d'upload
                // ------------------------------------
                $dir_upload_xpetitions_writable = $home_info[5];
		if ($dir_upload_xpetitions_writable) {
			$dir_upload_writable['value'] = _YES;
			$dir_upload_writable['color'] = 'green';
		} else {
			$dir_upload_writable['value'] = _NO;
			$dir_upload_writable['color'] = 'red';
		}
		$indexAdmin->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK2, $dir_upload_writable['value'], $dir_upload_writable['color'], 'default');
                // ------------------------------------
                // --- Droits d'ecriture du repertoire d'upload CSV
                // ------------------------------------
                $dir_csv_xpetitions_writable = $home_info[6];
		if ($dir_csv_xpetitions_writable) {
			$dir_csv_writable['value'] = _YES;
			$dir_csv_writable['color'] = 'green';
		} else {
			$dir_csv_writable['value'] = _NO;
			$dir_csv_writable['color'] = 'red';
		}
		$indexAdmin->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK3, $dir_csv_writable['value'], $dir_csv_writable['color'], 'default');
		// --- Pourcentage acompte
                $xpetition_csv_php_version = $home_info[7];
		if ($xpetition_csv_php_version) {
			$dir_php_version['value'] = _YES;
			$dir_php_version['color'] = 'green';
		} else {
			$dir_php_version['value'] = _NO;
			$dir_php_version['color'] = 'red';
		}
		$indexAdmin->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK4, $dir_php_version['value'], $dir_php_version['color'], 'default');
		
                // --- Tableau
		$indexAdmin->addInfoBox($box2);
		// Petitions Status
                $xpetitions_create  = ($home_info[1] < 2) ? sprintf(_AM_XPETITIONS_PETITION_CREATE, $home_info[1]) : sprintf(_AM_XPETITIONS_PETITIONS_CREATE, $home_info[1]);
                $indexAdmin->addInfoBoxLine($box2, $xpetitions_create, '');
                $xpetitions_online  = ($home_info[2] < 2) ? sprintf(_AM_XPETITIONS_PETITION_ONLINE, $home_info[2]) : sprintf(_AM_XPETITIONS_PETITIONS_ONLINE, $home_info[2]);
                $indexAdmin->addInfoBoxLine($box2, $xpetitions_online, '');
                $xpetitions_offline = ($home_info[3] < 2) ? sprintf(_AM_XPETITIONS_PETITION_OFFLINE, $home_info[3]) : sprintf(_AM_XPETITIONS_PETITIONS_OFFLINE, $home_info[3]);
                $indexAdmin->addInfoBoxLine($box2, $xpetitions_offline, '');
                $xpetitions_archive = ($home_info[4] < 2) ? sprintf(_AM_XPETITIONS_PETITION_ARCHIVE, $home_info[4]) : sprintf(_AM_XPETITIONS_PETITIONS_ARCHIVE, $home_info[4]);
                $indexAdmin->addInfoBoxLine($box2, $xpetitions_archive, '');                      
                
		// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		//               Affichage
		// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		echo $indexAdmin->renderIndex();
            break;
            
            case "about.php":
                //if ($navigation == 'about.php') echo $indexAdmin->renderAbout('DP72DNEB4LAZG', false);
                echo $indexAdmin->renderAbout();
            break;
        
            case "petitions.php":
                if (!isset($_REQUEST['op'])) {
                    $indexAdmin->addItemButton(_AM_XPETITIONS_CREATE_BUTTON, 'petitions.php?op=form', 'add', '');	
                    echo $indexAdmin->renderButton('left', '');
                }
            break;
        
        } // End Switch
        
} // end function

function xpetitions_adminfooter() {
global $xoopsModule;

    $modfootertxt = "Module " . $xoopsModule->getVar('name') . " - Version " . $xoopsModule->getVar('version')/100 . " - INFORMATUX.COM";
    $urlMod  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname');
    $urlSup  = "http://www.informatux.com/";
    $urlSup2 = "http://www.informatux.com/xpetitions";

    echo "<div style='padding-top: 8px; padding-bottom: 10px; text-align: center;'><a href='" . $urlSup2 . "' target='_blank'><img src='" . $urlMod . "/images/xpetitions_icone.png' title='" . $modfootertxt . "' alt='" . $modfootertxt . "'/></a></div>";

//    echo '<div style="border: 2px solid #C2CDD6">';
//    echo '<div style="font-weight:bold; padding-top: 5px; text-align: center;">' . _AM_XPETITIONS_XOOPS_PRO3 . '</div><br />';
//    echo '<table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="text-align: right; width: 60%;">';
//    echo '<a href="http://www.informatux.com/"><img src="http://www.informatux.com/imgs/logom.jpg" title="INFORMATUX - Solutions et developpement WEB - Consultant informatique" align="middle" /></a>&nbsp;';
//    echo '</td><td style="width: 40%; text-align: left;">';
//    echo '&nbsp;<a href="http://www.informatux.com/"><img src="' . $urlMod . '/images/xoops_services_pro.gif" title="INFORMATUX - Solutions et developpement WEB - Consultant informatique" /></a>';
//    echo '</td></tr></tbody></table>';
//    echo "<span style=\"font-size: smaller;\">";
//    echo '<div style="font-weight:bold; padding-top: 5px; text-align: center;">' . _AM_XPETITIONS_XOOPS_PRO1." <a href=\" $urlSup \" target=\"_blank\">INFORMATUX.COM</a> (<a href='$urlSup' target=\"_blank\">" . _AM_XPETITIONS_XOOPS_PRO2 . "</a>)";
//    echo '</div>';
//    echo '</div>';
//    echo '<div style="font-weight:bold; padding-top: 5px; text-align: center;"><br /></div>';
//    echo '</div>';
} // fin de la fonction

function helpMenu($titre, $aide) {
	//echo '<div id="xpetitions_help_a"><a class="xpetitions_help_title" onclick="helpMenu(\'help_index\');">' . $titre . '</a>';
	//echo '<div style="display: none;" class="xpetitions_help" id="help_index">' . $aide . '</div></div>';
	echo '<fieldset id="xpetitions_help_a">';
	echo '<legend class="label">' . $titre . '</legend>';
	echo '<div class="xpetitions_help" id="help_index">' . $aide . '</div>';
	echo '</fieldset>';
}

function showLettersSigns($id, $module_url, $link) {
	// affichage des lettres A à Z avec leur lien
	$signs_lettre = 65;
	while ($signs_lettre < 92) {
		$class_sign     = ($_GET['letter'] == chr($signs_lettre)) ? 'xpetitions_allsigns_big_letter' : '';
		$class_sign_all = ($_GET['letter'] == 'all') ? 'xpetitions_allsigns_big_letter' : '';
		if ($signs_lettre == 91) {
			$petition_allsigns_letter['letter'] = '<a class="'.$class_sign_all.'" href="'.XOOPS_URL.$module_url.$link.'all"><span class="'.$class_sign_all.'">'._MD_XPETITIONS_ALL_ALLSIGNS.'</span></a>';
		} else {
			$petition_allsigns_letter['letter'] = '<a class="'.$class_sign.'" href="'.XOOPS_URL.$module_url.$link.chr($signs_lettre).'"><span class="'.$class_sign.'">'.chr($signs_lettre).'</span></a>&nbsp;';
		}
	$signs_lettre++;
	$petitions_allsigns_letter[] = $petition_allsigns_letter;
	}
	return $petitions_allsigns_letter;
}

function createKey() {
	return(md5(uniqid(rand())));
}

function filled_out($form_vars) {
	// tester si les variables ont une valeur
	foreach ($form_vars as $key => $value) {
		if (!isset($key) || ($value == ''))
			return false;
	}
	return true;
}

function formatdatefr($date) {
	if ($date) {
		$returndate = date('d-m-Y', $date);
	}
	return $returndate;
}

function formatdateen($date) {
	if ($date) {
		$returndate = date('m-d-Y', $date);
	}
	return $returndate;
}

function formatdatestamp($date) {
	// intialisation
	$formatdatestamp = $date;
	// formatage
	list($annee, $mois, $jour) = explode("-", $formatdatestamp);
	// affichage
	$returndate = mktime(0, 0, 0, $mois, $jour, $annee);
	
	return $returndate;
}

function deleteFile($delfile, $id, $link, $link_file) {
	updatePetitionFile($id, $link, $link_file);
	$delete = unlink("$delfile");
}

function ExporterSignatures($p){
	$dir           = dirname(__FILE__);
	$fichier       = "$dir/signature.csv";
	$infosPetition = LireInfosPetition($p);
	
	$q = "SELECT * FROM ${prefixe}".$infosPetition['nom']." ORDER BY nom";
	$d = @mysql_query($q) or die("ListeSignature :: ".mysql_error());
	
	while ($row = @mysql_fetch_assoc($d)) {
	 $texte .= implode('|',$row)."\n";
	}
	if (!($hdl = fopen($fichier,'w'))) {
	 echo "impossible d'ouvrir $fichier<br>";
	 exit;
	}
	fwrite($hdl,$texte) or die ("Ecriture impossible");;
	fclose($hdl);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // some day in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Content-type: application/x-download");
	header("Content-Disposition: attachment; filename={$fichier}");
	header("Content-Transfer-Encoding: binary");
	readfile($fichier);
}

function mailValid($email) {
	$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
	$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
	
	$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
	'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
					// séparés par des caractères autorisés avant l'arobase
	'@' .                           // Suivis d'un arobase
	'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
					// séparés par des points
	$domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine
	
	// test de l'adresse e-mail
	if (preg_match($regex, $email)) {
		return 1; // Valide
	} else {
		return 0; // Non valide
	}
}

function getEditor($caption, $name, $value = "", $width = '100%', $height ='400px', $supplemental='', $dhtml = true){

	global $xoopsModuleConfig;
	$editor = false;
	$x22    = false;
	$xv     = str_replace('XOOPS ','',XOOPS_VERSION);
	if(substr($xv,2,1)=='2') {
		$x22=true;
	}
	$editor_configs=array();
	$editor_configs["name"]   = $name;
	$editor_configs["value"]  = $value;
	$editor_configs["rows"]   = 10;
	$editor_configs["cols"]   = 40;
	$editor_configs["width"]  = "100%";
	$editor_configs["height"] = "400px";

	switch(strtolower($xoopsModuleConfig['use_wysiwyg'])){

		case 'tiny' :
		if (!$x22) {

			if ( is_readable(XOOPS_ROOT_PATH . "/class/xoopseditor/tinyeditor/formtinyeditortextarea.php"))	{ // XOOPS
				include_once(XOOPS_ROOT_PATH . "/class/xoopseditor/tinyeditor/formtinyeditortextarea.php");
				$editor = new XoopsFormTinyeditorTextArea(array('caption'=>$caption, 'name'=>$name, 'value'=>$value, 'width'=>'100%', 'height'=>'400px'));
			} elseif ( is_readable(XOOPS_ROOT_PATH . "/editors/tinymce/formtinymce.php"))	{ // IMPRESSCMS
				include_once(XOOPS_ROOT_PATH . "/editors/tinymce/formtinymce.php");
				$editor = new XoopsFormTinymce(array('caption'=>$caption, 'name'=>$name, 'value'=>$value, 'width'=>'100%', 'height'=>'400px'));
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}
		} else {
			$editor = new XoopsFormEditor($caption, "tinyeditor", $editor_configs);
		}
		break;

		case 'inbetween' :
		if (!$x22) {
			if ( is_readable(XOOPS_ROOT_PATH . "/class/xoopseditor/inbetween/forminbetweentextarea.php"))	{
				include_once(XOOPS_ROOT_PATH . "/class/xoopseditor/inbetween/forminbetweentextarea.php");
				$editor = new XoopsFormInbetweenTextArea(array('caption'=> $caption, 'name'=>$name, 'value'=>$value, 'width'=>'100%', 'height'=>'400px'),true);
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}
		} else {
			$editor = new XoopsFormEditor($caption, "inbetween", $editor_configs);
		}
		break;

		case 'fckeditor' :
		if (!$x22) {
			if ( is_readable(XOOPS_ROOT_PATH . "/class/xoopseditor/FCKeditor/formfckeditor.php")) {
				include_once(XOOPS_ROOT_PATH . "/class/xoopseditor/FCKeditor/formfckeditor.php");
				$editor = new XoopsFormFckeditor($editor_configs,true);
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}
		} else {
			$editor = new XoopsFormEditor($caption, "fckeditor", $editor_configs);
		}
		break;

		case 'koivi' :
		if (!$x22) {
			if ( is_readable(XOOPS_ROOT_PATH . "/class/wysiwyg/formwysiwygtextarea.php")) {  // XOOPS
				include_once(XOOPS_ROOT_PATH . "/class/wysiwyg/formwysiwygtextarea.php");
				$editor = new XoopsFormWysiwygTextArea($caption, $name, $value, '100%', '400px');
			} elseif ( is_readable(XOOPS_ROOT_PATH . "/editors/wysiwyg/formwysiwygtextarea.php")) { // IMPRESSCMS
				include_once(XOOPS_ROOT_PATH . "/editors/wysiwyg/formwysiwygtextarea.php");
				$editor = new XoopsFormWysiwygTextArea($caption, $name, $value, '100%', '400px');
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}
		} else {
			$editor = new XoopsFormEditor($caption, "koivi", $editor_configs);
		}
		break;

		case "spaw":
		if(!$x22) {
			if (is_readable(XOOPS_ROOT_PATH . "/class/spaw/formspaw.php"))	{
				include_once(XOOPS_ROOT_PATH . "/class/spaw/formspaw.php");
				$editor = new XoopsFormSpaw($caption, $name, $value);
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}

		} else {
			$editor = new XoopsFormEditor($caption, "spaw", $editor_configs);
		}
		break;

		case "spaw2":
		if(!$x22) {
			if (is_readable(XOOPS_ROOT_PATH . "/class/spaw2/formspaw.php"))	{
				include_once(XOOPS_ROOT_PATH . "/class/spaw2/formspaw.php");
				$editor = new XoopsFormSpaw($caption, $name, $value);
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}

		} else {
			$editor = new XoopsFormEditor($caption, "spaw", $editor_configs);
		}
		break;

		case "htmlarea":
		if(!$x22) {
			if ( is_readable(XOOPS_ROOT_PATH . "/class/htmlarea/formhtmlarea.php"))	{
				include_once(XOOPS_ROOT_PATH . "/class/htmlarea/formhtmlarea.php");
				$editor = new XoopsFormHtmlarea($caption, $name, $value);
			} else {
				if ($dhtml) {
					$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
				} else {
					$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
				}
			}
		} else {
			$editor = new XoopsFormEditor($caption, "htmlarea", $editor_configs);
		}
		break;

		default :
		if ($dhtml) {
			$editor = new XoopsFormDhtmlTextArea($caption, $name, $value, 10, 40);
		} else {
			$editor = new XoopsFormTextArea($caption, $name, $value, 7, 40);
		}

		break;
	}

	return $editor;
}

?>