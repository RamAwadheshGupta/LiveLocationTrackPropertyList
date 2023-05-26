        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
					<div class="col-lg-4 col-md-6" id="getintouch">
						<h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Gauravdeep Heights, B 23 A - 6th Floor, behind Fortis Hospital, Noida, Uttar Pradesh 201301</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>088007 70770</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@urbanavenues.in</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-4">Photo Gallery</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
					<div class="row">
						<div class="col-md-12 text-center mb-3 mb-md-0">
							&copy; <a class="border-bottom" href="#">Urban Avenues</a>, All Right Reserved. 
							<a class="border-bottom" href="https://www.urbanavenues.in/">UA</a>
                        </div>
						<!-- <div class="col-md-6 text-center text-md-end text-md-start ">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
$('.smssender').click(function() {
	console.log("ok");
	/* var $row = $(this).closest("tr");    // Find the row
    var $smscname = $row.find(".smsname").text();
	var $smscmobile = $row.find(".smsmobile").text();
	var $smscproject = $row.find(".smsproject").text();
	var $smsphone = $row.find(".smsuphone").val();
    
	$("#clientname").text($smscname);
	$("#clientmobile").text($smscmobile);
	$("#clientproject").text($smscproject);
	$("input[id='cname']").val($smscname);
	$("input[id='cphone']").val($smscmobile);
	$("input[id='project']").val($smscproject);
	
	$("#uphone").val($smsphone); */
	
    $('#myModal_5').modal('show');
});
$('#cancelsms').click(function() {
	$('#myModal_5').modal('hide');
});
});
</script>
</body>

</html>