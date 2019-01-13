<?php 
include_once('config.php');
$id = $_GET['id'];

if(!empty($id)){

	$sql = "DELETE FROM posts WHERE id = $id";

	$query  = $con->query($sql);

	if($query){
		$result = array('status' => 1, 'msg' => "Post Deleted Successfully" );
	}else{
		$result = array('status' => 1, 'msg' => "Failed to delete post!" );
	}
	@mysqli_close();
	header('Content-type: application/json');
	echo json_encode($result);

}
?>