<?php	
include '../config.php';
if($_GET['act'] == 'add_save'){
	
	$sql="INSERT INTO man (title,content,createtime,userid) VALUES ('".$_POST['add_title']."','".$_POST['add_content']."',NOW(),'".$_SESSION['userid']."')";
	
	if(!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo 1;
}else if($_GET['act'] == 'pre_update'){
	
	$sql = mysqli_query($con,"SELECT * FROM man WHERE id ='".$_POST['id']."' and userid = '".$_SESSION['userid']."'");
	
	$row = mysqli_fetch_array($sql);
	
	echo json_encode($row);
}else if($_GET['act'] == 'update_save'){
	
	$sql="UPDATE man SET title = '".$_POST['update_title']."',content = '".$_POST['update_content']."' WHERE id = '".$_POST['id']."'";
	
	if(!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo 1;
}else if($_GET['act'] == 'delete'){
	
	$sql="DELETE FROM man WHERE id='".$_POST['id']."'";
	
	if(!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo 1;
}

mysqli_close($con);
?>
