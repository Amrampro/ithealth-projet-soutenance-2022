<?php
require "../_classes/allclasses.php";
require "../_functions/functions.php";
require "../_configs/db.php";

$errors = [];
$mat = "IHP" . matricule();
$d_success = "none";
$d_error = "none";
if (!empty($_POST)) {
	extract($_FILES);
	extract($_POST);
	if (empty($nom))
		$errors = "Nom invalide";
	if (empty($prenom))
		$errors = "Prenom invalide";
	if (empty($datenais))
		$errors = "Date de naissance invalide";
	if (empty($tel))
		$errors = "Telephone invalide";
	if (empty($email))
		$errors = "Email invalide";
	if (empty($genre))
		$errors = "Genre invalide";
	if (empty($adresse))
		$errors = "Adresse invalide";
	if (empty($groupsanguin))
		$errors = "Group Sanguin invalide";
	if (empty($motdepasse))
		$errors = "Mot de passe invalide";
	if (empty($photo))
		$errors = "Photo invalide";
	if (empty($question))
		$errors = "Question invalide";
	if (empty($reponse))
		$errors = "Reponse invalide";
	if (empty($errors)) {
		$photo = $_FILES["photo"]["name"];
		$res = Patient::register($db, $nom, $prenom, $genre, $adresse, $groupsanguin, $datenais, $photo, $mat, $email, $tel, $motdepasse, $question, $reponse);
		// var_dump($res);
		// die();
		if ($res == true) {
			$d_success = "block";
			$d_error = "none";
		} else {
			$d_success = "none";
			$d_error = "block";
		}
	} else {
		$d_success = "none";
		$d_error = "block";
	}
}
?>
<!DOCTYPE html>
<html>


<head>
	<?php include("../_includes/head.php") ?>
</head>

<body>
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
		<!-- Sidebar -->
		<?php include("_partials/sidebar.php") ?>
		<!-- /Sidebar -->
		<!-- Page Content -->
		<div id="content">
			<!-- Top Navigation -->
			<?php include("_partials/navbar.php") ?>
			<!-- /Top Navigation -->
			<!-- Breadcrumb -->
			<!-- Page Title -->
			<div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Ajouter Patient</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Patients</li>
						<li class="breadcrumb-item active">Add Patient</li>
					</ol>
				</div>
			</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid">

				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title">Ajouter un patient</h3>
							<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
								<!-- Alerts-->
								<div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $d_success ?>">
									<strong>Patient enregistré!</strong> <i><u><a href="add-consultation.php?id=<?= $mat ?>">Cliquer pour effectuer une consultation maintenant</a></u></i>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="alert alert-warning alert-dismissible fade show" role="alert" style="display: <?= $d_error ?>">
									<strong>Holy guacamole!</strong> Verifiez certains de vos entrées
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<!-- /Alerts-->
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="patient-lname">Nom du Patient</label>
										<input type="text" class="form-control" placeholder="Nom du patient" id="patient-lname" name="nom">
									</div>
									<div class="form-group col-md-4">
										<label for="patient-name">Prenom du Patient</label>
										<input type="text" class="form-control" placeholder="Prenom du Patient" id="patient-name" name="prenom">
									</div>
									<div class="form-group col-md-4">
										<label for="dob">Date de naissance</label>
										<input type="date" placeholder="Date of Birth" class="form-control" id="dob" name="datenais">
									</div>
									<div class="form-group col-md-4">
										<label for="phone">Tel</label>
										<input type="text" placeholder="Phone" class="form-control" id="phone" name="tel">
									</div>
									<div class="form-group col-md-4">
										<label for="email">Email</label>
										<input type="email" placeholder="email" class="form-control" id="Email" name="email">
									</div>
									<div class="form-group col-md-4">
										<label for="gender">Genre</label>
										<select class="form-control" id="gender" name="genre">
											<option value="M">M</option>
											<option value="F">F</option>
										</select>
									</div>
									<div class="form-group col-md-12">
										<label for="address">Adresse</label>
										<input type="text" name="adresse" id="address" placeholder="Adresse" class="form-control">
										<!-- <textarea placeholder="Adresse" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
									</div>
									<div class="form-group col-md-4">
										<label for="bloodgroup">Group Sanguin</label>
										<select class="form-control" id="bloodgroup" name="groupsanguin">
											<option value="O-">O-</option>
											<option value="O+">O+</option>
											<option value="B-">B-</option>
											<option value="B+">B+</option>
											<option value="A-">A-</option>
											<option value="A+">A+</option>
											<option value="AB-">AB-</option>
											<option value="AB+">AB+</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="password">Mot de Passe</label>
										<input type="text" placeholder="Mot de passe" class="form-control" id="password" name="motdepasse">
									</div>
									<div class="form-group col-md-4">
										<label for="file">File</label>
										<input type="file" class="form-control" id="file" name="photo">
									</div>
									<div class="form-group col-md-6">
										<label for="question">Question de recupération</label>
										<textarea placeholder="Question de recupération de compte" class="form-control" id="question" rows="3" name="question"></textarea>
									</div>
									<div class="form-group col-md-6">
										<label for="answer">Réponse</label>
										<textarea placeholder="Reponse" class="form-control" id="answer" rows="3" name="reponse"></textarea>
									</div>

									<!-- <div class="form-check col-md-12 mb-2">
										<div class="text-left">
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="ex-check-2">
												<label class="custom-control-label" for="ex-check-2">Please Confirm</label>
											</div>
										</div>
									</div> -->
									<div class="form-group col-md-6 mb-3">
										<button type="submit" class="btn btn-primary btn-lg">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /Page Content -->
	</div>
	<!-- Back to Top -->

	<?php require "../_includes/endscripts.php" ?>

</body>



</html>