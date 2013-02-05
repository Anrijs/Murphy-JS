<?php
include"js/database.config.php";

$link = mysql_connect($host,$user,$password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_set_charset('utf8',$link);
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Can\'t use selected db : ' . mysql_error());
}
session_start();
$name = $_SESSION['name'];
$levels = ($_POST['lev']);

$results = mysql_query("SELECT * FROM `murphy` WHERE user LIKE '$name'");

$num_rows = mysql_num_rows($results);
if($num_rows==0&&$name!==NULL)
{mysql_query("INSERT INTO `$database`.`murphy` (`user`, `levels`) VALUES ('$name', '$levels');");}
else if ($name!==NULL)
{
	mysql_query("UPDATE  `$database`.`murphy` SET  `levels` =  '$levels' WHERE  `murphy`.`user` =  '$name' LIMIT 1 ;
");
}

?>