<?php
require_once ('includes/dbConfig.php'); 
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die('Sorry Request must be Ajax POST'); //exit script
}
// Calculate distance and filter records by radius 
$sql_distance = $having = ''; 
/* if(!empty($distance_km) && !empty($latitude) && !empty($longitude)) */
if(isset($_POST) && !empty($_POST)){
$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : "";
$longitude = isset($_POST['longitude']) ? $_POST['longitude'] : "";
$distance_km = isset($_POST['distance_km']) ? $_POST['distance_km'] : "";

	if(!empty($distance_km) && !empty($latitude) && !empty($longitude)){
	$radius_km = $distance_km; 
	$sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((".$longitude."-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance "; 
	$having = " HAVING (distance <= $radius_km) "; 
    $order_by = ' distance ASC ';
	}else{
		$order_by = ' p.id DESC ';
	}  
}
 
// Fetch places from the database 
$sql = "SELECT p.*".$sql_distance." FROM rc_propertylist p $having ORDER BY $order_by"; 
$query = $db->query($sql);
 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
?>
   
   
   <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
										<a href="javascript:void(0);"><img class="img-fluid" src="propertyimage/<?php echo $row['p_img'];?>" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?php echo $row['p_sell_type'];?></div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $row['p_type'];?></div>
                                    </div>
                                    <div class="p-4 pb-0">
										<h5 class="text-primary mb-3">₹<?php echo $row['p_price'];?></h5>
                                        <a class="d-block h5 mb-2" href="javascript:void(0);"><?php echo $row['title'];?></a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['address'];?></p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $row['p_area'];?> Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $row['p_bed'];?> Bed</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $row['p_bath'];?> Bath</small>
                                    </div>
									<div class="p-4 pb-10 text-center">
									<a href="javascript:void(0);" class="smssender btn btn-primary py-0 px-5 me-3">Send Me</a>
									</div>
                                </div>
                            </div>
<?php 
    } 
}else{ 
    echo '<h5>Place(s) not found...</h5>'; 
} 

exit
?>