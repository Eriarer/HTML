<h4>Melgoza de la Torre Abraham</h4>
<?php
if (!empty($_POST["captcha"] && $_POST["captcha"]) == $_POST["captchaAns"])
{
  echo "Captcha correcto <br>";
}
else
{
  echo "Captcha incorrecto <br>";
}

if (!empty($_POST["remember"]))
{
  setcookie("username", $_POST["username"], time() + 3600);
  setcookie("password", $_POST["password"], time() + 3600);
  echo "Cookies Set Successfuly <br>";
}
else
{
  setcookie("username", "");
  setcookie("password", "");
  echo "Cookies Not Set <br>";
}

?>

<p><a href="index.php"> Go to Login Page</a></p>