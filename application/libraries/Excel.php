<?php
	require_once('excel/PHPExcel/IOFactory.php');
	require_once('excel/PHPExcel.php');

	class Excel {
	    function get_php_excel() {
	        return new PHPExcel();
	    }
	}
