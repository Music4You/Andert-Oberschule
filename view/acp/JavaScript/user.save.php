<?php
require_once '../../../config.php';
$db = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 

$id = $db->real_escape_string($_POST['id']);
$Admin = $db->real_escape_string($_POST['Admin']);

$db->query("UPDATE accounts SET Adminlevel='$Admin' WHERE id='$id'");
die;
?>