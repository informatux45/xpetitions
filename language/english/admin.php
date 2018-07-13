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

define('_AM_XPETITIONS_XOOPS_PRO', 'http://www.informatux.com/');
define('_AM_XPETITIONS_XOOPS_PRO1', 'Support and updates available at ');
define('_AM_XPETITIONS_XOOPS_PRO2', 'WEB solutions and development');
define('_AM_XPETITIONS_XOOPS_PRO3', 'Do you need help with this module?');

// * header.inc.php *
define('_AM_XPETITIONS_MISSING', 'The ModuleAdmin class is not installed, install it on your xoops.<br />/Frameworks/moduleclasses/moduleadmin/');

// * index.php *
define('_AM_XPETITIONS_INDEX_HELP1', '<b>HELP</b>');
define('_AM_XPETITIONS_INDEX_HELP2', "- Please click on the name of a petition to open its homepage.<br />- The date displayed is that of the day the petition was put online.<br />- Petition status can be set to three levels:<br />* <b style='color: green;'>Active</b> (The petition can be signed as long as the petition date is in the past)<br />* <b style='color: orange;'>Offline</b> (The petition is not displayed and cannot be signed)<br />* <b style='color: red;'>Archived</b> (The petition is displayed but cannot be signed)<br />- Possible actions:<br />* Modification (You can modify everything except for the name of the signatures table)<br />* Deletion (This will delete the petition, including all attached signatures. If you want to keep your petition without displaying it nor registering new signatures, set it to 'Offline')");
define('_AM_XPETITIONS_INDEX', 'Homepage');
define('_AM_XPETITIONS_CREATION', 'Creation');
define('_AM_XPETITIONS_MODIFICATION', 'Modification');
define('_AM_XPETITIONS_PETITION', 'Petition');
define('_AM_XPETITIONS_SIGNATURE', 'Signatures');
define('_AM_XPETITIONS_EMAILS', 'Emails');
define('_AM_XPETITIONS_FIELD', 'Fields');
define('_AM_XPETITIONS_CAPTCHA', 'Captchas');
define('_AM_XPETITIONS_GENERALSET', 'Preferences');
define('_AM_XPETITIONS_GOTOMOD', 'Go to module');
define('_AM_XPETITIONS_MODULEADMIN', 'ADMIN');
define('_AM_XPETITIONS_HELP', 'Help');
define('_AM_XPETITIONS_PETITION_CREATE', "<span class='xpetitions_summary_create'>%s</span> existing petition");
define('_AM_XPETITIONS_PETITIONS_CREATE', "<span class='xpetitions_summary_create'>%s</span> existing petitions");
define('_AM_XPETITIONS_PETITION_ONLINE', "<span class='xpetitions_summary_online'>%s</span> active petition");
define('_AM_XPETITIONS_PETITIONS_ONLINE', "<span class='xpetitions_summary_online'>%s</span> active petitions");
define('_AM_XPETITIONS_PETITION_OFFLINE', "<span class='xpetitions_summary_offline'>%s</span> offline petition");
define('_AM_XPETITIONS_PETITIONS_OFFLINE', "<span class='xpetitions_summary_offline'>%s</span> offline petitions");
define('_AM_XPETITIONS_PETITION_ARCHIVE', "<span class='xpetitions_summary_archive'>%s</span> archived petition");
define('_AM_XPETITIONS_PETITIONS_ARCHIVE', "<span class='xpetitions_summary_archive'>%s</span> archived petitions");
define('_AM_XPETITIONS_SIGNATURE_NOVALID', 'Signatures awaiting confirmation:');
define('_AM_XPETITIONS_INDEX_SUMMARY', 'Index');
define('_AM_XPETITIONS_INDEX_SUMMARY_BOX1', 'XPETITIONS Configuration');
define('_AM_XPETITIONS_INDEX_SUMMARY_BOX2', 'Synthesis');
define('_AM_XPETITIONS_CREATE', 'Creation');
define('_AM_XPETITIONS_CREATE_BUTTON', 'Create a petition');
define('_AM_XPETITIONS_DIRECTORY_CREATED', 'created');
define('_AM_XPETITIONS_DIRECTORY_NOT_CREATED', 'not created');
define('_AM_XPETITIONS_DIRECTORY_TO_CREATE', 'create it now');
define('_AM_XPETITIONS_INDEX_TAB1', 'Id');
define('_AM_XPETITIONS_INDEX_TAB2', 'Online petitions');
define('_AM_XPETITIONS_INDEX_TAB3', 'Date');
define('_AM_XPETITIONS_INDEX_TAB4', 'Status');
define('_AM_XPETITIONS_INDEX_TAB5', 'Action');
define('_AM_XPETITIONS_NONE', 'No petition to display');
define('_AM_XPETITIONS_CHECK1', 'Directory of petitions upload in the PDF format : %s');
define('_AM_XPETITIONS_CHECK2', 'Writing rights of the upload directory : %s');
define('_AM_XPETITIONS_CHECK3', 'Writing rights of the "csv" directory : %s');
define('_AM_XPETITIONS_CHECK4', 'Php version >= 5.1.0 (csv creation) : %s');
define('_AM_XPETITIONS_DIR_CREATED', 'Directory successfully created');
define('_AM_XPETITIONS_DIR_NOT_CREATED', 'Error creating directory!');

// * petitions.php *
define('_AM_XPETITIONS_TITLE1_ADDFORM', 'Create a petition');
define('_AM_XPETITIONS_TITLE1_EDITFORM', 'Modify a petition');
define('_AM_XPETITIONS_NAME_ADDFORM', 'Name');
define('_AM_XPETITIONS_NAME_ADDFORM_DSC', "Name of the petition's MySQL table (no spaces, no special characters)<br />Example: mypetition<br /><span style='color: red;'>This field cannot be modified in 'Modification' mode</span>");
define('_AM_XPETITIONS_TITLE2_ADDFORM', 'Title');
define('_AM_XPETITIONS_TITLE2_ADDFORM_DSC', 'Title of the petition as seen by visitors');
define('_AM_XPETITIONS_DESC_ADDFORM', 'Description');
define('_AM_XPETITIONS_DESC_ADDFORM_DSC', 'Insert the text of your petition here');
define('_AM_XPETITIONS_EMAIL_ADDFORM', 'Reply email address');
define('_AM_XPETITIONS_EMAIL_ADDFORM_DSC', 'Email address from which confirmation and reminder messages will be sent.<br />Example: noreply@petition.com');
define('_AM_XPETITIONS_STATUS_ADDFORM', 'Status');
define('_AM_XPETITIONS_STATUS_ADDFORM_DSC', 'Status of the petition');
define('_AM_XPETITIONS_DATE_ADDFORM', 'Date');

// ---------------------------------------------------------------------------------------------
//                                        22/05/09 urbanspaceman mod
// ---------------------------------------------------------------------------------------------
define('_AM_XPETITIONS_WHOVIEW_ADDFORM', 'Who can see the signatures of this petition?');
define('_AM_XPETITIONS_WHOVIEW_ADDFORM_DSC', 'Choose which group of users can see the signatures of this petition');
define('_AM_XPETITIONS_WHOVIEW1', 'All');
define('_AM_XPETITIONS_WHOVIEW2', 'Registered Users');
define('_AM_XPETITIONS_WHOVIEW3', 'Admin');
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------

define('_AM_XPETITIONS_DATE_ADDFORM_DSC', 'Petition start date');
define('_AM_XPETITIONS_FILE_ADDFORM', 'Upload a file');
define('_AM_XPETITIONS_FILE_ADDFORM_DSC', "You may add a PDF or DOC document containing the text of the petition so that people who will not sign it online can download it and print it (if you upload a file, a link will automatically appear in the petition's toolbar).");
define('_AM_XPETITIONS_BREAK_ADDFORM', '<b>Upload a printable version of the petition</b>');
define('_AM_XPETITIONS_FILE_SHOW_ADDFORM', 'File uploaded;');
define('_AM_XPETITIONS_FILE_SHOW_ADDFORM_DSC', 'To display the file, click on its name.<br />To delete it, tick the box and confirm.<br />To replace or update it, upload a new file (this will NOT delete the existing file, except if you tick its deletion box)');
define('_AM_XPETITIONS_DELETE_FILE_ADDFORM', 'Delete file');
define('_AM_XPETITIONS_STATUS1', 'active');
define('_AM_XPETITIONS_STATUS2', 'offline');
define('_AM_XPETITIONS_STATUS3', 'archive');
define('_AM_XPETITIONS_SUBMIT', 'Save');
define('_AM_XPETITIONS_DELETE', 'Delete');
define('_AM_XPETITIONS_PREVIEW', 'Display');
define('_AM_XPETITIONS_ERROR_INSERT', 'Error while saving data to database!!!');
define('_AM_XPETITIONS_ERROR_UPDATE', 'Error while updating database!!!');
define('_AM_XPETITIONS_ERROR_DELETE', 'Error while deleting data from database!!!');
define('_AM_XPETITIONS_ERROR_BLANK', 'Some required fields are empty!!!');
define('_AM_XPETITIONS_SIGN_DOUBLE', 'Signature already exists in database!');
define('_AM_XPETITIONS_VALID_INSERT', 'Sucessfully created in database!');
define('_AM_XPETITIONS_VALID_UPDATE', 'Database update successfull!');
define('_AM_XPETITIONS_VALID_DELETE', 'Deletion successfull!');
define('_AM_XPETITIONS_DELETE_CONFIRM', 'Are you sure you want to delete this petition?<br />This will also delete all the signatures attached to this petition.');
define('_AM_XPETITIONS_DELETE_SIGN', 'Are you sure you want to delete this signature?');
define('_AM_XPETITIONS_ERROR_FILE_UPLOAD', 'Error while uploading the file!!!');

// * signature.php *
define('_AM_XPETITIONS_SIGN_TAB', 'SIGNATURES');
define('_AM_XPETITIONS_SIGN_TAB1', 'Id');
define('_AM_XPETITIONS_SIGN_TAB2', 'Online petitions');
define('_AM_XPETITIONS_SIGN_TAB3', 'Date');
define('_AM_XPETITIONS_SIGN_TAB4', 'Registered');
define('_AM_XPETITIONS_SIGN_TAB5', 'Confirmed');
define('_AM_XPETITIONS_SIGN_TAB6', 'Unconfirmed');
define('_AM_XPETITIONS_SIGN_HELP1', '<b>HELP</b>');
define('_AM_XPETITIONS_SIGN_HELP2', "- Clicking on the 'Registered' counter diplays the signatures sent in by visitors.<br />- Clicking on the 'Confirmed' counter allows you to export confirmed signatures to a spreadsheet (.csv).<br />- Clicking on the 'Unconfirmed' counter allows you to send a reminder email to all thos who have registered a signature but have not yet confrimed it and/or force the validation of the unconfirmed signatures by a simple click.<br />- If you wish to delete or add individual signatures (such as those received on paper), click on 'Register/Delete signatures manually'.");
define('_AM_XPETITIONS_SIGN_HELP3',
       'You can personalise the reminder e-mail sent to the authors of unconfirmed signatures. You can insert the following tags (complete with punctuation) in the message:<br />{USER_NAME} : Name of the person who signed.<br />{USER_EMAIL} : Their email address.<br />{LINK_URL} : Link to signature confirmation.<br />{SITE_NAME} : Name of your website.<br />{SITE_URL} : Url of your website.<br />');
define('_AM_XPETITIONS_SAVE_SIGN', 'Register/Delete signatures manually');
define('_AM_XPETITIONS_DEL_SIGN', 'Delete signature');
define('_AM_XPETITIONS_DEL_TITLE', 'Click on a petition to show signatures');
define('_AM_XPETITIONS_SIGN_DETAIL', 'They have signed this petition:');
define('_AM_XPETITIONS_SIGN_DETAIL1', 'Last name');
define('_AM_XPETITIONS_SIGN_DETAIL2', 'First name');
define('_AM_XPETITIONS_SIGN_DETAIL3', 'Country');
define('_AM_XPETITIONS_SIGN_DETAIL4', 'Email address');
define('_AM_XPETITIONS_SIGN_DETAIL5', 'City');
define('_AM_XPETITIONS_SIGN_DETAIL6', 'Occupation');
define('_AM_XPETITIONS_SIGN_DETAIL7', 'Date');
define('_AM_XPETITIONS_SIGN_DETAIL8', 'validated');
define('_AM_XPETITIONS_SIGN_NONE', 'No signature to display');
define('_AM_XPETITIONS_TITLE_LATECOMERFORM', 'Send an email to the authors of unconfirmed signatures');
define('_AM_XPETITIONS_MESS_LATECOMER', 'Message sent to the authors of unconfirmed signatures.<br /><i>(Help file on automatic tags)</i>');
define('_AM_XPETITIONS_MSG_BUTTON_LATECOMER2', 'Send an email to the %s authors of unconfirmed signatures');
define('_AM_XPETITIONS_MSG_BUTTON_LATECOMER1', 'Send an email to the %s authors of unconfirmed signatures');
define('_AM_XPETITIONS_SUBMIT_LATECOMER', 'Send message');
define('_AM_XPETITIONS_EMAIL_SEND_LATECOMER', 'Message sucessfully sent to authors of unconfirmed signatures!');
define('_AM_XPETITIONS_LATECOMER_SEND_ERROR', 'Error while sending message to authors of unconfirmed signatures!!!');
define('_AM_XPETITIONS_SIGN_CSV_LASTNAME', 'LAST NAME');
define('_AM_XPETITIONS_SIGN_CSV_FIRSTNAME', 'FIRST NAME');
define('_AM_XPETITIONS_SIGN_CSV_EMAIL', 'EMAIL ADDRESS');
define('_AM_XPETITIONS_SIGN_CSV_ADDRESS', 'STREET ADRESS');
define('_AM_XPETITIONS_SIGN_CSV_ZIP', 'POST CODE');
define('_AM_XPETITIONS_SIGN_CSV_CITY', 'CITY');
define('_AM_XPETITIONS_SIGN_CSV_COUNTRY', 'COUNTRY');
define('_AM_XPETITIONS_SIGN_CSV_JOB', 'OCCUPATION');
define('_AM_XPETITIONS_SIGN_CSV_DATE', 'DATE');
define('_AM_XPETITIONS_SIGN_CSV_IP', 'IP ADDRESS');
define('_AM_XPETITIONS_SIGN_CSV_INPROGRESS', 'Generating CSV file...');
define('_AM_XPETITIONS_SIGN_CSV_SUCCESS', 'CSV file generated successfully!');
define('_AM_XPETITIONS_SIGN_CSV_ERROR', "Error while generating file!<br />Do you have 'write' permission on the 'xpetitions/csv/' folder?");
define('_AM_XPETITIONS_SIGN_CSV_TITLE', '<h1>EXTRACTING SIGNATURES (CSV format)</h1>');
define('_AM_XPETITIONS_SIGN_CSV_PETITION', '<u>For the petition:</u> ');
define('_AM_XPETITIONS_SIGN_HELP4', 'Help on registering/deleting signatures');
define('_AM_XPETITIONS_SIGN_SHOW', 'Settings Signatures display');
define('_AM_XPETITIONS_TITLE_DELFORM', 'Delete signatures');
define('_AM_XPETITIONS_PETITIONS_DELFORM', 'Petitions');
define('_AM_XPETITIONS_PETITIONS_DELFORM_DSC', 'Please choose a petition to display its signatures');
define('_AM_XPETITIONS_SIGN_DELFORM', 'Signatures');
define('_AM_XPETITIONS_SIGN_DELFORM_DSC', 'Please choose the signature you wish to delete');

define('_AM_XPETITIONS_TITLE_ADDFORM', 'Register signatures');
define('_AM_XPETITIONS_FNAME_ADDFORM', "Author's first name");
define('_AM_XPETITIONS_LNAME_ADDFORM', "Author's last name");
define('_AM_XPETITIONS_ADDRESS_ADDFORM', "Author's street address");
define('_AM_XPETITIONS_ZIP_ADDFORM', "Author's post code");
define('_AM_XPETITIONS_CITY_ADDFORM', "Author's city");
define('_AM_XPETITIONS_COUNTRY_ADDFORM', "Author's country");
define('_AM_XPETITIONS_JOB_ADDFORM', "Author's occupation");
define('_AM_XPETITIONS_EEMAIL_ADDFORM', "Author's email address");
define('_AM_XPETITIONS_DDATE_ADDFORM', 'Signature date');
define('_AM_XPETITIONS_PETITIONS_ADDFORM', 'Petition name (MySQL table)');
define('_AM_XPETITIONS_FORCE_SIGN', 'forced validation of unconfirmed');
define('_AM_XPETITIONS_FORCE_SIGN_CONFIRM', "Would you force the validation of the unconfirmed signatures for the petition '%s'");

define('_AM_XPETITIONS_TITLE_SHOW_SIGN', 'Display of signatures');
define('_AM_XPETITIONS_SELECT_SHOW', 'Choice of the signatures display');
define('_AM_XPETITIONS_SELECT_SHOW_DSC', 'Choose the direction of the signatures display of your petitions.<br />Either in columns, or the some following the others separated by commas.');
define('_AM_XPETITIONS_SELECT_SHOW1', 'Column');
define('_AM_XPETITIONS_SELECT_SHOW2', 'Line');
define('_AM_XPETITIONS_SELECT_NBCOL', 'Number of columns');
define('_AM_XPETITIONS_SELECT_NBCOL_DSC', 'If you choose column display, You can choose the number of column to show your signatories.');
define('_AM_XPETITIONS_INFOS_SIGN', 'Present information in signatures');
define('_AM_XPETITIONS_INFOS_SIGN_DSC', "Mark the information that you want to see appearing on the petitions signatures.<br />If you decide not to choose option, then it will appear only the lastname and the firstname of your signatories.<br /><br />If you choose options, these will appear between the brackets as below:<br />Patrice BOUTHIER <span style='font-weight: bold;'>(</span><span style='color: red;'>Web Developer - FRANCE - contact@informatux.com</span><span style='font-weight: bold;'>)</span>");
define('_AM_XPETITIONS_INFOS_SIGN1', 'Job');
define('_AM_XPETITIONS_INFOS_SIGN2', 'Country');
define('_AM_XPETITIONS_INFOS_SIGN3', 'Email');
define('_AM_XPETITIONS_INFOS_SIGN4', 'City');
define('_AM_XPETITIONS_INFOS_SIGN5', 'Date');
define('_AM_XPETITIONS_SIGN_HELP5', "Choose here how the petitions signatures will be shown when the Internet users will consult them on your website.<br /><br /><span style='text-decoration: underline;'>Two choices :</span><br />- Display in column (also choose the number of columns)<br />- Display in line (separated by commas)<br /><br />Choose the formatting of a signature among the available options (job, country, email, city, date).<br />If you choose options, they will appear in brackets with the lastname and the firstname of the signatory.<br />If you do not choose option, only the lastname and the firstname will appear.");


// * email.php
define('_AM_XPETITIONS_TITLE_EMAILS', 'Management of the sent message contents');
define('_AM_XPETITIONS_MESS_EMAIL_UN', 'Message sent to authors of unconfirmed signatures');
define('_AM_XPETITIONS_SUB_EMAIL_UN', 'Message sent to authors of unconfirmed signatures (Subject)');
define('_AM_XPETITIONS_SUBMIT_EMAILS', 'Modify the message');
define('_AM_XPETITIONS_MESS_EMAIL_UNDSC', 'You can insert tags in the body of the message (see Help)');
define('_AM_XPETITIONS_SUB_EMAIL_UNDSC', "You can automatically insert your petition's title with the tag {PETITION} and the name of your website with the tag {SITE_NAME} (please copy exact syntax)");
define('_AM_XPETITIONS_SUB_EMAIL_TO', 'Confirmation message sent at the moment of the signature (subject)');
define('_AM_XPETITIONS_SUB_EMAIL_TODSC', "You can automatically insert your petition's title with the tag {PETITION} and the name of your website with the tag {SITE_NAME} (please copy exact syntax)");
define('_AM_XPETITIONS_MESS_EMAIL_TO', 'Confirmation message sent at the moment of the signature');
define('_AM_XPETITIONS_MESS_EMAIL_TODSC', 'You can insert tags in the body of the message (see Help)');
define('_AM_XPETITIONS_MESS_EMAIL_HELP1', '<b>Help</b>');
define('_AM_XPETITIONS_MESS_EMAIL_HELP2', "<div style='font-weight: normal; text-align: center;'>You can insert tags in the body of the message (please copy exact syntax) :</div><br /><table style='text-align: left; width: 100%;' border='0' cellpadding='0' cellspacing='0'><tbody><tr><td style='text-align: center; vertical-align: middle;'><span style='font-weight: bold; text-decoration: underline;'>Email to authors of unconfirmed signatures</span></td><td style='text-align: center; vertical-align: middle;'><span style='font-weight: bold; text-decoration: underline;'>Email sent at the moment of the signature</span></td></tr><tr><td style='width: 50%; text-align: center; vertical-align: top;'>{PETITION} name of the petition<br />{USER_NAME} Complete name of unconfirmed.<br />{USER_EMAIL} Email of unconfirmed.<br />{LINK_URL} Link to be clicked that the unconfirmed validates his signature.<br />{SITE_NAME} Website name.<br />{SITE_URL} Website Url.</td><td style='width: 50%; text-align: center; vertical-align: top;'>{PETITION} name of the petition<br />{PRENOM} firstname of the signature author<br />{NOM} lastname of signature author<br />{INFOS} informations about the signature author<br />{VALIDATION} Confirmation link for the signature<br />{SITENAME} Website name<br />{SITESLOGAN} Website slogan<br />{SITEURL} Website Url</td></tr></tbody></table>");
define('_AM_XPETITIONS_MESS_NONE', '');

// * field.php
define('_AM_XPETITIONS_FIELD_HELP1', '<b>Help</b>');
define('_AM_XPETITIONS_FIELD_HELP2', "Manage the petitions signatures form.<br /><br />You can post or not the form fields and make them or not 'required'.<br /><br />If you select fields 'required' and that it is not selected 'visible', this one will not appear in the form and its character of obligation will not be taken. It is necessary initially that fields is 'visible' so that the parameter 'required' is accessible.");
define('_AM_XPETITIONS_TITLE_FIELDS', 'Form fields managment of petitions signatures');
define('_AM_XPETITIONS_FIELD_VISIBLE', 'Visible&nbsp;&nbsp;');
define('_AM_XPETITIONS_FIELD_OBLIGATORY', 'Required');
define('_AM_XPETITIONS_FIELD_1', 'Lastname');
define('_AM_XPETITIONS_FIELD_2', 'Firstname');
define('_AM_XPETITIONS_FIELD_3', 'Address');
define('_AM_XPETITIONS_FIELD_4', 'Zip');
define('_AM_XPETITIONS_FIELD_5', 'City');
define('_AM_XPETITIONS_FIELD_6', 'Country');
define('_AM_XPETITIONS_FIELD_7', 'Job');
define('_AM_XPETITIONS_FIELD_8', 'Email');
define('_AM_XPETITIONS_SUBMIT_FIELDS', 'Modify');
define('_AM_XPETITIONS_FIELD_NONE', '');

// * captcha.php
define('_AM_XPETITIONS_TITLE_CAPTCHA', 'Choose your captcha');
define('_AM_XPETITIONS_CAPTCHA_SAMPLES', ' among those available and visible by your server');
define('_AM_XPETITIONS_STATUS_CAPTCHA', 'Status of the anti-spam check (update your %s) : ');
define('_AM_XPETITIONS_CAPTCHA_SUBMIT', 'Validate your captcha');
define('_AM_XPETITIONS_CAPTCHA_HELP1', '<b>HELP</b>');
define('_AM_XPETITIONS_CAPTCHA_HELP2', "Choose the adapted CAPTCHA to your server either to your envy.<br />If the status of the anti-spam check is <span style='color: red;'>NO</span>, then the choice of the captcha will not be visible in your forms.");
define('_AM_XPETITIONS_CAPTCHA_CHOICE', 'What captcha do you want to use?');
define('_AM_XPETITIONS_CAPTCHA_CHOICE1', 'Choice 1 : Captcha (K.OHWADA)');
define('_AM_XPETITIONS_CAPTCHA_CHOICE1A', 'Choice 1');
define('_AM_XPETITIONS_CAPTCHA_CHOICE1_DSC', 'To modify the preferences of the CAPTCHA images shown in your forms, modify the file /xpetitions/class/captcha_x/captcha_x.ini .<br />The explanations of the various options are in the file.');
define('_AM_XPETITIONS_CAPTCHA_CHOICE2', 'Choice 2 : Captcha (JPGRAPH)');
define('_AM_XPETITIONS_CAPTCHA_CHOICE2A', 'Choice 2');
define('_AM_XPETITIONS_CAPTCHA_CHOICE2_DSC', 'To modify the preferences of the CAPTCHA images shown in your forms, modify the file /xpetitions/generate.php .<br />The only available option is the present number of characters in the CAPTCHA image.');
define('_AM_XPETITIONS_CAPTCHA_CHOICE3', 'Choice 3 : Captcha (TEXT)');
define('_AM_XPETITIONS_CAPTCHA_CHOICE3A', 'Choice 3');
define('_AM_XPETITIONS_CAPTCHA_CHOICE3_DSC', 'No regulation is necessary.<br />The questions are unpredictable, refresh the page to see the other questions.');

// * about.php *
define('_AM_XPETITIONS_ABOUT_1', 'About');
define('_AM_XPETITIONS_UPDATE', 'Update');
define('_AM_XPETITIONS_CANCEL', 'Remove');
define('_AM_XPETITIONS_ABOUT_1_DSC', 'Petitions module on line multilangues developed to function with XOOPS.
The forms can be accompanied by an CAPTCHA to avoid the spams (choices of 3 captchas).');
define('_AM_XPETITIONS_ABOUT_2', 'Update');
define('_AM_XPETITIONS_ABOUT_2_DSC', 'Check for updates');
define('_AM_XPETITIONS_ABOUT_3', 'Support, inquiries and comments');
define('_AM_XPETITIONS_ABOUT_3_DSC', " get <a href='https://github.com/informatux45/xpetitions' target='_blank'>a repository for tracking bugs</a>. Verify that a bug has already been submitted before adding your own.");
define('_AM_XPETITIONS_ABOUT_4', 'Enhancement requests');
define('_AM_XPETITIONS_ABOUT_4_DSC', "You can make requests for improvement on <a href='https://github.com/informatux45/xpetitions' target='_blank'> the repository through the contact form</a>.");
define('_AM_XPETITIONS_ABOUT_5', 'Email');
define('_AM_XPETITIONS_ABOUT_5_DSC', "I can also be contacted by email through my website <a href='http://www.informatux.com/' target='_blank'>on the contact form</a>.");
define('_AM_XPETITIONS_ABOUT_6', 'Special thanks');
define('_AM_XPETITIONS_ABOUT_6_DSC', 'A big thank you to Thomas HUBERT (worldcoalition.org) for the English translation of the module.');
