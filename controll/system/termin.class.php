<?php
/*
Klasse für die ganze Termin verwaltung.
Copyright by Florian Gerhardt
*/
Class Termin
{
	public function GetTerminData($id=false)
	{
		if($id==true)
		{
			$query = System::GetDB()->SendQuery("SELECT * FROM termin ORDER BY Datum ASC;");
		}
		else
		{
			$query = System::GetDB()->SendQuery("SELECT * FROM termin ORDER BY Datum DESC;");
		}
		$data = array();
		$i = 0;
		while($query_data = System::GetDB()->FetchObject($query))
		{
			$data[$i]["id"] = $query_data->id;
			$data[$i]["Name"] = $query_data->Name;
			$data[$i]["Datum"] = $query_data->Datum;
			$data[$i]["Admin"] = $query_data->Admin;
			$i++;
		}
		return $data;
	}
}
?>