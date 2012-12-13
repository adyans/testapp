<?
include 'common.php';

function action_get_del(& $get) {
	global $db;

	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = $get['uid'];
	}

	$db->execute("delete from `metadata` Where id='$get[gid]' and uid = '$uid'");

	$msg = 'metadata telah dihapus';
	
	//page_redirect("metadata.php?uid=$uid", $msg);
	page_reload($msg, 'metadata.php?uid=$uid');
}

function action_post_edit(& $post) {
	global $db;
	/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = $post['uid'];
	}*/

	$gid = $post['gid'];
	
	foreach($post as $k=>$v) {
		if(substr($k,0,2)=='f_')
			$field[substr($k,2)] = $v;
	}


	//echo "<pre>";
	//print_r($field);
	//exit;
	
	$num = $db->update('bank', $field, "id='$gid'");
	//echo $db->getQueryString();
	//exit;
	
	//if ($num > 0) {

	$msg = 'bank telah diupdate';
	
	page_redirect("bank.php", $msg);

	//page_redirect("metadata.php?uid=$uid", 'metadata telah diupdate');
		//page_previous('user telah ditambahkan');
	//} else {
	//	$_SESSION['fields'] = $field;
	//	page_redirect("metadata.php?a=edit&gid=$gid&uid=$uid", 'metadata gagal update');
	//}
}

function action_get_edit(& $get) {
	global $db;
	$smarty = new Smarty;

	/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = $get['uid'];
	}
	*/

	$gid = $get['gid'];
	
	//echo "<pre>";
	//print_r($co);
	//exit;

	$sql = "SELECT * FROM `bank` WHERE id = '$gid'";

	$rs = $db->execute($sql);
    //print($db->getQueryString());

	//echo mysql_error();
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			//$type = getTransactionType($dd['trans_type']);
			//$dd['trans_name'] = $type;
			$data[]=$dd;
			break;
		}
	}
	
	$xd = $data[0];

	//echo "<pre>";
	//print_r($xd);
	//exit;
	
	//$smarty->assign('next', $_SESSION['prev']);
	$smarty->assign('gid',$gid);
	$smarty->assign('bank',$xd);
	$smarty->assign('a', 'edit');
	$smarty->display('bank_detail.htm');
}

function action_post_add(& $post) {
	global $db;
	/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = $post['uid'];
	}
	
	foreach($post as $k=>$v) {
		if($k!='but' && $k!='gid' && $k!='uuid')
			$field[$k] = $v;
	}
	
	$field['uuid'] = uuid();
	*/

	//echo "<pre>";
	//print_r($field);
	//exit;
	foreach($post as $k=>$v) {
		if(substr($k,0,2)=='f_')
			$field[substr($k,2)] = $v;
	}
	
	$num = $db->insert('bank', $field);
	//echo $db->getQueryString();
	//exit;
	
	if ($num > 0) {
		$msg = 'bank telah ditambahkan';


		page_redirect("bank.php", $msg);
		//page_redirect("metadata.php?uid=$uid", 'metadata telah ditambahkan');
		//page_previous('user telah ditambahkan');
	} else {
		$_SESSION['fields'] = $field;
		page_redirect('bank.php?a=add', 'bank gagal ditambah');
	}
}

function action_get_add(& $get) {
	global $db;
	$smarty = new Smarty;
	/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = (isset($get['uid']) ? $get['uid'] : $uid);
	}
	*/

	//$smarty->assign('next', $_SESSION['prev']);
	
	//$data['title'] = "Template for FGDC";
	
	//$smarty->assign('data', $data);	
	//$smarty->assign('uid', $uid);	
	$smarty->assign('a', 'add');
	$smarty->display('bank_detail.htm');
	unset ($_SESSION['fields']);
}

/*
function action_get_download(& $get) {
	global $db;
	
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = $get['uid'];
	}
	
	$sql = "SELECT id,root,title,type,charge,ctype,tag FROM `metadata` WHERE `cpid` = '$uid'";

	$rs = $db->execute($sql);
    //print($db->getQueryString());

	//echo mysql_error();
	$download = "id,root,title,type,charge,ctype\n";
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			$download .= $dd['id'].",".$dd['root'].",".$dd['title'].",".$dd['type'].",".$dd['charge'].",".$dd['ctype'].",".$dd['tag']."\n";
		}
		
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			
			header("Content-Type: application/force-download");
			header("Content-Disposition: attachment; filename=".time().".csv");
			header("Content-Description: File Transfer");
			echo $download;
		}
}
*/

function action_default(& $get, & $post) {
	global $db;
	/*
	$field = array ();
	page_setprevious();
	$query='';
	$param=array();
	$where=false;
	if (isset($get['q'])){
		$query.='q='.$get['q'];
		$param['q']=$get['q'];
		$where="title like '%$get[q]%'";
	}

	//$smarty = new SmartyTable('members.php?'.$query, $get,$param);
	//$smarty->show_table($db, 'users', "uid,uname,tgl_reg,first_login,tgl_expire", $where);
	
	$smarty = new SmartyTable('content.php?'.$query, $get, $param, 1);
	$smarty->show_table($db, 'cp_content', "*", $where);

	$limit = $smarty->limit + 1;
	$where = '';
	$query = '';
	
	$uid = $_SESSION['uid'];
	
	$w = "uid='$uid'";
	$cpurl = $db->lookup("user","url",$w);
	
	$rs = $db->execute('select * from cp_content where `cpid` = '.$uid.' Order By '.$smarty->order.' Limit '.$smarty->start.','.$limit);
	$smarty->num_rows = $rs->num_rows();
	$all = $rs->fetch_all_assoc(-- $limit);

	$rs->free();

	$smarty->assign('cpurl', $cpurl);
	$smarty->assign_by_ref('data', $all);
	$smarty->display('content.htm');
	*/
	
	/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = (isset($get['uid']) ? $get['uid'] : $uid);
	}
	*/
	
	page_setprevious();
	$query='';
	$param=array();
	$where=false;
	if (isset($get['q'])){
		$query.='q='.$get['q'];
		$param['q']=$get['q'];
		$where="`ltime` like '%$get[q]%' OR `msg` like '%$get[q]%'";
	}
	
	$smarty = new SmartyTable('log.php?'.$query, $get,$param,"2 desc");
	$smarty->show_table($db, 'log', "id,ltime,msg", $where);
	//echo "<pre>";
	//print_r($smarty->get_template_vars('data'));
	//$data = $smarty->get_template_vars('data');
	
	//print_r($data);
	
	//$smarty->assign('uid', $uid);
	//$smarty->assign_by_ref('data',$data);
	//print_r($smarty->get_template_vars('data'));
	
	//echo $db->getQueryString();
	$smarty->display('log.htm');
	
}

auth_enter();
if ($_SESSION['level'] != 0) {
	page_reload('You have no permision', 'index.php');
	exit;
}
page_action();
?>
