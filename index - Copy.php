<?php 
// Include database configuration file 
require_once 'dbConfig.php'; 
 
// If search form is submitted 
if(isset($_POST['searchSubmit'])){ 
    if(!empty($_POST['location'])){ 
        $location = $_POST['location']; 
    } 
     
    if(!empty($_POST['loc_latitude'])){ 
        $latitude = $_POST['loc_latitude']; 
    } 
     
    if(!empty($_POST['loc_longitude'])){ 
        $longitude = $_POST['loc_longitude']; 
    } 
     
    if(!empty($_POST['distance_km'])){ 
        $distance_km = $_POST['distance_km']; 
    } 
} 
 
// Calculate distance and filter records by radius 
$sql_distance = $having = ''; 
if(!empty($distance_km) && !empty($latitude) && !empty($longitude)){ 
    $radius_km = $distance_km; 
	$sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((".$longitude."-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance "; 
     
    $having = " HAVING (distance <= $radius_km) "; 
     
    $order_by = ' distance ASC '; 
}else{ 
    $order_by = ' p.id DESC '; 
} 
 
// Fetch places from the database 
$sql = "SELECT p.*".$sql_distance." FROM places p $having ORDER BY $order_by"; 
$query = $db->query($sql); 
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

	
    var x=document.getElementById("latitude");
	
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
		
    /* x.innerHTML="Latitude: " + position.coords.latitude;/*  + 
    "<br>Longitude: " + position.coords.longitude ;*/  
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
/* var searchInput = 'location';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
	
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        document.getElementById('latitude').value = near_place.geometry.location.lat();
        document.getElementById('longitude').value = near_place.geometry.location.lng();
    });
});

$(document).on('change', '#'+searchInput, function () {
    document.getElementById('latitude').value = '';
    document.getElementById('longitude').value = '';
}); */


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
   <!--  <input type="text" name="location" id="location" value="<?php echo !empty($location)?$location:''; ?>" placeholder="Type location..."> -->
    <input type="hidden" name="loc_latitude" id="latitude" value="<?php echo !empty($latitude)?$latitude:''; ?>">
    <input type="hidden" name="loc_longitude" id="longitude" value="<?php echo !empty($longitude)?$longitude:''; ?>">
	<input type="hidden" name="distance_km" id="distance_km" value="3">
	
    <!-- <select name="distance_km">
        <option value="">Distance</option>
        <option value="5" <?php echo (!empty($distance_km) && $distance_km == '5')?'selected':''; ?>>+5 KM</option>
        <option value="10" <?php echo (!empty($distance_km) && $distance_km == '10')?'selected':''; ?>>+10 KM</option>
        <option value="15" <?php echo (!empty($distance_km) && $distance_km == '15')?'selected':''; ?>>+15 KM</option>
        <option value="20" <?php echo (!empty($distance_km) && $distance_km == '20')?'selected':''; ?>>+20 KM</option>
    </select> -->
    <!-- <input type="submit" name="searchSubmit" value="Search" /> -->
</form>
  <div class="row dataCall">
    <!-- <div class="col">
      <div class="dataCall"></div>
    </div> -->
  </div>
</div>

  
  </div>
</div>


<?php 
/* if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){  */
?> 
    <!-- <div class="pbox"> 
        <h4><?php echo $row['title']; ?></h4> 
        <p><?php echo $row['address']; ?></p> 
        <?php if(!empty($row['distance'])){ ?> 
        <p>Distance: <?php echo round($row['distance'], 2); ?> KM<p> 
        <?php } ?> 
    </div>  -->
<?php 
/*     } 
}else{ 
    echo '<h5>Place(s) not found...</h5>'; 
} */ 
?>
</body>
</html>