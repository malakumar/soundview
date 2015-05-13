<?php

session_start();

require_once "includes/main.php";
$username = $_SESSION['username'];

$title  = $_POST["title"];
$description = $_POST["description"];

$song1 = $_POST["song1"];
$artist1 = $_POST["artist1"];
$location1 = $_POST["location1"];
$info1 = $_POST["info1"];

$song2 = $_POST["song2"];
$artist2 = $_POST["artist2"];
$location2 = $_POST["location2"];
$info2 = $_POST["info2"];

$song3 = $_POST["song3"];
$artist3 = $_POST["artist3"];
$location3 = $_POST["location3"];
$info3 = $_POST["info3"];



submitsongtitles($username,$title,$description,$song1,$artist1,$location1,$info1,$song2,$artist2,$location2,$info2,$song3,$artist3,$location3,$info3);

?>