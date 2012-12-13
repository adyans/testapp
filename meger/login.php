<?php
include 'common.php';


function action_post_login(&$post)
{
	$remember=(isset($post['remember']))? TRUE: FALSE;
	$next=(isset($post['next']))? $post['next'] : FALSE;
	auth_dologin($post['uname'],$post['passwd'],$next,$remember);
}

function action_get_logout(&$get)
{
	auth_dologout();
}

function action_default(&$get,&$post)
{
	$smarty=new Smarty;

	page_setprevious();

	if (isset($get['next']))$smarty->assign('next',$get['next']);
	if(isset($get['t']))
		$smarty->display('logins.htm');
	else
		$smarty->display('login.htm');
	$_SESSION['message']='';
}

page_action();
?>

