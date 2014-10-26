<?php
/******************************************************************************
*    [+] XSS Training examples.
* 
* @author Med Amine BEN ASKER (Twitter) @asker_amine
* @file signin.php 
* This is not a functional guestbook.
* It's an example for training XSS (Cross Site Scripting exploit).
* This script includes a Reflected XSS, Stored XSS as well as SQL injection.
* 
* Follow me (Twitter) @asker_amine and feel free to ask
*****************************************************************************/
include("common.php");
function valid_user($username, $password)
{
 if ($username == "admin" && $password == "weak_password")
 	return true;
 if ($username == "admin" && $password != "weak_password")
 	return false;
// ELSE
 if (!empty($username))
 return true;
}

$username = isset($_POST['username']) ? $_POST['username'] : NULL;
$password = isset($_POST['password']) ? $_POST['password'] : NULL;

if ( valid_user($username, $password ) )
{
  $_SESSION['user'] = $username;
  setcookie('user', $username, time() + 365*24*3600); 
  setcookie('password', $password, time() + 365*24*3600); 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Guestbook</title>
</head>

<body>
 <center>
   <p><?php display_top();?></p>
   <hr>
  <p>
       <a href="livredor.php">Go to the guestbook </a><br>
   <form method="POST">
     <input type="text" name="username" value="username"><br>
     <input type="password" name="password" ><br>
     <input type="submit" value="connect">
   </form>
  </p>
  </center>
</body>
</html>
