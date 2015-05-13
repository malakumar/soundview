<?php


// Execute config to connect to database & start session
    require("includes/main.php");

if( isset( $_GET['action'] ) )
   if( "login" == $_GET['action'] ) {
      $action_value = "login.php";
      $subheading = $button_value = "login";
   }
   else
      if( "register" == $_GET['action'] ) {
         $action_value = "register.php";
         $subheading = $button_value = "register";
      }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Soundview NY</title>
	<meta name="author" content="Matthew Howell" />
	<meta name="description" content="Sonic Exploration of New York" />
	<meta name="keywords"  content="sound, psychgeography, new york, exploration" />
	<meta name="Resource-type" content="Document" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>

<div id="content">

<nav id="stickynav">
<ul id="menu">
	<span class="logo-nav">
		<a href="a.parsons.edu/~kumam802/soundview#firstPage"><img class="img-hover" src="img/soundview_logo4.png"></img></a>
	</span>
	<span class="top-nav">
		<li data-menuanchor="firstPage" class="active"><a href="#firstPage">Begin</a></li> <!--login and registration-->
		<li data-menuanchor="secondPage"><a href="#secondPage">Explore</a></li> <!--home page with email prompt-->
		<li data-menuanchor="3rdPage"><a href="#3rdPage">About</a></li> <!--how it works-->
	</span>

</ul>
</nav>

<div id="fullpage">
	<!-- coordinates -->
	<!-- <div id="loc_copy"></div>
	  	<div id="loc_lat"></div>
  		<div id="loc_lon"></div> -->
  	<!-- coordinates -->

	<div class="section" id="section0">
		<div class="intro">
		<h1>Explore</h1>
         <!-- <p><?php echo $subheading ?></p> -->
         <p>Would you like to <a href="./index.php?action=register">register</a> or <a href="./index.php?action=login">login?</a></p>
      <form action="<?php echo $action_value; ?>" method="post">
         <p><input type="text" name="username" placeholder="username" required autofocus></p>
         <!-- <p><input type="text" name="email" placeholder="email" id="email" /></p> -->
         <p><input type="password" name="password" placeholder="password" required></p>
         <p><input type="hidden" name="submitted" value="1"></p>
         <p><input type="submit" value="<?php echo $button_value; ?>"></p>
      </form>

      <!--needs to direct user to home page after successful registration and login>

    <!-<div id="map-canvas" style="width: 100%; height: 100%"> -->
    </div>
	</div>

	<div class="section" id="section1">
		<div class="intro">
			<h1>About</h1>
			<h2>placeholder</h2>
		</div>
	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>FAQ</h1>
			<h2>placeholder</h2>
		</div>
	</div>
</div>
</div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

	<script type="text/javascript" src="js/jquery.fullPage.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
			  sectionsColor: ['#E8555F', '#A978A5', '#2083BF','#66538A', '#2083BF', '04223E'],
			  anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage', '5thPage', '6thPage'],
			  menu: '#menu',
			  continuousVertical: true
			});
		});
	</script>

</html>
