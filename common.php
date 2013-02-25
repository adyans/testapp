<?

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