<?php
define ('PAGE_REDIRECT',1);
include 'smartytable.class.php';
function page_action()
{
	if (function_exists('page_enter'))page_enter();
	if (isset($_POST['a'])){
		$function='action_post_'.$_POST['a'];
		unset($_POST['a']);
		if (function_exists($function)){
			$return=@call_user_func($function,&$_POST);
		} else {
			logit('Error: You must define '.$function.'(&$param)');
			die('Error: You must define '.$function.'(&$param)');
		}
	} else if (isset($_GET['a'])){
		$function='action_get_'.$_GET['a'];
		unset($_GET['a']);
		if (function_exists($function)){
			$return=@call_user_func($function,&$_GET);
			if ($return==PAGE_REDIRECT);
			else unset($_SESSION['message']);
		} else {
			logit('Error: You must define '.$function.'(&$param)');
			die('Error: You must define '.$function.'(&$param)');
		}
	}	else {
		$return=action_default($_GET,$_POST);
		if ($return==PAGE_REDIRECT);
		else unset($_SESSION['message']);
	}
	
	if (function_exists('page_exit'))page_exit();
}

function page_redirect($url,$message=FALSE)
{
	logit($message);
	if ($message)$_SESSION['message']=$message;
	else unset($_SESSION['message']);
	header("location: $url");
	return PAGE_REDIRECT;
}
function page_setprevious(){
	$next=$_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])&&strlen($_SERVER['QUERY_STRING']))$next.='?'.$_SERVER['QUERY_STRING'];;
	$_SESSION['prev'] = $next;
}
function page_getprevious(){
	return $_SESSION['prev'];
}
function page_previous($message=FALSE,$default='index.php')
{
	logit($message);
	if ($message)$_SESSION['message']=$message;
	else unset($_SESSION['message']);
	$url=(isset($_SESSION['prev']))?$_SESSION['prev']:$default;
	header("location: $url");
	return PAGE_REDIRECT;
}
function page_saveParam(&$param)
{
	if ($param)$_SESSION['param']=$param;
	else unset($_SESSION['param']);
}
function page_getParam()
{
	if(isset($_SESSION['param']) && is_array($_SESSION['param'])>0)return $_SESSION['param'];
	return null;
}
function page_reload($message=FALSE,$default='index.php')
{
	logit($message);
	if ($message)$_SESSION['message']=$message;
	else unset($_SESSION['message']);
	$url=(isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:$default;
	header("location: $url");
	return PAGE_REDIRECT;
}
?>
