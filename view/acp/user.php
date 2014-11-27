<?php 
global $SPRACHE;
global $Permission;
$UserPerm = System::User()->GetUserData();
if($UserPerm['Adminlevel'] >= $Permission['User'])
{
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
                    <?php echo $SPRACHE['Navbar']['ACP'] ." - ".$SPRACHE['Navbar']['ACPUser'];?>
                </h3>
            </div>
        </div>   
		
		<div class="row-fluid">
           <div class="span12">
                <div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> <?php echo $SPRACHE['ACP']['User'];?></h4>
					</div>
					<div class="widget-body">
						<div class="form-group">
							<div id="errormessage" style="display:none">
								<div class="alert alert-block alert-warning fade in">
								  <h4 class="alert-heading">Warnung</h4>
								  <span id="errortext"></span>
								</div>
							</div>
							
							<div id="successmessage" style="display:none">
								<div class="alert alert-block alert-success fade in">
								  <h4 class="alert-heading">Erfolgreich</h4>
								  <span id="successtext"></span>
								</div>
							</div>
							
							<button id="AddUserButton" style="display:block" class="btn btn-primary" onclick="AddUserShow()"><?php echo $SPRACHE['ACP']['AddUser'];?></button>
							<div id="AddUser" style="display:none">
								<div class="span4">
									<div class="form-horizontal">

										<div class="control-group">
											<label class="control-label" for="UserName"><?php echo $SPRACHE['ACP']['AddUserName'];?></label>
											<div class="controls">
												<input id="UserName" name="UserName" type="text" />
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="UserPass"><?php echo $SPRACHE['ACP']['AddUserPass'];?></label>
											<div class="controls">
												<input id="UserPass" name="UserPass" type="password"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="UserAdmin"><?php echo $SPRACHE['ACP']['AddUserAdmin'];?></label>
											<div class="controls">
												<input id="UserAdmin" name="UserAdmin" type="text"/>
											</div>
										</div>

										<div class="control-group">
											<button onclick="UserCreate()" class="btn btn-primary"><?php echo $SPRACHE['ACP']['UserCreate'];?></button>
										</div>
									</div>
								</div>
								<div class="span4">
									<b><?php echo $SPRACHE['ACP']['Permissions'];?></b>
									<?php echo "<br/>".$SPRACHE['ACP']['Permissions1']."<br/>".$SPRACHE['ACP']['Permissions2']."<br/>".$SPRACHE['ACP']['Permissions3']."<br/>".$SPRACHE['ACP']['Permissions4'];?>
								</div>
							</div>
						</div><br/><br/>
						
						<table id="table" class="table table-bordered">
							<thead>
								<tr>
									<th><?php echo $SPRACHE['ACP']['ShowDBID'];?></th>
									<th><?php echo $SPRACHE['ACP']['ShowName'];?></th>
									<th><?php echo $SPRACHE['ACP']['ShowIP'];?></th>
									<th><?php echo $SPRACHE['ACP']['ShowLastLogin'];?></th>
									<th><?php echo $SPRACHE['ACP']['ShowAdminlevel'];?></th>
									<th><?php echo $SPRACHE['ACP']['ShowEdit'];?></th>
								</tr>
							</thead>
							<tbody><?php
							$data = System::User()->GetUsersData();
							$count = count($data);
							for($i=0;$i<$count;$i++)
							{?>
								<tr id="<?php echo "id".$data[$i]['id']; ?>">
                                    <td><?php echo $data[$i]['id'];?></td>
									<td><?php echo $data[$i]['Name'];?></td>
                                    <td><?php echo $data[$i]['IP'];?></td>
                                    <td><?php echo $data[$i]['LastLogin'];?></td>
                                    <td><span id="<?php echo "Adminlevel".$data[$i]['id']; ?>"><?php echo $data[$i]['Adminlevel'];?></span></td>
                                    <td><button style="display:none" id="SaveUserButton<?php echo $data[$i]['id']; ?>" onclick="SaveUser(<?php echo $data[$i]['id']; ?>)" class="btn btn-primary"><?php echo $SPRACHE['ACP']['ShowSave'];?></button> <button style="display:none" id="CancelUserButton<?php echo $data[$i]['id']; ?>" onclick="CancelUser(<?php echo $data[$i]['id']; ?>)" class="btn btn-danger"><?php echo $SPRACHE['ACP']['ShowCancel'];?></button><button id="EditUserButton<?php echo $data[$i]['id']; ?>" onclick="EditUser(<?php echo $data[$i]['id']; ?>)" class="btn btn-primary"><?php echo $SPRACHE['ACP']['ShowEdit'];?></button> <?php if($data[$i]["Adminlevel"]!=4){?><button id="DeleteUserButton<?php echo $data[$i]['id']; ?>" onclick="DeleteUser(<?php echo $data[$i]['id']; ?>)" class="btn btn-danger"><?php echo $SPRACHE['ACP']['ShowDelete'];?></button><?}?></td>
                                </tr><?php
							}?>
							</tbody>
                        </table>
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
var AdminLevel;
function AddUserShow()
{
	$('#AddUserButton').hide('fast');
	$('#AddUser').show('fast');
}
function UserCreate()
{
	var Name = $('#UserName').val();
	var Pass = $('#UserPass').val();
	var Admin = $('#UserAdmin').val();
	if(Name=="" || Pass=="" || Admin=="")
	{
		$('#errormessage').show('fast');
		$('#errortext').html('Alle Felder sind erforderlich.');
	}
	else
	{
		$.post("view/acp/JavaScript/user.add.php",{Name:Name,Pass:Pass,Admin:Admin},function(data)
		{
			$("#table").append(
				"<tr>" +
					"<td> " + data +"</td>" +
					"<td> " + Name +"</td>" +
					"<td> Neuer Benutzer </td>" +
					"<td> Neuer Benutzer </td>" +
					"<td> " + Admin +"</td>" +
					"<td> Buttons werden beim Aktualisieren der Seite angezeigt</td>" +
				"</tr>"
			);
		});
	}
}
function DeleteUser(id)
{
	$.post("view/acp/JavaScript/user.del.php",{id:id},function(data)
	{
		$("#id"+id).hide('fast');
    });
}
function EditUser(id)
{
	AdminLevel = $('#Adminlevel'+id).html();
	$('#Adminlevel'+id).html('<input type="text" id="NewAdmin'+id+'" />');
	$('#EditUserButton'+id).hide('fast');
	$('#DeleteUserButton'+id).hide('fast');
	$('#SaveUserButton'+id).show('fast');
	$('#CancelUserButton'+id).show('fast');
}
function CancelUser(id)
{
	$('#Adminlevel'+id).html(AdminLevel);
	$('#EditUserButton'+id).show('fast');
	$('#DeleteUserButton'+id).show('fast');
	$('#SaveUserButton'+id).hide('fast');
	$('#CancelUserButton'+id).hide('fast');
}
function SaveUser(id)
{
	var Admin = $('#NewAdmin'+id).val();
	$.post("view/acp/JavaScript/user.save.php",{id:id,Admin:Admin},function(data)
	{
		$('#Adminlevel'+id).html(Admin);
		$('#EditUserButton'+id).show('fast');
		$('#DeleteUserButton'+id).show('fast');
		$('#SaveUserButton'+id).hide('fast');
		$('#CancelUserButton'+id).hide('fast');
    });
}
</script>