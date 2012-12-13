<?php
class SmartyTable extends Smarty
{
	var $order;
	var $start;
	var $limit;
	var $num_rows;
	var $url;
	var $param;
	var $query;
	var $total_rows;
	
	function SmartyTable($url,&$get,&$param,$order_default=1,$limit_default=10,$start_default=0)
	{
		if (strpos($url,'?')>0)$this->url=$url;
		else $this->url=$url.'?';
		$this->start=(isset($get['s']) && is_numeric($get['s'])) ? $get['s'] : $start_default=0;
		$this->limit=(isset($get['l']) && is_numeric($get['l'])) ? $get['l'] : $limit_default=10;
		$this->order=(isset($get['o'])) ? $get['o'] : $order_default;
		$this->param=$param;
		$this->total_rows=0;
	}
	
	function show_query(&$db,$query)
	{
		
	}
	
	function show_table(&$db,$table,$select='*',$where=FALSE,$option='')
	{
		$this->total_rows=$db->lookup($table,"COUNT(*)",$where,$option);
		$where=($where===FALSE || strlen($where)==0)?'':"Where $where";
		if ($this->total_rows>0){
			$rs=$db->execute("select $select From $table $where $option Order By ".$this->order.' Limit '.$this->start.','.$this->limit);
			echo mysql_error();
			$data=$rs->fetch_all_assoc();
			$rs->free();
			$this->assign_by_ref('data',$data);
		}
	}
	
	function display($template)
	{
		if(substr($this->url,-1)=="?") $this->url = substr($this->url,0,-1);
		
		if ($this->start==0){
			$prev="Prev";
			$first_url = "First";
		} else {
			$first_url = " <a href='".$this->url."?s=0&l=".$this->limit."&o=".$this->order."'>First</a>";
			$s=($this->start>$this->limit) ? $this->start-$this->limit: 0;
			$prev='<a href="'.$this->url."&s=$s&l=".$this->limit.'&o='.$this->order.'">Prev</a>';
		}
		if ($this->start+$this->limit<$this->total_rows){
			$s=$this->start+$this->limit;
			$next='<a href="'.$this->url."&s=$s&l=".$this->limit.'&o='.$this->order.'">Next</a>';
		} else {
			$next="Next";
		}

		$pging = ceil(($this->total_rows*1) / $this->limit);

$sx = @$_GET['s'];

if($sx>99) {
	$st = ($sx/10);
	$en = $st+10;
} else {
	$st = 0;
	$en = 10;
}

$hal = ($sx ? ($sx/10)+1 : 1);
		$paging_url = "";
		for($i=$st;$i<$en;$i++) {
			if(($i*$this->limit)+$this->limit>$this->total_rows) {
				$last_url = "Last";
			}

			$ix = $i+1;
			$st = $i * $this->limit;
			if($ix==$hal)
			$paging_url .= " <b>$ix</b> |";
			else
			$paging_url .= " <a href='".$this->url."?s=$st&l=".$this->limit."&o=".$this->order."'>$ix</a> |";
			if(($i*$this->limit)+$this->limit>$this->total_rows) {
				//$last_url = "Last";
				break;
			}
		}
		
		if($next=="Next")
		$last_url = "Last";
		else
		$last_url = " <a href='".$this->url."?s=".($pging-1)*$this->limit."&l=".$this->limit."&o=".$this->order."'>Last</a>";

		
		$paging_url = substr($paging_url,0,-1);
		
		//var_dump($paging_url);
		$this->assign('total_rows',$this->total_rows);
		$this->assign('url',$this->url);
		$this->assign('start',$this->start);
		$this->assign('limit',$this->limit);
		
		if ($this->param)
			$this->assign_by_ref('param',$this->param);
		if (is_numeric($this->order)){
			$orders[$this->order]='+DESC';
			$this->assign_by_ref('orders',$orders);
		}
		else $this->order=substr($this->order,strpos($this->order,' '));
		$this->assign('order',$this->order);
		$this->assign('next_url',$next);
		$this->assign('prev_url',$prev);
		$this->assign('paging_url',$paging_url);
		$this->assign('first_url',$first_url);
		$this->assign('last_url',$last_url);
		parent::display($template);	
	}
}
?>