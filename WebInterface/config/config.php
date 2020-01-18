<?php
$servername = "localhost";
$username = "inventocam";
$password = "Safe4Inventocam";
$dbname = "inventocam";
$uploads_dir = '/home/projects/image_upload';
$image_path = '/images';
$image_preview_width=1000;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>