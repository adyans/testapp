<?

function cs(&$db, $no, $param){

	$rs = $db->execute("SELECT `id` FROM `member` WHERE `no_hp` = '$no' LIMIT 1");
	if ($rs->num_rows() > 0)	{
		$data = $rs->fetch_all_row();
		$member_id = $data[0][0];
		$db->execute("INSERT INTO `cs_msg`(`member_id`, `tstamp`, `msg`) VALUES('$member_id', NOW(), '$param')");

		$rs = $db->execute("SELECT `cs_id` FROM `cs_member` WHERE `member_id` = '$member_id'");
		if ($rs->num_rows() == 0)	{
			$db->execute("INSERT INTO `cs_member`(`member_id`, `time`) VALUES('$member_id', NOW())");
			$db->execute("INSERT INTO `cs_member_log`(`member_id`, `time`) VALUES('$member_id', NOW())");
		}
	}	else	{
		//disini kalo user ga terdaftar
	}
}

?>