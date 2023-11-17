<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
require "../_functions/functions.php";
require "../_functions/encryption.function.php";
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
					<h3 class="block-title">Carnet virtuel</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Carnet virtuel</li>
						<li class="breadcrumb-item active">Liste de patients</li>
					</ol>
				</div>
			</div>

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid">
				<!-- Main Content -->
				<div class="row">
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow min-h200">
							<h3 class="widget-title">Selectionner le patient</h3>
							<div class="row">
								<?php
								$patients = Patient::all_patient($db);
								foreach ($patients as $index => $patient) {
								?>
									<!-- <div class="col-md-3 bg-danger"> -->
									<div class="col-md-3">
										<a href="medical-book-details.php?id=<?= $patient['idpatient'] ?>">
											<div class="text-center">
												<img src="../../assets/images/mb1.png" width="150px"><br>
												<strong><?= $patient['nom'] . ' ' . $patient['prenom'] ?></strong>
											</div>
										</a>
									</div>
								<?php
								}
								?>
							</div>

							<!-- <img src="../../assets/images/mb2.png" width="150px"> -->
						</div>
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