<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
?>
<!DOCTYPE html>
<html>


<head>
	<?php include("../_includes/head.php") ?>
	<title>Rendez-vous</title>
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
						<li class="breadcrumb-item active">Rendez-vous List</li>
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
							<h3 class="widget-title">Rendez-vous d'aujourd'hui</h3>
							<div class="table-responsive mb-3">
								<table id="tableId" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Patient</th>
											<th>Numero Jeton</th>
											<th>Heure</th>
											<th>Libellé</th>
											<th>Statut</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$rdvs = Rdv::doctor_visit_today($db, $idmed);
										foreach($rdvs AS $index => $rdv){
											if($rdv['statut'] == 1){
												$msg = '<span class="badge badge-success">Terminé</span>';
											} else if($rdv['statut'] == 0){
												$msg = '<span class="badge badge-warning">En attente...</span>';
											}
										?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= strtoupper(Patient::column($db, $rdv['idpatient'], "nom")) . ' ' . Patient::column($db, $rdv['idpatient'], "prenom") ?></td>
											<td><?= $rdv['matricule'] ?></td>
											<td><?= $rdv['heure'] ?></td>
											<td><?= $rdv['libelle'] ?></td>
											<td><?= $msg ?></td>
											<td><a href="" class="btn btn-primary"><span class="ti-thumb-up"></span> Visite terminée</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>

								<!--Export links-->
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center export-pagination">
										<li class="page-item">
											<a class="page-link" href="#"><span class="ti-printer"></span> print</a>
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