<?php
/*
Sprach Klasse,
Diese Klasse weist die gewünschte Sprache zu, alles basiert auf Sprachvariablen.

Copyright by Florian Gerhardt
*/
class Sprache
{
	function __construct($Languageid) 
	{
		if(isset($Languageid))
		{
			$this->CheckLanguage($Languageid);
		}
		else
		{
			$Languageid = @$_COOKIE["lang"];
			if(isset($Languageid))
			{
				$this->CheckLanguage($Languageid);
			}
			else
			{
				global $System;
				$Languageid = $System['Lang']['DEFAULT'];
				$this->CheckLanguage($Languageid);
			}
		}
	}
	public function CheckLanguage($lang)
	{
		if(file_exists(Dir ."/controll/language/language.".$lang.".php"))
		{
			include Dir ."/controll/language/language.".$lang.".php";
			setcookie("lang",$lang);
		}
		else
		{
			include Dir ."/controll/language/language.de.php";
		}
	}
}
?>