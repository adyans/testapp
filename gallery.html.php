<?php
include "config.php";
include "common.php";
include "rssparser.php";

?>
<div id="judul" class="judul" style="margin-bottom:10px;padding:5px;">New Products</div>
<div style="clear:both;"></div>
				<ul id="gallery" class="gallery">
<?
$url = 'http://www.electronicsolution.com/rss/catalog/category/cid/101/store_id/2/';

$esrss = new Rssfeed($url);
$items = $esrss->items;
foreach ($items as $item)
{
    //print_r($item);echo "<hr>";
    $title = $item->title;
    $text = $item->text;
    $link = $item->link;
    $ts = $item->ts;
    $date = $item->date;

    $thumb = getThumb($text);
?>
					<li><a href="#" class="font8"><img src="<?=$thumb?>" alt="<?=$title?>" /><?=$title?></a></li>

<?
}
?>
					<!--li><a href="#">
								<img src="images/content/001.png" alt="Caption Title One" />
							</a></li>
					<li><a href="#">
								<img src="images/content/002.png" alt="Caption Title Two" />
							</a></li>
					<li><a href="detail_klik.html">
								<img src="images/content/003.png" alt="Caption Title Three" />
							</a></li>
					<li><a href="#">
								<img src="images/content/004.png" alt="Caption Title Four" />
							</a></li>
					<li><a href="#">
								<img src="images/content/005.png" alt="Caption Title Five" />
							</a></li>
					<li><a href="#">
								<img src="images/content/006.png" alt="Caption Title Six" />
							</a></li-->
				</ul> 
