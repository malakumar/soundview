<?php
require("includes/config.php");

// Execute config to connect to database & start session

    require("includes/main.php");

if( isset( $_GET['action'] ) ){
   if( "login" == $_GET['action'] ) {
      $action_value = "login.php";
      $subheading = $button_value = "login";
   }
   else
      if( "register" == $_GET['action'] ) {
         $action_value = "register.php";
         $subheading = $button_value = "register";
      }
    }else{
    $action_value = "login.php";
      $subheading = $button_value = "register";  
    }
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Soundview NY</title>
   <meta name="author" content="Mala Kumar" />
   <meta name="description" content="Sonic Exploration of New York" />
   <meta name="keywords"  content="sound, psychgeography, new york, exploration" />
   <meta name="Resource-type" content="Document" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="http://a.parsons.edu/~kumam802/favicon.ico?" type='image/x-icon' />
   <link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" />
   <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>

<div id="content">

<nav id="stickynav">
<ul id="menu">
   <span class="logo-nav">
      <a href="#firstPage"><img class="img-hover" src="img/soundview_logo4.png"></img></a>
   </span>
   <span class="top-nav">
      <li data-menuanchor="firstPage" class="active"><a href="#firstPage">Start</a></li> <!--login and registration-->
      <!-- <li data-menuanchor="secondPage" class="active"><a href="#secondPage">Create Playlist</a></li> --> <!--login and registration-->
      <!-- <li data-menuanchor="3rdPage"><a href="#3rdPage">Explore</a></li> --> <!--home page with email prompt-->
      <li data-menuanchor="about"><a href="#about">About</a></li> <!--how it works-->
   </span>

</ul>
</nav>

<div id="fullpage">
   <!-- coordinates -->
   <!-- <div id="loc_copy"></div>
      <div id="loc_lat"></div>
      <div id="loc_lon"></div> -->
   <!-- coordinates -->

   <div class="section" id="section0" name="firstPage">
      <div class="intro">
      <h1>Start here to begin your sonic exploration of New York!</h1>
      <h3>Once you have registered, you can then create your playlist for others to discover, 
        or access the sounds of the city! <a href="./index.php?action=register"><strong>Register</strong></a> or <a href="./index.php?action=login"><strong>login</strong></a> 
        to create your Soundview Playlist!</h3>
      </br>
      <form action="<?php echo $action_value; ?>" method="post">
         <ul id="begin">
            <li>Username: <input type="text" name="username" placeholder="username" required autofocus></li>
         <!-- <p><input type="text" name="email" placeholder="email" id="email" /></p> -->
            <li>Password: <input type="password" name="password" placeholder="password" required></li>
            <li><input type="hidden" name="submitted" value="1"></li>
            <li><input type="submit" value="<?php echo $button_value; ?>"></li>
      </ul>
      </form>

      <!--needs to direct user to home page after successful registration and login>
    
    <!-<div id="map-canvas" style="width: 100%; height: 100%"> -->
    </div>
   </div>


   <!-- <div class="section" id="section1">
      <div class="intro">
         <h1>Create Your Playlist</h1>
         <p>Fill out this form to create your location-based playlist!</p>
      </br>
<form action="upload.php" method="post" enctype="multipart/form-data">
<div id="create-playlist">
   <div class="one">
      <ul class="title">
         <li>Name: <input type="text" name="name" placeholder="Your Name" required autofocus></li>
         <li>Title: <input type="text" name="title" placeholder="Title of Your Playlist" required></li>
      </ul>
   </div> -->
         <!-- <p><input type="text" name="email" placeholder="email" id="email" /></p> -->
<!-- </br>
     <div class="two">
      <ul class="tag1">        
            <li>Song title: <input type="text" name="song" placeholder="Song Title"></li>
            <li>Artist: <input type="text" name="artist" placeholder="Artist Name"></li>
            <li>Location: <input type="text" name="location" placeholder="Please list cross streets" required></li>
      </ul>
   </div>
  <br>
     <div class="three">
      <ul class="tag2">
         <li>Song title: <input type="text" name="song" placeholder="Song Title"></li>
         <li>Artist: <input type="text" name="artist" placeholder="Artist Name"></li>
         <li>Location: <input type="text" name="location" placeholder="Please list cross streets" required></li>
      </ul>
   </div>
 <br>
     <div class="four">
      <ul class="tag3">
            <li>Song title: <input type="text" name="song" placeholder="Song Title"></li>
         <li>Artist: <input type="text" name="artist" placeholder="Artist Name"></li>
         <li>Location: <input type="text" name="location" placeholder="Please list cross streets" required></li>
            <li><input type="submit" id="send_file" value="Submit Form"></li>


      </ul>

    </div>
 -->
    <!-- </div>

      </form>

   </div>
</div>
      <div class="section" id="section2">
      <div class="intro">
         <h1>Explore</h1>
         <p>Text +13473454240 to start!</p>
      </div>
   </div> -->

   <div class="section" id="about" name="about">
      <div class="intro">
         <h1>What is Soundview NY?</h1>
         <h3>
          Soundview NY is a platform for the exploration and discovery of serendipitous musical 
          moments around New York City and its boroughs. Use it as a way to leave your sonic footprint on
          the areas you know well, add dimension to your playlists, find stories left behind by other users,
          and uncover the hidden musical histories of the neighborhoods of New York. <a href="#firstPage"><strong>Sign up</strong></a> now to create your
          first playlist!
          </br>
        </br>
          Created by Mala Kumar for Major Studio II. <a href="mailto:kumam802@newschool.edu"><b>Email</b></a> her or 
          visit her website <a href="discocammata.com"><b>here</b></a>.
          </h3>
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
           // sectionsColor: ['#E8555F', '#66538A', '#2083BF','#66538A', '#2083BF', '04223E'],
           anchors: ['firstPage', 'about'],
           menu: '#menu',
           autoScrolling: false
         });
      });
   </script>

</html>
