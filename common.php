<?php
session_start();

function display_top(){
	echo "Hello <b>". $_SESSION['user'] . "</b> this is Livre d'OR";
	if ($_SESSION['user'] == "admin")
		echo " >> <a href='#' >Secure panel</a>";
	if ($_SESSION['user'] != "guest")
		echo " :  <a href='?logout' >logout</a>";
}

if (isset($_GET['logout']) || ! isset($_SESSION['user']))
{session_destroy();
session_start();
$_SESSION['user'] = "guest";
  setcookie('user', "guest", 1); 
  setcookie('password', "", 1); 

}
if ( $_SESSION['user'] == "guest" && isset($_COOKIE['user']) && isset($_COOKIE['pass']))
 {
 	if ($_COOKIE['user'] == "admin" && $_COOKIE['pass'] == "weak_password")
 		$_SESSION['user'] = "admin";
 }

?>
