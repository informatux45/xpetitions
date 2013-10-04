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

// formulaire double combo - choix dans la liste des signatures

$xpetitions_infos = getPetitionsInfos();
?>
<script type="text/javascript">
var group=new Array();
</script>
<form name="delform" method="post" action="signature.php?op=delsign">
<div align="center">
<fieldset style="width: 525px; padding: 10px; text-align: center;">
<legend style="font-weight: bold;"><?php echo _AM_XPETITIONS_DEL_TITLE; ?></legend>
<select name="petitions" size="5" style="width: 250px;" onChange="redirect(this.options.selectedIndex)">
<?php
$i = 0;
$groups = '';
foreach ($xpetitions_infos as $row) {
	echo '<option value="'.$row['name'].'">'.$myts->DisplayTarea($row['title']).'</option>';
	$j = 0;
	$xpetitions_signs_details = getSignaturesDetails($row['name'], 2);
	foreach ($xpetitions_signs_details as $row) {
		$xpetitions_group_signs[$i][$j] = $row['name'].' '.$row['prenom'].' ('.$row['job'].')';
		$xpetitions_group_value[$i][$j] = $row['id'];
		$groups .= 'group['.$i.']['.$j.'] = new Option("'.$xpetitions_group_signs[$i][$j].'","'.$xpetitions_group_value[$i][$j].'");';
		$j++;
	}
	$i++;
}
echo '</select>&nbsp;&nbsp;&nbsp;';
?>

<select name="signs" size="5" style="width: 250px;">

</select><br /><br />
<input type="submit" value="<?php echo _AM_XPETITIONS_DEL_SIGN; ?>" />
</fieldset>
</div>

<script>
<!--
var groups=document.delform.petitions.options.length;
var group=new Array(groups);
for (i=0; i<groups; i++)
group[i]=new Array();

<?php
if ($groups == '') {
	echo '';
} else {
	echo $groups;
}
?>

var temp=document.delform.signs;
//-->
</script>

</form>