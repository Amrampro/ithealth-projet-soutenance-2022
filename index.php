<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/images/fav.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ihealth</title>
</head>

<body>
    <div class="container-fluid header">
        <div class="row boot_row">
            <div class="col-md-7">
                <div class="col-md-6 conn_el">
                    <a href="3dvisit/index.html" class="nounderline">
                        <div class="cn_option box_shadow">
                            <p class="cn"><i class="fas fa-eye f50"></i> Visite 3D</p>
                            <i>Cliquer ici</i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <h1 class="text-center">Intelligent<span style='color:#27AAE1'> Health</span></h1>
                <p id="write"></p>
            </div>
        </div>
    </div>
    <div class="option col-md-12">
        <div class="row">
            <div class="col-md-4 conn_el text-center">
                <a href="ihealth/patient/login.php" class="nounderline">
                    <div class="cn_option">
                        <p class="cn"><i class="fas fa-user-injured f50"></i> Espace Patient</p>
                        <i>Cliquer ici</i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 conn_el text-center">
                <a href="ihealth/doctor/login.php" class="nounderline">
                    <div class="cn_option">
                        <p class="cn"><i class="fas fa-user-nurse f50"></i> Espace Medecin</p>
                        <i>Cliquer ici</i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 conn_el text-center">
                <a href="ihealth/admin/login.php" class="nounderline">
                    <div class="cn_option">
                        <p class="cn"><i class="fas fa-user-shield f50"></i> Administration</p>
                        <i>Cliquer ici</i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/fontawesome.js"></script>
<script src="assets/js/typewritter.js"></script>
<script type="text/javascript">
    var el = document.getElementById("write");
    var data = new Typewriter(el, {
        loop: true
    });
    data.typeString("Hello! Bienvenue sur <span style='color:#27AAE1'>Intelligent Health</span>. ")
        .pauseFor(1000)
        .typeString("Intelligent Health est notre nouvelle plateforme de E-Santé ")
        .pauseFor(1000)
        .deleteAll()
        .typeString("Retrouvez des diagnostiques de bases et gratuitement sur notre plateforme ")
        .pauseFor(1000)
        .deleteAll()
        .typeString("Voici les differents services que vous pouvez retrouver chez nous")
        .pauseFor(1000)
        .typeString("<ol><li>Consultation pour malaise de base</li><li>Discuter avec medecin</li><li>Demander un rendez-vous</li><li>Effectuer un paiement en ligne</li></ol>")
        .pauseFor(3000)
        .start();
</script>

</html>