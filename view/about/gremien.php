<?php 
global $SPRACHE;
global $Schule;
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Navbar']['About'] ." - ". $SPRACHE['About']['Gremien'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Elternrat'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['ElternratText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Schülerrat'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['SchülerratText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Gesamtlehrerkonferenz'];?></h4>
					</div>
					<div class="widget-body">	
						<?php echo $SPRACHE['About']['GesamtlehrerkonferenzText'];?>
					</div>
				</div>
            </div>
        </div>  
		
		<div class="row-fluid">
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Fachkonferenzen'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['FachkonferenzenText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Klassenkonferenz'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['KlassenkonferenzText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['Verein'];?></h4>
					</div>
					<div class="widget-body">	
						<?php echo $SPRACHE['About']['VereinText'];?>
					</div>
				</div>
            </div>
        </div>   
    </div>
</div>