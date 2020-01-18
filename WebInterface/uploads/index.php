<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="../config/favicon.svg" sizes="any">
    <link rel="icon" type="image/png" href="../config/favicon.png" sizes="96x96">
    <link rel="stylesheet" type="text/css" href="../config/style_imageloader.css">.
    <title>Image Uploader</title>
  </head>
<body>
<?php
require_once('../config/config.php');
?>
<div id="uploadcontainer">
	<form action="upload.php" enctype="multipart/form-data" id="person" method="post">
	<div class="section">
		<label class="h2" form="person">Upload Image</label>
	</div>
	<div class="section">
		<label for="key" class="formlabel">Key</label> 
		<input type="text" name="key" id="key" maxlength="30">
	 </div><div class="section">
		<label for="upfile" class="formlabel">Image</label>  
		<input type="file" name="upfile" id="upfile" accept="image/*" text="upload">
	</div><div class="section">
		<button type="submit">Submit</button>
	</div>
	</form>
</div>
</body>