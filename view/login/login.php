<?php
session_start();
require_once '../../config.php';
$db = new mysqli($System['MySQL']['Host'],$System['MySQL']['User'],$System['MySQL']['Pass'],$System['MySQL']['Data']); 
$Name = $db->real_escape_string($_POST['Name']);
$Pass = $db->real_escape_string($_POST['Pass']);

$Query = $db->query("SELECT * FROM accounts WHERE `Name`='$Name' AND `Passwort`='$Pass'");
$Result = $Query->num_rows;
if($Result!=0)
{
	$_SESSION['username']=$Name;
}
echo(($Result) ? "1" : "0");

if(isset($_POST['Edit']))
{
	$Name = $db->real_escape_string($_POST['Edit']);
	$IP = $_SERVER['REMOTE_ADDR'];
	$Login = date("d.m.Y   H:i");
	$db->query("UPDATE accounts SET `IP`='$IP', `LastLogin`='$Login' WHERE `Name`='$Name'");
}
die;
?>