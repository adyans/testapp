<?
/**
 * get price of current content
 * return price of $sub_id, return FALSE if content invalid
 */
 

function cp_getPrice(&$db,$sub_id,$sub_type)
{
	$c_id=$db->lookup('content_cp_sub','content_id',"sub_id='$sub_id'");
	$cp_id=$db->lookup('content','cp_id',"content_id='$c_id'");
	$rs = $db->execute("select mringtone,pmessage,ologo,pringtone,ttone,wallpaper,themes,aniwall,javagames where cp_id = '$cp_id'");
	if ($rs->num_rows()>0){
		$data=$rs->fetch_assoc();
		$price = $data[$sub_type+1];
	} else 
		$price = FALSE;
		
	return $price;
?>
