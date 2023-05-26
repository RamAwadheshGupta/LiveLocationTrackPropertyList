<?php 
require_once ('includes/dbConfig.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UA - Real Estate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<?php include('includes/header.php');?>
        <!-- Property List Start -->
		<div class="container-xxl py-5" id="proplist">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-12">
                        <div class="text-center mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Hand Picked Projects For You</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
					<div class="container text-center">
					<div id="latitudes"></div>
					<form method="post" action="">
						<input type="hidden" name="loc_latitude" id="latitude" value="<?php echo !empty($latitude)?$latitude:''; ?>">
						<input type="hidden" name="loc_longitude" id="longitude" value="<?php echo !empty($longitude)?$longitude:''; ?>">
						<input type="hidden" name="distance_km" id="distance_km" value="3">
					</form>
					</div>
						<div class="row g-4 dataCall">
                            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img class="img-fluid" src="img/property-1.jpg" alt=""></a>
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">,345</h5>
                                        <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    </div>
                            									<div class="p-4 pb-10 text-center">
                            									<a href="" class="btn btn-primary py-0 px-5 me-3 animated fadeIn">Send Me</a>
                            									</div>
                                </div>
                            </div> -->                           
                            <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                            </div> -->
                        </div>
                    </div>
                </div>
				
				<!-- SMS Modal -->
<div id="pop_SMS" class="popUpDiv1">
  <div style="width:100%;">
    <form id="smsform">
      <table class="table" style="margin:0;">
        <tr>
          <td>Client's Name</td>
          <td><span style="font-weight:bold" id="clientname"></span>
            <input name="cname" id="cname" type="hidden" value="" /></td>
        </tr>
        <tr>
          <td>Client's Phone</td>
          <td><span style="font-weight:bold" id="clientmobile"></span>
            <input name="cphone" id="cphone" type="hidden" value="" /></td>
        </tr>
        <tr>
          <td>Project</td>
          <td><span style="font-weight:bold" id="clientproject"></span>
            <input name="project" id="project" type="hidden" value="other" /></td>
        </tr>
        <tr>
          <td>User Phone</td>
          <td><span style="font-weight:bold" id="clientproject"></span>
            <input name="project" id="project" type="hidden" value="other" />
          </td>
        </tr>
        <tr>
          <td><input type="submit" class="btn btn-default" id="smsshootnow" href="javascript:void(0);" value="Send SMS" /></td>
          <td><a class="btn btn-default" id="cancelsms_" href="javascript:void(0);">Cancel</a></td>
        </tr>
      </table>
    </form>
  </div>
</div>			
<div class="modal fade" id="myModal_5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">  
	<!-- Modal content-->
	<div class="modal-content">
		  <div class="modal-body">
				<div class="formbox2">
					  <h1><?php //echo $projectname; ?>Urban Avenues<span></span></h1>
					<div class="col-sm-12 top_form" style="position:relative;">
					<h2>Contact With Us!</h2>
					<form id="callback-save5" class="enquiryform clearfix">
					<div id="note"></div>
						<div class="form_inner1">
						  <input type="text" name="name" id="name" class="form-control1" maxlength="100" placeholder="Full Name" required />
							<input type="text" name="mob10" id="mob10" class="form-control1" maxlength="13" placeholder="Phone Number" required />
							<input type="hidden" name="mobile" id="mobile" value="" />
							<input type="email" name="email" id="email" class="form-control1" placeholder="Email Address" required />
							<!-- <textarea name="message" class="form-control1" rows="3" placeholder="Query(Optional)..."></textarea> -->
							<input type="submit" name="submit" value="Send" id="submit" class="btn btn btn-warning btn-block" />
							<input type="hidden" name="project" value="<?php //echo $projectcode; ?>" />
							<input type="hidden" name="projectname" value="<?php //echo $projectname; ?>" />
							<input type="hidden" id="urllist" name="urllist" value="<?php //echo $link; ?>" class="form-control" />
							<input type="hidden" id="ip" name="ip" value="<?php //echo $ip; ?>" class="form-control" />
							<button type="button" class="btn btn-light float-end" id="cancelsms" href="javascript:void(0);">Cancel</button>
						</div>
					</form>
				   </div>
				</div>
			</div>
		</div>
	</div>
</div>				
							
            </div>
        </div>
        <!-- Property List End -->
<?php 
include('includes/footer.php');
?>