<?php
session_start();
ob_start();


$dbHost  	= "localhost";
$dbName 	= "bilet_final";
$dbUser 	= "bilet_final";
$dbPass 	= "2&Gpe8d6";


try{
	$db = new PDO("mysql:host=".$dbHost.";dbname=".$dbName.";charset=utf8",$dbUser,$dbPass);
	$db->query("SET CHARACTER SET UTF8");
	$db->query("SET NAMES 'utf8'");
}catch(PDOException $e){
	print $e->getMessage();
	die();
}
$ayar = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
$bakim = $db->query("SELECT * FROM bakim")->fetch(PDO::FETCH_ASSOC);


define("PATH",realpath("."));
define("URL",$ayar["site_url"]);
define("TEMA_URL",URL."tema/");
define("TEMA_INC","tema/");
define("ADMIN_URL",URL."admin/");
define("TEMA_YAPIM","tema/bakim/");
define("YAPIM_AST",URL."tema/bakim/yapim/");			
define("SITE",TRUE);
define("NFTBILET","nftbilet/");

require_once("f.php");


?>
