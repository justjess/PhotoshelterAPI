<?php
	require_once( 'library/photoshelter.class.php' );
	$args = array( 'username' => 'poraschaudhary' );
	$ps = new PHOTOSHELTER($args);
	$user = $ps->user_detail();
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo _CODENAME; ?> v <?php echo _VERSION; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="Photoshelter, PhotoshelterAPI, GitHub Project, Ulhas Vardhan Golchha">
		<meta name="description" content="Unofficial PhotoshelterAPI for putting up the gallery on your non Photoshelter websites.">
		<meta name="author" content="Ulhas Vardhan Golchha">
		<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="css/style.css.php" type="text/css" />
		<link href="https://plus.google.com/100459034318170995980/" rel="publisher">
		<meta property="fb:admins" content="619145803">
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
					<a class="brand" href="./"><?php echo _CODENAME; ?></a>
					<div class="nav-collapse" id="main-menu">
						<ul class="nav pull-right" id="main-menu-rights">
							<li><a href="http://www.technologyunited.in/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Navigation actions', 'Navigation links', 'Technology United']);">Technology United</a></li>
							<li><a href="http://www.ulhas.net/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Navigation actions', 'Navigation links', 'Ulhas Vardhan Golchha']);">Ulhas Vardhan Golchha</a></li>
							<li><a href="https://github.com/golchha21/PhotoshelterAPI/issues" target="_blank" onclick="_gaq.push(['_trackEvent', 'Navigation actions', 'Navigation links', 'Photoshelter Feedback/Issues']);">Feedback/Issues</a></li>
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
							<h1><?php echo _CODENAME; ?><small>v <?php echo _VERSION; ?></small><small><a href="<?php echo _URL; ?>" target="_blank" onclick="_gaq.push(['_trackEvent', 'Body actions', 'Body links', 'GitHub Project']);" title="<?php echo _CODENAME; ?>">GitHub</a></small></h1>
						</div>
					</div>
				</div>
				<?php if ( $user ) { ?>
				<div class="row">
					<div class="span4">
						<div class="page-header">
							<h3><?php echo '<a href="' . $user['_link'] . '" target="_blank" onclick="_gaq.push([\'_trackEvent\', \'Body actions\', \'Body links\', \'' . $user['_title'] . '\']);">' . $user['_title'] . '</a>'; ?><small><?php echo $user['_updated']; ?></small></h3>
						</div>
						<?php echo $ps->list_gallery_names(); ?>
					</div>
					<div class="span8">
						<?php echo $ps->list_gallery(); ?>
					</div>
				</div>
				<?php } ?>
			</section>

			<footer class="footer">
				<div class="row">
					<div class="span4">
						<div class="page-header">
							<h4>Catch me at: </h4>
						</div>
						<ul id="social_icons">
							<li id="facebook"><a data-original-title="Find us on Facebook" id="tfacebook" href="https://www.facebook.com/golchha21" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Facebook']);">Facebook<span></span></a></li>
							<li id="twitter"><a data-original-title="Follow us on Twitter" id="ttwitter" href="https://www.twitter.com/golchha21" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Twitter']);">Twitter<span></span></a></li>     		
							<li id="googleplus"><a data-original-title="Follow us on Google+" id="tgoogleplus" href="https://plus.google.com/100459034318170995980" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Google+']);">Google+<span></span></a></li>
							<li id="linkedin"><a data-original-title="Follow us on LinkedIn" id="tlinkedin" href="http://www.linkedin.com/in/golchha21" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'LinkedIn']);">LinkedIn+<span></span></a></li>
						</ul>
					</div>
					<div class="span8">
						<div class="page-header">
							<h4>Credits: </h4>
						</div>
						<p>Supported by <a href="http://www.technologyunited.in/" id="credittuamc" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Footer links', 'Supported by']);">Technology United</a>. Developed by <a href="http://www.ulhas.net" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Developed by Ulhas Vardhan Golchha']);">Ulhas Vardhan Golchha</a>.<br/>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Apache License v2.0']);">Apache License v2.0</a>.</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="span12">
						<p class="copyright pull-left">Copyright &copy; 2013, <a href="http://www.technologyunited.in/" id="credittuamc" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Footer links', 'Copyright']);" title="Technology United">Technology United</a>. All rights reserved.</p><p class="pull-right"><a href="#top">Back to top</a></p>
					</div>
				</div>
			</footer>

		</div>
		
		<script type='text/javascript' src='js/javascript.js.php'></script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-5397392-9']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</body>
</html>
