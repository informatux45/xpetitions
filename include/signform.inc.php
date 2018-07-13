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
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

?>
<script type="text/javascript" src="<?php echo XOOPS_URL.$module_url; ?>/include/functions.js"></script>
<?php

$post = (int)$_REQUEST['id'];

// Initialisation du formulaire
if (isset($post)) {

// Récupérer la version de Xoops (formatée)
    $xoopsVersion = get_xoops_version();

    // Formulaire a valider par email ou en automatique
    // 0 : automatique
    // 1 : email
    if ($xoopsModuleConfig['validation_form'] == '1') {
        $signform = new XoopsThemeForm(sprintf(_MD_XPETITIONS_TITLE_SIGNFORM, _MD_XPETITIONS_TITLE_SIGNFORM1), 'signform', 'index.php?id=' . $post . '&op=sign');
    } else {
        $signform = new XoopsThemeForm(sprintf(_MD_XPETITIONS_TITLE_SIGNFORM, _MD_XPETITIONS_TITLE_SIGNFORM2), 'signform', 'index.php?id=' . $post . '&op=presign');
    }

    // Prénom du signataire
    if ($xoopsVersion == '2016') {
        $field_firstname = new XoopsFormText(_MD_XPETITIONS_FNAME_SIGNFORM.' *', 'firstname', 35, 50, $firstname);
    } else {
        $field_firstname = new XoopsFormText(_MD_XPETITIONS_FNAME_SIGNFORM, 'firstname', 35, 50, $firstname);
    }
    $signform->addElement($field_firstname, true);

    // Nom du signataire
    if ($xoopsVersion == '2016') {
        $field_lastname = new XoopsFormText(_MD_XPETITIONS_LNAME_SIGNFORM.' *', 'lastname', 35, 50, $lastname);
    } else {
        $field_lastname = new XoopsFormText(_MD_XPETITIONS_LNAME_SIGNFORM, 'lastname', 35, 50, $lastname);
    }
    $signform->addElement($field_lastname, true);


    // Adresse du signataire
    if (getFieldInfos(3, 1) == 1) {
        if (getFieldInfos(3, 2) == 1) {
            if ($xoopsVersion == '2016') {
                $field_address = new XoopsFormText(_MD_XPETITIONS_ADDRESS_SIGNFORM.' *', 'address', 35, 100, $address);
            } else {
                $field_address = new XoopsFormText(_MD_XPETITIONS_ADDRESS_SIGNFORM, 'address', 35, 100, $address);
            }
            $signform->addElement($field_address, true);
        } else {
            $field_address = new XoopsFormText(_MD_XPETITIONS_ADDRESS_SIGNFORM, 'address', 35, 100, $address);
            $signform->addElement($field_address, false);
        }
    }

    // Code postal du signataire
    if (getFieldInfos(4, 1) == 1) {
        if (getFieldInfos(4, 2) == 1) {
            if ($xoopsVersion == '2016') {
                $field_zip = new XoopsFormText(_MD_XPETITIONS_ZIP_SIGNFORM.' *', 'zip', 35, 10, $zip);
            } else {
                $field_zip = new XoopsFormText(_MD_XPETITIONS_ZIP_SIGNFORM, 'zip', 35, 10, $zip);
            }
            $signform->addElement($field_zip, true);
        } else {
            $field_zip = new XoopsFormText(_MD_XPETITIONS_ZIP_SIGNFORM, 'zip', 35, 10, $zip);
            $signform->addElement($field_zip, false);
        }
    }

    // Ville du signataire
    if (getFieldInfos(5, 1) == 1) {
        if (getFieldInfos(5, 2) == 1) {
            if ($xoopsVersion == '2016') {
                $field_city = new XoopsFormText(_MD_XPETITIONS_CITY_SIGNFORM.' *', 'city', 35, 50, $city);
            } else {
                $field_city = new XoopsFormText(_MD_XPETITIONS_CITY_SIGNFORM, 'city', 35, 50, $city);
            }
            $signform->addElement($field_city, true);
        } else {
            $field_city = new XoopsFormText(_MD_XPETITIONS_CITY_SIGNFORM, 'city', 35, 50, $city);
            $signform->addElement($field_city, false);
        }
    }

    // Pays du signataire
    if (getFieldInfos(6, 1) == 1) {
        if (getFieldInfos(6, 2) == 1) {
            if ($xoopsVersion == '2016') {
                $field_country = new XoopsFormSelectCountry(_MD_XPETITIONS_COUNTRY_SIGNFORM.' *', 'country', $country, 1);
            } else {
                $field_country = new XoopsFormSelectCountry(_MD_XPETITIONS_COUNTRY_SIGNFORM, 'country', $country, 1);
            }
            $signform->addElement($field_country, true);
        } else {
            $field_country = new XoopsFormSelectCountry(_MD_XPETITIONS_COUNTRY_SIGNFORM, 'country', $country, 1);
            $signform->addElement($field_country, false);
        }
    }

    // Profession du signataire
    if (getFieldInfos(7, 1) == 1) {
        if (getFieldInfos(7, 2) == 1) {
            if ($xoopsVersion == '2016') {
                $field_job = new XoopsFormText(_MD_XPETITIONS_JOB_SIGNFORM.' *', 'job', 35, 50, $job);
            } else {
                $field_job = new XoopsFormText(_MD_XPETITIONS_JOB_SIGNFORM, 'job', 35, 50, $job);
            }
            $signform->addElement($field_job, true);
        } else {
            $field_job = new XoopsFormText(_MD_XPETITIONS_JOB_SIGNFORM, 'job', 35, 50, $job);
            $signform->addElement($field_job, false);
        }
    }

    // Adresse email du signataire (pour validation)
    if ($xoopsVersion == '2016') {
        $field_email = new XoopsFormText(_MD_XPETITIONS_EMAIL_SIGNFORM.' *', 'email', 35, 100, $email);
    } else {
        $field_email = new XoopsFormText(_MD_XPETITIONS_EMAIL_SIGNFORM, 'email', 35, 100, $email);
    }
    $signform->addElement($field_email, true);

    // Captcha image si option à oui
    if ($xoopsModuleConfig['captcha_image'] == '1') {
        // --------------------------------
        // Recuperation du captcha en cours
        // --------------------------------
        $captcha_inprogress = getOptionInfos('captcha');
        switch ($captcha_inprogress['options']) {
        default: // Option CAPTCHA (K.OHWADA) => 1
        $server1  = XOOPS_URL . $module_url . '/server.php';
        $onclick1 = "javasript:this.src='". $server1 ."?'+Math.random();";
        $captcha1  = _MD_XPETITIONS_CAPTCHA ."<br />\n";
        $captcha1 .= '<img src="'. $server1 .'" onclick="'. $onclick1 .'" alt="CAPTCHA image" style="padding: 3px;  cursor: pointer;" />'."<br />\n";
        $captcha1 .= '<input name="captcha" type="text" />';
        $signform->addElement(new XoopsFormLabel(_MD_XPETITIONS_CAPTCHA_DSC, $captcha1), true);
        break;

        case '2': // Option CAPTCHA (Jpgraph) => 2
        $server2  = XOOPS_URL . $module_url . '/generate.php';
        $onclick2 = "javasript:this.src='". $server2 ."?'+Math.random();";
        $captcha2  = _MD_XPETITIONS_CAPTCHA ."<br />\n";
        $captcha2 .= '<img src="'. $server2 .'" onclick="'. $onclick2 .'" alt="CAPTCHA image" style="padding: 3px; cursor: pointer;" />'."<br />\n";
        $captcha2 .= '<input name="captcha" type="text" />';
        $signform->addElement(new XoopsFormLabel(_MD_XPETITIONS_CAPTCHA_DSC, $captcha2), true);
        break;

        case '3': // Option CAPTCHA (Texte) => 3
        require_once XOOPS_ROOT_PATH . $module_url . '/class/antispam_text.php';
        $captcha3  = getCaptcha() . "<br />\n";
        $captcha3 .= '<input name="captcha" type="text" />';
        $signform->addElement(new XoopsFormLabel(_MD_XPETITIONS_CAPTCHA_DSC, $captcha3), true);
        break;
    }
    }

    // Champs caché
    $field_hidden = new XoopsFormHidden('id', $post);
    $signform->addElement($field_hidden);

    // Bouton Ajouter/soumettre
    $button_tray = new XoopsFormElementTray('');
    $button_tray->addElement(new XoopsFormButton('', 'post', _MD_XPETITIONS_SUBMIT, 'submit'));
    $signform->addElement($button_tray);

    // Affichage du formulaire
    $signform->display();
}
?>
