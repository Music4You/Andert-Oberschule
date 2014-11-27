<?php 
global $SPRACHE;
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Navbar']['Home'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span4">
				<img src="img/Schule.png"></img>
            </div>
			
			<div class="span5">
				<a href="http://www.schule-ohne-rassismus.org/startseite/"><img src="img/SchuleGegenRassismus.jpg"/></a>
            </div>
			
			<div class="span3">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Home']['Termin'];?></h4>
                    </div>
					<div class="widget-body"><?php
						$data = System::Termin()->GetTerminData(true);
						$count = count($data);
						$time = date("d.m.Y");
						if($count > 3)
						{
							for($i=0;$i<2;$i++)
							{
								echo "<b>".$data[$i]['Datum']."</b> ".$data[$i]['Name']; echo(($time == $data[$i]['Datum']) ? " <label class='label label-success'>".$SPRACHE['ACP']['TerminActive']."</label>" : "" );
								echo "<hr/>";
							}
						}
						else
						{
							for($i=0;$i<$count;$i++)
							{
								echo "<b>".$data[$i]['Datum']."</b> ".$data[$i]['Name']; echo(($time == $data[$i]['Datum']) ? " <label class='label label-success'>".$SPRACHE['ACP']['TerminActive']."</label>" : "" );
								echo "<hr/>";
							}
						}?>
					</div>
				</div>
            </div>
			
			<div class="span4"></div><div class="span5"></div>
			<div class="span3">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Home']['NeueSeiten'];?></h4>
                    </div>
					<div class="widget-body">
						<a href="?page=content&id=1">Anfang der Homepage Arbeiten</a><hr/>
						<a href="?page=content&id=2">30 Jähriges Schuljubileum</a><hr/>
						<center><a href="?page=archiv">Seiten Archiv</a></center>
					</div>
				</div>
			</div>
        </div>   
    </div>
</div>