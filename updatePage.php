<?php
	include("connections.php");

	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cont = $_POST['content'];
	$_SESSION['data'] = $cont;

	$qUpdate = "UPDATE `notes` SET `content`= '".$cont."' WHERE `id` = ".$id;
	// $qInsert = "INSERT INTO `notes` (`id`,`email`, `password`,`content`) VALUES (12,'".$email."','".$password."','".$cont."')";

	 mysqli_query($db,$qUpdate)

?>
