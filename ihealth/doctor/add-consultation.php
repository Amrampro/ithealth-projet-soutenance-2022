<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
require "../_functions/functions.php";
require "../_functions/encryption.function.php";
// require "_partials/session_check.php"; already included in "_partials > sidebar.php"

$matricule = "CONS" . matricule();

$isok = true;

$msg = '2';

if (!empty($_POST)) {
	extract($_POST);
	if (empty($temperature)) {
		$isok = false;
	}
	if (empty($note)) {
		$isok = false;
	}
	if (empty($descision)) {
		$isok = false;
	}
	$note = Encryption::crypt($note);
	$descision = Encryption::crypt($descision);

	if ($isok == true) {
		$insrt = Consultations::register($db, $idpatient, $idmedecin, $taille, $tension, $temperature, $note, $descision, $mat, $poids);
		if ($insrt == 1) {
			$msg = '1';
		} else {
			$msg = '0';
		}
	}
	$_GET["id"] = $idpatient;
}

if (empty($_GET["id"])) {
	header("Refresh: 3; patient-choose.php");
} else {
	$idpa = Patient::s_patient($db, $_GET["id"]);
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
			<?php
			if (empty($_GET["id"])) {
			?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Erreur de données.</strong> Le patient est invalide. Veuillez le choisir!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			<?php
			}
			?>
			<!-- Page Title -->
			<div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Nouvelle Consultation</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Consultations</li>
						<li class="breadcrumb-item active">Ajouter</li>
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
							<h3 class="widget-title">Nouvelle Consultation</h3>
							<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
								<?php
								if ($msg == '1') {
								?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Consultation enregistrée!</strong> Matricule généré automatiquement
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								<?php
								} else if ($msg == '0') {
								?>
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Une erreur s'est produite!</strong> Veuillez ressaisir et envoyer à nouveau
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								<?php
								} else {
									echo ' ';
								}
								?>
								<div class="form-row">
									<div class="form-group col-md-8">
										<label for="patient-name">Patient</label>
										<input type="text" class="form-control" placeholder="Patient ID" id="patient-id" value="<?= $idpa["nom"] . ' ' . $idpa["prenom"] ?>" disabled>
										<input type="hidden" name="idpatient" value="<?= $idpa["idpatient"] ?>">
										<input type="hidden" name="idmedecin" value="<?= $idmed ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="token-number">Matricule <small>(Auto Generé)</small></label>
										<input type="text" placeholder="Matricule" class="form-control" value="<?= $matricule ?>" disabled>
										<input type="hidden" name="mat" value="<?= $matricule ?>">
									</div>
									<div class="form-group col-md-3">
										<label for="tension">Tension</label>
										<input type="text" placeholder="" class="form-control" id="tension" name="tension">
									</div>
									<div class="form-group col-md-3">
										<label for="temperature">Temperature</label>
										<input type="text" placeholder="" class="form-control" id="temperature" name="temperature">
									</div>
									<div class="form-group col-md-3">
										<label for="poids">Poids</label>
										<input type="text" placeholder="" class="form-control" id="Poids" name="poids">
									</div>
									<div class="form-group col-md-3">
										<label for="taille">Taille</label>
										<input type="text" placeholder="" class="form-control" id="taille" name="taille">
									</div>
									<div class="form-group col-md-6">
										<label for="note">Note</label>
										<textarea placeholder="note" class="form-control" id="note" name="note" rows="3"></textarea>
									</div>
									<div class="form-group col-md-6">
										<label for="descision">Descision</label>
										<textarea placeholder="descision" class="form-control" id="descision" name="descision" rows="3"></textarea>
									</div>

									<div class="form-check col-md-12 mb-2">
										<div class="text-left">
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" type="checkbox" id="ex-check-2">
												<label class="custom-control-label" for="ex-check-2">Lancer un examin</label>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6 mb-3">
										<button type="submit" class="btn btn-primary btn-lg" name="envoyer">Soumettre</button>
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
	<?php require "../_includes/endscripts.php" ?>

</body>


</html>