<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
require "../_functions/functions.php";

$mat = "VI" . matricule(5);
if (!empty($_GET['id'])) {
	$idmed = $_GET['id'];
}
$error = [];
if (!empty($_POST)) {
	extract($_POST);
	if (empty($idpatient))
		$error = " Patient Invalide";
	if (empty($idmed))
		$error = " Medecin Invalide";
	if (empty($mat))
		$error = " Jeton Invalide";
	if (empty($libelle))
		$error = " Libellé Invalide";
	if (empty($date))
		$error = " Date Invalide";
	if (empty($heure))
		$error = " Heure Invalide";
	if ($error == []) {
		$error = 1;
		$rdv = rdv::register($db, $idpatient, $idmed, $libelle, $mat, $date, $heure, 2);
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
					<h3 class="block-title">Rendez-vous</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Rendez-vous</li>
						<li class="breadcrumb-item active">Ajouter un rdv</li>
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
							<h3 class="widget-title">Demander un nouveau rdv</h3>
							<!-- Alerts-->
							<?php
							if ($error == 1) {
							?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Demande de rdv envoyé</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
							<?php
							} else if($error == []){
								echo '';
							}else {
							?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Une erreur s'est produite!</strong> <?= $error ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
							<?php
							}
							?>
							<!-- /Alerts-->
							<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="doctor-name">Nom du médecin</label>
										<input type="text" placeholder="Nom Du Médecin" class="form-control" id="doctor-name" value="<?= strtoupper(medecin::column($db, $idmed, "nom")) . ' ' . medecin::column($db, $idmed, "prenom") ?>" disabled>
										<input type="hidden" name="idmed" value="<?= $idmed ?>">
										<input type="hidden" name="idpatient" value="<?= $idpat ?>">
									</div>
									<div class="form-group col-md-6">
										<label for="token-number">Numéro Jeton <small>(Généré automatiquement)</small></label>
										<input type="text" placeholder="Token Number" class="form-control" id="token-number" value="<?= $mat ?>" disabled>
										<input type="hidden" name="mat" value="<?= $mat ?>">
									</div>
									<div class="form-group col-md-6">
										<label for="patient-name">Libellé</label>
										<input type="text" class="form-control" placeholder="Libellé" id="libelle" name="libelle">
									</div>
									<div class="form-group col-md-3">
										<label for="appointment-date">Date du RDV</label>
										<input type="date" placeholder="Appointment Date" class="form-control" id="appointment-date" name="date">
									</div>
									<div class="form-group col-md-3">
										<label for="time-slot">Heure</label>
										<input type="time" name="heure" id="" class="form-control">
									</div>
									<div class="form-group col-md-6 mb-3">
										<button type="submit" class="btn btn-primary btn-lg">Demander</button>
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