<?php
require_once '../../../config.php';
$db = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 

$ID = $db->real_escape_string($_POST['id']);

$db->query("DELETE FROM accounts WHERE id='$ID'");
die;
?>