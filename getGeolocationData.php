<?php
require_once 'dbConfig.php';

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
$sql = "SELECT p.*".$sql_distance." FROM places p $having ORDER BY $order_by"; 
$query = $db->query($sql);
 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
?>
   <!--  <div class="pbox"> 
        <h4><?php echo $row['title']; ?></h4> 
        <p><?php echo $row['address']; ?></p> 
        <?php if(!empty($row['distance'])){ ?> 
        <p>Distance: <?php echo round($row['distance'], 2); ?> KM<p> 
        <?php } ?> 
    </div> --> 
<!-- <div class="row"> -->
	<div class="col-sm-4 d-grid gap-3 py-2">
		<div class="card">
			<img src="img/img_avatar1.png" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $row['title']; ?></h5>
				<p class="card-text"><?php echo $row['address']; ?></p>
				<?php if(!empty($row['distance'])){ ?> 
				<p>Distance: <?php echo round($row['distance'], 2); ?> KM<p> 
				<?php } ?> 
				<a href="#" class="btn btn-primary">Send Me</a>
			</div>
		</div>
	</div>
   <!--  <div class="col-sm">col-sm</div>
    <div class="col-sm">col-sm</div> -->
  <!-- </div> -->


	
	
	
	
<?php 
    } 
}else{ 
    echo '<h5>Place(s) not found...</h5>'; 
} 

exit
?>



<?php 


exit;

if(isset($_POST) && !empty($_POST)){
  $userid = isset($_SESSION['userId_session_']) ? $_SESSION['userId_session_'] : "";
  $userrole = isset($_SESSION['role_session_']) ? $_SESSION['role_session_'] : "";
  
  $cateid = isset($_POST['category_id']) ? $_POST['category_id'] : "";
  
  if(isset($_POST['permission']) && $_POST['permission'] == "active")
	  $request = " AND status ='1' ";
  else
	  $request = "";
  if($userrole==1 || $userrole==5)
	  $rowcolor = "style='background-color:#ffc6b3!important;-webkit-appearance:none;'";
  else
	  $rowcolor = "";
  
 
?>
<!--<select name="role" id="role1" class="input-short validate[required]">-->
<?php
  if($userrole == 2)
	  $users=getTableDataByCond2('rc_users',"role='$cateid' AND reporting_manager='$userid' $request AND deleted='0' ORDER BY full_name ASC");
  else
	  $users=getTableDataByCond2('rc_users',"role='$cateid' $request AND deleted='0' ORDER BY concat(status) DESC, full_name");

  if(mysql_num_rows($users) > 0){
	  while($user = mysql_fetch_assoc($users)) {
?>
	  <option value="<?php echo $user['id']; ?>" <?php if(!$user['status']){echo $rowcolor;} ?>>
<?php 
$user_agent_osSm = getenv("HTTP_USER_AGENT");
if(strpos($user_agent_osSm, "Mac") !== FALSE){
	if(!$user['status']){
		echo "<span>❌</span>";
	}else{
		echo "&emsp;";
	}
}
?>
	  <?php echo ucwords($user['full_name']); ?>
	  </option>
<?php
	  }
  } else {
?>
	  <option value="">--- Select Role ---</option>
<?php
  }
?>
<!--</select>-->
<?php
}
?>