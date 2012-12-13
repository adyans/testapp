<?php
error_reporting(E_ALL);
//error_reporting(E_NONE);
ini_set('error_display','On');
include 'incs/db.mysql.class.php';
include "libs/adodb/adodb.inc.php";
include 'config.php';

if(!function_exists("simplexml_load_file")){
 require_once "libs/simplexml.class.php";
 
 function simplexml_load_file($file){
  $sx = new simplexml;
  return $sx->xml_load_file($file);
 }
}

if(!function_exists("simplexml_load_string")){
 function simplexml_load_string($xmlcontent){
  $sx = new simplexml;
  return $sx->xml_load_string($xmlcontent);
 }
}

$db=new Database();
$ret=$db->connect($setting['dbhost'],$setting['dbuser'],$setting['dbpass'],$setting['dbname']);
if (!$ret){
	echo mysql_error();
	exit;
}

//$db=new Database($oradb);
//$_GLOBAL['db']=$db;

include 'incs/auth.inc.php';


define('OP_ISAT',1);
define('OP_TSEL',2);
define('OP_XL',3);

function sendGet($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function sendPost($url,$fields){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, strlen($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ask for results to be returned
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
}

function page_exit()
{
	global $db;
	$db->close();	
}
function getMonthName($month)
{
	global $db;
	if($month=="")
		$month = date('m');
	
	switch($month) {
		case 1:
			$m = "Januari";
			break;
		case 2:
			$m = "Februari";
			break;
		case 3:
			$m = "Maret";
			break;
		case 4:
			$m = "April";
			break;
		case 5:
			$m = "Mei";
			break;
		case 6:
			$m = "Juni";
			break;
		case 7:
			$m = "Juli";
			break;
		case 8:
			$m = "Agustus";
			break;
		case 9:
			$m = "September";
			break;
		case 10:
			$m = "Oktober";
			break;
		case 11:
			$m = "November";
			break;
		case 12:
			$m = "Desember";
			break;
	}
	return $m;
}

function logit($msg)
{
	global $db;
	$msg = $_SESSION['uname']." - $msg";
	$db->execute("INSERT INTO `log` VALUES('',NOW(),'$msg')");
}

include 'libs/Smarty.class.php';
include 'incs/page.inc.php';
?>
