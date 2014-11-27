<?php
session_start();
define('Dir',__DIR__);
require_once(Dir ."/config.php");
require_once(Dir ."/controll/system/system.class.php");
System::LoadClass("system","page");
System::LoadClass("language","language");

$Languageid = $_GET["lang"];
new Sprache($Languageid);
$page = $_GET['page'];
$action = $_GET['action'];
if(!isset($page)){$page="home";}
System::GetDB()->CreateTables();
?><!DOCTYPE html>
<head>
   <meta charset="utf-8" />
   <title><?php echo $System['Projekt']['Name'];?></title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <link href="assets/bootstrap/css/bootstrap.min.css?v1" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css?v1" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css?v1" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css?v1" rel="stylesheet" />
   <link href="css/style.css?v1" rel="stylesheet" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css?v1" rel="stylesheet" />
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css?v1" rel="stylesheet" type="text/css" media="screen"/>
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script><?php
	System::LoadClass("themecolor","themecolor");
	$tcid = $_GET['tc'];
	new ThemeColor($tcid);
	if(isset($tcid)){header("Location: ?page=$page"); }
   ?>
</head>
<body class="fixed-top">
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <div class="navbar-inner">
           <div class="container-fluid">
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder"></div>
               </div>
               <a class="brand" title="<?php echo $SPRACHE['Navbar']['Home'];?>" href="?page=home">
                   <?php echo $System['Projekt']['Name']; ?>
               </a>
			   
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
			   
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
				   
						<li class="dropdown mtop5"><?php 
							if(!isset($_SESSION['username']))
							{?>
							<a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="?page=auth" data-original-title="<?php echo $SPRACHE['ACP']['Login'];?>">
								<i class="icon-user"></i>
                            </a><?php
						    }
							else
							{?>
							<a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="?page=auth" data-original-title="<?php echo $SPRACHE['ACP']['Logout'];?>">
								<i class="icon-power-off"></i>
                            </a><?php
							}?>
						</li>

				   
                        <li class="dropdown mtop5">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <span class="username"><?php echo $SPRACHE['Color']['ColorName']; ?></span>
                               <b class="caret"></b>
                           </a>
						   
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo "?page=$page&tc=default"?>"><?php echo $SPRACHE['Color']['ColorDefault'];?></a></li>
                               <li><a href="<?php echo "?page=$page&tc=gray"?>"><?php echo $SPRACHE['Color']['ColorGray'];?></a></li>
                               <li><a href="<?php echo "?page=$page&tc=green"?>"><?php echo $SPRACHE['Color']['ColorGreen'];?></a></li>
                               <li><a href="<?php echo "?page=$page&tc=purple"?>"><?php echo $SPRACHE['Color']['ColorPurple'];?></a></li>
                               <li><a href="<?php echo "?page=$page&tc=red"?>"><?php echo $SPRACHE['Color']['ColorRed'];?></a></li>
                           </ul>
                       </li>
					   
					   <li class="dropdown mtop5">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <span class="username"><?php echo $SPRACHE['System']['Lang']; ?></span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo "?page=$page&lang=de"?>"><?php echo $SPRACHE['Lang']['German'];?></a></li>
                               <li><a href="<?php echo "?page=$page&lang=en"?>"><?php echo $SPRACHE['Lang']['English'];?></a></li>
                           </ul>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
   <div id="container" class="row-fluid">
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">
          <ul class="sidebar-menu"><?php
              echo(($page=="home")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=home">
                      <span><?php echo $SPRACHE['Navbar']['Home'];?></span>
                  </a>
              </li><?php
			  echo(($page=="about")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                <a href="javascript:;" class="">
					<span><?php echo $SPRACHE['Navbar']['About'];?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub">
					<?php echo (($action=="vorstellung")? "<li class='active'>" : "<li>");?><a href="?page=about&action=vorstellung"><?php echo $SPRACHE['Navbar']['AboutVorstellung'];?></a></li>
					<?php echo (($action=="chronik")? "<li class='active'>" : "<li>");?><a href="?page=about&action=chronik"><?php echo $SPRACHE['Navbar']['Chronik'];?></a></li>
					<?php echo (($action=="gremien")? "<li class='active'>" : "<li>");?><a href="?page=about&action=gremien"><?php echo $SPRACHE['Navbar']['Gremien'];?></a></li>
                </ul>
            </li><?php
              echo(($page=="schulleben")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=schulleben">
                      <span><?php echo $SPRACHE['Navbar']['SchoolLife'];?></span>
                  </a>
              </li><?php
              echo(($page=="lernbegleitung")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=lernbegleitung">
                      <span><?php echo $SPRACHE['Navbar']['Lernbegleitung'];?></span>
                  </a>
              </li><?php
              /*echo(($page=="berufsorientierung")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=berufsorientierung">
                      <span><?php echo $SPRACHE['Navbar']['Beruf'];?></span>
                  </a>
              </li><?php*/
              echo(($page=="vertretungsplan")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=vertretungsplan">
                      <span><?php echo $SPRACHE['Navbar']['Vertretungsplan'];?></span>
                  </a>
              </li><?php
              echo(($page=="jahresplan")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=jahresplan">
                      <span><?php echo $SPRACHE['Navbar']['Jahresplan'];?></span>
                  </a>
              </li><?php
              echo(($page=="schulleitung")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=schulleitung">
                      <span><?php echo $SPRACHE['Navbar']['Schulleitung'];?></span>
                  </a>
              </li><?php
              echo(($page=="gast")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=gast">
                      <span><?php echo $SPRACHE['Navbar']['Gast'];?></span>
                  </a>
              </li><?php
              echo(($page=="kontakt")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=kontakt">
                      <span><?php echo $SPRACHE['Navbar']['Kontakt'];?></span>
                  </a>
              </li><?php
              echo(($page=="impressum")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                  <a class="" href="index.php?page=impressum">
                      <span><?php echo $SPRACHE['Navbar']['Impressum'];?></span>
                  </a>
              </li><?php
			  if(isset($_SESSION['username'])){
			  echo(($page=="acp")? "<li class='sub-menu active'>": "<li class='sub-menu'>");?>
                <a href="javascript:;" class="">
					<span><?php echo $SPRACHE['Navbar']['ACP'];?></span>
					<span class="arrow"></span>
				</a>
				<ul class="sub">
					<?php echo (($action=="user")? "<li class='active'>" : "<li>");?><a href="?page=acp&action=user"><?php echo $SPRACHE['Navbar']['ACPUser'];?></a></li>
					<?php echo (($action=="termin")? "<li class='active'>" : "<li>");?><a href="?page=acp&action=termin"><?php echo $SPRACHE['Navbar']['ACPTermin'];?></a></li>
                </ul>
            </li><?php } ?>
          </ul>
      </div>
      </div>
	  <?php
		if($page=="acp")
		{
			new Page(2,$_GET['action']);
		}
		else
		{
			new Page(1,$page);
		}
	  ?>
	</div>
	<div id="footer">
		<?php echo $SPRACHE['System']['Footer'];?>
	</div>
   
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="js/jquery.sparkline.js" type="text/javascript"></script>
	<script src="assets/chart-master/Chart.js"></script>
	<script src="js/common-scripts.js"></script>
	<script src="js/easy-pie-chart.js"></script>
	<script src="js/sparkline-chart.js"></script><?php
		ThemeColor::SetSideBar();
   ?>
</body>
</html>