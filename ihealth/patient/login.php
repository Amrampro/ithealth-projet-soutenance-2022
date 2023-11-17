<?php
require "../_classes/allclasses.php";
require "../_functions/functions.php";
require "../_configs/db.php";

session_start();
if(!empty($_SESSION["idpihealth"])){
	header("Location: index.php");
}
$login = $msg = null;
if (isset($_POST["login"])) {
	$user = $_POST["user"];
	$pass = $_POST["pass_confirmation"];
	$login = Patient::login($db, $user, $pass);
	if($login == true){
		header("Refresh: 5; index.php");
		$msg = '<span style="color:green">Connexion réussi. Redirection dans <span id="countdown"></span></span>';
	} else {
		$msg = '<span style="color:red">Informations invalide</span>';
	}
}
?>
<!DOCTYPE html>
<html>


<head>
	<?php require "../_includes/head.php" ?>
</head>

<body class="auth-bg">
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
	<!-- Color Changer -->
	<div class="theme-settings" id="switcher">
		<span class="theme-click">
			<span class="ti-settings"></span>
		</span>
		<span class="theme-color theme-default theme-active" data-color="green"></span>
		<span class="theme-color theme-blue" data-color="blue"></span>
		<span class="theme-color theme-red" data-color="red"></span>
		<span class="theme-color theme-violet" data-color="violet"></span>
		<span class="theme-color theme-yellow" data-color="yellow"></span>
	</div>
	<!-- /Color Changer -->
	<div class="wrapper">
		<!-- Page Content  -->
		<div id="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 auth-box">
						<div class="proclinic-box-shadow">
							<h3 class="widget-title">Connexion</h3>
							<form class="widget-form" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
							<center><?= $msg ?></center>
								<!-- form-group -->
								<div class="form-group row">
									<div class="col-sm-12">
										<input name="user" placeholder="Username" class="form-control" required="" data-validation="length alphanumeric" data-validation-length="3-12"
										 data-validation-error-msg="User name has to be an alphanumeric value (3-12 chars)" data-validation-has-keyup-event="true">
									</div>
								</div>
								<!-- /.form-group -->
								<!-- form-group -->
								<div class="form-group row">
									<div class="col-sm-12">
										<input type="password" placeholder="Password" name="pass_confirmation" class="form-control" data-validation="strength" data-validation-strength="2"
										 data-validation-has-keyup-event="true">
									</div>
								</div>
								<!-- /.form-group -->
								<!-- Check Box -->		
								<div class="form-check row">
									<div class="col-sm-12 text-left">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input" type="checkbox" id="ex-check-2">
											<label class="custom-control-label" for="ex-check-2">Se souvenir de moi</label>
										</div>
									</div>
								</div>
								<!-- /Check Box -->	
								<!-- Login Button -->			
								<div class="button-btn-block">
									<button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Connecter</button>
								</div>
								<!-- /Login Button -->	
								<!-- Links -->	
								<div class="auth-footer-text">
									<small>Nouveau utilisateur,
										<a href="sign-up.html">Créer un compte</a> Ici</small>
								</div>
								<!-- /Links -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content  -->
	</div>
	<?php require "../_includes/endscripts.php" ?>
	<script>
		var timeleft = 4;
		var downloadTimer = setInterval(function(){
			if (timeleft <= 0) {
				clearInterval(downloadTimer);
				document.getElementById("countdown").innerHTML = "En cours";
			} else {
				document.getElementById("countdown").innerHTML = timeleft + " secondes...";
			}
			timeleft -=1;
		}, 1000);
	</script>
</body>


</html>
