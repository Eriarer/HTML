<h4>Melgoza de la Torre Abraham</h4>
<form action="page.php" method="post" style="border: 2px dotted blue; text-align: center; width: 400px;">
  <p>
    Username: <input name="username" type="text" value="<?php if (isset($_COOKIE["username"])) echo $_COOKIE["username"]; ?>" />
  </p>
  <p>
    Password: <input name="password" type="password" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"]; ?>" />
  </p>
  <p>
    <input type="checkbox" name="remember" /> Recordar usuario y contraseña
  </p>
  <p>
    <input type="submit" value="Login" />
  </p>
</form>