<?php
//export.php]
session_start();
$filename = 'รายชื่อนิสิต.xlsx';
	header('Content-Type: application/xlsx');
	header("Content-type: application/vnd.ms-excel; charset=UTF-8");

	// header('Content-Disposition: attachment; filename=download.xls');
	header('Content-Disposition: attachment;filename="' . $filename . '"');

	echo "\xEF\xBB\xBF"; //UTF-8 BOM
?>