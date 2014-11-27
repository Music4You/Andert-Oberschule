<?php
/*
In der Klasse ist die komplette verwaltung der Benutzer.
Copyright by Florian Gerhardt 
*/

Class User
{
	public function GetUserData()
	{
		$Name = $_SESSION['username'];
		$query = System::GetDB()->SendQuery("SELECT * FROM accounts WHERE Name = '$Name'");
		$data = array();
		while($query_data = System::GetDB()->FetchObject($query))
		{
			$data["id"] = $query_data->id;
			$data["Name"] = $query_data->Name;
			$data["IP"] = $query_data->IP;
			$data["Adminlevel"] = $query_data->Adminlevel;
			$data["LastLogin"] = $query_data->LastLogin;
		}
		return $data;
	}
	
	public function GetUsersData()
	{
		$query = System::GetDB()->SendQuery("SELECT * FROM accounts");
		$data = array();
		$i = 0;
		while($query_data = System::GetDB()->FetchObject($query))
		{
			$data[$i]["id"] = $query_data->id;
			$data[$i]["Name"] = $query_data->Name;
			$data[$i]["IP"] = $query_data->IP;
			$data[$i]["Adminlevel"] = $query_data->Adminlevel;
			$data[$i]["LastLogin"] = $query_data->LastLogin;
			$i++;
		}
		return $data;
	}
}
?>