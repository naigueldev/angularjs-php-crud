<?php 
include_once('config.php');
$id = $_GET['id'];

if(!empty($id)){

	$sql = "SELECT * FROM posts WHERE id = $id";

	$query  = $con->query($sql);

	if($query->num_rows > 0 ){
		while($row = $query->fetch_array()){
			$id = $row['id'];
			$title = $row['title'];
			$title = $row['title'];
			$description = $row['description'];
			$published_on = $row['published_on'];
			$result = array(
				'id'=>$id,
				'title'=>$title,
				'description'=>$description,
				'published_on'=>$published_on
			);
		}
		$json = $result;
	}else{
		$json = array(
			'status'=>0,
			'msg'=>'Not Found!'
		);
	}
	@mysqli_close();
	header('Content-type: application/json');
	echo json_encode($json);

}
?>