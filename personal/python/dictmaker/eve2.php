
<html>
<head>
<title>Eve</title>
<style>
@font-face {
	src: url('./microphone.ttf');
	font-family: microphone;
}
@font-face {
	src: url('./helvetica2.ttf');
	font-family: myFont;
}
body {
	overflow-x:hidden;
	font-family:myFont;
	background-color:rgba(0,0,0,0.9);
	/*background-color: rgba(0,0,0,0.85);*/
}
#title {
	font-size: 3em;
	font-weight: lighter;
}

#footer {
	position: fixed;
	bottom:0px;
	color:#8a8a8a;
	text-align: center;
	width:100%;
	max-width: 100%;
	background-color: black;
	left:0px;
	z-index: 1000;
	display: none;
}
#tosend {
	line-height: 1em;
	font-size: 1em;
	padding:5px;
	width:50%;
	border-radius: 10px;
	border: 3px solid #b2b2b2;
	background-color: black;
	outline-width: 0px;
	/*box-shadow: 0 0 10px white;*/
	color: #dddddd;
	/*padding-left: 15px;*/
	text-align: center;
}

#doer {
	max-height: 75%;
	margin-top: 40px;
}
.splash {
	color:white;
	width:100%;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	position: relative;
	margin-top: 10%;
	margin-bottom: auto;
	z-index: 100;
}
.examples {
	color:white;
	width:100%;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	position: relative;
	margin-top: 5%;
	margin-bottom: auto;
	display:none;
	z-index: 100;
}
.results {
	color:white;
	width:100%;
	margin-right: auto;
	margin-left: auto;
	position: relative;
	margin-top: 0%;
	margin-bottom: auto;
	display:none;
	left:0px;
	z-index: 100;
}
#userquery {
	/*width:100%;*/
	padding:20px;
	font-size: 2em;
	text-align: center;
	left:0px;
	background-color: rgba(255,255,255,0.1);
}
#stuff {
	width: 100%;
	padding-left:20px;
	padding-right: 20px;
	padding-top:10px;
	margin-top: -20px;
}
/*.splash {
	color:blue;
	-webkit-transition:border-color 5s,color .5s;
	-moz-transition:border-color 5s,color .5s;
	-o-transition:border-color 5s,color 5s;
	transition:border-color 5s,color 5s;
}*/
.examples span {
	display: block;
	padding:15px;
}
.splash span {
	display: block;
	padding:15px;
}
.splash #lvl1 {

	font-size: 4em;
}
.splash #lvl2 {
	font-size: 1.5em;
	margin-top: 20px;
}
.splash #lvl3 {
	margin-top: 150px;
	color:#d0d0d0;
}
.examples #lvl1 {
	font-size: 2.5em;
}
.examples p {
	display: inline-block;
	padding: 15px;
	margin-left: 15px;
	margin-right: 15px;
	font-size: 1.2em;
	border: 1px solid #d0d0d0;
	border-radius: 10px;


}
.examples p:hover {
	cursor: pointer;
	background-color: white;
	color:black;
}
big {
	font-size: 1.4em;
}
.maincontainer {
	/*background-color: ;*/
	width:100%;
	max-width: 100%;
	padding-bottom: 50px;
	position: absolute;
	top:0px;
	left:0px;
	right:0px;
}
#fblogin {
	width:50%;
	max-width: 50%;
	background-color: black;
	color:white;
	padding:20px;
	border-radius: 10px;
	font-size: 1.5em;
	border: 0px;
}
#timeres {
	text-align: center;
}
</style>


<link rel="stylesheet" href="./project/microphone.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<!-- <span id="microphone" ></span> -->

<div class="maincontainer">
<div class="splash">
	<span id="lvl1">Hi, I'm Eve!</span>
	<span id="lvl2">Your intelligent virtual assistant, here to help.</span>
	<span id="lvl3">Developed by Mrinal Dhar &copy; 2014</span>
</div>

<div class="examples">
	<span id="lvl1">A few things you can say...</span>
	<span id="lvl2">
		<p>Tell me something about Plantago ovata</p>
		<p>What do you know about Bill Gates?</p>
		<p>What is the weather gonna be like today?</p>
		<p>Post to facebook: Having fun in Miami!</p>
		<p>What time is it?</p>
		<p>Whats on my calender for today?</p>
		<p>Tell me a nerdy joke</p>
		<p>Who is Mrinal Dhar?</p>
		<p>Note this down: I spent 4 bucks on coffee today</p>
		<p>Check my facebook</p>
		<p>Do I have new email?</p>
	</span>
</div>

<div class="results">
<p id="userquery"></p>
<p id="stuff"></p>
</div>

</div>


<div id="footer"><p><div id="microphone"></div>
<!-- <pre id="result">hi</pre>
<div id="info">yo</div> -->
<br /><input type="text" id="tosend" name="tosend" value="Type to Talk" />

<div id="status">
</div></p></div>

<script src="./js/jquery.js"></script>
<script src="./js/blur.js"></script>
<script>
var textbar = document.getElementById('tosend');
$('.examples #lvl2>p').click(function() {
	document.getElementById('tosend').value = this.innerHTML;
	doajax();
	textbar.value="Processing...";
	$('#stuff').html('');
	// alert('hi');
});
	
$('#tosend').click(function() {

	$('.splash').slideUp();
	$('.examples').slideDown();
	this.value='';
	$('#tosend').focus();
});
var splash;
splash=0;
document.onkeypress = function (e) {
	if (splash==0)
	{
    e = e || window.event;
    $('#tosend').click();
    // use e.keyCode
    splash=1;
}
};
textbar.onkeypress = function (e) {
    e = e || window.event;
    if (e.keyCode==13)
    {
    	doajax();
    	textbar.value='Processing...';
    	$('#stuff').html('');
    	$('#tosend').blur();
    }
    // use e.keyCode
  type: "GET",
  data: { Body: tosend },
  dataType: "mp3",
  crossDomain: true,
  success:function(data){
  	
  }
});
      		//http://api.voicerss.org/?key=258fceb90f65421a822b780dfcde5e40&src=hi%20how%20are%20you&hl=en-us&r=0
      	}
function doajax() {

var tosend = document.getElementById('tosend').value;
$(".examples").slideUp();
	$('.results').slideDown();
	$('#userquery').html('<i>"'+tosend+'"</i>');
tosend=encodeURI(tosend);
$.ajax({
  url: "proxy.php?url=http%3A%2F%2Feve-develop.herokuapp.com%2F",
  type: "GET",
  data: { Body: tosend },
  dataType: "html",
  crossDomain: true,
  success:function(data){
  	data = data.split('<')[0];
  	// alert(data);
  	wit = JSON.parse(data);
  	process(wit);
  }
});
}
var printthis;
	var connectstat;
	var weatherres;
	 var users = {};
	 var speakthis;
function process(wit)
{

  	switch (wit.outcome.intent) {
            case "greetings":
                printthis = "<big>Hello there!</big>";
                break;
            case "get_joke":
                printthis=wit.result;
                break;
            case "introduce":
            	printthis = "<big>My name is Eve and I am here to help you out with stuff.</big>";
                break;
            case "tell_me_something":
                printthis = wit.result;
                break;
            case "undefined":
            	printthis = "<big>I'm sorry, I dont recognize that command.</big>";
            	break;
            case "intro_mrinal":
                printthis = "<big>Mrinal Dhar is a second year undergrad at International Institute of Information Technology, Hyderabad. <br />He created Eve (that is, me) in May, 2014. He is responsible for teaching me how to talk to you and respond to what you say. </big>";
                break;
            case "get_time":
            update_time();
            update_date();
            	printthis = "<center><div id='timeres'><span id='thetime' style='font-size: 5em;'>"+timenow.hours+":"+timenow.minutes+"</span> <big>"+timenow.suffix+"<br />"+timenow.day+", "+timenow.date+"<sup>"+timenow.thval+"</sup> "+timenow.month+" "+timenow.year+"</big></div></center>";
            	break;
      	
            case "get_whether":
               getLocation();
               // alert(weatherres);
               // printthis = weatherres;
			break;
			case "get_me":
			if (connectstat==0)
			{
			printthis = "<button onclick='logintofacebook()' id='fblogin'>Login to Facebook</button>";
			}
			else {
				alert('checking...');
				update_user();
				printthis = users.name;
			}
				break;
           
            default:
                printthis = JSON.stringify(wit);
        }

  	$(".examples").slideUp();
  	$('#stuff').html(printthis);
	$('.results').slideDown();
	textbar.value='';
	$('#tosend').focus();
}
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(get_weather, showerror);
    }
  else{
  	alert('geolocation not supported');
  }
  }
  function showerror(error) {
  	// switch(error.code) 
   //  {
   //  case error.PERMISSION_DENIED:
   //    alert("User denied the request for Geolocation.");
   //    break;
   //  case error.POSITION_UNAVAILABLE:
   //    alert("Location information is unavailable.")
   //    break;
   //  case error.TIMEOUT:
   //    alert("The request to get user location timed out.")
   //    break;
   //  case error.UNKNOWN_ERROR:
   //    alert("An unknown error occurred.")
   //    break;
   //  }
    get_weather({'coords': {'latitude':'0', 'longitude':'0'}});
  }

function get_weather(position) {
	$('#stuff').html("<big>Loading weather information...</big>");
// alert(position.coords.latitude + position.coords.longitude); 
	 $.ajax({
  url : "weatherproxy.php?url="+position.coords.latitude+","+position.coords.longitude,
  dataType : "html",
  success : function(dataw) {
  weatherres = JSON.parse(dataw);
  // alert('hi');
  var temp = weatherres.currently.apparentTemperature;
  temp = ((temp - 32) * 5)/9;
  temp = parseInt(temp);
  var humidity = weatherres.currently.humidity;
  var summary = weatherres.hourly.summary;
  var precip = weatherres.currently.precipProbability;
  // alert(weatherres.currently.precipProbability.toString()+"%");
  // printthis = "<div id='timeres' style='text-align:center;width:100%'><span id='thetime' style='font-size: 5em;'>"+weatherres.currently.apparentTemperature+"&deg;</span> <big><br />"+weatherres.currently.hourly.summary+"<br />Humidity: "+weatherres.currently.humidity+"%<br />Chance of Rain: "+weatherres.currently.precipProbability+"%</big></div>";
  document.getElementById('stuff').innerHTML="<center><div id='timeres'><span id='thetime' style='font-size: 5em;'>"+temp+"&deg; C</span><br /><big>"+summary+"<br /><br />Humidity: "+humidity*100+"%<br />Chance of Rain: "+precip+"%</big></div></center>";
  }
});

}
function update_time(){
      	var currentTime=new Date();
      	var hours=currentTime.getHours();
      	var minutes=currentTime.getMinutes();

      	if (minutes<10)
      		minutes="0"+minutes;
      	var suffix = "AM";
      	if (hours>=12){
      		suffix="PM";
      		hours=hours-12;
      	}
      	if (hours==0) {
      		hours=12;
      	}
      	timenow = {'hours':hours, 'minutes':minutes, 'suffix':suffix};
      	}
function update_date(){
      		var currentDate=new Date();
      		var day = currentDate.getDay();
      		var date=currentDate.getDate();
      		var month=currentDate.getMonth();
      		var year=currentDate.getFullYear();
   			var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      		var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      		var thvals = ["th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th"];
      		var thval;
      		thval = thvals[(date%10)];
      		day = days[day];
      		month = months[month];
      		timenow.day = day;
      		timenow.date = date;
      		timenow.month = month;
      		timenow.year = year;
      		timenow.thval = thval;
      	}
      	
</script>
<script src="./project/microphone.js"></script>
<script>
    var mic = new Wit.Microphone(document.getElementById("microphone"));
    var info = function (msg) {
      document.getElementById("tosend").value = msg;
    };
    mic.onready = function () {
      info("Tap the Mic or Start typing");
    };
    mic.onaudiostart = function () {
      info("I'm listening...");
    };
    mic.onaudioend = function () {
      info("Processing...");
    };
    mic.onerror = function (err) {
      info("Error: " + err);
    };
    mic.onresult = function (intent, entities) {
    	// wit='';
    	// wit = {'outcome': { 'intent': intent, 'entities':entities}};
    	// process(wit);
      var r = kv("intent", intent);

      for (var k in entities) {
        var e = entities[k];

        if (!(e instanceof Array)) {
          r += kv(k, e.value);
        } else {
          for (var i = 0; i < e.length; i++) {
            r += kv(k, e[i].value);
          }
        }
      }
      alert('done');
      document.getElementById('stuff').innerHTML = r;
    };
    mic.connect("JRD44YMUSTXCE3CYGEEK5PJGE7UKO3PJ");
    // mic.start();
    // mic.stop();

    function kv (k, v) {
      if (toString.call(v) !== "[object String]") {
        v = JSON.stringify(v);
      }
      return k + "=" + v + "\n";
    }

  </script>
  <script>
$('#footer').css("max-height", screen.height/4-20);

// $('#footer').css("height", screen.height/4-20);
$('.maincontainer').css("padding-bottom", screen.height/4);
$(document).ready(function() {
	
// For Development purposes only. Do not activate otherwise.
	// $(".examples").slideUp();
	// var printer;
	// update_time();
	// update_date();
	// printer = 
 //  	$('#stuff').html(printer);
	// $('.results').slideDown();
	// textbar.value='';
	// $('#tosend').focus();
	// $('.splash').slideUp();
// 

window.setTimeout(function() { 
$('#footer').slideDown(400);
  }, 2000);
});
</script>
<script>
  // This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      connectstat = 1;
    } else if (response.status === 'not_authorized') {
      connectstat = 0;
    } else {
      connectstat = 0;
    }
  }


  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1439267539663879',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };
 
function update_user() {
	FB.api('/me', function(response) {
      			users = response;
    			});
}
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
function logintofacebook() {
FB.login(function(response) {
   statusChangeCallback(response);
 }, {scope: 'public_profile,email'});
}
function testAPI() {
	alert('login');
}
</script>
</body>
</html>