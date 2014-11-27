<?php 
global $SPRACHE;
global $Impressum;
global $HPTeam;
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<h3 class="page-title">
                <?php echo $SPRACHE['System']['Impressum'];?>
            </h3>
        </div>
		
		<div class="row-fluid">
			<b>Solange diese Seite nicht offiziell als Schulhomepage Genutzt wird hafte ich, Florian Gerhardt gemäß §7 des TMG´s.</b><br/>
			Martin Luther Straße 37<br/>
			02727 Ebersbach-Neugersdorf<br/>
        </div><br/>
		
		<div class="row-fluid">
			<div class="span6">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Impressum']['Schule'];?></h4>
                    </div>
					<div class="widget-body">
						<dl class="dl-horizontal">
                            <dt><?php echo $SPRACHE['Impressum']['Straße']; ?></dt>
                            <dd><?php echo $Impressum["Straße"];?></dd><br/>
                            <dt><?php echo $SPRACHE['Impressum']['Ort']; ?></dt>
                            <dd><?php echo $Impressum["Ort"];?></dd><br/>
                            <dt><?php echo $SPRACHE['Impressum']['Schulleiter']; ?></dt>
                            <dd><?php echo $Impressum["Schulleiter"];?></dd><br/>
                            <dt><?php echo $SPRACHE['Impressum']['StellvSchulleiter']; ?></dt>
                            <dd><?php echo $Impressum["StellvSchulleiter"];?></dd><br/>
                            <dt><?php echo $SPRACHE['Impressum']['Tel']; ?></dt>
                            <dd><?php echo $Impressum["Tel"];?></dd><br/>
                            <dt><?php echo $SPRACHE['Impressum']['Fax']; ?></dt>
                            <dd><?php echo $Impressum["Fax"];?></dd> <br/>
							<dt><?php echo $SPRACHE['Impressum']['Email']; ?></dt>
                            <dd><?php echo $Impressum["Email"];?></dd><br/>
							<dt><?php echo $SPRACHE['Impressum']['Schulträger']; ?></dt>
                            <dd><?php echo $Impressum["Schulträger"];?></dd>
                            <dd><?php echo $Impressum["SchulträgerStraße"];?></dd>
                        </dl>	
					</div>
				</div>
            </div>
			
			<div class="span6">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Impressum']['Homepageteam'];?></h4>
                    </div>
					<div class="widget-body">
						<dl class="dl-horizontal">
                            <dt><?php echo $SPRACHE['Impressum']['Homepagebetreuer']; ?></dt>
                            <dd><?php echo $Impressum["Homepagebetreuer"];?></dd><br/>
							<dt><?php echo $SPRACHE['Impressum']['Homepagecoding']; ?></dt>
                            <dd><?php echo $Impressum["Programmierung"];?></dd><br/>
							<dt><?php echo $SPRACHE['Impressum']['Homepageberatung']; ?></dt>
                            <dd><?php echo $Impressum["Beratung"];?></dd><br/><br/><br/>
							<dt><?php echo $SPRACHE['Impressum']['Homepageteam']; ?></dt><?php
							for($i;$i<20;$i++){
                            echo "<dd>".$HPTeam[$i]["Team"]."</dd>"; }?><br/>
                            <dt><?php echo $SPRACHE['Impressum']['Homepageemail']; ?></dt>
                            <dd><?php echo $Impressum["Homepageemail"];?></dd><br/>
                        </dl>	
					</div>
				</div>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span12">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Impressum']['Disclaimer'];?></h4>
                    </div>
					<div class="widget-body">
						<dl>
                        <dt> <?php echo "".$SPRACHE['Impressum']['Verantwortlich']." ". $Impressum['Schulleiter'];?></dt><br/><br/>
						
						<dt><?php echo $SPRACHE['Impressum']['DisclaimerPart1'];?></dt>
						<dd><?php echo $SPRACHE['Impressum']['DisclaimerPart1Text'];?></dd><br/>
						<dt><?php echo $SPRACHE['Impressum']['DisclaimerPart2'];?></dt>
						<dd><?php echo $SPRACHE['Impressum']['DisclaimerPart2Text'];?></dd><br/>
						<dt><?php echo $SPRACHE['Impressum']['DisclaimerPart3'];?></dt>
						<dd><?php echo $SPRACHE['Impressum']['DisclaimerPart3Text'];?></dd><br/>
						<dt><?php echo $SPRACHE['Impressum']['DisclaimerPart4'];?></dt>
						<dd><?php echo $SPRACHE['Impressum']['DisclaimerPart4Text'];?></dd>
						</dl>
					</div>
				</div>
            </div>
        </div>   
    </div>
</div>