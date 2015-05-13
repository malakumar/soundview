// $("#hiddenNYC_2").css("display", "none");

/*** LOCATION STUFFS *** /
//
//
*/
var location_timeout = setTimeout("geolocFail()", 10000);

var latitude;
var longitude;

var sendMessage = false;

var timerVariable;

getLocation();

function getLocation() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(showPosition, function(error) {
            clearTimeout(location_timeout);
            console.log("heyyyy");
            // alert(JSON.stringify(error));
            //alert("Your location settings are disabled. To enable on iPhone, go to: \n Settings > General > Reset > Reset Location");
            geolocFail();
        });
    } else {
        $("#loc_copy").text("Geolocation is not supported by this browser.");
    }
}

function geolocFail() {
    console.log("failed at getting geolocation");
    //$("#loc_copy").text("Unable to get Location");
}

function showPosition(position) {
    //clearTimeout(location_timeout);
    //$("#loc_copy").text("Location Found!").hide( "drop", { direction: "down" }, "slow" );
    //$("#loc_copy").text("Location Found!").delay(1000).hide("slow", null);
    //$("#loc_copy").text("Location Found!");
    $("#loc_copy").delay(5000).fadeTo("slow", 0.0);

    // $('.toggle-modal').click(function(){
    //     $('#myModal').modal('toggle');
    // }); 

    //to see an alert when you see a location
    //alert("Location found!");
    //modal is a classier version
    // part of bootstrap - maybe use bootstrap! :)
    // p5 sound in p5js.org

    //http://www.sitepoint.com/use-html5-vibration-api/

    //start time counter
    //var timeCounter = 0;

    function myTimer() {
      //var d = new Date();
      //timeCounter = timeCounter + 1;
        //console.log(timeCounter);
        getLocation();
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;


        console.log(latitude);
        console.log(longitude);
        //longitude = Math.abs(position.coords.longitude);



        //console.log(d.toLocaleTimeString());
        // document.getElementById("demo").innerHTML = d.toLocaleTimeString();


        if ((latitude > 40.735300) && (latitude < 40.738000)) {
            //console.log("You're in the target");
            sendMessage = true;
            //alert("You're in the target");
        }
    
        if (sendMessage === true) {
            //$('#myModal').modal('toggle');
            // setTimeout("$('#myModal').modal('toggle');", 1000);

            alert("you're in");
            $("#intro").show();
            // $("#myModal").showModal();
            //setTimeout("alert('You are in the target');", 1000);
            clearInterval(timerVariable);

        }


        if (latitude === undefined) {
            $("#loc_copy").text("Loading...");
        } else {
            $("#loc_lat").text('latitude: ' + latitude); //display in footer
            $("#loc_lon").text('longitude: ' + longitude); //display in footer
        }

    }

    
    if (timerVariable)clearInterval(timerVariable);
    timerVariable = setInterval(function () {
        myTimer();
        console.log(sendMessage);
    }, 5000);


    // var latitude = position.coords.latitude;
    // var longitude = position.coords.longitude;



    //console.log("got location >> lat: " + latitude + "  lon: " + longitude);

    // $("#_lat").val(latitude); //set form value
    // $("#_lon").val(longitude); //set form value
    // $("#loc_lat").text('latitude: ' + latitude); //display in footer
    // $("#loc_lon").text('longitude ' + longitude); //display in footer
    // alert(">>lat: "+ position.coords.latitude +
    // " >>lon: " + position.coords.longitude);

// $("#explore_button").click(function() {
//     // assumes element with id='button'
//     //console.log("poop!");
//      $("#hiddenNYC_1").css("display", "none");
//      $("#hiddenNYC_2").css("display", "");
// });
}

// $(document).ready(function(){
//     $('#explore_button').live('click', function(event) {
//          $('#hiddenNYC_1').toggle('show');
//     });
// });