<?php
	session_start();

	if(array_key_exists('LogIn', $_POST)){
		 include("connections.php");

		$i = 0;
		$data="";
		$id;
		$email = $_POST['email'];
		$password = $_POST['password'];
		$qSel = "SELECT * FROM `notes`";

		 if($result = mysqli_query($db,$qSel)){
		 	while($row = mysqli_fetch_array($result)){
				if($row['email'] == $email && $row['password'] == $password){
					$i = 1;
					$id = $row['id'];
					$data = $row['content'];
					break;
				}
		 	}
		 }
		if($i==1){
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['id'] = $id;
			$_SESSION['data'] = $data;
    	echo '<meta http-equiv="refresh" content="1; URL=data.php" />';
    }
		else{
			echo '<meta http-equiv="refresh" content="1; URL=invalid.php" />';
		}
	}
	else if(array_key_exists('SignUp', $_POST)){
		$db = mysqli_connect("localhost","root","","users");
		if(mysqli_connect_error()){
			die("database connection unsuccessful");
		}

		$email = $_POST['email'];
		$password = $_POST['password'];
		$qSel = "SELECT * FROM `notes`";

		$emailTaken = 0;
		if($result = mysqli_query($db,$qSel)){
		 	while($row = mysqli_fetch_array($result)){
				if($row['email'] == $email){
					$emailTaken = 1;
				}
		 	}
		 }

		if($emailTaken == 0){
			$qInsert = "INSERT INTO `notes` (`id`, `email`, `password`,`content`) VALUES (NULL,'".$email."','".$password."',' ')";

			if(mysqli_query($db,$qInsert)){
				echo '<meta http-equiv="refresh" content="1; URL=signUpSuccessfull.php" />';
			}
			else{
				echo "there was a problem registering the user";
			}
		}
		else{
			echo "email is already taken";
		}


	}

?>
