<?
include 'common.php';

function action_get_del(& $get) {
	global $db,$tname,$jname,$mname;

	/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = $get['uid'];
	}
	*/

	$db->execute("delete from `$tname` Where id='$get[gid]'");

	$msg = "$jname telah dihapus";
	
	//page_redirect("metadata.php?uid=$uid", $msg);
	page_reload($msg, "$mname.php");
}

function action_post_edit(& $post) {
	global $db,$mname,$tname,$jname;
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

	$field['createdby'] = $_SESSION['uname'];
	$field['created'] = date("Y-m-d H:i:s");
	//$field['created'] = $post['tglYear']."-".$post['tglMonth']."-".$post['tglDay'];

	//echo "<pre>";
	//print_r($field);
	//exit;

	$num = $db->update($tname, $field, "id='$gid'");
	//echo $db->getQueryString();
	//exit;
	
	//if ($num > 0) {

/*
	$id = $gid;

	@unlink("img/$id.jpg");
	@unlink("img/thumb_$id.jpg");
	@unlink("img/large_$id.jpg");
	
	move_uploaded_file($_FILES['foto']['tmp_name'],"img/$id.jpg");
	
       $location='/usr/bin/convert';
       $command='-thumbnail 80';
       $name="img/$id.jpg";
       $output="thumb_$id.jpg";
       $convert=$location . ' ' .$command . ' ' . $name . ' ' . $output;
       exec ($convert);

       $location='/usr/bin/convert';
       $command="-resize '320x240'";
       $name="img/$id.jpg";
       $output="large_$id.jpg";
       $convert=$location . ' ' .$command . ' ' . $name . ' ' . $output;
       exec ($convert);

*/
	$msg = "$jname telah diupdate";
	
	page_redirect("$mname.php", $msg);

	//page_redirect("metadata.php?uid=$uid", 'metadata telah diupdate');
		//page_previous('user telah ditambahkan');
	//} else {
	//	$_SESSION['fields'] = $field;
	//	page_redirect("metadata.php?a=edit&gid=$gid&uid=$uid", 'metadata gagal update');
	//}
}

function action_get_edit(& $get) {
	global $db,$mname,$tname;
	$smarty = new Smarty;
	
	$gid = $get['gid'];
	
/*
	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = (isset($get['uid']) ? $get['uid'] : $uid);
	}

	
	//echo "<pre>";
	//print_r($co);
	//exit;


	$ref = $_SESSION['ref'];
	if($ref=="0") {
		$ref = (isset($get['ref']) ? $get['ref'] : $ref);
	}

	$sql = "SELECT id,nama FROM `daerah` where `id` > 1";

	$rs = $db->execute($sql);
    //print($db->getQueryString());

	
	//echo mysql_error();
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			$ldaerah[] = $dd;
		}
	} else 
		$ldaerah = "";
		
		
		//print_r($ldaerah);
		//exit;


	$smarty->assign('ldaerah', $ldaerah);
*/

	$sql = "SELECT * FROM `$tname` WHERE id = '$gid'";

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
	//$smarty->assign('uid',$uid);
	$smarty->assign('gid',$gid);
	$smarty->assign('data',$xd);
	$smarty->assign('a', 'edit');
	$smarty->display($mname."_detail.htm");
}

function action_post_add(& $post) {
	global $db,$mname,$tname,$jname;

	foreach($post as $k=>$v) {
		if(substr($k,0,2)=='f_')
			$field[substr($k,2)] = $v;
	}
	
	//$field['tgl'] = date("Y-m-d H:i:s");
	$field['created'] = $post['tglYear']."-".$post['tglMonth']."-".$post['tglDay'];
	$field['createdby'] = $_SESSION['uname'];

	//echo "<pre>";
	//print_r($field);
	//exit;


//print_r($m);
//exit;

	//echo "<pre>";
	//print_r($field);
	//exit;
	
	$num = $db->insert($tname, $field);
	//echo $db->getQueryString();
	//exit;
	
	if ($num > 0) {
		$id = $db->last_id();
		$msg = "$jname telah ditambahkan";

		page_redirect("$mname.php", $msg);
		//page_redirect("metadata.php?uid=$uid", 'metadata telah ditambahkan');
		//page_previous('user telah ditambahkan');
	} else {
		$_SESSION['fields'] = $field;
		page_redirect("$mname.php?a=add", "$jname gagal ditambah");
	}
}

function action_get_add(& $get) {
	global $db,$mname,$tname;
	$smarty = new Smarty;

	$uid = $_SESSION['uid'];
	if($uid=="1") {
		$uid = (isset($get['uid']) ? $get['uid'] : $uid);
	}

	$ref = $_SESSION['ref'];
	if($ref=="0") {
		$ref = (isset($get['ref']) ? $get['ref'] : $ref);
	}
	
	$smarty->assign('a', 'add');
	$smarty->display($mname."_detail.htm");
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
	global $db,$mname,$tname,$sfields;
	page_setprevious();
	$query='';
	$param=array();
	$where=false;

	$get['q'] = (isset($get['q']) ? $get['q'] : '');
	
	$wx = explode(",",$sfields);
	$wfields = "";
	foreach($wx as $w) {
		$wfields .= "`$w` LIKE '%$get[q]%' OR ";
	}
	$wfields = substr($wfields,0,-4);

	
	if (isset($get['q'])){
		$query.='q='.$get['q'];
		$param['q']=$get['q'];
		//`id` = '$ref' OR 
		$where="($wfields)";
	} else {
		//`id` = '$ref' OR 
		//$where = "`liga` = '$liga'";
			
	}
	
	$smarty = new SmartyTable("$mname.php?".$query, $get,$param);
	//$smarty->show_table($db, $tname, "`id`,`liga`,`club`,`nama`,`info`", $where);
	$smarty->show_table($db, $tname, $sfields, $where);

	//echo "<pre>";
	//echo $db->getQueryString();
	//print_r($smarty->get_template_vars('data'));
	//$data = $smarty->get_template_vars('data');
	
	//print_r($data);
	
	//$smarty->assign('uid', $uid);
	//$smarty->assign_by_ref('data',$data);
	//print_r($smarty->get_template_vars('data'));
	
	//echo $db->getQueryString();

	$smarty->display("$mname.htm");
}

$mname = "synopsis";
$tname = "synopsis";
$jname = "Synopsis";
$sfields = "id,title,content,created";
//$arsfields = explode(",",str_replace('`','',$sfields));

auth_enter();
page_action();
?>
