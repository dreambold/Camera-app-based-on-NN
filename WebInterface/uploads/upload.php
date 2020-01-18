<?php
error_reporting(E_ALL | E_STRICT);
require_once('../config/config.php');
$is_active=0;
$debug=0;
$image_needs_renaming=false;
$image_needs_resampling=false;
$file_available=false;
$insert_into_sql=false;
#echo '{ "cam_id":"'. $is_active.'","client_id":"'. $is_active.'","is_active":"'. $is_active.'"}';
if ($debug>=1) {
		echo 'debug: uploaded files'.print_r($_FILES["upfile"]["tmp_name"]).'\n\n<br><br>';
		echo 'debug: uploaded fields'.print_r($_POST).'\n\n<br><br>';
}
if(isset($_FILES["upfile"]["name"])) {
	$file_available=true;
	$incoming_file_name=$_FILES["upfile"]["name"];
	$temp_file_name=$_FILES["upfile"]["tmp_name"];
	$destination = $uploads_dir."/".$incoming_file_name;
	if ($debug>=1) {
			echo 'debug: destination of file: '.$destination.'\n\n<br><br>';
	}	
}
if(isset($_POST['key'])){
	$key_received=$_POST['key'];
	$sql_select = "SELECT `CAM_ID_LOCAL`,`CAM_ID_REMOTE`,`CLIENT_ID`,`ACTIVE`,TIME_TO_SEC(`CAPTURE_INTERVAL`),TIME_TO_SEC(`POLL_INTERVAL`),
	`MAX_WIDTH`,`MAX_HEIGHT`,`CAPTURE_ASAP`,`GET_UPDATE`,`LIGHT_ON`,`CAM_TYPE_ID` FROM `cameras` WHERE `CAM_KEY`='$key_received'";
	if ($debug>=1) {
		echo 'debug: SQL select '.$sql_select.'\n\n<br><br>';
	}
	$result_select = $conn->query($sql_select);
	$is_active=0;
	$get_update=0;
	$stored_key=0;
	if ($result_select->num_rows == 1) {
		// output data of each row
		while($row = $result_select->fetch_assoc()) {
			$is_active=$row["ACTIVE"];
			$cam_id_local=$row["CAM_ID_LOCAL"];
			$cam_id_remote=$row["CAM_ID_REMOTE"];
			$get_update=$row["GET_UPDATE"];
			$max_width=$row["MAX_WIDTH"];
			$max_height=$row["MAX_HEIGHT"];
			$cam_type_id=$row["CAM_TYPE_ID"];
			$client_id=$row["CLIENT_ID"];
			echo '{"cam_id":"'.$cam_id_remote.'", "client_id":"'.$client_id.'", "is_active":"'.$is_active.'", "capture_interval":"'.$row['TIME_TO_SEC(`CAPTURE_INTERVAL`)'].'", 
			"poll_interval":"'.$row['TIME_TO_SEC(`POLL_INTERVAL`)'].'", "get_update":"'.$row['GET_UPDATE'].'","light_on":"'.$row['LIGHT_ON'].'", "capture_asap":"'.$row['CAPTURE_ASAP'].'"}';
		}
		$result_select->close();
	} else {
		echo "0 results <br>";
	}
	$sql_update = "UPDATE `cameras` SET `GET_UPDATE`=0 WHERE `CAM_KEY`='$key_received'";
	$conn->query($sql_update);
	$sql_update = "UPDATE `cameras` SET `LAST_CONTACT`=NOW() WHERE `CAM_KEY`='$key_received'";
	$conn->query($sql_update);
}

if ($is_active>0){
	$do_sql_query=1;
	#echo "request accepted, image will be stored \n";
	if ($file_available){
		if ($cam_type_id>1){
			$image_needs_renaming=true;
			$save_filename="Client_".str_pad($client_id,10,"0",STR_PAD_LEFT)."_Cam_".str_pad($cam_id_remote,10,"0",STR_PAD_LEFT)."_Pic_".date('Y_m_d__h_i_s').".png";
			$save_path=$uploads_dir."/".$save_filename;
			list($width, $height) = getimagesize($temp_file_name);
			if ($width>$max_width || $height>$max_height){
				$image_needs_resampling=true;
				if ($width/$max_width>=$height/$max_height){
					$scalefactor=$max_width/$width;
					$newwidth=$max_width;
					$newheight=$height*$scalefactor;
				}
				else {	
					$scalefactor=$max_height/$height;
					$newheight=$max_height;
					$newwidth=$width*$scalefactor;
				}
			} else {
				$newwidth=$width;
				$newheight=$height;
			}
			$image_type_id=exif_imagetype ($temp_file_name);
			if ($image_type_id==IMAGETYPE_JPEG){
				$image_needs_resampling=true;
				$source = imagecreatefromjpeg($temp_file_name);
			}
			else if ($image_type_id==IMAGETYPE_PNG && ($newwidth!=$width || $newheight!=$height)){
				$image_needs_resampling=true;
				$source = imagecreatefrompng($temp_file_name);
			}
			else {
				echo "Wrong file type, only jpg and png supported now\n<br><br>";
				$do_sql_query=false;
			}
			if ($image_needs_resampling){
				$do_sql_query=true;
				$new_image = imagecreatetruecolor($newwidth, $newheight);
				imagecopyresampled($new_image, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			}
			
			$sql_insert = "INSERT INTO `pictures` (`CAM_ID_LOCAL`, `TIME_INCOMING`, `TO_ANNOTATE`, `ANALYZED`, `IGNORE`,`FILENAME`,`LASTCHANGE`) VALUES ('$cam_id_local',NOW(),1,0,0,'$save_filename',NOW());";
		} else {
			$sql_insert = "INSERT INTO `pictures` (`CAM_ID_LOCAL`, `TIME_INCOMING`, `TO_ANNOTATE`, `ANALYZED`, `IGNORE`,`FILENAME`,`LASTCHANGE`) VALUES ('$cam_id_local',NOW(),1,0,0,'$incoming_file_name',NOW());";
		}
		if ($do_sql_query) $conn->query($sql_insert);
		if ($conn->error > 0) {
			printf("Something went wrong with SQL statement: $sql_insert \n Error: %s\n", $conn->error);
		// output data of each row
		} else {
			echo "inserted into database\n";
			if ($image_needs_resampling){
				imagepng($new_image, $save_path);
				imagedestroy($new_image);
			} else if ($image_needs_renaming){
				move_uploaded_file($temp_file_name,$save_path);
			} else {
				move_uploaded_file($temp_file_name,$destination);
			}
			
		}
	}
}
else {
	echo "<br><br>\n\nrequest rejected \n";
	#unlink($temp_file_name);
}

$conn->close();
?>