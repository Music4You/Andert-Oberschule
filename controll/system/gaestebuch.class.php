<?php
/*
Gästebuch Klasse
Copyright by Florian Gerhardt
*/

Class GB 
{
	public static function InsertIntoGB($Name,$Wohnort,$Text)
	{
		$Names = System::GetDB()->EscapeString($Name);
		$Wohnorts = System::GetDB()->EscapeString($Wohnort);
		$Texts = System::GetDB()->EscapeString($Text);
		$IP = $_SERVER['REMOTE_ADDR'];
		$Datum = date("d.m.Y");
		System::GetDB()->SendQuery("INSERT INTO Gb (`Name`,`IP`,`Wohnort`,`Text`,`Datum`) VALUES ('$Names','$IP','$Wohnorts','$Texts','$Datum')");
	}
	public static function GetGBCount()
	{
		System::GetDB()->SendQuery("SELECT * FROM Gb");
		$Rows = System::GetDB()->NumRows();
		return $Rows;
	}
	public function GetGB()
	{
		$query = System::GetDB()->SendQuery("SELECT * FROM Gb ORDER BY (id) DESC;");
		$data = array();
		$i = 0;
		while($query_data = System::GetDB()->FetchObject($query))
		{
			$data[$i]["id"] = $query_data->id;
			$data[$i]["Name"] = $query_data->Name;
			$data[$i]["Wohnort"] = $query_data->Wohnort;
			$data[$i]["Datum"] = $query_data->Datum;
			$data[$i]["Text"] = $query_data->Text;
			$i++;
		}
		return $data;
	}
}
?>