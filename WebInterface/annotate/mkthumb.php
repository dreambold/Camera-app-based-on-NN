<?php
require_once('../config/config.php');
if(isset($_GET["filename"])) 
{
	$filename=$_GET["filename"];
	$path=$uploads_dir.'/'.$filename;
	list($width, $height) = getimagesize($path);
	#echo "Debug path:".$path;
	$percent=$image_preview_width/$width;
	$newwidth = $image_preview_width ;
	$newheight = $height * $percent;
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefrompng($path);
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	#echo " Debug new width:".$newheight;
	// Bild laden
	if ($source){
		header('Content-Type: image/png');
		imagepng($thumb);
		imagedestroy($thumb);
	}
}
else {
	echo "No filename";
}
?>