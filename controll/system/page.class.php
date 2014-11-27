<?php
/*
Seitenverwaltung für alle Seiten des Panels
Copyright by Florian Gerhardt
*/
class Page
{
	function __construct($type,$page)
	{
		$this->GetPage($type,$page);
	}
	public function GetPage($type,$page)
	{
		if($type==1)
		{
			if(file_exists(Dir ."/view/".$page.".php"))
			{
				include Dir ."/view/".$page.".php";
			}
			else
			{
				$this->FileNotFound();
			}
		}
		else
		{
			if(!isset($page)){$page="user";}
			if(file_exists(Dir ."/view/acp/".$page.".php"))
			{
				include Dir ."/view/acp/".$page.".php";
			}
			else
			{
				$this->FileNotFound();
			}
		}
	}
	public function FileNotFound()
	{
		global $SPRACHE;
		new Error(404,$SPRACHE['File']['404']);
	}
}
?>