<?php
include_once('config.php');
$title = $_POST['title'];
$description = $_POST['description'];
$today = date('Y-m-d');

$sql = "INSERT INTO posts (title,description,published_on) VALUES ('$title','$description', '$today')";
if($con->query($sql) == TRUE){
  echo "Post Added Succesfully";
}else{
  echo "Failed to Add Post";
}
?>
