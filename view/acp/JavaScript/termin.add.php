<?php
require_once '../../../config.php';
$db = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 

$Name = $db->real_escape_string($_POST['Name']);
$Datum = $db->real_escape_string($_POST['Datum']);
$Admin = $db->real_escape_string($_POST['Admin']);

$db->query("INSERT INTO termin (`Name`,`Datum`,`Admin`) VALUES ('$Name','$Datum','$Admin')");
echo $db->insert_id;
die;
?>