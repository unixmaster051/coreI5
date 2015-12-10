<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./.favicon.ico">
    <title>Directory Contents - kijelentkezve</title>

    <link rel="stylesheet" href="./style.css">
    <script src="./.sorttable.js"></script>
</head>

<body>
<?php
include passwords.php;
session_start();
//sleep(7);
echo '<p class="mesg"><span>Kijelentkeztél.</span></p> ';

unset($_SESSION["logged"]);


header("Location:.login.php");


?>
</body>
/**
 * Created by PhpStorm.
 * User: Rendszergazda
 * Date: 2015.06.07.
 * Time: 2:45
 */ 