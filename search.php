<?php
/******************************************************************************
*    [+] XSS Training examples.
* 
* @author Med Amine BEN ASKER (Twitter) @asker_amine
* @file search.php 
* This is not a functional guestbook.
* It's an example for training XSS (Cross Site Scripting exploit).
* This script includes a Reflected XSS, Stored XSS as well as SQL injection.
* 
* Follow me (Twitter) @asker_amine and feel free to ask
*****************************************************************************/

include("common.php");
$mysql = $arrayName = array('dbname'     => "xsslab",
                            'dbuser'     => "root",
                            'dbhost'     => "localhost",
                            'dbpass' => "",
                            );

function find_messages($mysql,$nickname){

 mysql_connect($mysql['dbhost'], $mysql['dbuser'], $mysql['dbpass']);
 mysql_select_db($mysql['dbname']);
 
 $sql = mysql_query("SELECT * FROM comments WHERE nickname = '".$nickname."'");
 
 // just to skip displaying SQL error messages
 if (! $sql) return;

if (!mysql_num_rows($sql))
	echo "There is no comment written by : < ". $nickname ." ><br>";
while ($w = mysql_fetch_array($sql))
{
  echo '<p>
        <b>'. $w['nickname'].' </b> <i>'.date('h:i:s d/m/Y ', $w['date_enrg']).'</i> <br>
        '. $w['value'].'
        </p>
        ';
 }

mysql_close();
}

$nickname = (isset($_GET['nickname']) ? $_GET['nickname'] : NULL );

?>
<!DOCTYPE html>
<html>
<head>
	<title>uestbook</title>
</head>

<body>
  <center>
    <p><?php display_top();?></p>
    <hr>
      <?php find_messages($mysql,$nickname); ?>
    <hr>
    <p>
      <form method="GET">
        Search for comment : <input type="text" name="nickname" value="nickname.."><br>
         <input type="submit" value="send">
      </form>
     </p>
 </center>
</body>
</html>
