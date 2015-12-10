<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./.favicon.ico">
    <title>Directory Contents</title>

    <link rel="stylesheet" href="http://no.pe.hu/files/style.css">
    <link rel="stylesheet" href="http://no.pe.hu/files/prism.css">
<!--    <script src="http://no.pe.hu/files/.sorttable.js"></script>-->
    <script src="http://no.pe.hu/files/prism.js"></script>
</head>

<body>
<?php
//include_once('./.index.php');

$homepage = file_get_contents($_GET['url']);


echo <<<EOT
<p>
<p class="logout"><a href="./style.css" class="code">eredeti</a></p>
<p>
<pre><code class="language-css">

$homepage;

</code></pre>
EOT;
?>

<div id="codediv">


</div>


</body>
<?
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 2015.10.25.
 * Time: 3:18
 */
?>