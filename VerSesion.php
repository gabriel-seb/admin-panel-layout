<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
ini_set("session.cookie_lifetime","36000");
session_start();
$_SESSION["time"] = time();

if (time() - $_SESSION["time"] < 3600)  {
echo 'no ha pasado una hora';
echo '<br/>';
echo $_SESSION["time"];
echo '<br/>';
echo time();
}else{
echo 'ha pasado mas de una hora';
session_destroy();
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<a href="Checkout.php">Sesion</a>
</body>
</html>
