<?php
if (defined('AUTH_INC_PHP'))return;
define('AUTH_INC_PHP',1);
session_start();

function auth_enter($maxlevel=99,$loginpage='login.php'){
	if (!auth_islogin()){
		$next=$_SERVER['PHP_SELF'];
		if (isset($_SERVER['QUERY_STRING'])&&strlen($_SERVER['QUERY_STRING']))$next.='?'.$_SERVER['QUERY_STRING'];
		$next=urlencode($next);
		header("location: $loginpage?next=$next");
		exit;
	} else {
		$area = $_SESSION['area'];
		$fpxo = explode(",",$area);
		$ao = "";
		foreach($fpxo as $ai) {
			$aii = explode("|",$ai);
			$ao .= $aii[0].",";
		}
		$area = substr($ao,0,-1);
		$fpx = explode(",",$area);
		$fp = $fpx[0];
		$sname = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1,strlen($_SERVER['SCRIPT_NAME'])-4-(strrpos($_SERVER['SCRIPT_NAME'],"/")+1));


		if((stristr($area,$sname)=="")) {
			if(stristr($area,"*")=="") {
				if($fp!=$sname) {
					//return page_reload('You have no permission', 'index.php');
					echo "<script>alert('Anda tidak berhak mengakses $sname, anda hanya dapat mengakses $area harap hubungi administrator anda');document.location='$fp.php'</script>";
					//return page_reload('', "$fp.php");
					exit;
				} 
			}
		} else {
			//cek func
			$aks = isset($_GET['a']) ? $_GET['a'] : "";
			if($aks!="" && $aks!="password") {
				$r = array_search($sname,$fpx);
				 if(is_numeric($r)) {
					$fi = $fpxo[$r];
					$fix = explode("|",$fi);
					$fallowed = $fix[1];
					
					$f1 = substr($aks,0,1);
					//var_dump($fallowed);
					//var_dump($f1);
					
					if(stristr($fallowed,$f1)=="") {
						if($_SERVER['HTTP_REFERER']!="")
							$nxt = $_SERVER['HTTP_REFERER'];
						else
							$nxt = "$fp.php";
						
					echo "<script>alert('Anda tidak berhak mengakses fungsi $aks, harap hubungi administrator anda');document.location='$nxt'</script>";
					//return page_reload('', "$fp.php");
					exit;
					}
				}
			
			}
		}
		/*
		$area = $_SESSION['area'];
		$fpx = explode(",",$area);
		$fp = $fpx[0];
		$sname = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1,strlen($_SERVER['SCRIPT_NAME'])-4-(strrpos($_SERVER['SCRIPT_NAME'],"/")+1));

		if((stristr($area,$sname)=="")) {
			if(stristr($area,"*")=="") {
				if($fp!=$sname) {
					//return page_reload('You have no permission', 'index.php');
					echo "<script>alert('You have no permision on $sname, you only can access $area relogin to reload priveledge');document.location='$fp.php'</script>";
					//return page_reload('', "$fp.php");
					exit;
				}
			}
		}
		*/
		
		/*
		if ($_SESSION['level']>$maxlevel){
			return page_reload('You have no permission', 'index.php');
			exit;
		}
		*/
	}
	return true;
}


function auth_islogin(){
	global $db;
	if (isset($_SESSION['uid']))return true;
	if (isset($_COOKIE['id']) && strlen($_COOKIE['id'])>5){
		$where="sid='$_COOKIE[id]'";
		$data=$db->lookup('user','uid,expire,level,uname,ref,area,kurs',$where);
		error_log("auth ".$db->getQueryString());
		if ($data!==FALSE){
			if ($data[1]<time()){
				$_SESSION['uid']=$data[0];
				$_SESSION['level']=$data[2];
				$_SESSION['uname']=$data[3];
				$_SESSION['ref']=$data[4];
				$_SESSION['area']=$data[5];
				$_SESSION['kurs']=$data[6];
				return true;
			}
		}
	}
	return FALSE;
}

function auth_dologin($uname,$passwd,$next,$remember=FALSE){
	global $db;
	$where="uname='$uname' AND passwd='".md5($passwd)."'";
	$uid=$db->lookup('user','uid,level,ref,area',$where);
	//echo $db->getQueryString();
	//echo mysql_error();
	//exit;
	if (strlen($uname)>0 && $uid!==FALSE){
		$_SESSION['uid']=$uid[0];
		$_SESSION['level']=$uid[1];
		$_SESSION['uname']=$uname;
		$_SESSION['ref']=$uid[2];
		$_SESSION['area']=$uid[3];
		$fpxo = explode(",",$uid[3]);
		$fpx = explode("|",$fpxo[0]);
		$fp = $fpx[0];
		if ($remember){
			//remember for 1 month
			$time=time();
			$sid=md5($time);
			$expired=$time+3600*24*30;
			setcookie('id',$sid,$expired);
			$db->execute("UPDATE user set sid='$sid',expire=$expired Where uids=$uid[0]");
		} else {
			setcookie('id');
		}
		$next=($next)? $next:'index.php';
		if($fp!="*")
			$next = "$fp.php";

//die("disini $next");
		header('location:'.$next);
	} else {
		$n='';
		if ($next)$n='?next='.urlencode($next);
		$_SESSION['message']='Username atau password salah';
		header('location:'.$_SERVER['PHP_SELF'].$n);
	}
}

function auth_checklogin($uname,$passwd){
	global $db;
	$where="uname='$uname' AND passwd=MD5('$passwd')";
	$uid=$db->lookup('user','uid',$where);
	return $uid;
}

function auth_dologout($redirect='login.php'){
	session_destroy();
	setcookie('id');
	header('location:'.$redirect);
	exit;
}
?>