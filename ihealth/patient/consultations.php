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
                    <h3 class="block-title">Consultations</h3>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <span class="ti-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Consultations</li>
                        <li class="breadcrumb-item active">Mes consultations</li>
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
                            <h3 class="widget-title">Mes Consultations</h3>
                            <div class="table-responsive mb-3">
                                <table id="tableId" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date de consultation</th>
                                            <th>Consulté par</th>
                                            <th>Matricule</th>
                                            <!-- <th>Statut</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cons = Consultations::p_consults($db, $idpat);
                                        foreach($cons AS $index => $con){
                                        ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= $con['dateconsult'] ?></td>
                                                <td><strong><?= strtoupper(medecin::column($db, $con['idmedecin'], "nom")) . ' ' . medecin::column($db, $con['idmedecin'], "prenom") ?></strong></td>
                                                <td><?= $con['matricule'] ?></td>
                                                <td>
                                                    <a href="about-consultation.php?id=<?= $con['idconsultation'] ?>" class="btn btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i> Détails</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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