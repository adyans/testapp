<?php

/*
$setting['dbhost']='localhost';
$setting['dbuser']='casualvac';
$setting['dbpass']='jokoroling';
$setting['dbname']='dignitym_app_cvi';
*/

$setting['dbhost']='localhost';
$setting['dbuser']='root';
$setting['dbpass']='';
$setting['dbname']='dignitym_app_cvi';


define('THE_TEMPLATES', 'default');

define('_APP','CVI Panel');
define('_TITLE','CVI Panel');
define('_COPY','&copy;2012 Dignity');


$baseurl = "http://casualvacancyindo.com/beta";

/**
 * trims text to a space then adds ellipses if desired
 * @param string $input text to trim
 * @param int $length in characters to trim to
 * @param bool $ellipses if ellipses (...) are to be added
 * @param bool $strip_html if html tags are to be stripped
 * @return string 
 */
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}
?>
