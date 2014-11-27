<?php
/*
Klasse für Errormeldungen
Copyright by Florian Gerhardt
*/

class Error
{
	function __construct($Head,$Subline)
	{
		self::SetError($Head,$Subline);
	}
	
	public static function SetError($Head,$Subline)
	{?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
					</div>
				</div>   
				
				<div class="row-fluid">
					<center><h1><?php echo $Head;?></h1><br/>
					<h3><?php echo $Subline; ?></center></h3>
				</div>   
			</div>
		</div><?php
	}
}
?>