<?php 
global $SPRACHE;

if(isset($_SESSION['username']))
{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; URL=index.php?page=auth'>";
}
else
{
?>
<div id="main-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
            </div>
        </div>   
		
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4">
				<div class="widget <?php echo ThemeColor::GetStyle();?>">
					<div class="widget-title">
						<h4><?php echo $SPRACHE['ACP']['Login'];?></h4>
					</div>
					<div class="widget-body"><center>
						<form class="form-horizontal">
							<div id="success" class="alert alert-block alert-success fade in" style="display:none"><?php echo $SPRACHE['ACP']['LoginSuccess'];?></div>
							<div id="danger" class="alert alert-block alert-error fade in" style="display:none"><?php echo $SPRACHE['ACP']['LoginDanger'];?></div>
							<label for="Name"><b><?php echo $SPRACHE['ACP']['LoginUserName'];?></b></label>
							<input type="text" name="Name" id="Name" type="text" class="span6">
							<br/><br/>
							<label for="Pass"><b><?php echo $SPRACHE['ACP']['LoginUserPass'];?></b></label>
							<input type="password" name="Pass" id="Pass" class="span6">
							<br/><br/>
							<input type="button" onclick="CheckLogin()" class="btn btn-primary" value="<?php echo $SPRACHE['ACP']['LoginButton'];?>"/>
						</form>
					</div>
				</div>
			</div>
			<div class="span4"></div>
        </div>   
    </div>
</div>
<script type="text/javascript">
function CheckLogin()
{
	var Names = $("#Name").val();
	var Passwd = $("#Pass").val();
	$.post("view/login/login.php",{Name:Names,Pass:Passwd},function(data)
	{
		if(data==1)
		{	
			$('#success').toggle('slow');
			$.post("view/login/login.php",{Edit:Names},function(news){});
			setTimeout(function(){window.location.href="?page=acp&action=user";}, 4000);
		}
		else
		{
			$('#danger').toggle('slow');
		}
    });
}
</script><?php
}?>