<?
include 'common.php';


function action_post_password(&$param)
{
	global $db;

	$where = "uid='$_SESSION[uid]' AND passwd='".md5($param['old'])."'";
	$uid=$db->lookup('user','uid',$where);
	
	//var_dump($db->getQueryString());
	//var_dump($uid);
	//exit;

	if ($uid===FALSE){
		return page_redirect('account.php?a=password','Your old password wrong');	
	} else {
		if ($param['new']==$param['re']){
			$f['passwd']=md5($param['new']);
			$db->update('user',$f,"uid='$_SESSION[uid]'");
			return page_redirect('account.php','Your password has changed');	
		} else {
			return page_redirect('account.php?a=password','Retype your password wrong');	
		}
	}
	
}

function action_get_password(&$param)
{
	$smarty=new Smarty;
	$smarty->display('account_passwd.htm');	
}

function action_default(&$get,&$post)
{
	global $db;
	$smarty=new Smarty;
	$q=$db->execute("select * from user Where uid='$_SESSION[uid]'");
	$field=$q->fetch_assoc();
	$q->free();
	if ($_SESSION['level']==1){
			$field['group']=$db->lookup('groups','group_name',"group_id='$_SESSION[ref]'");
	}
	$smarty->assign_by_ref('field',$field);	
	$smarty->display('account.htm');	
}

auth_enter();
page_action();
?>
