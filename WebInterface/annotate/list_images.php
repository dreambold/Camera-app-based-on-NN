<!--<html>
<head>
<title>Pictures List</title>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' href="../config/style.css"/>
</head>
<body>
<div id="container">
-->
<?php
$start_list=0;
$end_list=1000;
$to_annotate=1;
$analyzed=0;
$ignored=0;
$ignore_set_id=0;
$ignore_set_to=0;
if(isset($_GET["start"])) $start_list=$_GET["start"];
if(isset($_GET["end"])) $end_list=$_GET["end"];
if(isset($_GET["to_annotate"])) $to_annotate=$_GET["to_annotate"];
if(isset($_GET["analyzed"])) $analyzed=$_GET["analyzed"];
if(isset($_GET["ignored"])) $ignored=$_GET["ignored"];
if(isset($_GET["set_ignore_id"])) $ignore_set_id=$_GET["set_ignore_id"];
if(isset($_GET["set_ignore_to"])) $ignore_set_to=$_GET["set_ignore_to"];
require_once('../config/config.php');
if ($ignore_set_id>0){
	echo "set ID: ".$ignore_set_id." to: ".$ignore_set_to;
	$sql_update_ignore = "UPDATE `pictures` SET `IGNORE`=$ignore_set_to WHERE `PIC_ID`=$ignore_set_id";
	$result_update_ignore = $conn->query($sql_update_ignore);
	echo " update result: ".$result_update_ignore;
} else {
	$sql_select = "SELECT `PIC_ID`, `CAM_ID_LOCAL`,`ANALYZED`,`IGNORE`,`TO_ANNOTATE`, `FILENAME` FROM `pictures` WHERE `TO_ANNOTATE`='$to_annotate' AND `IGNORE`='$ignored' AND `ANALYZED`='$analyzed' LIMIT $start_list,$end_list";
	$result_select = $conn->query($sql_select);
	if ($result_select->num_rows > 0) {
    // output data of each row
    $column_counter=0;
    $columns=3;
    while($row = $result_select->fetch_assoc()) {
    	$filename=$row["FILENAME"];
    	$img_path=$image_path."/".$filename;
    	$pic_id=$row["PIC_ID"];
    	#$cam_id_local=$row["CAM_ID_LOCAL"];
    	if ($column_counter==0) echo "<div class='section'>\n";
    	echo "<div class='button third'>\n";
        #echo "ID: " . $row["PIC_ID"]. "<br> Analyzed: " . $row["ANALYZED"]. "<br> To Annotate: " . $row["TO_ANNOTATE"]. "<br> Ignore: " . $row["IGNORE"]. "<br> <img class='thumbnail' src='" .$img_path.  "'> \n ";
        #echo "<img class='thumbnail' src='" .$img_path.  "' onclick='select_image(\"" .$img_path. "\")'> \n<br> ";
        echo "<img class='thumbnail' src='mkthumb.php?filename=".$filename."' onclick='select_image(\"" .$img_path. "\")'> \n<br> ";
        if ($ignored==1){
        	echo "<div class='button' onclick='set_ignore_flag($pic_id,0)'>don't ignore image ID $pic_id</div>";
        } else {
        	echo "<div class='button' onclick='set_ignore_flag($pic_id,1)'>ignore image ID $pic_id</div>";
        }
        echo "</div>\n";
        $column_counter++;
        if ($column_counter==$columns) echo "</div>\n";
        if ($column_counter==$columns) $column_counter=0;
    }
    $result_select->close();
	} else {
		echo "0 results <br>";
		#printf("Something went wrong with SQL statement: $sql_select \n Error: %s\n", $conn->error);
	}
}

$conn->close();
?>

<!--
</div>
</body>
</html>
-->