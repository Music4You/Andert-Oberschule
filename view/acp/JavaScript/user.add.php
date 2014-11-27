<?php
require_once '../../../config.php';
$db = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 

$Name = $db->real_escape_string($_POST['Name']);
$Pass = $db->real_escape_string($_POST['Pass']);
$Admin = $db->real_escape_string($_POST['Admin']);

$db->query("INSERT INTO accounts (`Name`,`Passwort`,`IP`,`Adminlevel`,`LastLogin`) VALUES ('$Name','$Pass','Neuer Benutzer','$Admin','Neuer Benutzer')");
echo $db->insert_id;
die;
?>