<?php
define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "ithealth");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "");

$db = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset=utf8', DATABASE_USER, DATABASE_PASSWORD);
?>