<?php require "_partials/session_check.php"; ?>
<nav id="sidebar" class="proclinic-bg">
    <div class="sidebar-header">
        <a href="index.php"><img src="images/logo.png" class="logo" alt="logo"></a>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="index.php">
                <span class="ti-home"></span> Dashboard
            </a>
        </li>
        <li class="">
            <a href="doctors.php">
                <span class="ti-user"></span> Docteurs
            </a>
        </li>
        <li class="">
            <a href="doctors.php">
                <span class="ti-comment-alt"></span> Messages
            </a>
        </li>
        <li>
            <a href="consultations.php">
                <span class="ti-pencil-alt"></span> Consultations
            </a>
        </li>
        <li>
            <a href="#nav-consultations" data-toggle="collapse" aria-expanded="false">
                <span class="ti-heart-broken"></span> Examens
            </a>
            <ul class="collapse list-unstyled" id="nav-consultations">
                <li>
                    <a href="patient-choose.php">Mes Examens</a>
                </li>
                <li>
                    <a href="consultations.php">Examens en cours</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#nav-appointment" data-toggle="collapse" aria-expanded="false">
                <span class="ti-time"></span> Rendez-vous
            </a>
            <ul class="collapse list-unstyled" id="nav-appointment">
                <li>
                    <a href="chose-doctor.php">Nouveau rdv</a>
                </li>
                <li>
                    <a href="appointments.php">Mes rdv</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="medical-book.php">
                <span class="ti-book"></span> Carnets Virtuel
            </a>
        </li>

        <li>
            <a href="#nav-payment" data-toggle="collapse" aria-expanded="false">
                <span class="ti-money"></span> Factures
            </a>
            <ul class="collapse list-unstyled" id="nav-payment">
                <li>
                    <a href="add-payment.html">Add Payment</a>
                </li>
                <li>
                    <a href="payments.html">All Payments</a>
                </li>
                <li>
                    <a href="about-payment.html">Payment Invoice</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="nav-help animated fadeIn">
        <!-- <h5><span class="ti-comments"></span> Need Help</h5>
                <h6>
                    <span class="ti-mobile"></span> +1 1234 567 890</h6>
                <h6>
                    <span class="ti-email"></span> email@site.com</h6> -->
        <p class="copyright-text">&copy; 2022 Intelligent Health</p>
    </div>
</nav>