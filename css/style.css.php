<?php
	ob_start ("ob_gzhandler");
	header('Content-type: text/css');
	//Caching
	header("Cache-Control: must-revalidate");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	ob_start("compress");
	function compress($buffer) {
		/* remove comments */
		$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		/* remove tabs, spaces, newlines, etc. */
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
		return $buffer;
	}

	/* your css files */
	
	include('bootstrap.min.css');
	include('bootstrap-responsive.min.css');
	include('bootstrap-extended.min.css');	
	ob_end_flush();
?>