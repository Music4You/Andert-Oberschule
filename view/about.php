<?php
$action = $_GET['action'];

error:
if(!isset($action)){$action="vorstellung";}
if(!file_exists(Dir ."/view/about/$action.php")){$action="vorstellung"; goto error;}
require_once(Dir ."/view/about/$action.php");
?>