<?php 
global $SPRACHE;
global $Impressum;
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Kontakt']['Kontakt'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span6">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Kontakt']['Lage'];?></h4>
					</div>
					<div class="widget-body">
						<div id="map-canvas" style="width: 100%; height: 400px"></div><br/>
						<?php
						echo "<b>".$SPRACHE['Kontakt']['Ort']."</b> ".$Impressum['Ort']."<br/>";
						echo "<b>".$SPRACHE['Kontakt']['Straße']."</b> ".$Impressum['Straße'];
						?>
					</div>
				</div>
			</div>  
			<div class="span6">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['Kontakt']['Header'];?></h4>
					</div>
					<div class="widget-body">
						<form class="form-horizontal" action="?page=kontakt" method="post">
							<?php
							if(isset($_POST['submit']))
							{
								$Name = System::GetDB()->EscapeString($_POST['Name']);
								$Email = System::GetDB()->EscapeString($_POST['Email']);
								$Betreff = System::GetDB()->EscapeString($_POST['Betreff']);
								$Text = System::GetDB()->EscapeString($_POST['Text']);
								$Zeit = date("d.m.Y  H:i");
								$IP = $_SERVER['REMOTE_ADDR'];
								if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
								{?>
									<div class="alert alert-block alert-danger fade in">
										<span><?php echo $SPRACHE['Kontakt']['ErrorEmail'] ?></span>
									</div><?php 
								}
								else if(strpos($Name,' ')==false)
								{?>
									<div class="alert alert-block alert-danger fade in">
										<span><?php echo $SPRACHE['Kontakt']['ErrorName'] ?></span>
									</div><?php
								}
								else 
								{
									System::GetDB()->SendQuery("INSERT INTO Kontakt (`Name`,`Email`,`Betreff`,`Text`,`Zeit`,`IP`) VALUES ('$Name','$Betreff','$Email','$Text','$Zeit','$IP')");?>
									<div class="alert alert-block alert-success fade in">
										<span><?php echo $SPRACHE['Kontakt']['SuccessSend'] ?></span>
									</div>
									<?php
								}
							}
							?>
							<div id="errormessage" class="alert alert-block alert-danger fade in" style="display:none">
								<span id="errorid"></span>
							</div>
							
							<div class="control-group">
                                <label class="control-label" for="Name" id="NameText" ><?php echo $SPRACHE['Kontakt']['Name'];?></label>
                                <div class="controls">
                                    <input type="text" id="Name" name="Name" class="span6" value="<?php echo $_POST['Name'];?>" required/>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label" for="Email" id="EmailText"><?php echo $SPRACHE['Kontakt']['Email'];?></label>
                                <div class="controls">
                                    <input type="email" id="Email" name="Email" class="span6" value="<?php echo $_POST['Email'];?>" required/>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label" for="Betreff" id="BetreffText"><?php echo $SPRACHE['Kontakt']['Betreff'];?></label>
                                <div class="controls">
                                    <input type="text" id="Betreff" name="Betreff" class="span6" value="<?php echo $_POST['Betreff'];?>" required/>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label" for="Text" id="TextText"><?php echo $SPRACHE['Kontakt']['Text'];?></label>
                                <div class="controls">
                                    <textarea type="text" id="Text" name="Text" class="span6"/><?php echo $_POST['Text'];?></textarea><br/>
									<small><?php echo $SPRACHE['Kontakt']['SaveIP'];?></small>
                                </div>
                            </div>
							<div class="form-actions">
                                <button type="submit" name="submit" id="submit" class="btn btn-success"><?php echo $SPRACHE['Kontakt']['Absenden'];?></button>
                                <button type="button" class="btn" onclick="Reset()"><?php echo $SPRACHE['Kontakt']['Reset'];?></button>
                            </div>
						</form>
					</div>
				</div>
			</div>    
        </div>    
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script type="text/javascript">
function Reset()
{
	var Name = document.getElementById('Name').value="";
	var Email = document.getElementById('Email').value="";
	var Betreff = document.getElementById('Betreff').value="";
	var Text = document.getElementById('Text').value="";
}
function initialize() {
	var myLatlng = new google.maps.LatLng(50.993258, 14.612722);
	var mapOptions = {
		zoom: 18,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.SATELLITE 
	}
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
		map: map,
		title: 'Hello World!'
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>