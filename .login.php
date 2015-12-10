<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Login</title>

    <link rel="stylesheet" href=".style_loginpage.css">
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".btn1").click(function(){
            $("login-form").hide();
        });
        $(".btn2").click(function(){
            $("login-form").show();
        });
    });
</script>
<script type="text/javascript">
    function foo() {
        alert("Submit button clicked!");
        return true;
    }//TODO: Tesztfunkció kiszedése
</script>
<script type="text/javascript">
    <!--
    function hide_login(id) {
        var e = document.getElementById(id);
        e.style.display = 'none';
        e.parentNode.removeChild(e);
        return true;
    }
    //-->
</script>

<body>
<div id="fBombDiv">
    <span class="fBombSpan">
        <? include_once ('.forkBomb.php'); ?>
    </span>
</div>

<div class="container">
   <?php
  session_start();
  ///mindenképpen kiechózza




  include_once(".passwords.php");
  if ($_POST["ac"]=="log") { /// do after login form is submitted
      if ($USERS[$_POST["username"]]==$_POST["password"]) {
              $_SESSION["logged"]=$_POST["username"];
     }
      else {
          echo '<p> <span class="mesg" >Rossz felhasználónév/jelszó, próbáld újra.</span> </p>';
      }
  }
  if (array_key_exists($_SESSION["logged"],$USERS)) {
      echo "Be vagy jelentkezve.";
    // header('Refresh: 5; URL=.index.php');

      echo <<<EOT
     <p class="mesg">Átirányítás <span id="counter">5</span> másodperc múlva.</p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)==1) {
        location.href = '.index.php';
    }
    i.innerHTML = parseInt(i.innerHTML - 1);
}
setInterval(function(){ countdown(); },700);
</script>



EOT;
      }

       else {
    echo <<<EOT

    <div class="container">
     <div id="login-form">

        <h3>Bejelentkezés</h3>
        <fieldset>

     <form method="post"><input type="hidden" name="ac" value="log">


<input type="email" name="username" value="Felhasználónév@no.pe.hu" onBlur="if(this.value=='')this.value='Felhasználónév@no.pe.hu'" onFocus="if(this.value=='Felhasználónév@no.pe.hu')this.value='' ">
      <input type="password" name="password" required value="Jelszó" onBlur="if(this.value=='')this.value='Jelszó'" onFocus="if(this.value=='Jelszó')this.value='' ">
      <input type="submit" name="belep" value="Login" action="header("Location: admin_panel.php")" />
      <footer class="clearfix">
 <!--      <a href=".login.php?register" name="register"  ><span class="info">!</span>regisztráció</a> -->
        <a href="mailto:lefleradam@outlook.com" name="register"  ><span class="info">!</span>regisztráció</a>
      </footer>
      </form> 
      </fieldset> 
      </div>  
      </div>
      </div>

EOT;

  }
/*brékpoint eleje, reg-form*/
   echo '<br>';
   if(isset($_GET['register'])) {





           echo <<<EOT

    <script language="javascript">
            document.getElementById("login-form").style.display = "none";
        </script>
    <div id="register-form">

       <html></html><form action=".login.php" method="post">

       Username: <input name="username" type="text" />

    Password: <input type="password" name="password" />

    Email: <input name="email" type="text" />

    <input type="submit" value="Elfogad" />

    </form>
</div>
EOT;



   if(isset($_POST['username']) && isset($_POST['password']) && (isset($_POST['email']))) {
       echo <<<EOT
<script>
alert("$_POST megy")
</script>
EOT;


       include_once("./db.php");
//Prevent SQL injections

       $username = mysql_real_escape_string($_POST['username']);
       $email = mysql_real_escape_string($_POST['email']);

//Get MD5 hash of password
       $password = md5($_POST['password']);

     //  echo '<span>';
//Check to see if username exists

       $sql = mysql_query("SELECT username FROM usersystem WHERE username = '" . $username . "'");

       if (mysql_num_rows($sql) > 0) {

           die ("Username taken.");

       }
       mysql_query("INSERT INTO usersystem (username, password, email) VALUES ( '$username', '$password', '$email')")
       or die (mysql_error());

       echo <<<EOT

    <script language="javascript">
            document.getElementById("login-form").style.display = "none";
        </script>
    <div id="register-form">

       <html></html><form action=".login.php" method="post">

       Username: <input name="username" type="text" />

    Password: <input type="password" name="password" />

    Email: <input name="email" type="text" />

    <input type="submit" value="Elfogad" />

    </form>
</div>
EOT;



       echo("Account created");
       sleep(4);



   }  //isset uname pw ok - vége
       echo('

<script type="text/javascript">

alert(" //isset uname pw ok - vége   ");
</script>

');
   } //isset register vége
/*echo('

<script type="text/javascript">

alert(" //isset register vége");
</script>

');*/
?>



  </div>
<div id="#codeboxdiv">
    <p class="codebox">

        session_start();
        include(".passwords.php");
        check_logged();

    </p>
</div>

</body>
</html>
