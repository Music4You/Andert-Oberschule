<?php 
global $SPRACHE;
global $Permission;
$UserPerm = System::User()->GetUserData();
if($UserPerm['Adminlevel'] >= $Permission['Termin'])
{
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Navbar']['ACP'] ." - ".$SPRACHE['Navbar']['ACPTermin'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
           <div class="span12">
                <div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> <?php echo $SPRACHE['ACP']['Termin'];?></h4>
					</div>
					<div class="widget-body">

						<div class="form-group">
							<button id="AddTerminButton" style="display:block" class="btn btn-primary" onclick="AddTerminShow()"><?php echo $SPRACHE['ACP']['AddTermin'];?></button>
							<div id="AddTermine" style="display:none">
							
								<div class="form-horizontal">

									<div class="control-group">
										<label class="control-label" for="TerminAddName"><?php echo $SPRACHE['ACP']['TerminAddName'];?></label>
										<div class="controls">
											<input id="TerminAddName" name="TerminAddName" type="text" />
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label" for="TerminAddDate"><?php echo $SPRACHE['ACP']['TerminAddDate'];?></label>
										<div class="controls">
											<input id="TerminAddDate" name="TerminAddDate" type="text"/>
										</div>
									</div>

									<div class="control-group">
										<button onclick="AddTermin()" class="btn btn-primary"><?php echo $SPRACHE['ACP']['TerminCreate'];?></button>
									</div>
								</div>
								
							</div>
						</div><br/><br/>
						
						<?php
						$data = System::Termin()->GetTerminData();
						$count = count($data);
						
						if(!$count)
						{?>
							<div class="alert alert-block alert-warning fade in">
                              <h4 class="alert-heading">Warnung</h4>
                              <p><?php echo $SPRACHE['ACP']['NoTermin'];?></p>
							</div><?php
						}
						else
						{
						?>
							<table id="table" class="table table-bordered">
								<thead>
									<tr>
										<th><?php echo $SPRACHE['ACP']['ShowTerminDB'];?></th>
										<th><?php echo $SPRACHE['ACP']['ShowTerminName'];?></th>
										<th><?php echo $SPRACHE['ACP']['ShowTerminDatum'];?></th>
										<th><?php echo $SPRACHE['ACP']['ShowTerminAdmin'];?></th>
										<th><?php echo $SPRACHE['ACP']['ShowTerminEdit'];?></th>
									</tr>
								</thead>
								<tbody><?php
								for($i=0;$i<$count;$i++)
								{?>
									<tr id="<?php echo "ID".$data[$i]['id'];?>">
										<td><span id="<?php echo "showdbid".$i;?>"><?php echo $data[$i]['id'];?></span></td>
										<td><span id="<?php echo "showdbname".$i;?>"><?php echo $data[$i]['Name'];?></span></td>
										<td><span id="<?php echo "showdbdatum".$i;?>"><?php echo $data[$i]['Datum'];?></span></td>
										<td><span id="<?php echo "showdbadmin".$i;?>"><?php echo $data[$i]['Admin'];?></span></td>
										<td><button id="DeleteTermin" onclick="DeleteTermin(<?php echo $data[$i]['id'];?>)" class="btn btn-danger"><?php echo $SPRACHE['ACP']['ShowDelete'];?></button></td>
									</tr><?php
								}?>
								</tbody>
							</table><?php
						}?>
                    </div>
                </div>
			</div>
		</div>
    </div>
</div><?php
}
else
{
	new Error($SPRACHE['File']['NoAdmin'],$SPRACHE['File']['NoAdminText']);
}
?>
<script type="text/javascript">
function AddTerminShow()
{
	$("#AddTermine").show('fast');
	$("#AddTerminButton").hide('fast');
}
function AddTermin()
{
	var Name = $("#TerminAddName").val();
	var Datum = $("#TerminAddDate").val();
	var admin = "<?php echo $_SESSION['username']; ?>" ;
	if(!Name || !Datum)
	{
		alert("Beide Felder müssen ausgefüllt werden!");
	}
	else
	{
		$.post("view/acp/JavaScript/termin.add.php",{Name:Name,Datum:Datum,Admin:admin},function(data)
		{
			$("#table").append(
				"<tr>" +
					"<td> " + data +"</td>" +
					"<td> " + Name +"</td>" +
					"<td> " + Datum +"</td>" +
					"<td> " + admin +"</td>" +
					"<td> Buttons werden beim Aktualisieren der Seite angezeigt</td>" +
				"</tr>"
			);
		});
	}
}
function DeleteTermin(id)
{
	$.post("view/acp/JavaScript/termin.del.php",{id:id},function(data)
	{
		$("#ID"+id).hide('fast');
    });
}
</script>