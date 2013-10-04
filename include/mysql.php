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

function dbResultToArray($result) {
   // construction d'un tableau pour les scripts
   global $xoopsDB;
   $result_array = array();

   for (
        $count = 0;
        $myrow = $xoopsDB->fetchArray($result);
        $count++
       )
     $result_array[$count] = $myrow;

   return $result_array;
}

function getPetitionsInfos() {
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions');
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $petitions = dbResultToArray($result);
   if ($petitions == 0)
      return false;

   return $petitions;
}

function getPetitionDetails($id) {
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE id="'.$id.'"';
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $petitions = $xoopsDB->fetchArray($result);
   if ($petitions == 0)
      return false;

   return $petitions;
}

function getPetitionsCount() {
   // query database for rooms online
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions');
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $num_petitions = $xoopsDB->getRowsNum($result);
   if ($num_petitions == 0)
      return false;

   return $num_petitions;
}

function getPetitionsCountOnline($choix) {
   // comptabiliser dans la base de données les petitions on line, off line et archivées
   // 3 = archive
   // 2 = online
   // 1 = offline
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE status = "'.$choix.'"';
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $num_petitions = $xoopsDB->getRowsNum($result);
   if ($num_petitions == 0)
      return false;

   return $num_petitions;
}

function getPetitionsOnline($choix) {
   // extraire de la base de donnees les petitions on line, off line ou archivées
   // 3 = archive
   // 2 = online
   // 1 = offline
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE status = "'.$choix.'"';
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $petitions = dbResultToArray($result);
   if ($petitions == 0)
      return false;

   return $petitions;
}

function getPetitionsId($petition_name) {
   // extraire l'id d'une petition d'après la table des signatures
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' LIMIT 1';
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $petitionid = $xoopsDB->fetchArray($result);
   if ($petitionid == 0)
      return false;

   return $petitionid;
}

function getPetitionId($petition_name) {
   // extraire l'id d'une petition d'après la table des signatures
   global $xoopsDB;
   $sql = 'SELECT id FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE name = "'.$petition_name.'"';
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $petitionid = $xoopsDB->fetchArray($result);
   if ($petitionid == 0)
      return false;

   return $petitionid['id'];
}

function getSignaturesInfos($petition_name, $param) {
   // comptabiliser les signatures avec paramètres pour une pétition
   // 0 = non validées
   // 1 = validées
   // 2 = totales
   global $xoopsDB;
   if ($param == '2') {
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name);
   } else {
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE validation = "'.$param.'"';
   }
   $result = $xoopsDB->query($sql);
   if (!$result)
     return 0;
   $number_signs = $xoopsDB->getRowsNum($result);

   return $number_signs;
}

function getSignaturesDetails($petition_name, $param) {
   // extraire les signatures avec paramètres pour une pétition
   // 0 = non validées
   // 1 = validées
   // 2 = totales
   global $xoopsDB;
   if ($param == '2') {
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name);
   } else {
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE validation = "'.$param.'"';
   }
   $result = $xoopsDB->query($sql);
   if (!$result)
     return 0;
   $number_signs = dbResultToArray($result);
   if ($number_signs == 0)
      return false;

   return $number_signs;
}

function getSignaturesCsv($petition_name) {
   // Extraire les signatures validées pour un fichier csv
   global $xoopsDB;
   $sql = "SELECT name, prenom, email, address, zip, city, country, job, ip FROM " . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . " WHERE validation = 1";

   $result = $xoopsDB->query($sql);
   if (!$result)
     return 0;
   $csv_signs = dbResultToArray($result);
   if ($csv_signs == 0)
      return false;

   return $csv_signs;
}

function getSignaturesBlock($petition_name, $param, $count) {
   // Extraire les xx signatures avec paramètres pour une pétition
   // 0 = non validées
   // 1 = validées
   // 2 = totales
   global $xoopsDB;
   $sql1 = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE validation = '.$param;
   $result1 = $xoopsDB->query($sql1);
   if (!$result1)
     return false;

   // récupération du nombre total de signatures avec $param
   $total_number_signs = $xoopsDB->getRowsNum($result1);
   if ($total_number_signs == 0)
     return false;

   // démarrer l'extraction des signatures à partir de $limit
   $limit = $total_number_signs - $count;
   $sql2 = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE validation = '.$param.' ORDER BY date ASC LIMIT '.$limit.','.$count;
   $result2 = $xoopsDB->query($sql2);
   if (!$result2)
     return false;

   $number_signs = dbResultToArray($result2);
   if ($number_signs == 0)
      return false;

   return $number_signs;
}

function getSignatureDouble($petition_name, $firstname, $lastname, $email) {
   // vérifier la présence d'un doublon dans les signatures
   global $xoopsDB;
   $sql = 'SELECT id FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE name = "'.$firstname.'" AND prenom = "'.$lastname.'" AND email = "'.$email.'"';

   $result = $xoopsDB->query($sql);
   $response = $xoopsDB->fetchArray($result);
   if ($response)
     return ($response['id']);
}

function getSignatureLetter($letter, $petition_name) {
   // Obtenir une liste de signature commençant par la lettre --
   // all - correspond à toutes les lettres de l'alphabet
   global $xoopsDB;
   if ($letter == 'all') {
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE validation = "1" ORDER BY upper(name),lower(prenom)';
   } else {
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE validation = "1" AND name LIKE "'.$letter.'%" ORDER BY name,prenom';
   }
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $petitions_letter = dbResultToArray($result);
   if ($petitions_letter == 0)
      return false;

   return $petitions_letter;
}

function getSignatureId($petition_name, $cle) {
   // Obtenir l'id d'une signature par la clé
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE cle = "'.$cle.'"';
   $result = $xoopsDB->query($sql);
   if ($result == 0)
     return false;
   $result = $xoopsDB->fetchArray($result);

   return $result;
}

function getFieldInfos($id, $pos) {
   // Obtenir une liste de signature commençant par la lettre --
   // all - correspond à toutes les lettres de l'alphabet
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_fields') . ' WHERE id = "'.$id.'"';

   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   $result = @mysql_fetch_object($result);

   if ($pos == 1)
       return $result->visibility;
   if ($pos == 2)
       return $result->obligatory;
}

function getEmailInfos($id) {
   // Extraire les infos d'email type
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_emails') . ' WHERE id = "'.$id.'"';
   $result = $xoopsDB->query($sql);
   if ($result == 0)
     return false;
   $result = $xoopsDB->fetchArray($result);

   return $result;
}

function getOptionInfos($name) {
   // Extraire les infos du captcha
   global $xoopsDB;
   $sql = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_options') . ' WHERE name = "'.$name.'"';
   $result = $xoopsDB->query($sql);
   if ($result == 0)
     return false;
   $result = $xoopsDB->fetchArray($result);

   return $result;
}

function insertSignatures($name_petition, $id, $firstname, $lastname, $address, $zip, $city, $country, $job, $email, $date, $ip, $cle) {
   // insertion d'une nouvelle signature
   global $xoopsDB;
   $sql = "INSERT INTO " . $xoopsDB->prefix('xpetitions_petitions_'.$name_petition) . " VALUES (
	    '', '$id', '0', '0', '$firstname', '$lastname', '$email', '$address', '$zip', '$city', '$country', '$job', '$date', '$ip', '$cle')";
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   else
     return true;
}

function insertPreSignatures($name_petition, $id, $firstname, $lastname, $address, $zip, $city, $country, $job, $email, $date, $ip, $cle) {
   // insertion d'une nouvelle signature
   global $xoopsDB;
   $sql = "INSERT INTO " . $xoopsDB->prefix('xpetitions_petitions_'.$name_petition) . " VALUES (
	    '', '$id', '1', '0', '$firstname', '$lastname', '$email', '$address', '$zip', '$city', '$country', '$job', '$date', '$ip', '$cle')";
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   else
     return true;
}

function insertSignaturesMan($name_petition, $id, $firstname, $lastname, $address, $zip, $city, $country, $job, $email, $date) {
   // insertion d'une nouvelle signature
   global $xoopsDB;
   $sql = "INSERT INTO " . $xoopsDB->prefix('xpetitions_petitions_'.$name_petition) . " VALUES (
	    '', '$id', '1', '0', '$firstname', '$lastname', '$email', '$address', '$zip', '$city', '$country', '$job', '$date', '0.0.0.0', 'f0f0f0f0f0f0f0')";
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   else
     return true;
}

function deleteSignature($petition_name, $id_sign) {
  // suppression d'une signature
  global $xoopsDB;
  $sql = 'DELETE FROM ' . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . ' WHERE id="'.$id_sign.'"';
   $result = $xoopsDB->query($sql);
   if (!$result)
     return false;
   else
     return true;
}

function insertPetition($name, $title, $description, $email, $date, $status, $whoview, $link, $linkfile) {
   // création d'une nouvelle table de pétition
   global $xoopsDB;
   $sql1 = 'CREATE TABLE IF NOT EXISTS ' . $xoopsDB->prefix('xpetitions_petitions_'.$name) . ' (
              id int(11) NOT NULL auto_increment,
              petid int(11) NOT NULL,
              validation tinyint(4) default "0",
              relance tinyint(4) NOT NULL default "0",
              name varchar(255) NOT NULL default "",
              prenom varchar(255) NOT NULL default "",
              email varchar(255) NOT NULL default "",
              address varchar(255) NOT NULL default "",
              zip varchar(10) NOT NULL default "",
              city varchar(255) NOT NULL default "",
              country varchar(255) NOT NULL default "",
              job varchar(255) NOT NULL default "",
              date int(15) NOT NULL,
              ip varchar(20) NOT NULL default "",
              cle varchar(60) NOT NULL default "",
              PRIMARY KEY (id)) TYPE=MyISAM;';

   $result1 = $xoopsDB->query($sql1);
   if (!$result1)
     return false;

   $sql2 = "INSERT INTO " . $xoopsDB->prefix('xpetitions_petitions') . " VALUES (
	    '', '$name', '$title', '$description', '$email', '$date', '$status', '$whoview', '$link', '$linkfile')";
   $result2 = $xoopsDB->query($sql2);
   if (!$result2)
     return false;
   else
     return true;
}

function deletePetition($id, $name) {
   // suppression d'une pétition
   global $xoopsDB;
   $sql2 = 'DROP TABLE IF EXISTS ' . $xoopsDB->prefix('xpetitions_petitions_'.$name);
   $result2 = $xoopsDB->query($sql2);
   if (!$result2)
     return false;
   $sql1 = 'DELETE FROM ' . $xoopsDB->prefix('xpetitions_petitions') . ' WHERE id="'.$id.'"';
   $result1 = $xoopsDB->query($sql1);
   if (!$result1)
     return false;
   else
     return true;
}

function updateFields($field_address1, $field_address2, $field_zip1, $field_zip2, $field_city1, $field_city2, $field_country1, $field_country2, $field_job1, $field_job2) {
   // mise à jour d'une pétition
   global $xoopsDB;
   $sql1 = "UPDATE " . $xoopsDB->prefix('xpetitions_fields') . "
           SET visibility ='$field_address1',
           obligatory = '$field_address2'
           WHERE id= '3'";
   $result1 = $xoopsDB->query($sql1);
    if (!$result1)
      return false;
   $sql2 = "UPDATE " . $xoopsDB->prefix('xpetitions_fields') . "
           SET visibility ='$field_zip1',
           obligatory = ' $field_zip2'
           WHERE id= '4'";
   $result2 = $xoopsDB->query($sql2);
    if (!$result2)
      return false;
   $sql3 = "UPDATE " . $xoopsDB->prefix('xpetitions_fields') . "
           SET visibility ='$field_city1',
           obligatory = '$field_city2'
           WHERE id= '5'";
   $result3 = $xoopsDB->query($sql3);
    if (!$result3)
      return false;
   $sql4 = "UPDATE " . $xoopsDB->prefix('xpetitions_fields') . "
           SET visibility ='$field_country1',
           obligatory = '$field_country2'
           WHERE id= '6'";
   $result4 = $xoopsDB->query($sql4);
    if (!$result4)
      return false;
   $sql5 = "UPDATE " . $xoopsDB->prefix('xpetitions_fields') . "
           SET visibility ='$field_job1',
           obligatory = '$field_job2'
           WHERE id= '7'";
   $result5 = $xoopsDB->query($sql5);
    if (!$result5)
      return false;
    else
      return true;
}

function updateEmail($subject_unconfirmed, $message_unconfirmed, $subject_toconfirmed, $message_toconfirmed) {
   // mise à jour des infos emails type
   global $xoopsDB;
   $sql1 = "UPDATE " . $xoopsDB->prefix('xpetitions_emails') . "
           SET subject ='$subject_unconfirmed',
           message = '$message_unconfirmed'
           WHERE id= '1'";
   $result1 = $xoopsDB->query($sql1);
    if (!$result1)
      return false;

   $sql2 = "UPDATE " . $xoopsDB->prefix('xpetitions_emails') . "
           SET subject ='$subject_toconfirmed',
           message = '$message_toconfirmed'
           WHERE id= '2'";
   $result2 = $xoopsDB->query($sql2);
    if (!$result2)
      return false;
    else
      return true;
}

function updatePetition($id, $title, $description, $email, $status, $whoview, $date, $link, $link_file) {
   // mise à jour d'une pétition
   global $xoopsDB;
   $sql = "UPDATE " . $xoopsDB->prefix('xpetitions_petitions') . "
           SET title ='$title',
           description = '$description',
           email = '$email',
           status = '$status',
           whoview = '$whoview',
           date = '$date',
           file = '$link',
           link_file = '$link_file'
           WHERE id= '$id'";
   $result = $xoopsDB->query($sql);
    if (!$result)
      return false;
    else
      return true;
}

function updatePetitionFile($id, $link, $link_file) {
   // mise à jour d'un fichier de pétition
   global $xoopsDB;
   $sql = "UPDATE " . $xoopsDB->prefix('xpetitions_petitions') . "
           SET file = '$link',
           link_file = '$link_file'
           WHERE id= '$id'";
   $result = $xoopsDB->queryF($sql);
      if (!$result)
        return false;
      else
        return true;
}

function updateOption($name, $value_option, $value_div = NULL, $sort = NULL) {
   // mise à jour d'une option
   global $xoopsDB;
   $sql = "UPDATE " . $xoopsDB->prefix('xpetitions_options') . "
           SET options = '$value_option'
           WHERE name = '$name'";
   $result = $xoopsDB->query($sql);
    if (!$result)
      return false;
    else
      return true;
}

function updateSignaturesShow($col, $nbcol, $entries) {
   // mise à jour de l'affichage des signatures
   global $xoopsDB;
   $sql1    = "UPDATE " . $xoopsDB->prefix('xpetitions_options') . " SET options = '$col' WHERE name = 'signature_show'";
   $result1 = $xoopsDB->query($sql1);
    if (!$result1)
      return false;

   $sql2    = "UPDATE " . $xoopsDB->prefix('xpetitions_options') . " SET options = '$nbcol' WHERE name = 'signature_nbcol'";
   $result2 = $xoopsDB->query($sql2);
    if (!$result2)
      return false;

   $sql3    = "UPDATE " . $xoopsDB->prefix('xpetitions_options') . " SET options = '$entries' WHERE name = 'signature_entry'";
   $result3 = $xoopsDB->query($sql3);
    if (!$result3)
      return false;
    else
      return true;
}

function validSignatureForced($petition_name) {
   // mise à jour de la signature pour validation
   global $xoopsDB;
   $sql = "UPDATE " . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . "
           SET validation = '1'";
   $result = $xoopsDB->queryF($sql);
       if (!$result)
         return false;
       else
         return true;
}

function validSignature($petition_name, $petition_cle, $date_sign) {
   // mise à jour de la signature pour validation
   global $xoopsDB;
   $sql = "UPDATE " . $xoopsDB->prefix('xpetitions_petitions_'.$petition_name) . "
           SET validation = '1',
           date = '$date_sign'
           WHERE cle = '$petition_cle'";
   $result = $xoopsDB->queryF($sql);
       if (!$result)
         return false;
       else
         return true;
}

function limite($petitions_pagestart, $petitions_count, $ligneparpage, $petitions_sql) {
  global $xoopsDB;
  // vérification de la présence de $_REQUEST['page']
  // et que le paramètre n'est pas supérieur au nombre de ligne de la requête
  if (isset($_REQUEST['page']) && ($petitions_pagestart < $petitions_count)) {
      $page = intval($_REQUEST['page']);
      $petitions_sql .= " LIMIT ".$page.",".$ligneparpage.";";
      $result = $xoopsDB->query($petitions_sql);
    }
    // Sinon on affiche la première page
    else {
      $petitions_sql .= " LIMIT 0,".$ligneparpage.";";
      $result = $xoopsDB->query($petitions_sql);
    }
  return $result;
}

?>