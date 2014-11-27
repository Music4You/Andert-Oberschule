<?php
/*
Die Klasse Regelt die wichtigsten Abläufe in der Website.
Copyright by Florian Gerhardt
*/
System::LoadClass("system","mysqli");
System::LoadClass("system","user");
System::LoadClass("system","error");
System::LoadClass("system","termin");
Class System
{
	static protected $DB;
	static protected $User;
	static protected $Termin;
	
	
	public static function GetDB()
	{
		if(is_object(self::$DB))return self::$DB;
		self::SetDB();
		return self::$DB;
	}
	public static function SetDB()
	{
		self::$DB = new Database();
	}
	public static function LoadClass($Ordner,$Classname)
	{
		if(file_exists(Dir ."/controll/$Ordner/$Classname.class.php"))
		{
			require_once(Dir ."/controll/$Ordner/$Classname.class.php");
		}
		else
		{
			new Error("500","Angeforderte System-Klasse wurde nicht gefunden");
		}
	}
	public static function User()
	{
		if(is_object(self::$User))return self::$User;
		self::SetUser();
		return self::$User;
	}
	public static function SetUser()
	{
		self::$User = new User();
	}
	public static function Termin()
	{
		if(is_object(self::$Termin))return self::$Termin;
		self::SetTermin();
		return self::$Termin;
	}
	public static function SetTermin()
	{
		self::$Termin = new Termin();
	}
}
?>