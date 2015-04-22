<?php

$files = array('workFile.txt', 'taFile.txt', 'courseFile.txt');

$zipName = 'results.zip';
$zip = new ZipArchive;
$zip -> open('results.zip', ZipArchive::CREATE);
foreach ($files as $file) {
	$zip->addFromString($file, file_get_contents($file));

}
$zip->addFile('tafinderalgorithm.py');
$zip -> close();

if (headers_sent()) {
	echo 'Headers already sent';
} else {
	if (!is_file($zipName)) {
		header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
		echo 'File not found';
	} elseif (!is_readable($zipName)) {
		header($_SERVER['SERVER_PROTOCOL'] . '403 Forbidden');
		echo 'File not readable';
	} else {
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename=' . $zipName);
		header('Content-Length: ' . filesize($zipName));
		readfile($zipName);
	}
}
?>