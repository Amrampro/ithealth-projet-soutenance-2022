<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
require "../_functions/functions.php";

if (!empty($_GET["id"])) {
	$idpatient = $_GET['id'];

	$infop = Patient::s_patient($db, $idpatient);
} else {
	header("Location: 404.php");
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
					<h3 class="block-title">Détails sur un Patient</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Patients</li>
						<li class="breadcrumb-item active">Patient Details</li>
					</ol>
				</div>
			</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid">

				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-6">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title">Informations du Patient</h3>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td><strong>Nom complèt</strong></td>
											<td><?= $infop["nom"] . ' ' . $infop["prenom"] ?></td>
										</tr>
										<tr>
											<td><strong>Date De Naissance</strong> </td>
											<td><?= $infop["datenais"] ?></td>
										</tr>
										<tr>
											<td><strong>Genre</strong></td>
											<td><?= $infop["genre"] ?></td>
										</tr>
										<tr>
											<td><strong>Adresse</strong></td>
											<td><?= $infop["adresse"] ?></td>
										</tr>
										<tr>
											<td><strong>Tel </strong></td>
											<td> +237 <?= $infop["tel"] ?> <a href="tel:+237<?= $infop['tel'] ?>" class="btn btn-outline-success"><i class="fa fa-phone" aria-hidden="true"></i></a></td>
										</tr>
										<tr>
											<td><strong>Email</strong></td>
											<td><?= $infop["email"] ?> <a href="mailto:<?= $infop["email"] ?>" class="btn btn-outline-success"><i class="fa fa-envelope" aria-hidden="true"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>

							<!--Export links-->
							<nav aria-label="Page navigation example">
								<ul class="pagination justify-content-center export-pagination">
									<li class="page-item">
										<a class="page-link" href="#"><span class="ti-printer"></span> Imprimer</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#"><span class="ti-download"></span> PDF</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-6">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title">Rendez-vous du patient</h3>
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Nom du médecin</th>
											<th>Libelle</th>
											<th>Date de rdv</th>
											<th>Etat</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$rdvs = Rdv::rdvPatient($db, $idpatient);
										foreach ($rdvs as $index => $rdv) {
										?>
											<tr>
												<td><?= Medecin::column($db, $rdv['idmedecin'], "nom") . ' ' . Medecin::column($db, $rdv['idmedecin'], "prenom") ?></td>
												<td><?= $rdv['libelle'] ?></td>
												<td><?= $rdv['date'] ?></td>
												<td><?= etat_rdv($rdv['etat']) ?></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>

								<!--Export links-->
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center export-pagination">
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-printer"></span> Imprimer</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-download"></span> PDF</a>
										</li>
									</ul>
								</nav>
								<!-- /Export links-->
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title">Historique de Transactions</h3>
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Date</th>
											<th>Cost</th>
											<th>Discount</th>
											<th>Payment Type</th>
											<th>Invoive</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>12-03-2018</td>
											<td>$300</td>
											<td>15%</td>
											<td>Check</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-warning">Pending</span></td>
										</tr>
										<tr>
											<td>12-03-2018</td>
											<td>$130</td>
											<td>5%</td>
											<td>Credit Card</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-success">Completed</span></td>
										</tr>
										<tr>
											<td>12-03-2018</td>
											<td>$30</td>
											<td>5%</td>
											<td>Credit Card</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-danger">Cancelled</span></td>
										</tr>
										<tr>
											<td>12-03-2018</td>
											<td>$30</td>
											<td>5%</td>
											<td>Cash</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-success">Completed</span></td>
										</tr>
										<tr>
											<td>12-03-2018</td>
											<td>$30</td>
											<td>5%</td>
											<td>Credit Card</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-success">Completed</span></td>
										</tr>
										<tr>
											<td>12-03-2018</td>
											<td>$30</td>
											<td>5%</td>
											<td>Insurance</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-success">Completed</span></td>
										</tr>
										<tr>
											<td>12-03-2018</td>
											<td>$30</td>
											<td>5%</td>
											<td>Credit Card</td>
											<td><button type="button" class="btn btn-outline-info mb-0"><span class="ti-arrow-down"></span> Invoice</button></td>
											<td><span class="badge badge-success">Completed</span></td>
										</tr>
									</tbody>
								</table>

								<!--Export links-->
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center export-pagination">
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-printer"></span> Imprimer</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-download"></span> PDF</a>
										</li>
									</ul>
								</nav>
								<!-- /Export links-->
							</div>
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