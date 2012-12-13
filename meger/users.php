<?
include 'common.php';

function action_post_add(& $post) {
	global $db;
	$field['uname'] = $post['uname'];
	$field['passwd'] = md5($post['passwd']);
	$field['nama'] = $post['nama'];
	$field['ref'] = $post['ref'];
	$field['level'] = $post['level'];
	
	/*
	$field['levels'] = $post['level'];
	if ($field['levels'] == 1 && isset ($post['group_id'])) {
		$field['ref'] = $post['group_id'];
	}
	*/

	if($field['level']=="0") {
		$areas = "*";
	} else {
		$areas = "data_simpul|e,data_instansi_pusat|e";	
	}
	
	/*
	$areas = "";
	foreach($post['areas'] as $k=>$v) {

		$fi = "";		
		if(isset($post['fadd'])) {
			if(is_numeric(array_search($v."_add",$post['fadd'])))
				$fi .= "a";
		}

		if(isset($post['fedit'])) {
			if(is_numeric(array_search($v."_edit",$post['fedit'])))
				$fi .= "e";
		}
		
		if(isset($post['fdel'])) {
			if(is_numeric(array_search($v."_del",$post['fdel'])))
				$fi .= "d";
		}
		
		$areas .= "$v|$fi,";
		//$areas .= "$v,";
	}
	$areas = substr($areas,0,-1);
	
	if(stristr($areas,"*")!="") $areas = "*";
	*/
	
	$field['area'] = $areas;


//print_r($field);
//exit;


	$num = $db->insert('user', $field);
	if ($num > 0) {
		page_redirect('users.php', 'user telah ditambahkan');
		//page_previous('user telah ditambahkan');
	} else {
		$_SESSION['fields'] = $field;
		page_redirect('users.php?a=add', 'user telah ada');
	}
}

function action_post_edit(& $post) {
	global $db;
	if (isset ($post['pwd_change']))
		$field['passwd'] = md5($post['passwd']);
		
		
	//$field['uname'] = $post['uname'];
	$field['nama'] = $post['nama'];
	$field['ref'] = $post['ref'];
	$field['level'] = $post['level'];
	
	
	if($field['level']=="0") {
		$areas = "*";
	} else {
		$areas = "data_simpul|e,data_instansi_pusat|e";	
	}
		
	//$field['levels'] = $post['level'];
	/*
	$areas = "";

	//var_dump($post);
		
	foreach($post['areas'] as $k=>$v) {

		$fi = "";		
		if(isset($post['fadd'])) {
			if(is_numeric(array_search($v."_add",$post['fadd'])))
				$fi .= "a";
		}

		if(isset($post['fedit'])) {
			if(is_numeric(array_search($v."_edit",$post['fedit'])))
				$fi .= "e";
		}
		
		if(isset($post['fdel'])) {
			if(is_numeric(array_search($v."_del",$post['fdel'])))
				$fi .= "d";
		}
		
		$areas .= "$v|$fi,";
	}
	$areas = substr($areas,0,-1);
	
	//var_dump($areas);
	//exit;
	
	if(stristr($areas,"*")!="") $areas = "*";
	*/
	
	$field['area'] = $areas;

	//$field['ref'] = $post['f_did'];
	
	//$field['nama'] = $post['nama'];

	$num = $db->update('user', $field, "uid='$post[uid]'");
	
	//echo $db->getQueryString();
	page_redirect('users.php', 'user telah diupdate');
}

function action_get_del(& $get) {
	global $db;
	//if ($_SESSION['level'] != 0)
	//	page_reload('You have no permision', 'index.php');
	$db->execute("delete from user Where uid='$get[uid]'");
	page_reload('user has been deleted', 'users.php');
}

function action_get_edit(& $get) {
	global $db;
	if (!isset ($_SESSION['messages']))
		$_SESSION['prev'] = $_SERVER['HTTP_REFERER'];
		
	$ff = _getFiles();
	$smarty = new Smarty;
	$smarty->assign('next', $_SESSION['prev']);
	$smarty->assign('a', 'edit');
	$rs = $db->execute("select * from user Where uid='$get[uid]'");
	if ($rs->num_rows() > 0) {
		$data = $rs->fetch_assoc();
		$rs->free();
		/*
		if ($data['level'] == 1) {
			$data['group_name'] = $db->lookup('groups', 'group_name', "group_id='$data[ref]'");
		} else
			if ($data['level'] == 2) {
				$data['cp_name'] = $db->lookup('content_provider', 'cp_name', "cp_id='$data[ref]'");
			}
		*/
		$ix = 0;
		$cb = "";

		$fpxo = explode(",",$data['area']);
		
		$ao = "";
		foreach($fpxo as $ai) {
			$aii = explode("|",$ai);
			$ao .= $aii[0].",";
		}
		$areas = explode(",",substr($ao,0,-1));
		
		$found = false;
		$sa = "";
		$se = "";
		$sd = "";
		
		$cb = "<table><tr><td colspan='4'><input type=\"checkbox\" name=\"areas[]\" value=\"*\" id=\"*\"/><label for=\"*\">*</label></td></tr>";
		foreach($ff as $kf=>$vf) {
			foreach($areas as $k=>$v) {
				if(strtolower($v)==strtolower($vf) || $v=="*") {
					$c = "checked=\"checked\"";
					$found = true;
					break;
				} else {
					$c = "";
				}
			}
			reset($areas);
			//$ix++;
			
			//if($vf=="direktori") {
			if($found) {
				$fix = explode("|",$fpxo[$k]);
				$fi = $fix[1];
				
				//echo "<pre>";
				//echo "$vf fi $fi\n";

				$sa = (stristr($fi,"a")) ? "checked=\"checked\"" : "";
				$se = (stristr($fi,"e")) ? "checked=\"checked\"" : "";
				$sd = (stristr($fi,"d")) ? "checked=\"checked\"" : "";

				//var_dump("sa ".$sa);
				//var_dump("se ".$se);
				//var_dump("sd ".$sd);
				//exit;
			//}
			}
			
			
			$cb .= "<tr>
	<td><input type=\"checkbox\" name=\"areas[]\" value=\"$vf\" id=\"$vf\" $c/><label for=\"$vf\">$vf</label></td>
	<td><input type=\"checkbox\" name=\"fadd[]\" value=\"".$vf."_add\" id=\"".$vf."_add\" $sa/><label for=\"".$vf."_add\">add</label></td>
	<td><input type=\"checkbox\" name=\"fedit[]\" value=\"".$vf."_edit\" id=\"".$vf."_edit\" $se/><label for=\"".$vf."_edit\">edit</label></td>
	<td><input type=\"checkbox\" name=\"fdel[]\" value=\"".$vf."_del\" id=\"".$vf."_del\" $sd/><label for=\"".$vf."_del\">del</label></td>
			</tr>";
			
			$sa = "";
			$se = "";
			$sd = "";
			$found = false;
			/*
			if($ix>3) {
				$ix = 0;
				$cb .= "<br />";
			}
			*/
		}
		$cb .= "</table>";
		//exit;
		
		//print_r($cb);
		
		$data['areas'] = $cb;
		
		//print_r($data);
		$smarty->assign_by_ref('user', $data);
	}



	$level = $_SESSION['level'];
	$ref = $_SESSION['ref'];
	if($ref=="0") 
		$sql = "SELECT id,nama FROM `daerah`";
	else {
		if($level=="0")	
			$sql = "SELECT id,nama FROM `daerah` WHERE `id` = '$level' OR `root` = '$ref'";
		else
			$sql = "SELECT id,nama FROM `daerah` WHERE `id` = '$level'";
	}
	

	$rs = $db->execute($sql);
    //print($db->getQueryString());

	//echo mysql_error();
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			$daerah[] = $dd;
		}
	} else {
		$daerah = "";
	}
	
	
	$smarty->assign('daerah', $daerah);	
	$smarty->assign('ref', $ref);	





	$sql = "SELECT id,nama FROM `direktori`";
	$rs = $db->execute($sql);
    //print($db->getQueryString());

	//echo mysql_error();
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			$dir[] = $dd;
		}
	} else {
		$dir = "";
	}
	
	
	$smarty->assign('dir', $dir);	






	$smarty->display('user_detail.htm');
}

function _getFiles() {
	if ($handle = opendir('.')) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != ".." && substr(strtolower($file),-3)=="php" && $file != "common.php" && $file != "config.php" && $file != "index.php" && $file != "login.php" && substr($file,0,1) != "_") {
				$ff[] = substr($file,0,-4);
			}
		}
		closedir($handle);
	}
	return $ff;
}

function action_get_add(& $get) {
	global $db;
	$smarty = new Smarty;
	
	//$ff = _getFiles();
	
	if (isset ($_SESSION['HTTP_REFERER']))
		$_SESSION['prev'] = $_SERVER['HTTP_REFERER'];
	if (isset ($get['gid'])) {
		$rs = $db->execute("select parent_id,group_name From groups Where group_id='$get[gid]'");
		if ($rs->num_rows() == 0) {
			return page_previous('Group not Found', 'users.php');
		} else {
			$group = $rs->fetch_assoc();
			$user['level'] = 1;
			$user['group_name'] = $group['group_name'];
			$user['group_id'] = $get['gid'];
			$smarty->assign_by_ref('user', $user);
		}
		$rs->free();
	}

	/*
	$ix = 0;
	$cb = "<table>";
	$cb .= "<tr><td><input type=\"checkbox\" name=\"areas[]\" value=\"*\" id=\"*\"/><label for=\"*\">*</label></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
	foreach($ff as $k=>$v) {
		$ix++;
		$cb .= "<tr><td><input type=\"checkbox\" name=\"areas[]\" value=\"$v\" id=\"$v\" /><label for=\"$v\">$v</label></td>
		<td><input type=\"checkbox\" name=\"fadd[]\" value=\"".$v."_add\" id=\"".$v."_add\" /><label for=\"".$v."_add\">add</label></td>
		<td><input type=\"checkbox\" name=\"fedit[]\" value=\"".$v."_edit\" id=\"".$v."_edit\" /><label for=\"".$v."_edit\">edit</label></td>
		<td><input type=\"checkbox\" name=\"fdel[]\" value=\"".$v."_del\" id=\"".$v."_del\" /><label for=\"".$v."_del\">del</label></td>
		</tr>\n";
	}
	$cb .= "</table>";
	
	$areas = $cb;
	$user['areas'] = $areas;
	*/

	$smarty->assign('user', $user);


	$level = $_SESSION['level'];
	$ref = $_SESSION['ref'];
	/*
	if($ref=="0") 
		$sql = "SELECT id,nama FROM `daerah`";
	else {
		if($level=="0")	
			$sql = "SELECT id,nama FROM `daerah` WHERE `id` = '$level' OR `root` = '$ref'";
		else
			$sql = "SELECT id,nama FROM `daerah` WHERE `id` = '$level'";
	}
	

	$rs = $db->execute($sql);
    //print($db->getQueryString());

	//echo mysql_error();
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			$daerah[] = $dd;
		}
	} else {
		$daerah = "";
	}
	
	
	$smarty->assign('daerah', $daerah);	
	*/

	$sql = "SELECT id,nama FROM `direktori`";
	$rs = $db->execute($sql);
    //print($db->getQueryString());

	//echo mysql_error();
	if ($rs->num_rows()>0){
		while($dd = $rs->fetch_assoc()) {
			$dir[] = $dd;
		}
	} else {
		$dir = "";
	}
	
	
	$smarty->assign('dir', $dir);	
	
	$smarty->assign('ref', $ref);	


	//$smarty->assign('next', $_SESSION['prev']);
	$smarty->assign('a', 'add');
	$smarty->display('user_detail.htm');
	unset ($_SESSION['fields']);
}

function action_default(& $get, & $post) {
	global $db;
	$field = array ();
	$smarty = new SmartyTable('users.php', $get, $field, 1);

	$limit = $smarty->limit + 1;
	$where = '';
	$query = '';
	$rs = $db->execute('select uid,uname,level,area,nama from user Order By '.$smarty->order.' Limit '.$smarty->start.','.$limit);
	$smarty->num_rows = $rs->num_rows();
	$all = $rs->fetch_all_assoc(-- $limit);

	$rs->free();

	$smarty->assign_by_ref('users', $all);
	$smarty->display('users.htm');
}

auth_enter();
if ($_SESSION['level'] != 0) {
	page_reload('You have no permision', 'index.php');
	exit;
}
page_action();
?>
