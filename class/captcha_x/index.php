<?php

session_start ();

?>
<form id="form_bbs" method="POST" action="./">
    <h3>Validate:</h3>
    <table id="tbl_form_bbs">
        <tr>
            <td>
<!--  
The use of the Math.random() method is necessary if you wish the onclick requst 
to be working under mozilla. 
-->
                <img src="server.php" 
                    onclick="javasript:this.src='server.php?'+Math.random();" 
                    alt="CAPTCHA image">
            </td>
            <td><input maxlength="4" size="4" name="captcha" type="text" /></td>
        </tr>
    </table>
    <input type="reset" />&nbsp;<input type="submit" />
    <input type="hidden" name="validate" value="1" />
</form> 

<?php

if ( ! $_POST['validate']) {
    die;
}

require_once ( './class.captcha_x.php');

$captcha = &new captcha_x ();
if ( ! $captcha->validate ( $_POST['captcha'])) {
    echo '<p>You\'re bot.</p>';
} else {
    echo '<p>You\'re human.</p>';
}

?>
