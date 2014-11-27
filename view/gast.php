<?php 
global $SPRACHE;
global $Schule;
System::LoadClass("system","gaestebuch");
if(isset($_POST['submit']))
{
	GB::InsertIntoGB($_POST['Name'],$_POST['Wohnort'],$_POST['Text']);
}
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Gast']['Gast'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span7">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Gast']['Gastlist'];?></h4>
                    </div>
					<div class="widget-body"><?php 
						if(!GB::GetGBCount()){?><div class="alert alert-block alert-success fade in"><span><?php echo $SPRACHE['Gast']['NoGB'] ?></span></div><?php } else {
						
						$data = GB::GetGB();
						$count = count($data);
						for($i=0;$i<$count;$i++)
						{?>
							<div class="widget <?php echo ThemeColor::GetStyle();?>">
							<div class = "widget-body">
								<b><?php echo $data[$i]["Name"]; ?></b>
								<hr/>
								<?php echo nl2br($data[$i]["Text"]); ?><br/><br/>
								<small><?php echo $data[$i]["Wohnort"].", ".$data[$i]["Datum"]; ?></small>
							</div>
						</div><?php
						}
					 } ?>
					</div>
				</div>
			</div>  
			
			<div class="span5">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Gast']['GastAdd'];?></h4>
                    </div>
					<div class="widget-body">
						<form class="form-horizontal" action="?page=gast" method="post"><?php
							if(isset($_POST['submit']))
							{?>
								<div class="alert alert-block alert-success fade in">
									<span><?php echo $SPRACHE['Gast']['SuccessSend'] ?></span>
								</div><?
							}?>
							<div class="control-group">
								<label class="control-label" for="Name"><?php echo $SPRACHE['Gast']['Name'];?></label>
								<div class="controls">
									<input type="text" id="Name" name="Name" class="span6" required/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="Wohnort"><?php echo $SPRACHE['Gast']['Wohnort'];?></label>
								<div class="controls">
									<input type="text" id="Wohnort" name="Wohnort" class="span6" required/>
								</div>
							</div>
								
							<div class="control-group">
								<label class="control-label" for="Text"><?php echo $SPRACHE['Gast']['Text'];?></label>
								<div class="controls">
									<textarea type="text" id="Text" name="Text" class="span6"/></textarea><br/>
									<small><?php echo $SPRACHE['Gast']['SaveIP'];?><br/><?php echo $SPRACHE['Gast']['Warning'];?></small>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" name="submit" id="submit" class="btn btn-success" ><?php echo $SPRACHE['Gast']['Absenden'];?></button>
								<button type="button" class="btn" onclick="Reset()"><?php echo $SPRACHE['Gast']['Reset'];?></button>
							</div>
						</form>	
					</div>
				</div>
			</div>   
        </div>   
    </div>
</div>