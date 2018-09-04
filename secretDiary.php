<?php
    session_start();

    if (array_key_exists("logout", $_GET)) {
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";

        session_destroy();
    }
		else if ((array_key_exists("email", $_SESSION) OR (array_key_exists("email", $_COOKIE))) AND (array_key_exists("password", $_SESSION) OR (array_key_exists("password", $_COOKIE)))) {
        header("Location: data.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
<?php
	include("header.php");
?>
</head>
<body>
	<h1>SECRET DIARY ?</h1>
	<h2> Store your thought pemanently and securely ....</h2>
		<div class="container">
			<form method= "post" action = "diaryNotes.php" id = "signupform">
				<input type="text" name="email"  class = "form-control" placeholder="Enter email" required="required"><br>
				<input type="password" name="password"  class = "form-control" placeholder="Enter password" required="required"><br>
				<label for="check" id="checkLabel">Stay logged in..<input type="checkbox" name="stayLoggedIn" id = "check"></label><br>
				<input type="submit" id = "SignUP" value = "SignUp" class="btn btn-info" name="SignUp">
				<p><a class="toggleform">Login</a></p>
			</form>

			<form method= "post" action = "diaryNotes.php" id ="loginform">
				<input type="text" name="email"  class = "form-control" placeholder="Enter email"  required="required"><br>
				<input type="password" name="password"  class = "form-control" placeholder="Enter password" required="required"><br>
				<label for="check">Stay logged in..<input type="checkbox" name="stayLoggedIn" id = "check"></label><br>
				<input type="submit" id = "LogIn" value = "LogIn" class="btn btn-info" name="LogIn">
				<p><a class="toggleform">Signup</a></p>
			</form>


		</div>

		<script src = "jquery-3.2.1.js"></script>
		<script type = "text/javascript">
			$('.toggleform').click(function(){
				$("#loginform").toggle();
				$("#signupform").toggle();
			});
		</script>
</body>
</html>
