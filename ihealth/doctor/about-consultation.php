<?php
require "../_classes/allclasses.php";
require "../_configs/db.php";
require "../_functions/functions.php";
require "../_functions/encryption.function.php";

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
    <?php include("../_includes/head.php") ?>
    <title>Consultation-Details</title>
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
                    <h3 class="block-title">Détails sur un Consultation</h3>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <span class="ti-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Consultations</li>
                        <li class="breadcrumb-item active">Consultation Details</li>
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
                            <h3 class="widget-title">Informations de la Consultation</h3>
                                <?php
                                $auth = Auth::verify($db, $infoc["idpatient"], $idmed);
                                if ($auth == true) {
                                ?>
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
                        <?php } else { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Désolé!</strong> Le patient concerné ne vous a pas donné l'authorisation de voir son dossier
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button> -->
                            </div>
                        <?php } ?>
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