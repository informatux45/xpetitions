<div id="help-template" class="outer">
    <h1 class="head">Aide :
        <a class="ui-corner-all tooltip" href="<{$xoops_url}>/modules/xpetitions/admin/index.php"
           title="Return to XPETITIONS Administration"> XPETITIONS
        </a></h1>

    <h4 class="odd">Description</h4><br>

    Petitions module on line multilangues developped for XOOPS.<br>
    The forms can be accompanied by an CAPTCHA to avoid the spams (choices of 3 captchas).<br><br>
    You can create petitions as many as wish it to you.<br><br>
    Each petition can have 3 statutes:<br>
    * Active (the petition can be signed if the date of starting is not higher than the current date)<br>
    * Offline (the petition is not visible and cannot be signed)<br>
    * Archived (the petition is visible and consultable but cannot be signed)<br><br>
    A help is present on each page of the admin to help you with the various possible options.<br><br>
    The module has a style sheet which you can modify according to your graphic charters.<br><br>
    Functionalities of the module (admin):<br>
    - Creation of petitions (table of the signatures, titles, description, email of answer, statute, date of starting, associated paper document)<br>
    - Modification and removal of petitions<br>
    - Visualization of the signatures<br>
    - Extraction of the signatures to the csv format<br>
    - Revival of the signatories who did not confirm their signature<br>
    - Manual Recording of signatures (signature by paper document)<br>
    - Removal of signatures<br>
    - Preferences with multiple choices<br>
    - Blocks with preferences (last signatures, active petitions, filed petitions)<br><br>
    Functionality of the module (customer):<br>
    - Bar of navigation in the petitions (skeletal)<br>
    - Reception of the module with recapitulation of the petitions and numbers of signatures associated (skeletal)<br>
    - Reception with a petition with description and bars dynamic (variable parameters: downloadable associated document, to send to a friend (yes or not))<br>
    - Send to a friend: form with image captcha if activated and dynamic when the fields are filled.<br>
    - Signature: form with image captcha if activated and controls address email by script (5 levels of control - to see function)<br>
    - Creation of a key MD5 (15 positions) for the validation of the signatures<br>
    - Visualization of all the signatories or alphabetically<br><br>
    
    <h4 class="odd">Install/Uninstall</h4><br>
	
    <p> No special measures necessary, follow the standard installation process – extract the /profile folder into the ../modules directory. Install the module through Admin -> System Module -> Modules. </p>
    <p>Detailed instructions on installing modules are available in the <a title="XOOPS Operations Manual" href="http://goo.gl/adT2i">XOOPS Operations Manual</a></p>
    <p>Xpetitions settles like all the other Xoops modules.<br>
    You must copy the directory /xpetitions in the directory of the Xoops modules of your site.<br>
    Then identify as administrator, menu Admin System - modules then in the modules not installed, click on the icon of installation.<br>
    Then, follow the instruction which follows to the screen.<br><br>
    Put the directory /xpetitions/csv/ accessible in writing for export from the signatures (chmod 777).<br><br>
    Create a directory, in the directory upload of Xoops, (ex: /upload/xpetitions) accessible in writing for storage from the petitions papers which you will associate your petitions on line.<br><br>
    There is a 'mysql.en.sql' file for the english users in the directory 'mysql'. Rename this file into 'mysql.sql' if you want to use the email messages in english.<br>
    There is a 'mysql.it.sql' file for the italian users in the directory 'mysql'. Rename this file into 'mysql.sql' if you want to use the email messages in italian.</p>
    <br><br>
    
    <h4 class="odd">Tutorial</h4><br>

    <h5>All helps are online on each page of the administration.</h5><br>

</div>
