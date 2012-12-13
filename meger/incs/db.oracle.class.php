<?php
/**
 * 
 * class db oracle
 * created by amadarum
 * modif by koronx
 */

if (defined('DB_ORACLE_CLASS'))return;
define('DB_ORACLE_CLASS',1);


class Query{

	var $db;
	var $result;
		
	function Query(&$db,$query=''){
		$this->db=$db;
		if(!empty($query) && !empty($db->dbcon)){
      		$this->result=$this->db->_execute($query);
      		return $this->result;
      	}
	}
	
	function Open($table,$where='',$fields='*',$optional=''){
		$fields=($fields=='')?'*':$fields;
		$query="SELECT $fields FROM $table ";
		if ($where!='') $query.="WHERE $where ";
		if ($optional!='') $query.=$optional;
		$this->result=$this->db->_execute($query);
		return $this->result;
	}
	
	function fetch_all_row($max=9999){
		//echo "all row";
		$i=0;
		$data=array();
		while (($row=$this->fetch_row())&&$i<$max){
			foreach($row as $k=>$v) {
				if(!is_numeric($k)) {
					$ix = strtolower($k);
					$row[$ix] = trim($v);
				}
			}
			$data[$i++]=$row;
		}
		//print_r($data);
		return $data;
	}
	
	function fetch_all_assoc($max=9999){
		//echo "all assoc";
		$i=0;
		$data=array();
		while (($row=$this->fetch_assoc())&&$i<$max){
			foreach($row as $k=>$v) {
				if(!is_numeric($k)) {
					$ix = strtolower($k);
					$row[$ix] = trim($v);
				}
			}
			$data[$i++]=$row;
		}
		//print_r($data);
		return $data;
	}
	
	function fetch_all_key($max=9999){
		$data=array();
		$i=0;
		while (($row=$this->fetch_row())&&$i<$max){
			$data[$row[0]]=$row[1];
			$i++;
		}
		return $data;
	}
	
	function fetch_row(){
		//return @mysql_fetch_row($this->result);
		return $this->fetch_assoc();
	}
	function fetch_assoc(){
		//return @mysql_fetch_assoc($this->result);
		if($this->result) {
			$row = $this->result->FetchRow();
			//var_dump($rowx);


			foreach($row as $k=>$v) {
				if(!is_numeric($k)) {
					$ix = strtolower($k);
					$row[$ix] = trim($v);
				}
			}
			//print_r($row);

			return $row;
		}
	}
	
	function num_rows(){
		//return @mysql_num_rows($this->result);
		if($this->result)
			return $this->result->RecordCount();
	}
	
	/*
	function data_seek($i){
		return @mysql_data_seek($this->result,$i);
	}
	*/
	
	function free(){
		//@mysql_free_result($this->result);
	}
}

class Database{
	var $dbcon;
	var $error;
	var $m_query='';
	var $last_result;
	var $isgc;

	function Database($oradb)
	{
		$this->isgc=get_magic_quotes_gpc();	
		$this->dbcon=$oradb;
	}
	
	function connect($dbhost, $dbuser, $dbpass, $dbname){
		/*
		$this->dbcon=@mysql_pconnect($dbhost,$dbuser,$dbpass);
		if ($this->dbcon){
			@mysql_select_db($dbname,$this->dbcon);
		}
		return $this->dbcon;
		*/
	}
	
	/**
	 * find a field from database 
	 * @param $table source table
	 */
	function lookUp($table,$field,&$where,$option=FALSE){
		$query="SELECT $field FROM $table ";
		if (is_array($where)){
			if (count($where)>0){
				$query.='WHERE ';
				while (list($key,$val)=each($where)){
					if (!$this->isgc)$query.="`$key`='".addslashes($val)."' AND ";
					else $query.="`$key`='$val' AND ";
				}
				$query=substr($query,0,strlen($query)-5);
				reset($where);				
			}
		} else if ($where && strlen($where)>0){
			$query.="WHERE $where ";
		}
		if ($option)$option.="$option ";
		$result=$this->_execute($query);
		if ($result===FALSE)return FALSE;
		if ($result->RecordCount()>0){
			$row=$result->FetchRow();
			if (count($row)>1)return $row;
			return $row[0];
		} else {
			return FALSE;
		}
	}
	
	function insert($table,$fields){
		$field='';
		$value='';
		while (list($f,$v)=each($fields)){
			$field=$field.",`$f`";
			if (!$this->isgc)$value.=",'".addslashes($v)."'";
			else $value.=",'$v'";	
		}
		$field=substr($field,1);
		$value=substr($value,1);
		$query="INSERT INTO `$table`($field) VALUES($value)";
		return $this->execute($query);
	}
	
	function update($table,$sets,$where){
		$set='';
		while (list($key,$val)=each($sets)){
			if (!$this->isgc)$set.=",`$key`='".addslashes($val)."'";
			else $set.=",`$key`='$val'";
		}
		$set=substr($set,1);
		$query="UPDATE `$table` SET $set WHERE $where";
		return $this->execute($query);
	}
	
	function delete($table,$where){
		$query="DELETE FROM `$table` WHERE $where";
		//@mysql_query($query,$this->dbcon);
		return $this->execute($query);
	}
	
	function _execute($query)
	{
		$query = $this->_cleanupsql($query);
		$this->m_query=$query;
		//$this->last_result=@mysql_query($query,$this->dbcon);
	
		$this->last_result=$this->dbcon->Execute($query);	
		//if (mysql_errno()!=0)return FALSE;//echo $this->getQueryString()."<br>".mysql_error().'<br><Br>';
		return $this->last_result;
	}
	
	function _cleanupsql($sql) {
		$sql = str_replace("`","",$sql);
		return $sql;
	}
	
	function _iflimit(&$sql,&$l1,&$l2) {
		$sql = strtolower($sql);
		
		$l = strstr($sql,"limit");
		$l = explode(" ",$l);
		$l = $l[1];
		$l = explode(",",$l);
		$l1 = $l[0];
		$l2 = $l[1];

		$i = strpos($sql,"limit");
		$sql = substr($sql,0,$i);
		
		$sql = "SELECT * FROM($sql) WHERE rownum >= $l1 and rownum <= $l2";
	}

	/* execute query */
	function execute($query){
		$query = $this->_cleanupsql($query);
		$this->m_query=$query;
		//$this->last_result=@mysql_query($query,$this->dbcon);
		if(stristr($query,"limit")=="")
			$this->last_result=$this->dbcon->Execute($query);
		//if (mysql_errno()!=0)echo $this->getQueryString()."<br>".mysql_error().'<br><Br>';
		if (eregi('^[\s]*select',$query)){
			if(stristr($query,"limit")) {
				$this->_iflimit($query,$l1,$l2);
				//$this->last_result = $this->dbcon->SelectLimit($query,$l1,$l2);
				$this->last_result = $this->dbcon->Execute($query);
			} 
			$query=new Query($this);
			$query->result=$this->last_result;
			return $query;
		}
		//return @mysql_affected_rows($this->dbcon);
		return $this->dbcon->Affected_Rows();
	}

	function close(){
		//@mysql_close($this->dbcon);
		$this->dbcon->Close();
	}
	
	/*
	function last_id(){
		return @mysql_insert_id($this->dbcon);	
	}
	
	function error(){
		return mysql_error();
	}
	function errno(){
		return mysql_errno();
	}
	*/
	function getQueryString(){
		return $this->m_query;
	}
	
}

?>
