<?php

include "../common.php";
include "rssparser.php";

$url = 'http://www.electronicsolution.com/rss/catalog/salesrule/store_id/2/cid/0/';
$url = 'http://www.electronicsolution.com/rss/catalog/category/cid/37/store_id/2/';
// Computers
$url = 'http://www.electronicsolution.com/rss/catalog/category/cid/15/store_id/2/';

$urls = array(
    'electronic' => 'http://www.electronicsolution.com/rss/catalog/category/cid/13/store_id/2/',
    'homeapp' => 'http://www.electronicsolution.com/rss/catalog/category/cid/35/store_id/2/',
    'gadget' => 'http://www.electronicsolution.com/rss/catalog/category/cid/36/store_id/2/',
    'camera' => 'http://www.electronicsolution.com/rss/catalog/category/cid/37/store_id/2/',
    'office' => 'http://www.electronicsolution.com/rss/catalog/category/cid/39/store_id/2/',
    'computer' => 'http://www.electronicsolution.com/rss/catalog/category/cid/15/store_id/2/',
    'tenant' => 'http://www.electronicsolution.com/rss/catalog/category/cid/40/store_id/2/',
    'furniture' => 'http://www.electronicsolution.com/rss/catalog/category/cid/10/store_id/2/',
    'gallery' => 'http://www.electronicsolution.com/rss/catalog/category/cid/197/store_id/2/'
);

if ($_GET) {
    if ($_GET['t']) $url = $urls[$_GET['t']];
}

$esrss = new Rssfeed($url);
$items = $esrss->items;

$products = array();

foreach ($items as $item)
{
    //print_r($item);echo "<hr>";
    $title = $item->title;
    $text = $item->text;
    $link = $item->link;
    $ts = $item->ts;
    $date = $item->date;

    $thumb = getThumb($text);

    $products['item'][] = array(
        'title' => $title,
        'link' => $link,
        'description' => strip_tags($text, '<p><table><tr><td><a><span><div>'),
        'pubdate' => $date,
        'image' => $thumb
    );

    //print_r($item);    
    //mysql_insert("esapp_office", $esapp);

    /*
	$jsonitem = json_encode($items);
	$jsonitem = cleantext($jsonitem);
	echo $jsonitem;
    */
}
    $jsonitem = json_encode($products);
    $jsonitem = cleantext($jsonitem);
    echo $jsonitem;

?>