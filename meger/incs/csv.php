<?php

function csv_upload2db(&$db,$filename,$table,$fields)
{
	//echo $filename;
	$pf=fopen($filename,'r');
	if (!is_resource($pf))return -1;
	$count=0;
					
	while (true){
		$cells=_csv_getrows($pf,';');
		if ($cells!==FALSE){
			if ($count>0){
					$f=false;
					while (list($k,$v)=each($fields)){
    				if (substr($v,0,1)=='?'){
    					$index=substr($v,1);
    					if (is_numeric($index)){
    						if ($index<count($cells))$f[$k]=$cells[$index];
    					} else {
    						for ($i=0;$i<count($cells);$i++){
    							$index=str_replace('?'.$i,$cells[$i],$index);
    						}
    						$q=$db->execute($index);
 						$row=$q->fetch_row();
    						if ($row!==FALSE)$f[$k]=$row[0];
    					}
    				} else {
    					$f[$k]=$v;
    				}
    			}
    			reset($fields);
    			if ($f){
    				$db->insert($table,$f);
//echo $db->getQueryString();  
				if($table=='sims_siswa') {                   
					$ff['pin'] = '1234';
					//$ff['since_date'] = 'NOW()';
					$ff['no_hp'] = $f['no_hp'];
					$ff['no_sid'] = 'sims';
					//$ff['valid_until'] = 'NOW()';
                                	$db->insert("member",$ff);
				}
    			}
			}
		} else {
			break;
		}
		$count++;
	}
	return $count-1;
}

function _csv_getrows($pf,$separator=',',$convertEscape=true)
{
		$cell	= array();
		$p		= '';
		$buff 	= '';
		$quote 	= 0;
		while (true){
			$c = fgetc($pf);
			if ( $c == '' ){
				if ( $buff != '' ){
					$cell[] = $buff;	
				}
				return sizeof( $cell ) != 0 ? $cell : false;	
			}
			if ( ( $c == $separator || $c == "\n" ) && 0 == ( $quote % 2 ) ){
				if ( $quote != 0 ){
					$i = strrpos( $buff, '"' );
					$buff = substr( $buff, 0, $i );
				}
				$cell[] = $buff;
				if ( $c == "\n" ){
					//$this->lineCount++;
					return $cell;
				}
				$buff 	= '';
				$quote 	= 0;
			}
			elseif ( $c == "\\" && $convertEscape ){
				// slash
				$c= fgetc($pf);
				switch ( $c )
				{
					case '"':
						$buff .= '"';
						break;
					case "'":
						$buff .= "'";
						break;
					case 'x':
						// hex
						$c = fgetc($pf);
						$_tmp = '';
						while ( ( ord( $c ) >= 48 && ord( $c ) <= 57 ) || ( ord( $c ) >= 65 && ord( $c ) <= 70 ) || ( ord( $c ) >= 97 && ord( $c ) <= 102 ) )
						{
							$_tmp .= $c;
						}
						eval( "\$_tmp = \\x{$_tmp};" );
						$buff .= $_tmp;
						break;
					case '0':
					case '1':
					case '2':
					case '3':
					case '4':
					case '5':
					case '6':
					case '7':
					case '8':
					case '9':
						$_tmp = $c;
						$c = fgetc($pf);
						while ( ( ord( $c ) >= 48 && ord( $c ) <= 57 ) )
						{
							$_tmp .= $c;
							$c= fgetc($pf);
						}
						eval( "\$_tmp = \\{$_tmp};" );
						$buff .= $_tmp;
						// octal
						break;
					default:
						$buff .= "\\".$c;
					
				}
			}
			elseif ( ( $c == '!' || $c == '#' || $c == ';' ) && $buff == '' ) 
			{
				// comment
				//$this->_skipLine();
				$c = fgetc($pf);
				while( $c != '' && $c != "\n" )$c = fgetc($pf);
				
			}
			elseif ( $c == '"' ) 
			{
				if ( ( $quote % 2 ) != 0 )
					$buff .= $c;
				$quote++;				
			}
			else if ( $c != "\r" )$buff .= $c;	
		}
		return false;
}

?>
