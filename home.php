<?php
/**
 * The home page of a registered user
 *
 * If a user’s login credentials have been verified by the logic in
 * “login.php,” then $_SESSION['valid'] is set to true and the user is redirected
 * here. If $_SESSION['valid'] is not true, then the user is redirected to the index
 * page.
 *
 * A valid user can upload files using the form on this page, and see the files
 * she/he has uploaded.
 *
 * PHP version 5.3.28
 *
 * @category Web_App
 * @package  Web_App
 * @author   Roy A Vanegas <roy@thecodeeducators.com>
 * @license  https://gnu.org/licenses/gpl.html GNU General Public License
 * @link     https://bitbucket.org/code-warrior/web-app/
 */

session_start();

if (isset($_SESSION['valid'])) {
    if ($_SESSION['valid'] !== true) {
        header("Location: ./index.php#firstPage");
    }
} else {
    header("Location: ./home.php");
}

require_once "includes/db.php";
require_once "includes/main.php";

$username = select("username", "user", "username", $_SESSION['username']);

$links = getAllFileLinksFor($_SESSION['username']);

$amount_of_links = count($links);

?>
<!DOCTYPE HTML>
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
      <li data-menuanchor="secondPage" ><a href="#secondPage">Create Playlist</a></li> <!--login and registration-->
      <li data-menuanchor="3rdPage"><a href="#3rdPage">Explore</a></li> <!--home page with email prompt-->
      <li data-menuanchor="4thPage"><a href="#4thPage">How It Works</a></li> <!--how it works-->

   </span>

</ul>
</nav>

<div id="fullpage">

   <div class="section" id="section0" name="firstPage">
      <div class="intro">
        <h1>Welcome to Soundview!</h1> 
        <p>Click <a href="#secondPage"><strong>here</strong></a> to get started. Or <a href="./logout.php"><strong>logout!</strong></a></p>
      <dl>
<?php
for ($index = 0; $index < $amount_of_links; $index++) {
    echo "         <dd><a href=\"uploads/$links[$index]\">$links[$index]</a></dd>\n";
}
?>
      </dl>
      </div>
   </div>

<div class="section" id="section1" name="secondPage">
      <div class="intro">
         <h1>Create Your Playlist</h1>
         <p>Fill out this form to create your location-based playlist!</p>
      </br>
<form action="submit.php" method="post" enctype="multipart/form-data">
<div id="create-playlist">
   <div class="one">
      <ul class="title">
         <li>Title: <input type="text" name="title" placeholder="Title of Your Playlist" required autofocus></li>
         <li>Description: <input type="text" name="description" placeholder="Playlist Description" required></li>
      </ul>
   </div>
         <!-- <p><input type="text" name="email" placeholder="email" id="email" /></p> -->
</br>
     <div class="two">
      <ul class="tag1">        
            <li>Song title: <input type="text" name="song1" placeholder="Song Title"></li>
            <li>Artist: <input type="text" name="artist1" placeholder="Artist Name"></li>
            <li>Location: <input type="text" name="location1" placeholder="Please list cross streets" required></li>
            <li>Story: <input type="text" name="info1" placeholder="Story behind the sound" required></li>

      </ul>
   </div>
  <br>
     <div class="three">
      <ul class="tag2">
         <li>Song title: <input type="text" name="song2" placeholder="Song Title"></li>
         <li>Artist: <input type="text" name="artist2" placeholder="Artist Name"></li>
         <li>Location: <input type="text" name="location2" placeholder="Please list cross streets" required></li>
         <li>Story: <input type="text" name="info2" placeholder="Story behind the sound" required></li>
      </ul>
   </div>
 <br>
     <div class="four">
      <ul class="tag3">
            <li>Song title: <input type="text" name="song3" placeholder="Song Title"></li>
         <li>Artist: <input type="text" name="artist3" placeholder="Artist Name"></li>
         <li>Location: <input type="text" name="location3" placeholder="Please list cross streets" required></li>
         <li>Story: <input type="text" name="info3" placeholder="Story behind the sound" required></li>
            <li><input type="submit" id="send_file" value="Submit Form"></li>


      </ul>

    </div>

    </div>

      </form>

   </div>
</div>
      <div class="section" id="section2" name="3rdPage">
      <div class="intro">
         <h1>Explore</h1>
         <h4>Here at Soundview, we encourage getting lost and wandering around the city. When you come across
          a red Soundview tag on a corner, text <strong>347-345-4240</strong> with its cross streets
          to receive messages users have left in that location.
            </br>
          </br>
          Access Wynn's playlist for Bushwick by texting the inputs to the number above!
        </br>
      </br>
          <ul id="location-id">
            <li>Moore and White</li>
            <li>Harrison and Bogart</li>
            <li>McKibbin and Bushwick</li>
            <li>Bogart and Moore</li>
            <li>McKibbin and Seigel</li>
          </ul>
        </h4>
      </div>
   </div>

   <div class="section" id="section3" name="4thPage">
      <div class="intro">
         <h1>How It Works</h1>
          </br>
         <div id="img-container">
        
         <span class="howitworks"><h4><img id="img-tag" src="img/paper_icon_graffiti.jpg"></img>Soundview works by collecting your playlists along with the location information you provide
        and generating SMS messages for each song. One of our field agents will then physically visit and mark 
        those locations with our tag. Users gain access to the content when they come across a tag  
        and text a specially designated number with the cross streets at which the tag is located. 
      </br></br>Happy meandering! 
          </h4></span>
        
         </div>
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
           // sectionsColor: ['#E8555F', '#A978A5', '#2083BF','#66538A'],
           anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage'],
           menu: '#menu',
           // continuousVertical: true
           autoScrolling: false
         });
      });
   </script>
</html>
