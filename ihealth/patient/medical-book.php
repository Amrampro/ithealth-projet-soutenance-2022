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
		<span><strong>Thème</strong></span><br>
		<span class="theme-color theme-default theme-active" data-color="green"></span>
		<!-- <span class="theme-color theme-blue" data-color="blue"></span> -->
		<span class="theme-color theme-blue" data-color="red"></span>
		<!-- <span class="theme-color theme-violet" data-color="violet"></span>
		<span class="theme-color theme-yellow" data-color="yellow"></span> -->
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
					<h3 class="block-title">Carnet Virtuel</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index-2.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item">Information Médicale</li>
						<li class="breadcrumb-item active">Carnet Virtuel</li>
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
							<h3 class="widget-title">Carnet Virtuel <small>(Mon historique médical)</small></h3>
							<!-- Invoice Head -->
							<div class="row ">
								<div class="col-sm-6 mb-5">
									<img src="images/logo-dark.png" alt="logo hospital" class="img-thumbnail">
									<br>
									<br>
									<span>Street Address</span>
									<br>
									<span>[City, ST ZIP Code]</span>
									<br>
									<span class="pr-2">Phone: +00 123456</span>
									<span>Fax: 432 1231 3456</span>
								</div>
								<div class="col-sm-6 text-md-right mb-5">
									<h3>JOHN HOPE</h3>
									<br>
									<br>
									<span>Invoice # [123]</span>
									<br>
									<span>Date d'aujourd'hui: <?= date("M d, Y") ?></span>
								</div>
							</div>
							<!-- /Invoice Head -->
							<!-- Patient details -->
							<div class="row">
								<div class="col-sm-6 mb-5">
									<h6 class="proclinic-text-color">DETAILS DU PATIENT:</h6>
									<span><strong>Name:</strong> <?= strtoupper($pat['nom']) . ' ' . $pat['prenom'] ?></span>
									<br>
									<span><strong>Age:</strong> <?= get_patient_age($pat['datenais']) ?></span>
									<br>
									<span><strong>Adresse: </strong><?= $pat['adresse'] ?></span>
									<br>
									<span><strong>Phone:</strong> <?= $pat['tel'] ?></span>
									<br>
									<span><strong>Email:</strong> <?= $pat['email'] ?></span>
								</div>
								<div class="col-sm-6 mb-5">
									<span><strong>Mon Matricule:</strong> <?= $pat['mat'] ?></span>
									<br>
									<span><strong>Group Sanguin:</strong> <?= $pat['groupsanguin'] ?></span>
									<br>
									<span><strong>Date de naissance:</strong> <?= $pat['datenais'] ?></span>
									<br>
									<!-- <span><strong>Total Days:</strong> 10</span>
									<br>
									<span><strong>Payment Type:</strong> Credit Card</span>
									<br>
									<span>1234 5678 9012 3456</span>
									<br>
									<span>Paypal</span> -->
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 mb-5">
									<h6 class="proclinic-text-color">AUTRES INFORMATIONS <small>(<i>Clicker sur une date pour afficher les informations</i>)</small></h6>
									<hr>
									<div class="row">
										<div class="col-md-3">
											<h6><strong>&#2022; Consultations</strong></h6>
											<?php
											$cons = Consultations::p_consults($db, $idpat);
											foreach ($cons as $index => $con) {
											?>
												<!-- &#x2022; -->
												<p><u><a href="#iframe" onclick='reload("components/medical-book/about-consultation.php?id=<?= $con["idconsultation"] ?>")'><img src="../../assets/images/folder.png" width="25px"> <?= $con['dateconsult'] ?></a></u></p>

											<?php
											}
											?>
										</div>
										<div class="col-md-3">
											<h6><strong>&#2022; Examens</strong></h6>
										</div>
										<div class="col-md-3">
											<h6><strong>&#2022; Visites</strong></h6>
											<?php
											$visites = Rdv::rdvPatient($db, $idpat);
											foreach ($visites as $index => $visite) {
											?>
												<p><u><a href="#iframe" onclick='reload("components/medical-book/about-appointment.php?id=<?= $visite["idrdv"] ?>")'><img src="../../assets/images/folder.png" width="25px"> <?= $visite['date'] . ' ' . $visite['heure'] ?></a></u></p>
											<?php
											}
											?>
										</div>
										<div class="col-md-3">
											<h6><strong>&#2022; Factures</strong></h6>
										</div>
									</div>
								</div>
								<iframe src="components/blank-page.php" frameborder="0" width="100%" height="800px" id="iframe"></iframe>
							</div>
							<!-- /Patient details -->
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /Page Content -->
	</div>
	<?php require "../_includes/endscripts.php" ?>
	<script>
		var text = document.getElementById("textin");
		var iframe = document.getElementById("iframe");
		var link;

		function reload(link) {
			iframe.src = link;
			// alert(link);
			// iframe.contentWindow.location.reload().;
		}
	</script>
</body>


</html>