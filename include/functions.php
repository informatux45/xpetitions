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

function get_xoops_version()
{
    $xoopsVersion = str_replace('XOOPS ', '', XOOPS_VERSION);
    $xoopsVersion = str_replace('.', '', $xoopsVersion);
    return $xoopsVersion;
}

function xpetitions_adminmenu($navigation = 'index.php', $home_info = [])
{
    global $xoopsModule, $pathIcon16;

    /* Xpetitions Style */
    $urlMod = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname');
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.$urlMod.'/css/style.css" >';

    /* Nice Xoops GUI */
    $adminObject = \Xmf\Module\Admin::getInstance();
    
    $adminObject->displayNavigation($navigation);
        
    switch ($navigation) {
        
            case 'index.php':
                // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //              Nouvelle box
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $box1 = _AM_XPETITIONS_INDEX_SUMMARY_BOX1;
        $box2 = _AM_XPETITIONS_INDEX_SUMMARY_BOX2;
                
        $adminObject->addInfoBox($box1);
                // ------------------------------------
                // --- Affichage de boutons
                // ------------------------------------
                $adminObject->addItemButton(_AM_XPETITIONS_CREATE_BUTTON, 'petitions.php?op=form', 'add', '');
        $adminObject->addInfoBoxLine($box1, $adminObject->displayButton('left'), '', '', 'default');
                
                // ------------------------------------
        // --- Repertoire d'upload
                // ------------------------------------
                $dir_upload_xpetitions = $home_info[0];
        if (is_dir($dir_upload_xpetitions)) {
            $dir_upload['value']  = _AM_XPETITIONS_DIRECTORY_CREATED;
            $dir_upload['button'] = '';
            $dir_upload['color']  = 'green';
        } else {
            $dir_upload['value']  = _AM_XPETITIONS_DIRECTORY_NOT_CREATED . '<br>';
            $dir_upload['button'] = '<form name="create_dir" action="dir.php" method="post"><input type="submit" value="'._AM_XPETITIONS_DIRECTORY_TO_CREATE.'" ></form>';
            $dir_upload['color']  = 'red';
        }
        $adminObject->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK1.' ('.$dir_upload_xpetitions.')'.$dir_upload['button'], $dir_upload['value'], $dir_upload['color'], 'default');
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
        $adminObject->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK2, $dir_upload_writable['value'], $dir_upload_writable['color'], 'default');
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
        $adminObject->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK3, $dir_csv_writable['value'], $dir_csv_writable['color'], 'default');
        // --- Pourcentage acompte
                $xpetition_csv_php_version = $home_info[7];
        if ($xpetition_csv_php_version) {
            $dir_php_version['value'] = _YES;
            $dir_php_version['color'] = 'green';
        } else {
            $dir_php_version['value'] = _NO;
            $dir_php_version['color'] = 'red';
        }
        $adminObject->addInfoBoxLine($box1, _AM_XPETITIONS_CHECK4, $dir_php_version['value'], $dir_php_version['color'], 'default');
        
                // --- Tableau
        $adminObject->addInfoBox($box2);
        // Petitions Status
                $xpetitions_online  = ($home_info[2] < 2) ? sprintf(_AM_XPETITIONS_PETITION_ONLINE, $home_info[2]) : sprintf(_AM_XPETITIONS_PETITIONS_ONLINE, $home_info[2]);
                $adminObject->addInfoBoxLine($box2, $xpetitions_online, '');
                $xpetitions_offline = ($home_info[3] < 2) ? sprintf(_AM_XPETITIONS_PETITION_OFFLINE, $home_info[3]) : sprintf(_AM_XPETITIONS_PETITIONS_OFFLINE, $home_info[3]);
                $adminObject->addInfoBoxLine($box2, $xpetitions_offline, '');
                $xpetitions_archive = ($home_info[4] < 2) ? sprintf(_AM_XPETITIONS_PETITION_ARCHIVE, $home_info[4]) : sprintf(_AM_XPETITIONS_PETITIONS_ARCHIVE, $home_info[4]);
                $adminObject->addInfoBoxLine($box2, $xpetitions_archive, '');
                // ----------------------------------------
                $adminObject->addInfoBoxLine($box2, '-------------------------------', '');
                $xpetitions_create  = ($home_info[1] < 2) ? sprintf(_AM_XPETITIONS_PETITION_CREATE, $home_info[1]) : sprintf(_AM_XPETITIONS_PETITIONS_CREATE, $home_info[1]);
                $adminObject->addInfoBoxLine($box2, $xpetitions_create, '');
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //               Affichage
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $adminObject->displayIndex();
            break;
            
            case 'about.php':
                echo $adminObject->renderAbout();
            break;
        
            case 'petitions.php':
                if (!isset($_REQUEST['op'])) {
                    // Creer une nouvelle petition
                    $adminObject->addItemButton(_AM_XPETITIONS_CREATE_BUTTON, 'petitions.php?op=form', 'add', '');
                    $adminObject->displayButton('left', '');
                }
            break;
            
            case 'signature.php':
                $op = isset($_REQUEST['op']) ? trim($_REQUEST['op']) : false;
                if (!isset($op)) {
                    // Ajouter des signataires manuellement (suite à une signature sur une de vos pétitions papier)
                    $adminObject->addItemButton(_AM_XPETITIONS_SAVE_SIGN, 'signature.php?op=signma', 'add');
                    $adminObject->addItemButton(_AM_XPETITIONS_SIGN_SHOW, 'signature.php?op=signshow', 'search');
                    $adminObject->displayButton('left');
                }
                if ('novalid' === $op) {
                    // Ajouter des signataires manuellement (suite à une signature sur une de vos pétitions papier)
                    $adminObject->addItemButton(_AM_XPETITIONS_SAVE_SIGN, 'signature.php?op=signma', 'add');
                    $adminObject->addItemButton(_AM_XPETITIONS_SIGN_SHOW, 'signature.php?op=signshow', 'search');
                    // Validation forcée des signatures non validées
                    $adminObject->addItemButton(_AM_XPETITIONS_FORCE_SIGN, 'signature.php?op=signfo&id='.$_REQUEST['id'].'&name='.$_REQUEST['name'].'&ok=0', 'button_ok');
                    $adminObject->displayButton('left');
                }
                if ('recorded' === $op) {
                    // Ajouter des signataires manuellement (suite à une signature sur une de vos pétitions papier)
                    $adminObject->addItemButton(_AM_XPETITIONS_SAVE_SIGN, 'signature.php?op=signma', 'add');
                    $adminObject->addItemButton(_AM_XPETITIONS_SIGN_SHOW, 'signature.php?op=signshow', 'search');
                    $adminObject->displayButton('left');
                }
                if ('extract' === $op) {
                    // Ajouter des signataires manuellement (suite à une signature sur une de vos pétitions papier)
                    $adminObject->addItemButton(_AM_XPETITIONS_SAVE_SIGN, 'signature.php?op=signma', 'add');
                    $adminObject->addItemButton(_AM_XPETITIONS_SIGN_SHOW, 'signature.php?op=signshow', 'search');
                    $adminObject->displayButton('left');
                }
            break;
        
        } // End Switch
} // end function

function xpetitions_adminfooter()
{
    global $xoopsModule;

    $modfootertxt = 'Module ' . $xoopsModule->getVar('name') . ' - Version ' . $xoopsModule->getVar('version') / 100 . ' - INFORMATUX.COM';
    $urlMod  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname');
    $urlSup  = 'http://www.informatux.com/';
    $urlSup2 = 'https://github.com/informatux45/xpetitions';

    echo "<div style='padding-top: 8px; padding-bottom: 10px; text-align: center;'><a href='" . $urlSup2 . "' target='_blank'><img src='" . $urlMod . "/images/xpetitions_icone.png' title='" . $modfootertxt . "' alt='" . $modfootertxt . "'></a><div class='xpetitions_admin_footer_inf2'>Developed and maintained by <a href='" . $urlSup . "'>INFORMATUX</a></div></div>";
} // fin de la fonction

function helpMenu($titre, $aide)
{
    ?>
        <script>
        window.onload = function(){
            var legends = document.getElementsByTagName("legend");
            for(var i=0; i<legends.length; i++) {
                legends[i].onclick = function() {
                    var myDivs = this.parentNode.getElementsByTagName("div");
                    var myDiv;

                    if (myDivs.length > 0) {
                        var myDiv = myDivs[0];

                        if (myDiv.style.display == "") {
                            myDiv.style.display = "none"
                        } else {
                            myDiv.style.display = "";
                        }
                    }
                }
            }
            
        };
        </script>
        <?php
    echo '<fieldset id="xpetitions_help_a">';
    echo '<legend class="label">' . $titre . '</legend>';
    echo '<div class="xpetitions_help" id="help_index">' . $aide . '</div>';
    echo '</fieldset>';
}

function showLettersSigns($id, $module_url, $link)
{
    // affichage des lettres A à Z avec leur lien
    $signs_lettre = 65;
    while ($signs_lettre < 92) {
        $class_sign     = ($_GET['letter'] == chr($signs_lettre)) ? 'xpetitions_allsigns_big_letter' : '';
        $class_sign_all = ('all' === $_GET['letter']) ? 'xpetitions_allsigns_big_letter' : '';
        if (91 == $signs_lettre) {
            $petition_allsigns_letter['letter'] = '<a class="'.$class_sign_all.'" href="'.XOOPS_URL.$module_url.$link.'all"><span class="'.$class_sign_all.'">'._MD_XPETITIONS_ALL_ALLSIGNS.'</span></a>';
        } else {
            $petition_allsigns_letter['letter'] = '<a class="'.$class_sign.'" href="'.XOOPS_URL.$module_url.$link.chr($signs_lettre).'"><span class="'.$class_sign.'">'.chr($signs_lettre).'</span></a>&nbsp;';
        }
        $signs_lettre++;
        $petitions_allsigns_letter[] = $petition_allsigns_letter;
    }
    return $petitions_allsigns_letter;
}

function createKey()
{
    return md5(uniqid(mt_rand()));
}

function filled_out($form_vars)
{
    // tester si les variables ont une valeur
    foreach ($form_vars as $key => $value) {
        if (!isset($key) || ('' == $value)) {
            return false;
        }
    }
    return true;
}

function formatdatefr($date)
{
    if ($date) {
        $returndate = date('d-m-Y', $date);
    }
    return $returndate;
}

function formatdateen($date)
{
    if ($date) {
        $returndate = date('m-d-Y', $date);
    }
    return $returndate;
}

function formatdatestamp($date)
{
    // intialisation
    $formatdatestamp = $date;
    // formatage
    list($annee, $mois, $jour) = explode('-', $formatdatestamp);
    // affichage
    $returndate = mktime(0, 0, 0, $mois, $jour, $annee);
    
    return $returndate;
}

function deleteFile($delfile, $id, $link, $link_file)
{
    updatePetitionFile($id, $link, $link_file);
    $delete = unlink((string)$delfile);
}

function ExporterSignatures($p)
{
    $dir           = __DIR__;
    $fichier       = "$dir/signature.csv";
    $infosPetition = LireInfosPetition($p);
    
    $q = "SELECT * FROM ${prefixe}".$infosPetition['nom'] . ' ORDER BY nom';
    $d = @$GLOBALS['xoopsDB']->queryF($q) || die('ListeSignature :: ' . $GLOBALS['xoopsDB']->error());
    
    while (false !== ($row = @$GLOBALS['xoopsDB']->fetchArray($d))) {
        $texte .= implode('|', $row)."\n";
    }
    i
    f (!($hdl = fopen($fichier, 'w'))) {
        echo "impossible d'ouvrir $fichier<br>";
        exit;
    }
    fwrite($hdl, $texte) || die('Ecriture impossible');
    ;
    fclose($hdl);
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // some day in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Content-type: application/x-download');
    header("Content-Disposition: attachment; filename={$fichier}");
    header('Content-Transfer-Encoding: binary');
    readfile($fichier);
}

function mailValid($email)
{
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

function getEditor($caption, $name, $value = '', $width = '100%', $height ='400px', $supplemental='', $dhtml = true)
{
    global $xoopsModuleConfig;
    $editor = false;
    $xv     = str_replace('XOOPS ', '', XOOPS_VERSION);

    $editor_configs           = [];
    $editor_configs['name']   = $name;
    $editor_configs['value']  = $value;
    $editor_configs['rows']   = 10;
    $editor_configs['cols']   = 40;
    $editor_configs['width']  = '100%';
    $editor_configs['height'] = '400px';

    switch (strtolower($xoopsModuleConfig['use_wysiwyg'])) {
                case 'tiny':
                case 'tinymce':
                    $editor = new XoopsFormEditor($caption, $xoopsModuleConfig['use_wysiwyg'], $editor_configs, $nohtml = false, $onfailure = 'textarea');
                break;

        default:
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
