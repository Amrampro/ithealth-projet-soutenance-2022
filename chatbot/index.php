<?php
// require "../ihealth/_classes/allclasses.php";
require "../ihealth/_configs/db.php";
require "../ihealth/_functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/images/fav.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <title>Ihealth</title>
</head>
<style>
    body {
        margin: 0 auto;
        max-width: 800px;
        padding: 0 20px;
        background: #001029;
    }

    .message-container {
        height: 100vh;
        background: url("../assets/images/chatbackground.jpg");
        overflow-y: scroll;
        padding: 30px;
        padding-bottom: 0px;
        position: relative;
    }

    .message-container form {
        position: absolute;
        bottom: 0;
        background: rgba(0, 0, 0, .5);
        width: 92%;
        padding: 5px;
    }

    .message-container form input {
        padding: 10px;
        width: 80%;
    }

    .message-container form .button {
        padding: 10px;
        width: 19.1%;
        color: #fff;
        font-weight: bold;
        background: #27aae1;
        transition: .5s;
        border: 2px solid #fff;
    }

    form .button:hover {
        background: #fff;
        color: #27aae1;
    }

    .container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 5px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .container::after {
        content: "";
        clear: both;
        display: table;
    }

    .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .container img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }
</style>

<body>
    <div class="message-container" id="maincontainer">
        <?php
        $string = "i am going to school";
        $find = "schoo";
        $find = strtolower($find);
        if (strpos($string, $find) !== false) {
            echo "Word found";
        } else {
            echo "Word not found";
        }
        ?>
        <h2 class="text-center" style="color:#fff; font-weight: bold;">Chatbot</h2>
        <div class="container">
            <img src="../assets/images/chatbot.jpg" alt="Avatar" style="width:100%;">
            <p><b>Ares</b><br>
                Bienvenue sur notre <i><u>Intelligent Health</u></i>, votre plateforme de consultation en ligne.
            </p>
            <span class="time-right"><?= date("h:i") ?></span>
        </div>
        
        <div class="container">
            <img src="../assets/images/chatbot.jpg" alt="Avatar" style="width:100%;">
            <p><b>Ares</b><br>
                Je suis <b>Ares</b> le chatbot 😊. Comment puis-je vous aider ?
            </p>
            <span class="time-right"><?= date("h:i") ?></span>
        </div>

        <!-- <div class="container darker">
            <img src="../assets/images/user.png" alt="Avatar" class="right" style="width:100%;">
            <p>Hey! I'm fine. Thanks for asking!</p>
            <span class="time-left">11:01</span>
        </div>

        <div class="container">
            <img src="../assets/images/chatbot.jpg" alt="Avatar" style="width:100%;">
            <p>Sweet! So, what do you wanna do today?</p>
            <span class="time-right">11:02</span>
        </div>

        <div class="container darker">
            <img src="../assets/images/user.png" alt="Avatar" class="right" style="width:100%;">
            <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
            <span class="time-left">11:05</span>
        </div> -->
        <form action="" method="post">
            <input type="text">
            <button class="button">Envoyer</button>
        </form>
    </div>
</body>
<script src="../assets/js/fontawesome.js"></script>
<script src="../assets/js/typewritter.js"></script>

</html>