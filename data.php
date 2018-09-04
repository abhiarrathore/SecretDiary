<?php
	session_start();

	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	$id = $_SESSION['id'];
	$data = $_SESSION['data'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>diary</title>
	<link rel="stylesheet" href="bootstrap.css">
	<style>
		body{
			background-color: white;
		}
		header{
			height: 80px;
			background-color: rgb(180,180,180);
			color:white;
		}
		textarea{
			display: block;
			width: 100%;
			margin: auto;
			margin-top: 10px;
			background-color: lightgrey;
			font-weight: bold;
			/*font-size: 1.3em;*/
		}
		#save{
			margin-top: 15px;
			margin-left: 90%;
		}
		#logout{
			display: inline;
			margin-left: 90%;
			/*margin-top: 20px;*/
		}
		#headmail{
			font-size: 30px;
			text-align: center;
		}
		.floatingdev1{
			float: left;
			margin-left: 10%;
			margin-top: 15px;
		}
		.floatingdev2{
			position: absolute;
			float: left;
			margin-left: 80%;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<header>
		<div class="floatingdev1">
			<?php
				echo "<span id = 'headmail'>  Welcome $email</span>";
			?>
		</div>
		<div class="floatingdev2">
			<a href ='secretDiary.php?logout=1' class="btn btn-success-outline">
        <button class="btn btn-success-outline" id = "logout">Logout</button></a>
		</div>


	</header>
	<div class = "container">
		<textarea rows="25" id = "idea"><?php echo $data; ?>
		</textarea>
		<button class="btn btn-success" id = "save">SAVE</button>
	</div>

	<script src = "jquery-3.2.1.js"></script>
	<script type ="text/javascript">
		var but = document.getElementById('save');
		var logout = document.getElementById('logout');
		var textarea = document.getElementById('idea');

		var email = " <?php echo $email ?> ";
		var password = " <?php echo $password ?> ";
		var id = " <?php echo $id ?> ";
		but.addEventListener('click',function(){
			var content = textarea.value;
			alert("event : " + email + " " + content);

			$.ajax({
				method:"POST",
				url:"updatePage.php",
				data:{id : id ,email : email , password : password ,content:content}
			});

		},false);

		logout.addEventListener('click',function(){
			window.location.replace("secretDiary.php");
		})
	</script>
</body>
</html>
