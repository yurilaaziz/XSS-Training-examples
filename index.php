<?php 
/******************************************************************************
*    [+] XSS Training examples.
* 
* @author Med Amine BEN ASKER (Twitter) @asker_amine
* @file index.php 
* This is not a functional guestbook.
* It's a XSS Training examples (Cross Site Scripting ).
* This script includes a Reflected XSS, Stored XSS as well as SQL injection.
* 
* Follow me (Twitter) @asker_amine and feel free to ask
*****************************************************************************/
include("common.php"); ?>
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
    <a href="signin.php">Sign in </a>
  </p>
 </center>
</body>
</html>
