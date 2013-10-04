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

function xpetitions_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
	
	$sql = "SELECT id, title, description, date FROM ".$xoopsDB->prefix('xpetitions_petitions')." WHERE ";
	list($CID, $pagetitle, $pageheadline, $page, $htmlfile ) = $xoopsDB->fetchrow($sql);

	// because count() returns 1 even if a supplied variable
	// is not an array, we must check if $querryarray is really an array
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " ((title LIKE '%$queryarray[0]%' OR description LIKE '%$queryarray[0]%' OR date LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(title LIKE '%$queryarray[$i]%' OR description LIKE '%$queryarray[$i]%' OR date LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY date DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
// 		$ret[$i]['image'] = "images/cat/default.gif";
		$ret[$i]['link'] = "index.php?id=".$myrow['id']."";
		$ret[$i]['title'] = $myrow['title'];
		$ret[$i]['time'] = $myrow['date'];
		$i++;
	}
	return $ret;
}
?>