<?php
session_start();
error_reporting(0);
include('admin/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>OCAS | Home Page</title>

	<!-- Style-sheets -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--// Style-sheets -->
	<!--web-fonts-->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<!--//web-fonts-->
</head>

<body>
	<!-- banner -->
	<div class="banner" id="home">
		<div class="container">
			<!-- header -->
			<header>

				<div class="header-bottom-w3layouts">
					<div class="main-w3ls-logo">
						<h1><a href="index.php"><span class="fa fa-check-square-o" aria-hidden="true"></span>OCAS</a></h1>
					</div>
					<!-- navigation -->
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>

						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a class="active" href="index.php">Home</a></li>
								<li><a href="user/login.php">Students</a></li>
								<li><a href="teacher/login.php">Teacher</a></li>
								<li><a href="admin/login.php">Admin</a></li>
								
							</ul>

						</div>
						<!-- /.navbar-collapse -->

					</nav>
					
				</div>
				<div class="clearfix"></div>
				<!-- //navigation -->
			</header>
			<!-- //header -->
			<!-- banner-text -->
			<div class="banner-text">
				<div class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="slider-info">
								<h3>It is never too late to Study</h3>
								<p>Education Needs Complete Solution</p>
								
							</div>
						</li>
						<li>

							<div class="slider-info">
								<h3>The best learning institute</h3>
								<p>Successful career starts with good training</p>
								
							</div>
						</li>

					</ul>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //banner -->

	<!-- Notice -->
	<div class="testimonials-section">
		<div class="container">
			<h5 class="main-w3l-title">Notice By College</h5>
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<?php
$sql="SELECT * from tblnews";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<li>
							<div class="testimonial-agileits-w3layouts">
								<h3><?php  echo htmlentities($row->Title);?></h3>
								<p><?php  echo substr(($row->Description),0,95);?>. </p>
								<p><?php  echo htmlentities($row->CreationDate);?></p>
							
							</div>
							
							<div class="clearfix"> </div>
						</li>
					<?php $cnt=$cnt+1;}} ?>
			
					</ul>
				</div>
			</section>
		</div>
	</div>
	<!-- Testimonials -->

	<!-- Footer -->
	<div class="footer-agileits-w3layouts">
		<div class="container">
			<div class="btm-logo-w3ls">
				<h2><a href="index.html"><span class="fa fa-check-square-o" aria-hidden="true"></span>OCAS</a></h2>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="copyright-w3layouts">
		<div class="container">
			<p>&copy; 2020 OCAS . Online College Assignment System | </p>
		</div>
	</div>
	<!-- //Footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->


	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->
	<!-- Responsiveslides -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Responsiveslides -->
	<!--search-bar-->
	<script src="js/main.js"></script>
	<!--//search-bar-->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- Js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
	<!-- //Js for bootstrap working -->
</body>

</html>