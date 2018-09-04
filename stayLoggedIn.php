<?php
	seesion_start();

	if(array_key_exists("id", $_COOKIE));
	{
		$_SESSION['id'] = $_COOKIE['id'];
	}
	if(array_key_exists("id", $_SESSION)){
		echo <"logged in .. <a href = 'secretDiary.php?logout=1'>LogOut</a>";
	}
	else{
		header("Location : secretDiary.php");
	}
?>