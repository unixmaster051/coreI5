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

$forraskod = file_get_contents($_GET['url']);
$originalUrl = $_GET['url'];
$lang = $_GET['ext']; //a kiterjesztés
if($lang == cs) {
$lang = csharp;



}


    $forraskod = nl2br($forraskod);   //minden newline kap egy <br> HTML tag-et, így nem folyik össze a szöveg
echo <<<EOT
<p>
<p class="logout"><a href="$originalUrl" class="code">eredeti</a></p>
<p>
<p class="vissza"><a href="./.index.php">Vissza</p>
<pre><code class="language-$lang">

    $forraskod;
EOT;
echo <<<EOT
</code></pre>
EOT;
?>

<div id="codediv">


</div>


</body>
<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 2015.10.25.
 * Time: 5:05
 */
?>