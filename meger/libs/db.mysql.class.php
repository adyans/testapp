<?
/**
 * 
 * class db mysql
 * created by amadarum
 */

if (defined('DB_MYSQL_CLASS'))return;
define('DB_MYSQL_CLASS',1);


class Query{

	var $db;
	var $result;
		
	function Query(&$db,$query=''){
		$this->db=$db;
		if(!empty($query) && !empty($db->dbcon)){
     		 // mysql_select_db($db->database, $db->connect_id);  // If you are having trouble with other apps uncomment this line.
      		$this->result=$this->db->_execute($query);
      		return $this->result;
      	}
	}
	
	function Open($table,$where='',$fields='*',$optional=''){
		@mysql_free_result($this->result);
		$fields=($fields=='')?'*':$fields;
		$query="SELECT $fields FROM $table ";
		if ($where!='') $query.="WHERE $where ";
		if ($optional!='') $query.=$optional;
		$this->result=$this->db->_execute($query);
		return $this->result;
	}
	
	function fetch_all_row($max=9999){
		$i=0;
		$data=array();
		while (($row=$this->fetch_row())&&$i<$max){
			$data[$i++]=$row;
		}
		return $data;
	}
	
	function fetch_all_assoc($max=9999){
		$i=0;
		$data=array();
		while (($row=$this->fetch_assoc())&&$i<$max){
			$data[$i++]=$row;
		}
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
		return @mysql_fetch_row($this->result);
	}
	function fetch_assoc(){
		return @mysql_fetch_assoc($this->result);
	}
	
	function num_rows(){
		return @mysql_num_rows($this->result);
	}
	
	function data_seek($i){
		return @mysql_data_seek($this->result,$i);
	}
	
	function free(){
		@mysql_free_result($this->result);
	}
}

class Database{
	var $dbcon;
	var $error;
	var $m_query='';
	var $last_result;
	var $isgc;

	function Database()
	{
		$this->isgc=get_magic_quotes_gpc();	
		
	}
	function connect($dbhost, $dbuser, $dbpass, $dbname){
		$this->dbcon=@mysql_pconnect($dbhost,$dbuser,$dbpass);
		if ($this->dbcon){
			@mysql_select_db($dbname,$this->dbcon);
		}
		return $this->dbcon;
	}
	
	/**
	 * find a field from database 
	 * @param $table source table
	 */
	function lookUp($table,$field,$where=FALSE){
		$query="SELECT $field FROM $table ";
		if ($where)$query.="WHERE $where ";
		$result=$this->_execute($query);
		if ($result===FALSE)return FALSE;
		if (@mysql_num_rows($result)>0){
			$row=@mysql_fetch_row($result);
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
			if (!$this->isgc)$v=mysql_real_escape_string($v);
			$value.=",'$v'";	
		}
		$field=substr($field,1);
		$value=substr($value,1);
		$query="INSERT INTO `$table`($field) VALUES($value)";
		return $this->execute($query);
	}
	
	function update($table,$sets,$where){
		$set='';
		while (list($key,$val)=each($sets)){
			if (!$this->isgc)$val=mysql_real_escape_string($val);
			$set.=",`$key`='$val'";
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
		$this->m_query=$query;
		$this->last_result=@mysql_query($query,$this->dbcon);
		if (mysql_errno()!=0)return FALSE;//echo $this->getQueryString()."<br>".mysql_error().'<br><Br>';
		return $this->last_result;;
	}
	
	/* execute query */
	function execute($query){
		$this->m_query=$query;
		$this->last_result=@mysql_query($query,$this->dbcon);
		//if (mysql_errno()!=0)echo $this->getQueryString()."<br>".mysql_error().'<br><Br>';
		if (eregi('^[\s]*select',$query)){
			$query=new Query($this);
			$query->result=$this->last_result;
			return $query;
		}
		return @mysql_affected_rows($this->dbcon);
	}

	function close(){
		@mysql_close($this->dbcon);
	}
	
	function last_id(){
		return @mysql_insert_id($this->dbcon);	
	}
	function error(){
		return mysql_error();
	}
	function errno(){
		return mysql_errno();
	}
	function getQueryString(){
		return $this->m_query;
	}
	
}

?>