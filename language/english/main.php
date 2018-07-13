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

// index
define('_MD_XPETITIONS_INDEX', 'Online petitions');
define('_MD_XPETITIONS_SIGNATURES', 'signatures');
define('_MD_XPETITIONS_ARCHIVE', 'Archived petitions');
define('_MD_XPETITIONS_HOME_NAV', 'Homepage');
define('_MD_XPETITIONS_HOME_NAV_SIGN', 'Sign the petition');
define('_MD_XPETITIONS_HOME_NAV_SIGN_RECORDED', 'Signature registered');
define('_MD_XPETITIONS_HOME_NAV_PRESIGNED', 'Signature to valid');
define('_MD_XPETITIONS_HOME_NAV_SIGN_VALID', 'Signature confirmed');
define('_MD_XPETITIONS_HOME_NAV_FRIEND', 'Send to a friend');
define('_MD_XPETITIONS_HOME_NAV_VALID', 'Signature confirmation');
define('_MD_XPETITIONS_HOME_NAV_ALLSIGNS', 'View the signatures');
define('_MD_XPETITIONS_HOME_TAB1', 'Online petitions');
define('_MD_XPETITIONS_HOME_TAB2', 'Archived petitions');
define('_MD_XPETITIONS_NO_ACTIVE', 'No petition available for signature.');
define('_MD_XPETITIONS_NO_ARCHIVE', 'No archived petition.');
define('_MD_XPETITIONS_NO_DETAIL', 'No information available about this petition');
define('_MD_XPETITIONS_OFFLINE', 'Petition de-activated');

// formulaire de signature d'une petition
define('_MD_XPETITIONS_TITLE_SIGNFORM', '<br />Please fill in this form to sign the petition.<br />A confirmation by %s will asking you to valid your signature.<br />All fields with a * are required.<br /><br />');
define('_MD_XPETITIONS_TITLE_SIGNFORM1', 'email');
define('_MD_XPETITIONS_TITLE_SIGNFORM2', 'double click');
define('_MD_XPETITIONS_FNAME_SIGNFORM', 'Last Name');
define('_MD_XPETITIONS_LNAME_SIGNFORM', 'First Name');
define('_MD_XPETITIONS_ADDRESS_SIGNFORM', 'Address');
define('_MD_XPETITIONS_ZIP_SIGNFORM', 'Post Code');
define('_MD_XPETITIONS_CITY_SIGNFORM', 'City');
define('_MD_XPETITIONS_COUNTRY_SIGNFORM', 'Country');
define('_MD_XPETITIONS_JOB_SIGNFORM', 'Occupation');
define('_MD_XPETITIONS_EMAIL_SIGNFORM', 'Email address');
define('_MD_XPETITIONS_SUBMIT', 'Sign the petition');
define('_MD_XPETITIONS_CAPTCHA', 'Please enter the text displayed in this picture.<br />This is case-sensitive.<br />If you cannot read the text, you can change it by clicking on the picture.');
define('_MD_XPETITIONS_CAPTCHA_DSC', 'Anti-spam verification');

// formulaire de présignature d'une pétition
define('_MD_XPETITIONS_SIGN_PRESIGNED', 'Thank you for requesting to sign this online petition.<br />Your signature will be saved to our database as soon as you click on the button below. Your name will then appear among the signatories.<br /><br />');
define('_MD_XPETITIONS_PRESIGN_VALUE', 'Confirm your signature');

// ---------------------------------------------------------------------------------------------
//                                        22/05/09 urbanspaceman mod
// ---------------------------------------------------------------------------------------------
define('_MD_XPETITIONS_WHOVIEW1', 'The signatures of this petition are public');
define('_MD_XPETITIONS_WHOVIEW2', 'The signatures of this petition are only visible to registered users');
define('_MD_XPETITIONS_WHOVIEW3', 'The signatures of this petition are only visible to the website administrators');
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------

// formulaire pour prevenir un ami
define('_MD_XPETITIONS_TITLE_FRIENDFORM', '<br />Please fill in this form to tell a friend that they should sign this petition.<br />They will receive a link to the petition by email.<br />All fields are required.<br /><br />');
define('_MD_XPETITIONS_YNAME_FRIENDFORM', "Your friend's name");
define('_MD_XPETITIONS_FNAME_FRIENDFORM', 'Your name');
define('_MD_XPETITIONS_FEMAIL_FRIENDFORM', "Your friend's email address");
define('_MD_XPETITIONS_SUBMIT_FRIEND', 'Tell your friend');
define('_MD_XPETITIONS_EMAIL_FORMAT_FRIENDFORM', 'Message sent :');
define('_MD_XPETITIONS_EMAIL_FORMAT_DSC', "<span style='font-weight: bold;' id='contact'></span>");
define('_MD_XPETITIONS_EMAIL_FRIENDFORM', "Hello <span style='font-weight: bold;' id='your_name'></span>,<br /><br /><span style='font-weight: bold;' id='friend_name'></span> has sent you this message from this website: <span style='font-weight: bold;'>%s</span>.<br />You can sign the petition '(<span style='font-weight: bold;'>%s</span>)' at the following address:<br /><span style='font-weight: bold;'>%s</span><br /><br />Thank you<br />Best regards<br />");
define('_MD_XPETITIONS_EMAIL_FRIENDFORM_SEND', "Hello %s,\n\n%s has sent you this message from this website: %s.\nYou can sign the petition '(%s)' at the following address:\n%s\n\Thank you\nBest regards\n\n%s\n%s\n%s");
define('_MD_XPETITIONS_EMAIL_SEND', 'The mail has been sent to your friend.<br />Thank you for your interest in our website.');
define('_MD_XPETITIONS_SUBJECT_EMAIL', 'Petition from the website %s');

// enregistrement d'une signature
define('_MD_XPETITIONS_SIGN_RECORDED',
       'Thank your for signing our online petition.<br /><br />Your signature has now been registered in our database. However, you still have to confirm it by clicking on the link in the email we have just sent you.<br />When you have completed this last step, your signature will be taken into account.');
define('_MD_XPETITIONS_SIGN_VALID', "Your signature has been confirmed.<br />It is now displayed in the petition's signatures list.<br />Thank you for your support.");
define('_MD_XPETITIONS_SIGN_ERROR', 'An error occurred while registering your signature into our database.<br />This may be due to a data transfer error.<br />Please try again later. If the problem reoccurs, please let us know by email.<br /><br />Our apologies for the incovenience.');

// signature en double
define('_MD_XPETITIONS_SIGN_DOUBLE', "Your name and email address match those of an existing signature in our database.<br />If this is due to a typing mistake, please fill in the signature form again.<br />Otherwise you have already signed this petition.<br /><a href='javascript:history.go(-1)'>Back to signature form</a>");

// voir toutes les signatures
define('_MD_XPETITIONS_TITLE_ALLSIGNS', 'List of signatures:<br /><br />');
define('_MD_XPETITIONS_CPT_ALLSIGNS', 'registered signatures');
define('_MD_XPETITIONS_ALL_ALLSIGNS', 'All');
define('_MD_XPETITIONS_ALLSIGNS_CHOOSE', 'Pick a letter.');
define('_MD_XPETITIONS_ALLSIGNS_NOLETTER', 'No signature starting with %s.');
define('_MD_XPETITIONS_ALLSIGNS_NOLETTER_ALL', 'No signature.');
define('_MD_XPETITIONS_ALLSIGNS_LETTER', 'Signatures starting with ');
define('_MD_XPETITIONS_ALLSIGNS_LETTER_ALL', 'All signatures for the petition:');

// email message
define('_MD_XPETITIONS_SUBJECT_EMAIL_SIGN1', "Signature for the petition '%s'");

// message
define('_MD_XPETITIONS_ERROR_BLANK', 'Some required fields are empty!!!');
define('_MD_XPETITIONS_CAPTCHA_ERROR', 'The antispam verification code is incorrect. Please try again!');
define('_MD_XPETITIONS_ERROR_INSERT', 'Error while saving data to database!!!');
define('_MD_XPETITIONS_ERROR_EMAIL', 'This is not a valid email address. Please check your email address.');
define('_MD_XPETITIONS_EMAIL_SEND_ERROR', 'Error while sending email. Please try again later.');
define('_MD_XPETITIONS_FORM_REQUIRED', '&nbsp;&nbsp;* Required');
define('_MD_XPETITIONS_ERROR_BLANK_ADDRESS', "The field 'Address' is empty !!!");
define('_MD_XPETITIONS_ERROR_BLANK_ZIP', "The field 'Zip' is empty !!!");
define('_MD_XPETITIONS_ERROR_BLANK_CITY', "The field 'City' is empty !!!");
define('_MD_XPETITIONS_ERROR_BLANK_COUNTRY', "The field 'Country' is empty !!!");
define('_MD_XPETITIONS_ERROR_BLANK_JOB', "The field 'Job' is empty !!!");

// Captcha Text
define('_MD_XPETITIONS_CAPTCHA_STRING', 'abcdefghijklmnopqrstuvwxyz');
define('_MD_XPETITIONS_CAPTCHA_TXT_1', 'Which letter is between');
define('_MD_XPETITIONS_CAPTCHA_TXT_2', 'How much make');
define('_MD_XPETITIONS_CAPTCHA_TXT_3', 'Which is');
define('_MD_XPETITIONS_CAPTCHA_TXT_4', 'character in');
define('_MD_XPETITIONS_CAPTCHA_TXT_5', '');
define('_MD_XPETITIONS_CAPTCHA_TXT_LESS', 'less');
define('_MD_XPETITIONS_CAPTCHA_TXT_MORE', 'more');
define('_MD_XPETITIONS_CAPTCHA_TXT_TIMES', 'multiplied by');
define('_MD_XPETITIONS_CAPTCHA_TXT_IN', 'In');
define('_MD_XPETITIONS_CAPTCHA_TXT_AND', 'and');
define('_MD_XPETITIONS_CAPTCHA_TXT_THE', 'the');
define('_MD_XPETITIONS_CAPTCHA_TXT_THEFIRST', 'the first');
define('_MD_XPETITIONS_CAPTCHA_TXT_THESECOND', 'the second');
define('_MD_XPETITIONS_CAPTCHA_TXT_THELAST', 'the last');
define('_MD_XPETITIONS_CAPTCHA_TXT_THELASTFRONT', 'the last front');
define('_MD_XPETITIONS_CAPTCHA_TXT_ZERO', 'zero');
define('_MD_XPETITIONS_CAPTCHA_TXT_ONE', 'one');
define('_MD_XPETITIONS_CAPTCHA_TXT_TWO', 'two');
define('_MD_XPETITIONS_CAPTCHA_TXT_THREE', 'three');
define('_MD_XPETITIONS_CAPTCHA_TXT_FOUR', 'four');
define('_MD_XPETITIONS_CAPTCHA_TXT_FIVE', 'five');
define('_MD_XPETITIONS_CAPTCHA_TXT_SIX', 'six');
define('_MD_XPETITIONS_CAPTCHA_TXT_SEVEN', 'seven');
define('_MD_XPETITIONS_CAPTCHA_TXT_EIGHT', 'eight');
define('_MD_XPETITIONS_CAPTCHA_TXT_NINE', 'nine');
define('_MD_XPETITIONS_CAPTCHA_TXT_TEN', 'ten');
