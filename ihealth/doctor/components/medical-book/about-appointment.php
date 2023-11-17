<?php
require "../../../_classes/Patients_class.php";
require "../../../_classes/Consultations_class.php";
require "../../../_classes/Medecin_class.php";
require "../../../_classes/Rdv_class.php";
require "../../../_classes/Specialite_class.php";
require "../../../_configs/db.php";
require "../../../_functions/functions.php";
require "../../../_functions/encryption.function.php";

if (!empty($_GET["id"])) {
    $idvisit = $_GET['id'];
    $rdv = Rdv::single_visit($db, $idvisit);
} else {
    header("Location: 404.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>I-health</title>
    <!-- Fav  Icon Link -->
    <link rel="shortcut icon" type="image/png" href="../../images/fav.png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Font-Awesome icons CSS -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <!-- themify icons CSS -->
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <!-- Animations CSS -->
    <link rel="stylesheet" href="../../css/animate.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/red.css" id="style_theme">
    <link rel="stylesheet" href="../../css/responsive.css">
    <!-- morris charts -->
    <link rel="stylesheet" href="../../charts/css/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../css/jquery-jvectormap.css">
	<link rel="stylesheet" href="../../datatable/dataTables.bootstrap4.min.css">

    <script src="../../js/modernizr.min.js"></script>
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
    <!-- /Color Changer -->
    <div class="wrapper">
        <!-- Page Content -->
        <div id="content">
            <!-- Main Content -->
            <div class="container-fluid">

                <div class="row">
                    <!-- Widget Item -->
                    <div class="col-md-12">
                        <div class="widget-area-2 proclinic-box-shadow">
                            <h3 class="widget-title">Détails du rendez-vous</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td><strong>Patient</strong></td>
                                            <td><?= strtoupper(Patient::column($db, $rdv['idpatient'], "nom")) . ' ' . Patient::column($db, $rdv['idpatient'], "prenom") ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Médecin</strong></td>
                                            <td><?= strtoupper(medecin::column($db, $rdv['idmedecin'], "nom")) . ' ' . medecin::column($db, $rdv['idmedecin'], "prenom") ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Spécialité</strong></td>
                                            <td><?= specialite::column($db, medecin::column($db, $rdv['idmedecin'], "idspecialite"), "nom") ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date</strong></td>
                                            <td><?= $rdv['date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Heure prévu </strong></td>
                                            <td><?= $rdv['heure'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Numéro Jeton</strong></td>
                                            <td><?= $rdv['matricule'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Libellé</strong></td>
                                            <td><?= $rdv['libelle'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--Export links-->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination export-pagination">
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
        <!-- Back to Top -->
        <a id="back-to-top" href="#" class="back-to-top">
        <span class="ti-angle-up"></span>
    </a>
    <!-- /Back to Top -->

    <!-- Jquery Library-->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <!-- Popper Library-->
    <script src="../../js/popper.min.js"></script>
    <!-- Bootstrap Library-->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- morris charts -->
    <script src="../../charts/js/raphael-min.js"></script>
    <script src="../../charts/js/morris.min.js"></script>
    <script src="../../js/custom-morris.js"></script>

	<!-- Datatable  -->
	<script src="../../datatable/jquery.dataTables.min.js"></script>
	<script src="../../datatable/dataTables.bootstrap4.min.js"></script>

	<!-- Custom Script-->
	<script src="../../js/custom.js"></script>
	<script src="../../js/custom-datatables.js"></script>

</body>


</html>