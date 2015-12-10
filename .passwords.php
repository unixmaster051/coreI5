<?php
$USERS["lefleradam@outlook.com"] = "qwerty";
$USERS["admin@no.pe.hu"] = "qwerty";
$USERS["admin"] = "qwerty";
$USERS["patrik@no.pe.hu"] = "qwerty1234";
$USERS["bence@no.pe.hu"] = "qwerty";

function check_logged(){
    global $_SESSION, $USERS;
    if (!array_key_exists($_SESSION["logged"],$USERS)) {
        echo <<<EOT
       <script type="text/javascript">
     <p>Várjunk csak! te nem vagy bejelentkezve! Spuri a login oldalra...<span id="counter">5</span></p>
        <script type="text/javascript">
            function countdown() {
             var i = document.getElementById('counter');
            if (parseInt(i.innerHTML)<=0) {
          location.href = '.login.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },500);
</script>
EOT;
        header("Location: .login.php");
    };
};

/**
 * Created by PhpStorm.
 * User: Rendszergazda
 * Date: 2015.06.06.
 * Time: 19:53
 */


?>

