<?php
//Standartsprache
$System['Lang']['DEFAULT'] = "de"; 

//Namen etc
$System['Projekt']['Name'] = "Andert Oberschule Ebersbach-Neugersdorf";

//MySQL
$System['MySQL']['Host'] = "localhost";
$System['MySQL']['User'] = "root";
$System['MySQL']['Pass'] = "Amadeus007";
$System['MySQL']['Data'] = "schule";

//Schulinfo
$Schule = array(
	"Schuljahr" => "2013/14",
	"Schülerzahl" => "409",
	"Lehrerzahl" => "32",
	"LehrerzahlGTA" => "16",
);

//Impressum
$Impressum = array(
	"Straße" => "Sachsenstraße 41",
	"Ort" => "02730 Ebersbach-Neugersdorf",
	"Schulleiter" => "Norbert Worofka",
	"StellvSchulleiter" => "Thomas Drosky",
	"Tel" => "03586/370970",
	"Fax" => "03586/370974",
	"Email" => "norbert.worofka@aol.com",
	"Schulträger" => "Stadtverwaltung Ebersbach-Neugersdorf",
	"SchulträgerStraße" => "Reichsstraße 1",
	
	"Programmierung" => "Florian Gerhardt",
	"Beratung" => "Lisa Adam",
	"Homepagebetreuer" => "Dietmar Riedel",
	"Homepageemail" => "webmaster@andert-mittelschule.de (nur für Nachrichten zur Homepage!)",
);

//Bei weiteren Mitgliedern einfach die arrays erweitern und die id vortsetzen.
$HPTeam["1"]["Team"] = "Anna Menzel";
$HPTeam["2"]["Team"] = "Maria Hauswald";
$HPTeam["3"]["Team"] = "Tom Kunat";

//ACP Permissions

/*
1 = Homepageteam
2 = Lehrer
3 = Schulleitung
4 = Uneingeschränkter Vollzugriff
*/
$Permission['User'] = 3;
$Permission['Termin'] = 3;
?>