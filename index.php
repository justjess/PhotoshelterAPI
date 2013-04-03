<?php
	require_once( 'library/photoshelter.class.php' );
	$args = array( 'username' => 'pcruciatti' );
	$ps = new PHOTOSHELTER($args);
	$user = $ps->user_detail();
	//$ps->print_r_pre($ps);
	//$ps->print_r_pre($ps->list_gallery());
	//echo $ps->list_gallery();
	//echo $ps->user_detail();
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Photoshelter API</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Ulhas Vardhan Golchha">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
		  <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/bootstrap-extended.min.css" rel="stylesheet">
		<link href="css/docs.css" rel="stylesheet">
		<link href="css/prettify.css" rel="stylesheet">
	</head>

	<body data-spy="scroll">

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="/">Photoshelter API</a>
					<div class="nav-collapse" id="main-menu">
						<ul class="nav pull-right" id="main-menu-rights">
							<li><a href="http://www.technologyunited.in/">Technology United</a></li>
							<li><a href="http://www.ulhas.net/">Ulhas Vardhan Golchha</a></li>
							<li><a href="http://github.com/golchha21/photoshelter-api/issues">Feedback/Issues</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<section>
				<div class="row">
					<div class="span12">
						<div class="page-header">
							<h1>Photoshelter API<small>v 1.0.0</small></h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span4">
						<div class="page-header">
							<h3><?php echo $user['_title']; ?><small><?php echo $user['_updated']; ?></small></h3>
						</div>
					</div>
					<div class="span8">
						<?php echo $ps->list_gallery(); ?>
					</div>
				</div>
			</section>

			<footer class="footer">
				<div class="row">
					<div class="span4">
						<div class="page-header">
							<h4>Catch me at: </h4>
						</div>
						<ul id="social_icons">
							<li id="email"><a data-original-title="Send us an email" id="temail" href="mailto:hello@ulhas.net" rel="tooltip" target="_blank">Email<span></span></a></li>
							<li id="facebook"><a data-original-title="Find us on Facebook" id="tfacebook" href="https://www.facebook.com/golchha21" rel="tooltip" target="_blank">Facebook<span></span></a></li>
							<li id="twitter"><a data-original-title="Follow us on Twitter" id="ttwitter" href="https://www.twitter.com/golchha21" rel="tooltip" target="_blank">Twitter<span></span></a></li>     		
							<li id="googleplus"><a data-original-title="Follow us on Google+" id="tgoogleplus" href="https://plus.google.com/100459034318170995980" rel="tooltip" target="_blank">Google+<span></span></a></li>
							<li id="linkedin"><a data-original-title="Follow us on LinkedIn" id="tlinkedin" href="http://www.linkedin.com/in/golchha21" rel="tooltip" target="_blank">LinkedIn+<span></span></a></li>
						</ul>
					</div>
					<div class="span8">
						<div class="page-header">
							<h4>Credits: </h4>
						</div>
						<p>Supported by <a href="http://www.technologyunited.in/" id="credittuamc" target="_blank" title="Technology United">Technology United</a>. Developed by <a href="http://www.ulhas.net" target="_blank">Ulhas Vardhan Golchha</a>.<br/>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>.</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="span12">
						<p class="copyright pull-left">Copyright &copy; 2013, <a href="http://www.technologyunited.in/" id="credittuamc" target="_blank" title="Technology United">Technology United</a>. All rights reserved.</p><p class="pull-right"><a href="#top">Back to top</a></p>
					</div>
				</div>
			</footer>

		</div>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.smooth-scroll.min.js"></script>
		<script src="js/jquery.masonry.js"></script>
		<script src="js/prettify.js"></script>
		<script src="js/scripts.js"></script>

	</body>
</html>
