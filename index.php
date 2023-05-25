<?php 
// Include database configuration file 
require_once 'dbConfig.php'; 
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- Google Maps JavaScript library -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=Your_API_Key"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    //``````````````````````````var x=document.getElementById("latitude");
	
    function getLocation()
     {
    if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
    else{x.innerHTML="Geolocation is not supported by this browser.";}
    }
    function showPosition(position)
    {
		document.getElementById('latitude').value=position.coords.latitude;
		document.getElementById('longitude').value=position.coords.longitude; 
    }
    getLocation()

function geopage(){
	var lant = document.getElementById('latitude').value;//$('#latitude').val();
	var lont = document.getElementById('longitude').value;
	var distance_km = document.getElementById('distance_km').value;
	
	console.log(lant+ " " +lont+ "km" +distance_km);
	$.ajax({
		type: "POST",
		url: "getGeolocationData.php",
		data: "latitude=" +lant+ "&longitude=" +lont+ "&distance_km="+distance_km,
		beforeSend:function() {
		 /*  $("#role").css('display', 'inline', 'important');  */ 
		},
		success: function(data) { //data is the html of the page where the request is made.
		  /* $('#role').html(data).focus(); */
		  $('.dataCall').html(data);
		  //console.log(data);
		}
	  });
}

</script>
<style type="text/css">
body {
    margin: 10px;
    padding: 0;
}
</style>
</head>
<body onload="geopage()">
	<div class="container">
		<div class="container-fluid">
			<div class="container text-center">
				<form method="post" action="">
					<input type="hidden" name="loc_latitude" id="latitude" value="<?php echo !empty($latitude)?$latitude:''; ?>">
					<input type="hidden" name="loc_longitude" id="longitude" value="<?php echo !empty($longitude)?$longitude:''; ?>">
					<input type="hidden" name="distance_km" id="distance_km" value="3">
				</form>
			  <div class="row dataCall"></div>
			</div>
		</div>
	</div>
</body>
</html>