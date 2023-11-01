<?php
function randomText($length = 6)
{
  $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
  $key = "";
  for ($i = 0; $i < $length; $i++)
  {
    $key .= $pattern[rand(0, 35)];
  }
  return $key;
}

$captcha = randomText();

?>
<style>
  span {
    font-size: 20px;
    color: blue;
    font-weight: bold;
  }
</style>
<h4>Melgoza de la Torre Abraham</h4>
<form action="page.php" method="post" style="border: 2px dotted blue; text-align: center; width: 400px;">
  <p>
    Username: <input name="username" type="text" value="<?php if (isset($_COOKIE["username"])) echo $_COOKIE["username"]; ?>" />
  </p>
  <p>
    Password: <input name="password" type="password" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"]; ?>" />
  </p>
  <p style="display: flex; flex-direction:column; justify-content: center;">
  <p>Ingrese el captcha: <span><?php echo $captcha; ?></span></p><input name="captchaAns" type="text" size="6" />
  <input type="hidden" name="captcha" value="<?php echo $captcha; ?>">
  </p>
  <p>
    <input type="checkbox" name="remember" /> Recordar usuario y contraseña
  </p>
  <p>
    <input type="submit" value="Login" />
  </p>
</form>