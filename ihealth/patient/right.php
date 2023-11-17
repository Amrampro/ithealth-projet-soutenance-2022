<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
// require "_partials/session_check.php"; already included in "_partials > sidebar.php"

$msg = '';

if (isset($_POST['approve'])) {
	$idpati = $_POST['idpati'];
	$idmede = $_POST['idmede'];
	$quer = Auth::register($db, $idpati, $idmede);
	// var_dump($quer);
	// echo ('<br>patient: ' . $idpati . ', medecin: ' . $idmede);
	if ($quer == false) {
		$msg = '<span style="color:red">Vous avez déjà donné l' . "'" . 'autorisation à ce docteur</span>';
		echo $msg;
		header("Refresh: 3; doctors.php");
		die;
	} else {
		$msg = '<span style="color:green">Opération reussi</span>';
		echo $msg;
		header("Refresh: 3; doctors.php");
		die;
	}
}

if (isset($_POST['remove'])) {
	$idpati = $_POST['idpati'];
	$idmede = $_POST['idmede'];
	$quer = Auth::remove($db, $idpati, $idmede);
	// var_dump($quer);
	// echo ('<br>patient: ' . $idpati . ', medecin: ' . $idmede);
	if ($quer == false) {
		$msg = '<span style="color:red">Erreur de données</span>';
		echo $msg;
		header("Refresh: 3; doctors.php");
		die;
	} else {
		$msg = '<span style="color:green">Opération reussi</span>';
		echo $msg;
		header("Refresh: 3; doctors.php");
		die;
	}
}

if (!empty($_GET['right'])) {
	$type = $_GET['right'];
	if (!empty($_GET['med'])) {
		$idmedecin = $_GET['med'];
	} else {
		// die("Identifiant du médecin invalide");
	}
} else {
	// die("Type de données inconnu");
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
			<div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Blank Page</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Other Pages</li>
						<li class="breadcrumb-item active">Blank Page</li>
					</ol>
				</div>
			</div>

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid">
				<!-- Main Content -->
				<div class="row">
					<div class="col-md-12">
						<?php
						if ($type == 'give') {
						?>
							<div class="widget-area-2 proclinic-box-shadow min-h200">
								<h3 class="widget-title">Donner une autorisation</h3>
								<p>En donnant lautorisation au médecin <strong><?= strtoupper(medecin::column($db, $idmedecin, 'nom')) . ' ' . medecin::column($db, $idmedecin, 'prenom') ?></strong> il(elle) pourra voir tout le contenu de votre dossier médical. Etes-vous sûre de vouloir continuer ?</p>
								<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
									<input type="hidden" name="idpati" value="<?= $idpat ?>">
									<input type="hidden" name="idmede" value="<?= $idmedecin ?>">
									<?= $msg ?>
									<button class="btn btn-primary" type="submit" name="approve">Continuer</button>
								</form>
							</div>
						<?php
						} else if ($type == 'remove') {
						?>
							<div class="widget-area-2 proclinic-box-shadow min-h200">
								<h3 class="widget-title">Page Heading</h3>
								<p>Le médecin <strong><?= strtoupper(medecin::column($db, $idmedecin, 'nom')) . ' ' . medecin::column($db, $idmedecin, 'prenom') ?></strong> ne pourra plus voir le contenu de votre dossier médical. Etes-vous sûre de vouloir continuer ?</p>
								<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
									<input type="hidden" name="idpati" value="<?= $idpat ?>">
									<input type="hidden" name="idmede" value="<?= $idmedecin ?>">
									<?= $msg ?>
									<button class="btn btn-primary" type="submit" name="remove">Continuer</button>
								</form>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /Page Content -->
	</div>
	<?php require "../_includes/endscripts.php" ?>
</body>


</html>