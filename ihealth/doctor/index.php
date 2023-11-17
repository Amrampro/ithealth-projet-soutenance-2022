<?php 
    require "../_classes/allclasses.php";
    require "../_configs/db.php";
    // require "_partials/session_check.php"; already included in "_partials > sidebar.php"
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
        <span class="theme-color theme-default" data-color="green"></span>
        <span class="theme-color theme-blue" data-color="blue"></span>
        <span class="theme-color theme-red theme-active" data-color="red"></span>
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
                    <h3 class="block-title">Quick Statistics</h3>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <span class="ti-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- /Page Title -->

            <!-- /Breadcrumb -->
            <!-- Main Content -->
            <div class="container-fluid home">


                <div class="row">
                    <!-- Widget Item -->
                    <div class="col-md-4">
                        <div class="widget-area proclinic-box-shadow color-red">
                            <div class="widget-left">
                                <span class="ti-wheelchair"></span>
                            </div>
                            <div class="widget-right">
                                <h4 class="wiget-title">Patients</h4>
                                <span class="numeric color-red"><?= Patient::t_patient($db) ?></span>
                                <p class="inc-dec mb-0"><span class="ti-angle-right"></span> <a href="patients.php">Cliquer pour voir</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /Widget Item -->
                    <!-- Widget Item -->
                    <div class="col-md-4">
                        <div class="widget-area proclinic-box-shadow color-green">
                            <div class="widget-left">
                                <span class="ti-bar-chart"></span>
                            </div>
                            <div class="widget-right">
                                <h4 class="wiget-title">Rendez-vous</h4>
                                <span class="numeric color-green"><?= Rdv::t_rdv($db) ?></span>
                                <p class="inc-dec mb-0"><span class="ti-angle-right"></span> <a href="appointments.php">Cliquer pour voir</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /Widget Item -->
                    <!-- Widget Item -->
                    <div class="col-md-4">
                        <div class="widget-area proclinic-box-shadow color-yellow">
                            <div class="widget-left">
                                <span class="ti-user"></span>
                            </div>
                            <div class="widget-right">
                                <h4 class="wiget-title">Mon compte</h4>
                                <span class="numeric color-yellow"><?= Specialite::column($db, $med["idspecialite"], "nom") ?></span>
                                <p class="inc-dec mb-0"><span class="ti-angle-right"></span> <a href="settings-doctor.php">Modifier mes informations</a></p>
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