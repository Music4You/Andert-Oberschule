<?php 
global $SPRACHE;
global $Schule;
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Navbar']['About'] ." - ". $SPRACHE['About']['Chronik'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['ChronikTimeline'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['ChronikTimelineText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['About']['ChronikGeschichte'];?></h4>
					</div>
					<div class="widget-body">
						<?php echo $SPRACHE['About']['ChronikGeschichteText'];?>
					</div>
				</div>
            </div>
			
			<div class="span4">
				<img src="http://i1.ytimg.com/vi/cj8kr6khbXY/hqdefault.jpg"/>
				<small>Herbert Andert</small>
            </div>
        </div>   
    </div>
</div>