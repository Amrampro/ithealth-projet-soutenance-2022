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
                    <h3 class="block-title">Médecin</h3>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <span class="ti-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Médecins</li>
                        <li class="breadcrumb-item active">Tous Les Médecin</li>
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
                            <h3 class="widget-title">Mes Médecins <small>(Ceux-ci sont capable de voir votre historique médicale)</small></h3>
                            <div class="table-responsive mb-3">
                                <table id="tableId" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom du medecin</th>
                                            <th>Specialité</th>
                                            <th>Tel</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $auths = Auth::authpatient($db, $idpat);
                                        foreach($auths AS $index => $auth){
                                            $medecin = medecin::s_medecin($db, $auth['idmedecin']);
                                            if ($medecin['statut'] == 1) {
                                                $stat = '<span class="badge badge-success">Actif</span>';
                                            } else {
                                                $stat = '<span class="badge badge-danger">Inactif</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= $medecin['nom'] . ' ' . $medecin['prenom'] ?></td>
                                                <td><strong><?= Specialite::column($db, $medecin['idspecialite'], "nom") ?></strong></td>
                                                <td><?= $medecin['tel'] ?></td>
                                                <td><?= $stat ?></td>
                                                <td>
                                                    <a href="right.php?right=remove&&med=<?= $medecin['idmedecin'] ?>" class="btn btn-outline-danger"><i class="fa fa-remove" aria-hidden="true"></i> Enlever droits</a>
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
                    <!-- Widget Item -->
                    <div class="col-md-12">
                        <div class="widget-area-2 proclinic-box-shadow">
                            <h3 class="widget-title">Tous les médecins</h3>
                            <div class="table-responsive mb-3">
                                <table id="tableId" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom du medecin</th>
                                            <th>Specialité</th>
                                            <th>Tel</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $medecins = medecin::all_medecin($db);
                                        foreach ($medecins as $index => $medecin) {
                                            if ($medecin['statut'] == 1) {
                                                $stat = '<span class="badge badge-success">Actif</span>';
                                            } else {
                                                $stat = '<span class="badge badge-danger">Inactif</span>';
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= $medecin['nom'] . ' ' . $medecin['prenom'] ?></td>
                                                <td><strong><?= Specialite::column($db, $medecin['idspecialite'], "nom") ?></strong></td>
                                                <td><?= $medecin['tel'] ?></td>
                                                <td><?= $stat ?></td>
                                                <td>
                                                    <a href="right.php?right=give&&med=<?= $medecin['idmedecin'] ?>" class="btn btn-outline-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Autoriser</a>
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