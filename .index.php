<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./.favicon.ico">
    <title>Directory Contents</title>

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./prism.css">
    <script src="./.sorttable.js"></script>
    <script src="./prism.js"></script>
</head>

<body>
<div id="container">
    <?
    session_start();
    include(".passwords.php");
    include_once("analyticstracking.php");
    check_logged();
    ?>
    <h1>
        <tr>
            <td>
                <p class="logout">
                    <a href=".logout.php" class="logout">kilépés</a>
                </p>
            </td>
            <td>
                A mappa tartalma
            </td>
        </tr>
        <tr>
            <br>
            Az oldal 1024x768ra van optimalizálva,  különben szétcsúszik a css
        </tr>
    </h1>


    <table class="sortable">
        <thead>
        <tr>
            <th>Fájlnév</th>
            <th>Forráskód (beta)</th>
            <th>Típus</th>
            <th>Méret</th>
            <th>Módosítva</th>
        </tr>
        </thead>
        <tbody><?php

        // Adds pretty filesizes
        function pretty_filesize($file) {
            $size=filesize($file);
            if($size<1024){$size=$size." Bytes";}
            elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
            elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
            else{$size=round($size/1073741824, 1)." GB";}
            return $size;
        }

        // rejtett fájl-ok ellenorzese
        if($_SERVER['QUERY_STRING']=="hidden")
        {$hide="";
            $ahref="./";
            $atext="[x]";}
        else
        {$hide=".";
            $ahref="./?hidden";
            $atext="[ ]";}

        // Opens directory
        $myDirectory=opendir(".");

        // Gets each entry
        while($entryName=readdir($myDirectory)) {
            $dirArray[]=$entryName;
        }

        // Closes directory
        closedir($myDirectory);

        // Counts elements in array
        $indexCount=count($dirArray);

        // Sorts fájls
        sort($dirArray);

        // Loops through the array of fájls
        for($index=0; $index < $indexCount; $index++) {

            // Decides if hidden fájls should be displayed, based on query above.
            if(substr("$dirArray[$index]", 0, 1)!=$hide) {

                // Resets Variables
                $favicon="";
                $class="file";

                // Gets fájl Names
                $name=$dirArray[$index];
                $namehref=$dirArray[$index];

                // Gets Date Modified
                $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
                $timekey=date("YmdHis", filemtime($dirArray[$index]));


                // Separates directories, and performs operations on those directories
                if(is_dir($dirArray[$index]))
                {
                    $extn="&lt;Mappa&gt;";
                    $size="&lt;Mappa&gt;";
                    $sizekey="0";
                    $class="dir";

                    // Gets .favicon.ico, and displays it, only if it exists.
                    if(file_exists("$namehref/.favicon.ico"))
                    {
                        $favicon=" style='background-image:url($namehref/.favicon.ico);'";
                        $extn="&lt;Website&gt;";
                    }

                    // Cleans up . and .. directories
                    if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;"; $favicon=" style='background-kép:url($namehref/.favicon.ico);'";}
                    if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
                }

                // fájl-only operations
                else{
                    // Gets fájl extension
                    $extn=pathinfo($dirArray[$index], PATHINFO_EXTENSION);
                    $extn_unf = $extn;    //formázatlan állapotában adja át a kiterjesztést
                    // Prettifies fájl type
                    switch ($extn){
                        case "png": $extn="PNG kép"; break;
                        case "jpg": $extn="JPEG kép"; break;
                        case "jpeg": $extn="JPEG kép"; break;
                        case "svg": $extn="SVG kép"; break;
                        case "gif": $extn="GIF kép"; break;
                        case "ico": $extn="Windows ikon"; break;
						case "bmp": $extn="Bitkép. Komolyan ki használ ilyet?"; break;

                        case "txt": $extn="Szöveges állomány"; break;
                        case "log": $extn="Logfájl"; break;
                        case "htm": $extn="HTML fájl"; break;
                        case "html": $extn="HTML fájl"; break;
                        case "xhtml": $extn="HTML fájl"; break;
                        case "shtml": $extn="HTML fájl"; break;
                        case "php": $extn="PHP Szkript"; break;
                        case "js": $extn="Rohadék Javascript fájl"; break;
                        case "css": $extn="Stíluslap"; break;
						case "cs": $extn="Mocskos .NET kód"; break;

						

                        case "pdf": $extn="PDF dokumentum"; break;
                        case "xls": $extn="MSXLS/2003 Táblázat"; break;
                        case "xlsx": $extn="MSXLS/2010 Táblázat"; break;
                        case "doc": $extn="Microsoft Word Dokumentum"; break;
                        case "docx": $extn="Microsoft Word Dokumentum"; break;

                        case "zip": $extn="ZIP Archívum"; break;
                        case "htaccess": $extn="Apache Config fájl"; break;
                        case "exe": $extn="Windows Program"; break;

                        default: if($extn!=""){$extn=strtoupper($extn)." fájl";} else{$extn="Ismeretlen";} break;
                    }

                    // Gets and cleans up fájl size
                    $size=pretty_filesize($dirArray[$index]);
                    $sizekey=filesize($dirArray[$index]);
                }

                // Output
                echo <<<EOT
		<tr class='$class'>
 <td>
    <a href='$namehref' $favicon' class='name'>$name</a>
</td>
     <td>
<form method="get" action="./codeview.php?code=true&?url=$namehref">
    <input type="hidden" name="url" value="$namehref">
    <input type="hidden" name="ext" value="$extn_unf">
    <input type="submit" class="codeViewBtn" value="Megtekintés">
</form>
    </td>
			<td><a href='./$namehref'>$extn</a></td>

			<td sorttable_customkey='$sizekey'><a href='./$namehref'>$size</a></td>
			<td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
		</tr>
EOT;
            }
        }
        if($_GET['code']==true) {echo('<pre><code class="language-css">codestyle=true</code></pre>'); }
        ?>

        </tbody>
    </table>

    <h2><?php echo("<p class='showHide'><a href='$ahref'>$atext rejtett fájlok</a></p>"); ?></h2>
    <h3>
        <!-- <?php echo("<p class='showHide'><a href='.index.php?upload=true'>$atext feltöltés</a></p>"); ?> --!>
        <form action=".index.php?action=Feltölt" method="GET">
             <input type="submit" name="action_u" value="Feltölt">
        </form>


<!-- ez a része (get) működik!!-->
        <?if($_GET['action_u']=='Feltölt'){
            echo <<<EOT
<p class='debug'>debug: formmethod: POST</p>
<div class="fileinputs">
	        <form enctype="multipart/form-data" action=".fileupload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                <p class="uploadText">Válassz egy fájlt feltöltéshez:</p> <input name="file" type="file" class="fileSelect"/><br />
                <input type="submit" class="feltoltGo" name="feltoltGo" value="Nyomjad!"  />
            </form>
	<div class="fakefile">
		<input id="uploadTextBox" />
		<img src="uploadBtn.png" class="uploadBtn" />
	</div>
</div>


EOT;
            if($_POST["feltoltGo"]=="Nyomjad!"){
                include ('.fileupload.php');
                echo('include=ok');
            }

        } //if 1 vége (get)

        ?>
    </h3>


</div>
</body>
</html>
