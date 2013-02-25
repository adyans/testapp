<?
$username = "root";
$hostname = "localhost";
$password = "root";
$database = "dignitymobile";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

$sel_db = mysql_select_db($database,$dbhandle)
  or die("Could not select db");
  
function mysql_insert($table, $inserts) 
{
    $values = array_map('mysql_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
       
    return mysql_query('INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
}

/*
$rows = do_select("select * from members where id=1");
foreach ($rows as $row)
{
	//do_something
}
*/
function do_select($query)
{
	$result = mysql_query($query);
	$rows = array();
	while ($row = mysql_fetch_array($result))
	{
		$rows[] = $row;
	}
	
	return $rows;
}

function getThumb($string)
{
    $pos1 = strpos($string, "src=");
    $text1 = substr($string, $pos1+5);
    $pos2 = strpos($text1, "\"");
    $text2 = substr($text1, 0, $pos2);

    //echo "$text2 - ".strlen($text2)."<br>";

    $thumb = $text2;
    return $thumb;
}

function cleantext($string)
{
    $newstring = str_replace('\n', "", $string);
    $newstring = str_replace("\n", '', $newstring);
    $newstring = str_replace("<\/span>", "</span>", $newstring);
    $newstring = str_replace("<\/td>", "</td>", $newstring);
    $newstring = str_replace("<\/tr>", "</tr>", $newstring);
    $newstring = str_replace("<\/table>", "</table>", $newstring);
    $newstring = str_replace("<\/a>", "</a>", $newstring);
    $newstring = str_replace("\ufeff", '', $newstring);
    $newstring = str_replace("\/", "/", $newstring);

    return $newstring;
}

?>