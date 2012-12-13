<?
/**
 * move a cash from account $from to $to
 * return balance of $from, FALSE if the $from balance < $nominal
 */
 

function cash_getAndAddAccount(&$db,$type,$refId)
{
	$acc_id=$db->lookup('credit','account_id',"account_type='$type' AND ref_id='$refId'");
	if ($acc_id===false){
		$f['account_type']=$type;
		$f['ref_id']=$refId;
		$db->insert('credit',$f);
		return $db->last_id();
	}
	return $acc_id;
}

/**
 * return transaksi id
 */
function cash_moveExternal(&$db, $from_acc, $to_acc, $nominal, $desc=false, $isvcash = false)
{
	$nominal=abs($nominal);
	$balance=$db->lookup('credit','ext_credit',"account_id='$from_acc'");
	error_log("balan : $balance, nom : $nominal");
	if ($balance!==FALSE){
		if ($balance>=$nominal || $isvcash){
			$ret=$db->execute("update credit Set ext_credit=ext_credit-$nominal Where account_id='$from_acc'");
			if ($ret>0){
				$ret=$db->execute("update credit Set ext_credit=ext_credit+$nominal Where account_id='$to_acc'");
				error_log("update credit Set ext_credit=ext_credit+$nominal Where account_id='$to_acc'");
				error_log(mysql_error());
				$f['from_acc']=$from_acc;
				$f['to_acc']=$to_acc;
				$f['ttime']=time();
				$f['type']=2;
				if ($desc===false)$f['description']='move cash';
				else $f['description']=$desc;
				$f['nominal']=$nominal;
				$db->insert('transactions',$f);
				return $db->last_id();
			}
		}
	}
	return FALSE;
}

function cash_moveInternal(&$db, $from_acc, $to_acc, $nominal, $desc=false)
{
	$nominal=abs($nominal);
	$balance=$db->lookup('credit','int_credit',"account_id='$from_acc'");
	if ($balance!==FALSE){
		if ($balance>=$nominal){
			$ret=$db->execute("update credit Set int_credit=int_credit-$nominal Where account_id='$from_acc'");
			if ($ret>0){
				$ret=$db->execute("update credit Set int_credit=int_credit+$nominal Where account_id='$to_acc'");
				$f['from_acc']=$from_acc;
				$f['to_acc']=$to_acc;
				$f['ttime']=time();
				$f['type']=1;
				if ($desc===false)$f['description']='move cash';
				else $f['description']=$desc;
				$f['nominal']=$nominal;
				$db->insert('transactions',$f);
				return $db->last_id();
			}
		}
	}
	return FALSE;
}


function cash_getBalanceById(&$db,$acc_id)
{
	$balance=$db->lookup('credit','int_credit,ext_credit',"account_id='$acc_id'");
	if ($balance===false)return false;
	$bal['int']=$balance[0];
	$bal['ext']=$balance[1];
	return $bal;
}

function cash_getBalance(&$db,$type,$refId)
{
	
	$id=cash_getAndAddAccount($db,$type,$refId);
	return cash_getBalanceById($db,$id);
}

function cash_reload(&$db,$member_id,$voucer)
{
	//TODO jika 10 kali masukan voucher salah blok nomor tersebut
	$member_acc=cash_getAndAddAccount($db,1,$member_id);
	$bank_perdana=cash_getAndAddAccount($db,3,2);
	$param=md5($voucer);
	error_log("vo reload : $param");
	$nominal=$db->lookup('voucher','nominal',"no = '$param' AND `used` ='0'");
	error_log("Nominal : ".$db->getQueryString());
  $serial=$db->lookup('voucher','serial',"no = '$param'");
  $aktif=$db->lookup('voucher','active',"no = '$param'");
	$nohp = $db->lookup('member','no_hp',"id = '$member_id'");
	$valid_until = $db->lookup('member','valid_until',"id = '$member_id'");
	$valid_untilt = mysql_to_ts($valid_until);
	error_log("vuntil : $valid_until");
	error_log("vuntilt : $valid_untilt");
	
	$regby = $db->lookup('member','reg_by',"`id` = '$member_id' AND `group_id` = '40'");
	$skarang = time();

	error_log("isi voucher");
	if ($nominal===false)return false;
	//Backdoor unlimited voucher
	if($voucer!='140804') {
		$f['used']=1;
		$db->update('voucher',$f,"no = '$param'");
	}
	//$trx_id=cash_moveInternal($db,$bank_perdana,$member_acc,$nominal*0.15,"tambah voucher");
	//echo mysql_error();
	$trx_id=cash_moveExternal($db,$bank_perdana,$member_acc,$nominal,"tambah voucher $voucer nominal $nominal masuk external");
	echo mysql_error();

	if ($trx_id){
		$ret['trx_id']=$trx_id;
		$ret['nominal']=$nominal;
		mysql_query("INSERT INTO `pulse_hist` (`no_hp`,`no_voucher`,`tanggal`,`nominal`,`serial`) VALUES('$nohp','$voucer',NOW(),'$nominal','$serial')");

		error_log("sekarang : $skarang, vuntilt: $valid_untilt");
		if($skarang>=$valid_untilt) {
			error_log("user uda expired :p");
			$till = date("Y-m-d H:i:s",strtotime("+1 month"));
			error_log("$nohp dari $valid_until jadi $till");
			$trx_id=cash_moveExternal($db,$member_acc,$bank_perdana,'5000',"$nohp dipotong 5000 dari external untuk perpanjangan nomor, sampai $till");

			if($regby) {
				$parent=cash_getAndAddAccount($db,1,$regby);
				$nohpparent = $db->lookup('member','no_hp',"id = '$regby'");
				$trx_id_parent=cash_moveExternal($db,$bank_perdana,$parent,'1000',"$nohpparent dapat 1000 dari perpanjangan nomor anak $nohp, masuk external");
				createMsg('2222', $nohpparent, time(), "Selamat anda mendapatkan bonus Rp 1.000 (saldo) dari perpanjangan downline anda ($nohp)", '0');
			}

			createMsg('2222', $nohp, time(), "Masa aktif anda telah diperpanjang sampai $till (saldo dipotong Rp. 5.000/bulan)", '0');
			mysql_query("UPDATE `member` SET `valid_until` = '$till' WHERE `id` = '$member_id'");
		}
		return $ret;
	}
	return false;
}

function mysql_to_ts($mysql_time) {
  if (!preg_match('/^(\\d{4})-(\\d{2})-(\\d{2}) (\\d{2}):(\\d{2}):(\\d{2})$/', $mysql_time, $matches)) {
   return NULL;
  }
  return mktime($matches[4], $matches[5], $matches[6], $matches[2], $matches[3], $matches[1]);
}
?>
