<?php
include 'common.php';

function action_default(&$get,&$post)
{
	global $db;
	$smarty=new Smarty;
	if (isset($get['s'])){
		$start=$get['s'];
	} else {
		$start=0;
	}
	$smarty->display('index.htm');	
}

$jname = "Index";

auth_enter();
page_action();

?>
