<?php
/*
Klasse um die Header Farbe zu wechseln.
Copyright 2014 by Florian Gerhardt
*/
Class ThemeColor 
{
	function __construct($id)
	{
		if(isset($id))
		{
			setcookie("tcid",$id);
		}
		else
		{
			$id = $_COOKIE["tcid"];
			if(!isset($id))
			{
				$id = "default";
				setcookie("tcid",$id);
			}
		}
		$this->CheckColor($id);
	}
	public function CheckColor($id)
	{
		if(file_exists("controll/themecolor/css/style-".$id.".css"))
		{
			$this->SetColor($id);
		}
		else
		{
			setcookie("tcid","default");
			$this->SetColor("default");
		}
	}
	public function SetColor($params)
	{
		echo "<link href='controll/themecolor/css/style-$params.css?v1' rel='stylesheet' id='style_color' />";
	}
	public static function GetStyle()
	{
		$id =  $_COOKIE['tcid'];
		if($id == "default")return "blue";
		if($id == "gray")return "default";
		if($id == "green")return "green";
		if($id == "red")return "red";
		if($id == "purple")return "purple";
		else return "blue";
	}
	public static function SetSidebar()
	{
		$id = $_COOKIE["tcid"];	
		if(!isset($id)){$id="default";}
		if($id == "default")echo "<script>$('.sidebar-scroll').niceScroll({styler:'fb',cursorcolor:'#4A8BC2', cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});$('html').niceScroll({styler:'fb',cursorcolor:'#4A8BC2', cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});</script>";
		if($id == "gray")echo "<script>$('.sidebar-scroll').niceScroll({styler:'fb',cursorcolor:'#4A8BC2', cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});$('html').niceScroll({styler:'fb',cursorcolor:'#2d2d2d', cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});</script>";
		if($id == "red")echo "<script>$('.sidebar-scroll').niceScroll({styler:'fb',cursorcolor:'#cc0303', cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});$('html').niceScroll({styler:'fb',cursorcolor:'#cc0303', cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});</script>";
		if($id == "green")echo "<script>$('.sidebar-scroll').niceScroll({styler:'fb',cursorcolor:'#4A8BC2', cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});$('html').niceScroll({styler:'fb',cursorcolor:'#79b82e', cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});</script>";
		if($id == "purple")echo "<script>$('.sidebar-scroll').niceScroll({styler:'fb',cursorcolor:'#4A8BC2', cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});$('html').niceScroll({styler:'fb',cursorcolor:'#7163b3', cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});</script>";
	}
}
?>