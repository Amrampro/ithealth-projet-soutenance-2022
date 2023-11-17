<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
require "../_functions/functions.php";
?>

<!DOCTYPE html>
<html>


<head>
	<?php include("../_includes/head.php") ?>
</head>

<body>
	<!-- Pre Loader -->
	<!-- <div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div> -->
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
					<h3 class="block-title">Patients</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Patients</li>
						<li class="breadcrumb-item active">Tous Les Patients</li>
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
							<h3 class="widget-title">Liste des patients</h3>
							<div class="table-responsive mb-3">
								<table id="tableId" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Nom du Patient</th>
											<th>Age</th>
											<th>Consulté par</th>
											<th>Temperature</th>
											<th>Tension</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$consultations = Consultations::all_consultations($db);
										foreach ($consultations as $index => $consultation) {
										?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= Patient::column($db, $consultation["idpatient"], "nom") . " " . Patient::column($db, $consultation["idpatient"], "prenom") ?></td>
											<td><?= get_patient_age(Patient::column($db, $consultation["idpatient"], "datenais")) . " an(s)" ?></td>
											<td><?= Medecin::column($db, $consultation["idmedecin"], "nom") . " " . Medecin::column($db, $consultation["idmedecin"], "prenom") ?></td>
											<td><?= $consultation["temperature"] ?></td>
											<td><?= $consultation["tension"] ?></td>
											<td><?= $consultation["dateconsult"] ?></td>
											<td>
											<a href="about-consultation.php?id=<?= $consultation['idconsultation'] ?>" class="btn btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i> Détails</a>
											</td>
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
											<a class="page-link" href="#"><span class="ti-printer"></span> imprimer</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-download"></span> PDF</a>
										</li>
									</ul>
								</nav>
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