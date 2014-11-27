<?php 
global $SPRACHE;
global $Schule;
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Navbar']['About'] ." - ". $SPRACHE['About']['Vorstellung'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Schüler'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['SchülerText'] ."<br/><br/>";
						echo $SPRACHE['About']['SchülerZahl']." ".$Schule['Schuljahr'].": ".$Schule['Schülerzahl'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Schulgebäude'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['SchulgebäudeText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Lehrer'];?></h4>
					</div>
					<div class="widget-body">	
						<?php echo $SPRACHE['About']['LehrerText'];?>
					</div>
				</div>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span4">
				<img src="img/30JahreSchule.jpg"/>
            </div>
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Schulverfügung'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['SchulverfügungText'];?>
					</div>
				</div>
            </div>
			<div class="span4">
				<img src="img/schulraeder.JPG" />
            </div>
        </div>   
    </div>
</div>