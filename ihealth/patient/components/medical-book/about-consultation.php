<?php
require "../../../_classes/Patients_class.php";
require "../../../_classes/Consultations_class.php";
require "../../../_classes/Medecin_class.php";
// require "../../../_classes/Patients_class.php";
// require "../../../_classes/Patients_class.php";
require "../../../_configs/db.php";
require "../../../_functions/functions.php";
require "../../../_functions/encryption.function.php";

if (!empty($_GET["id"])) {
    $idconsult = $_GET['id'];
    $infoc = Consultations::s_consult($db, $idconsult);
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
                            <h3 class="widget-title">Informations de la Consultation</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Matricule de consultation <small>(cliquer pour voir l'examin associé)</small></strong></td>
                                            <td><?= $infoc["matricule"] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nom complèt du patient</strong></td>
                                            <td><?= strtoupper(Patient::column($db, $infoc["idpatient"], "nom")) . ' ' . Patient::column($db, $infoc["idpatient"], "prenom") ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date De La Consultation</strong> </td>
                                            <td><?= $infoc["dateconsult"] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Consulté par</strong></td>
                                            <td><?= strtoupper(Medecin::column($db, $infoc["idmedecin"], "nom")) . ' ' . Medecin::column($db, $infoc["idmedecin"], "prenom") ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Taille (m)</strong></td>
                                            <td><?= $infoc["taille"] . ' m' ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tension (mmHg)</strong></td>
                                            <td><?= $infoc["tension"] . ' mmHg' ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Temperature (°C)</strong></td>
                                            <td><?= $infoc["temperature"] . ' °C' ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Poids (Kg)</strong></td>
                                            <td><?= $infoc["poids"] . ' Kg' ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Plus d'infos (autre constat)</strong></td>
                                            <td><?= Encryption::decrypt($infoc["noteconsult"]) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Descision</strong></td>
                                            <td><?= Encryption::decrypt($infoc["descision"]) ?></td>
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