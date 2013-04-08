<?php
	ob_start ("ob_gzhandler");
	header("Content-type: text/javascript; charset: UTF-8");
	//Caching
	header("Cache-Control: must-revalidate");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

	/* your js files */
	include('jquery.js');
	include('bootstrap.min.js');
	include('jquery.smooth-scroll.min.js');
	include('jquery.masonry.js');
	include('prettify.js');
	include('scripts.js');
	ob_end_flush();

?>