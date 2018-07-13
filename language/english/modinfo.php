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
/*            <https://www.xoops.org>          */
/* ******************************************* */

// Le nom du module
define('_MI_XPETITIONS_NAME', 'Xpetitions');

// Une brève description du module
define('_MI_XPETITIONS_DESC', 'Online petitions');

// Menu
define('_MI_XPETITIONS_MENU1', 'Homepage');
define('_MI_XPETITIONS_MENU2', 'Petitions');
define('_MI_XPETITIONS_MENU3', 'About');
define('_MI_XPETITIONS_MENU4', 'Signatures');
define('_MI_XPETITIONS_MENU5', 'Emails');
define('_MI_XPETITIONS_MENU6', 'Fields');
define('_MI_XPETITIONS_MENU7', 'Captcha');

// Préférences du module
define('_MI_XPETITIONS_NAVIGATION', 'Navigation bar');
define('_MI_XPETITIONS_NAVIGATION_DSC', 'This option enables visitors to navigate through your petitions via a dedicated toolbar');
define('_MI_XPETITIONS_NAVIGATION_HOME', 'Navigation bar link to home website');
define('_MI_XPETITIONS_NAVIGATION_HOME_DSC', 'This option enables to show in the breadcrumb the link to your website homepage');
define('_MI_XPETITIONS_SHOW_HOME', 'Display petitions on the homepage of the module');
define('_MI_XPETITIONS_SHOW_HOME_DSC', 'This option enables you to display petitions with line or column (activated and archived)');
define('_MI_XPETITIONS_SHOW_HOME_LINE', 'Line');
define('_MI_XPETITIONS_SHOW_HOME_COL', 'Column');
define('_MI_XPETITIONS_UPLOAD_SIZE', 'Maximum upload size for printable petitions');
define('_MI_XPETITIONS_UPLOAD_SIZE_DSC', 'Maximum size (in bytes) for the attached file containing a printable version of an online petition');
define('_MI_XPETITIONS_ADMIN_PAGE', 'Number of petitions to display');
define('_MI_XPETITIONS_ADMIN_PAGE_DSC', 'Number of petitions per page in Admin display');
define('_MI_XPETITIONS_INDEX_PAGE', 'Number of petitions to display');
define('_MI_XPETITIONS_INDEX_PAGE_DSC', 'Number of petitions per page in visitors display');
define('_MI_XPETITIONS_ADMIN_SIGN_PAGE', 'Number of signatures to display');
define('_MI_XPETITIONS_ADMIN_SIGN_PAGE_DSC', 'Number of signatures per page in Admin display');
define('_MI_XPETITIONS_INDEX_SIGNS', 'Display the number of signatures for each petition');
define('_MI_XPETITIONS_INDEX_SIGNS_DSC', 'This option enables you to display the number of confirmed signatures for each petition on the module homepage for your website\'s visitors. The counter will only be displayed if at least one signature is confirmed.');
define('_MI_XPETITIONS_INDEX_ARCHI', 'Display archived petitions on the module homepage');
define('_MI_XPETITIONS_INDEX_ARCHI_DSC', 'This option enables you to display petitions set to Archived status on the visitors\' side.<br>Note: Archived petitions can no longer be signed');
define('_MI_XPETITIONS_SIGN_TITLE', 'Signature link title');
define('_MI_XPETITIONS_SIGN_TITLE_DSC', 'Text displayed in the link that enables visitors to access the signature online form');
define('_MI_XPETITIONS_SIGN_DOWNL', 'Printable version link title');
define('_MI_XPETITIONS_SIGN_DOWNL_DSC', 'Text displayed in the link that enables visitors to download a printable version of your online petition.<br>If you have not attached a printable version to a petition, the link will not be displayed.');
define('_MI_XPETITIONS_SIGN_FRIEND', 'Tell a friend link title');
define('_MI_XPETITIONS_SIGN_FRIEND_DSC', 'Text displayed in the link that enables visitors to tell a friend that they should sign the petition');
define('_MI_XPETITIONS_SIGN_SHOW', 'Signature display link title');
define('_MI_XPETITIONS_SIGN_SHOW_DSC', 'Text displayed in the link that enables visitors to view the signatures registered for a petition');
define('_MI_XPETITIONS_SEND_FRIEN', 'Allow visitors to tell a friend');
define('_MI_XPETITIONS_SEND_FRIEN_DSC', 'This option enables or disables the link that allows visitors to tell a friend about a petition');
define('_MI_XPETITIONS_PATH_UPLOAD', 'Upload path for printable petitions');
define('_MI_XPETITIONS_PATH_UPLOAD_DSC', 'The upload path must be specified from the Xoops root path only.<br>Example: to upload the files to http://www.yoursite.com/uploads/xpetitions,<br>you should enter \'/upload/xpetitions\' (without a trailing slash).<br>Don\'t forget to change the directory rights to 777 (rwxrwxrwx).');
define('_MI_XPETITIONS_CAPTCHA_IMG', 'Anti-spam verification');
define('_MI_XPETITIONS_CAPTCHA_IMG_DSC', 'You can choose to include a captcha picture in your signature forms to protect your inbox from spam.');
define('_MI_SSECTION_WYSIWYG', 'Editor type');
define('_MI_SSECTION_WYSIWYGDSC', 'What kind of editor would you like to use. Please note that of you choose any other editor than the XoopsEditor, it must be installed on your site.');
define('_MI_XPETITIONS_VALID_METHOD', 'Validation type of the signature form');
define('_MI_XPETITIONS_VALID_METHODSC', 'The validation form of signatures can be validate in two ways:<br>1. Email : By email sent to the signatory (return of confirmation per link with key in the email)<br>2. Auto : Automatically on the Website by doubleClick without email sending');

// xoops version
define('_MI_XPETITIONS_INDEX', 'Module template index');
define('_MI_XPETITIONS_HEADER', 'Header template for module index');
define('_MI_XPETITIONS_FOOTER', 'Footer template for module index');
define('_MI_XPETITIONS_DISPLAY_INDEX', 'Template index for petition page');
define('_MI_XPETITIONS_DISPLAY_FORM', 'Template for signature form');
define('_MI_XPETITIONS_DISPLAY_TOOLBAR', 'Template for petition toolbar');
define('_MI_XPETITIONS_DISPLAY_SIGNS', 'Template for signature confirmation');
define('_MI_XPETITIONS_DISPLAY_FRIEND', 'Template for telling a friend');
define('_MI_XPETITIONS_DISPLAY_ALLSIGNS', 'Template for displaying confirmed signatures');
define('_MI_XPETITIONS_DISPLAY_FRIEND_SEND', 'Template for email to tell a friend');
define('_MI_XPETITIONS_DISPLAY_VALID', 'Template for signature confirmation');
define('_MI_XPETITIONS_DISPLAY_PRESIGN', 'Template for pr&eacute;signature before automatic validation');
define('_MI_XPETITIONS_DISPLAY_VALID_PRESIGN', 'Template for presignature confirmation');

// xoops version config
define('_MI_XPETITIONS_SIGN_TITLE_DEFAULT', 'I sign');
define('_MI_XPETITIONS_SIGN_DOWNL_DEFAULT', 'Download a printable version of the petition');
define('_MI_XPETITIONS_SIGN_FRIEND_DEFAULT', 'Tell a friend');
define('_MI_XPETITIONS_SIGN_SHOW_DEFAULT', 'See signatures');

// blocks
define('_MI_XPETITIONS_BNAME1', 'Latest signatures');
define('_MI_XPETITIONS_BNAME2', 'My active petitions');
define('_MI_XPETITIONS_BNAME3', 'My archived petitions');
